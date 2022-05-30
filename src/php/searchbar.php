<?php
//Name to search
$searchName = $_POST["searchValue"];
//convert seach value to lowercase
$actualSearchName = strtolower($searchName);
$htmlObject = "";

//Iterator interface
$files = new RecursiveDirectoryIterator("../../root");
//Object/class to iterarte trough iterator interface
$filesIterator = new RecursiveIteratorIterator($files);

//Loop torugh the array containing al folders/files recursively
foreach ($filesIterator as $file) {
     //Get the filename convert to lowercase
     $fileName = $file->getFilename();
     $actualFileName = strtolower($fileName);
     //Check if the value is a file
     //Check if the searched value is in the file
     if ($file->isFile() && str_contains($actualFileName, $actualSearchName)) {
          //Format path
          //the path get rid of "\" and put "/"
          //get rid initial "../../" because in the index the path is "./"
          $actualPath = str_replace("\\", "/", $file->getPathname());
          $filePath = str_replace("../../", "", $actualPath);
          //TODO change atritbutes and structure if needed. view and delete, ALSO REDUAN** filepath needed? to your implementation
          //Concatenate string
          $htmlObject .= "<section class='files__container-item'><div><img src='../assets/images/file_icon.png' width='12' /><a href=?$filePath>$fileName</a></div></section>";
     }
}
//Print all the elements equals to searched value
echo $htmlObject;
