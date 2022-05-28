<?php

$nameFolder = $_POST["nameFolder"];
$urlFolder = $_POST["url"];
$urlCreation = "../../$urlFolder/$nameFolder";

if (mkdir($urlCreation)) {
   echo "OK";
} else {
   echo "ERROR";
}
