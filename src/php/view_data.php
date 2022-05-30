<?php
require_once "./src/php/list_files.php";

//GETS FILE / FOLDER  INFO WHEN INFO IS SUBMITED TRHU THE BUTTON
if(isset($_POST['location'])){
//WE GET PATH FROM $_POST ARRAY
$filePath= key($_POST['location']) ;
//GET THE CREATION DATE FROM A FILE USING  "filectime & date"      
$fileDateCreation = date("F d Y H:i:s.", filectime($filePath));
//GET LAST ACCES  FROM A FILE USING  "fileatime & date":
$fileLastAccess= date("F d Y H:i:s.", fileatime($filePath))."<br>";
//GET MODIFCATION DATE  FROM A FILE USING  "fileMtime & date":
$fileDateModification = date("F d Y H:i:s.", filemtime($filePath))."<br>";

if (is_dir($filePath)){
$fileData = pathinfo($filePath);
$fileExtension="Directory";
$fileName= $fileData['filename'];
$fileBasename=$fileData['basename'];


 echo   "<aside class='aside__info'>
          <div class='aside__btn'>
         <form action='' method='POST'>
        <input type='text' name='newName' />
        <input type='submit' name='rename[$filePath]' value='EDIT' />
        </form>
        <form action='' method='POST'>
        <input type='submit' name='delete[$filePath]' value='DELETE' />
        <form>
          </div>
          <div class='aside__img'>
          <img src='src/assets/images/folder_icon.png' alt='' />
          </div>
          <section class='aside__details'>
          <ul class='aside__details-list'>
              <li>Name: $fileName</li>
              <li>Type: $fileExtension</li>
              <li>Date Creation: $fileDateCreation</li>
              <li>Last Access: $fileLastAccess</li>
              <li>Date modification: $fileDateModification </li>             
            </ul>
          </section>
        </aside>";



}
else{
$fileData = pathinfo($filePath);
$fileExtension=strtolower($fileData['extension']);
$fileName= $fileData['filename'];
$display= "";
$fileSize = filesize($filePath);

 if ($fileSize >= 1048576)
 {
     $fileSize = number_format($fileSize / 1048576, 2) . ' MB';
 }
 elseif ($fileSize >= 1024)
 {
     $fileSize = number_format($fileSize / 1024, 2) . ' KB';
 }



$images = array('jpg','png','svg');

if(in_array($fileExtension, $images)){
  $display="<div class='aside__img'><img src='$filePath' alt='' width='100' /></div>";
}elseif($fileExtension =='mp3'){
$display= "<div class='aside__img'><audio controls><source src='$filePath' type='audio/mpeg'></audio></div>";
}elseif($fileExtension =='mp4'){
$display= "<div class='aside__img'><video width='100' height='100' controls><source src='$filePath' type='video/mp4'></video></div>";
}

 echo   "<aside class='aside__info'>
        <div class='aside__btn'>

        <form action='' method='POST'>
        <input type='text' name='newName' />
        <input type='submit' name='rename[$filePath]' value='EDIT' />
        <form>
        <form action='' method='POST'>
        <input type='submit' name='delete[$filePath]' value='DELETE' />
        <form>
          </div>
          $display
          <section class='aside__details'>
          <ul class='aside__details-list'>
              <li>Name: $fileName</li>
              <li>Type: $fileExtension</li>
              <li>Date Creation: $fileDateCreation</li>
              <li>Last Access: $fileLastAccess</li>
              <li>Date modification: $fileDateModification </li>
              <li>Size: $fileSize </li>
            </ul>
          </section>
        </aside>";
}
}
    
