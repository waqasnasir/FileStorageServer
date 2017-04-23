<?php
namespace App\Http\Controllers;
use Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
use Validator;
use Storage;
use Config;
class FileController extends Controller {


    public function uploadFile($username) {

        $file = Input::file('file');
        // setting up rules
        $sizeLimit=Config::get('constants.file_size_limit');
        $validator = Validator::make(['file' => Input::file('file')],['file' => 'required|max:'.$sizeLimit]);
        if ($validator->fails()) {
          // send back to the page with the input data and errors
           return response()->json(['Response' => 'Please select a file and it should be less than 1Mb']);
        }
        else {
          // checking file is valid.
          if ($file->isValid()) {
            $destinationPath =  Config::get('constants.file_upload_path'); // upload path
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $mime=$file->getMimeType();
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $file->move($destinationPath, $fileName); // uploading file to given path
            // adding another row with username and filename
            $user = new User(Request::all());
            $user->username = $username;
            $user->filename=$fileName;
            $user->mimes=$mime;
            $user->save();
            return $user;
          }
          else {
            // sending back with error message.
           return response()->json(['Response' => 'File validation failed']);
          }
        }

    }

    // to show all available file against a user name
    public function showFiles($username) {
      $users = User::where('username','=',$username)->get();
      return $users;
    }

    public function downloadFile($filename) {
      // getting all rows having given filename
      $user = User::where('filename','=',$filename)->first();;
      // if file with given name is in storage
      if($user)
      {
          $fileName=$user->filename;
          $mime=$user->mimes;
          $upload_path=Config::get('constants.file_upload_path'); // getting path form config
          $destinationPath = $upload_path.$fileName; // uploaded path
          $file= public_path()."/". $destinationPath;
          $headers = array('Content-Type:'.$mime);
          return response()->download($file,$fileName,$headers);
        }else
        {
           return response()->json(['Response' => 'File Not Found']);
        }
    }

}
