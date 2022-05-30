<?php
//
require_once "./src/php/view_data.php";

//Get file / folder info when info is submited trhu the edit  button
if(isset($_POST['rename'])){
    //Get path from $_post array
    $filePath= key($_POST['rename']) ;
    //Get array with all data
    $fileData = pathinfo($filePath);
    //get name with extension to refer to the file
    $fileBasename=$fileData['basename'];
    //Get the new name that user introduces in the input         
    $newName = $_POST['newName'];
//Check if the file exists 
if(file_exists($filePath)){
    //Check if file is a directory
    if (is_dir($filePath)) {
 //Create new path with the input value
  $newPath = strstr($filePath, $fileBasename, true).$newName;
  //rename the directory
  rename($filePath, $newPath);
}else{
    //Get file extension
     $fileExtension=strtolower($fileData['extension']);
      //Create new path with the input value
     $newPath = strstr($filePath, $fileBasename, true).$newName.".$fileExtension";
     //rename the file
     rename($filePath, $newPath);
}
}
clearstatcache();
//Refresh the page with the changes
// header('Location: '.$_SERVER['REQUEST_URI']);
}
//Check when the delete button is submited
if(isset($_POST['delete'])){
        //Get the file/folder path
        $filePath= key($_POST['delete']) ;
        //Check if folder exists 
        if(file_exists($filePath)){
        if (is_dir($filePath)){
        //Iterate trhu all files inside the folder
        $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($filePath, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $fileinfo) {
        //remove files and folders    
        $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
        $todo($fileinfo->getRealPath());
        }
        //remove the main folderselected
        rmdir($filePath);
        }else{
            //Delete the selected file
                unlink($filePath);
        }
        }else{
            echo"file does not exist";
        }
// clearstatcache();
// //Refresh the page with the changes
// header('Location: '.$_SERVER['REQUEST_URI']);
    }
