<?php
//retrive the POST data and push them to a keyValue array.
$versnelling = $_POST["versnelling"];
$wiel = $_POST["wiel"];
$toeren = $_POST["toeren"];
$parseJsonArray = array("versnelling" => $versnelling, "wiel" => $wiel, "toeren" => $toeren);

//open the file in a+ to retrive the content of the file.
$jsonFileModeA = fopen('history.json', "a+");
$fileSize = filesize("history.json");

//Check if the file is empty, by checking the fileSize.
if($fileSize){
$decodeJson = json_decode(fread($jsonFileModeA, $fileSize));
}else{
$decodeJson = array();
}

//Add the content of the new array infront of the old array.
array_unshift($decodeJson, $parseJsonArray);

//Open the file in mode w+ to overwrite the file
$jsonFileModeW = fopen('history.json', "w+");

//Encode the array to json and write it to history.json
fwrite($jsonFileModeW, json_encode($decodeJson));
fclose($jsonFileModeA);
fclose($jsonFileModeW);
?>