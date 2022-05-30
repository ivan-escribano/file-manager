<?php
//general variables
$nameFolder = $_POST["nameFolder"];
$urlFolder = $_POST["url"];
$urlCreation = "../../$urlFolder/$nameFolder";
//Regex exp to check if folder name contains special characters
$illegalChar = '/[\'^£$%&*()}{@#~?><>,|=+¬]/';
$containsSpecialChar = preg_match($illegalChar , $nameFolder);
//TODO SPECIAL CHARACTHERS / and \

//Check if the path of the folder exist
if (is_dir("../../$urlFolder")) {
   //Check if the folder already exist or no
   if (!is_dir($urlCreation)) {
      //check if contains special characters or not
      if (!$containsSpecialChar) {
         mkdir($urlCreation);
         echo "Folder created";
      }
      else{
         echo "The name of the folder is not valid";
      }
   } else {
      echo "The folder already exist in the path given";
   }
} else {
   echo "The folder path doesn't exist";
}
