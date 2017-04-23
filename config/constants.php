<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Defined Variables
    |--------------------------------------------------------------------------
    |
    | This is a set of variables that are made specific to this application
    | that are better placed here rather than in .env file.
    | Use config('your_key') to get the values.
    |
    */

    'file_size_limit' => env('SIZE_LIMIT','1024'),
    'file_upload_path' => env('FILE_UPLOAD_PATH','uploadedFiles/'),



];
