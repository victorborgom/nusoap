<?php
include('./lib/nusoap.php');
header("Content-Type: text/xml");


$a=0; 
$b=0; 

if(isset($_POST['ciudad']))
{
$a=$_POST['ciudad'];      
}

if(isset($_POST['pais']))
{
$b=$_POST['pais'];      
}


$client = new nusoap_client('http://www.webservicex.net/globalweather.asmx?WSDL','wsdl');
$err = $client->getError();
if ($err) {
}

$param = array('CityName'=>$a,'CountryName'=>$b);
$result = $client->call('GetWeather',$param);

if ($client->fault) {
	print_r($result);
} else {
	// Check for errors
	$err = $client->getError();
	if ($err) {
		// Display the error
	} else {
       
                $data = end($result); //cogemos la parte del array y se la ponemos en un string
                $data = mb_convert_encoding($data, "UTF-16", "UTF-8"); //pasamos de utf16 a 8
                $xml = simplexml_load_string($data) or die("Error");
          
                    print_r($xml->asXML());
            
	}
}

?>
