<?php
//ARRAY EXTENSIONS
$filesExtension = array("doc", "csv", "ppt", "odt", "pdf", "txt");
$imageExtension = array("jpg", "png");
$videoExtension = array("mp3", "mp4");

if (isset($_POST["searchFile"])) {
    echo filterExtension($filesExtension);
} else if (isset($_POST["searchImage"])) {
    echo filterExtension($imageExtension);
} else if (isset($_POST["searchVideo"])) {
    echo filterExtension($videoExtension);
} else {
    echo "not found";
}

function filterExtension($array)
{
    $htmlObject = "";
    //Iterator interface
    $files = new RecursiveDirectoryIterator("../../root");
    //Object/class to iterarte trough iterator interface
    $filesIterator = new RecursiveIteratorIterator($files);

    //Loop torugh the array containing al folders/files recursively
    foreach ($filesIterator as $file) {
        //Get the filename convert to lowercase
        $fileName = $file->getFilename();
        //Check if the value is a file
        //Check if the searched value is in the file
        if ($file->isFile() && in_array($file->getExtension(), $array)) {
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
    return $htmlObject;
}
