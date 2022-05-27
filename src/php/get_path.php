<?php
//Listing of files and folders
//"dir" specifies the folder where begins the file system
$dir = 'root';
//If GET "path" value is not set root will be the folder to show thats why store in "urlPath"
$urlPath = $dir;

//Get values passed via GET method of the "a" element when its clicked.
//only if the "path" value is set
//Store in "urlPath" add to the "root" more folders names root/test... 
if (isset($_GET['path'])) {
    /**NEW ADDED*/
    if (is_dir($_GET['path'])) {
        $urlPath = $_GET['path'];
    }
    else{
        echo "not found";
    }
    
}
?>