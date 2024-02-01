<?php

include ('index.php');

$apikey = '4354d10655c26c4c0ace6b5030ebaaa3';
$city = urlencode("Port Blair");
$apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apikey}";

$data = file_get_contents($apiUrl);
$api_data = json_decode($data, true);

$value1=$api_data['name'];
$value2=$api_data['weather'][0]['icon'];
$value3=$api_data['main']['temp'];
$value4=$api_data['wind']['speed'];
$value5=$api_data['main']['humidity'];
$value6=$api_data['main']['pressure'];
$value7=$api_data['weather'][0]['main'];
$value8 = date("Y-m-d H:i:s");
$value9 = date('l',strtotime($value8));//string to time

$sql = "INSERT INTO forecast(city,icon,temp,pressure,humidity,description,windspeed,time,day) VALUE ('$value1','$value2',$value3,$value4,$value5,$value6,'$value7','$value8','$value9')";

if ($conn->query($sql)===TRUE){
    echo"";
}else{
    echo"insert data failed" .$conn->error;
}
?>
