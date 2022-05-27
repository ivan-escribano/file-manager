<?php
//Get rid of the dots "." ".." and list all files and directories inside "urlPath"
$fileListing = array_diff(scandir($urlPath), array('..', '.'));
//Create array to store files and folders
$folders = array();
$files = array();
//loop the "fileListing" containing all files and directories
foreach ($fileListing as $file) {
    //Store the full path of the url and the file/directory
    $fileInfo = $urlPath . "/" . $file;
    //Check if its a folder or a files and store to correspondant array
    if (is_dir($fileInfo)) {
        $folders[] = $file;
    } else {
        $files[] = $file;
    }
}

//Sort by name folders & files
rsort($folders);
rsort($files);

//If directory is empty..
if (count($folders) == 0 && count($files) == 0) {
    echo "<div>Folder is empty.</div>";
}
//loop trough folders array
foreach ($folders as $folderName) {
    //TODO FILEINFO UTILITY  if the "filepath" cotains current path + folder/file path for when you click "a" element than you passed with GET METHOD why $fileInfo only contains $dir with "root" folder not the current, also is not used 
    // $fileInfo = $dir . "/" . $folderName;
    $filePath = $urlPath . '/' . $folderName;
    //create element "a" with a link to the specified file path of the folder/file clicked
    //Pass as GET the new path with the "folder"/"file" name clicked to access new path
    echo "<li> <img src='./images/folder_icon.png' width='12' /> <a href='?path=$filePath'>$folderName</a></li>";
}


foreach ($files as $fileName) {
    //TODO FILEINFO UTILITY
    // $fileInfo = $dir . "/" . $fileName;
    //TODO VIEW AND DELETE  , $_SERVER[REQUEST_URI]
    $fullUrl = $_SERVER['REQUEST_URI'];
    $deleteUrl = $fullUrl . '&' . 'delete=' .  $fileName;
    $viewFile = $fullUrl . '&' . 'view=' .  $fileName;
    //create element "a" with a link to the specified file path of the folder/file clicked
    //Pass as GET the new path with the "folder"/"file" name clicked to access new path
    echo "<li> <img src='./images/file_icon.png' width='12' /> <a href='javascript:;'>$fileName</a> 
                                <a href='$viewFile' class='view_btn'>View</a>    
                                <a href='$deleteUrl' class='delete_btn'>Delete</a>
                            </li>";
}
