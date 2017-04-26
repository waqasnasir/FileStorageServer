This is a file storage server which accepts file using post method and user can retrieve them using get method.
Following are the APIs which can be used to upload and downlaod files.

1. UplaodFile: http://localhost:8000/api/uploadfile/{username}
Using above request file will be uploaded against the given user name

2. ShowFiles:http://localhost:8000/api/showfiles/{username} 
All files uploaded against given username will be shown

1. DownlaodFile: http://localhost:8000/api/downloadfile/{filename}
A file with the given name will be downlaoded


--------How To install-------------
1. clone the project
2. open cmd
3. cd into cloned directory and run following command in terminal
composer install
4. start Mysql
5. in .env file under FileStorageServer/ change database name to "any name you want" and create that database manually using phpMyAdmin or using Mysql shell
Also in .env set the credential of database
6. now run following command
php artisan migrate
7. now start server using command below
php artisan serve
8. thats all it should be live now
