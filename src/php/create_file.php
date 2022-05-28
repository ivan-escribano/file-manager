<?php

//We can access the data of the file uploaded in the form using super global $_FILES
$file = $_FILES["file"];

//get all the info of the file uploaded using $_FILES
$fileName = $_FILES["file"]["name"];
$fileTmpName = $_FILES["file"]["tmp_name"];
$fileSize = $_FILES["file"]["size"];
$fileError = $_FILES["file"]["error"];
$fileType = $_FILES["file"]["type"];
$urlPath = $_POST["url"];
echo "$urlPath";
//Get the file extension : 
//1. get array with value every "."
$fileExt = explode(".", $fileName);
//2. get the last value of the array
$fileActualExt = strtolower(end(($fileExt)));
//Array with all 
$allowed = array('doc','csv','jpg','png','txt','ppt','odt','pdf','zip','rar','exe','svg','mp3','mp4');

//Check if the ext of the file uploaded its in the array of ext allowed
    //param1 : ext to search , param2: array
    if(in_array($fileActualExt ,  $allowed)){
        //check for error 0 is OK 8 error messages represented in numbers
        if($fileError === 0){
            //check the file size
            if ($fileSize < 1000000) {
                //add file to specified location
                $fileDestination = "../../$urlPath/$fileName";
                //The uploaded file is stored in a temporary location, need to move to temporary location to actual location specified
                move_uploaded_file($fileTmpName , $fileDestination);
                echo"FILE UPLOADED";
            }
            else {
               echo "file to big";
            }
        }
        else{
            echo "ERROR message";
        }
       }
       else{
           echo "not allowed extension";
       }
   
   