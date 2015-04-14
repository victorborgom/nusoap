
<html>
    <head></head>
    <body>
        <form action="calc_client.php" method="post">
	</br>
	<b>Ejercicio Calculadora nuSoap</b></br></br> 
	Introduce n1:<input type="text" name="num1" size="20"></br>
	Introduce n2:<input type="text" name="num2" size="20"></br>
	</br>
	ELIGE OPCION:</br>
	<input type="radio" name="calcular" value="1">Sumar<br>
	<input type="radio" name="calcular" value="2">Restar<br>
        <input type="radio" name="calcular" value="3">Multiplicar<br>
	<input type="radio" name="calcular" value="4">Dividir<br>
	<input type="submit" value="Enviar">

	</form>
    
    </body>
</html>

<?php
 
require_once ('./lib/nusoap.php');

$a=0; 
$b=0; 
$tipo=0;

if(isset($_POST['calcular']))
{
$tipo=$_POST['calcular'];      
}

if(isset($_POST['num1']))
{
$a=$_POST['num1'];      
}

if(isset($_POST['num2']))
{
$b=$_POST['num2'];      
}


$wsdl="http://2daw01.cesnuria.com/nusoap/ex1/calc_server.php?wsdl";
$client = new nusoap_client($wsdl,'wsdl');
$params = array('a' =>$a, 'b'=>$b);

if($tipo!=0)
{    


    if($tipo==1)
    {
        $result= $client->call('Sum', $params);
        echo '<h2>Resultat</h2><pre>';
        $err = $client->getError();
        if ($err) {
                // Display the error
                echo '<p><b>Error: '.$err.'</b></p>';
        } else {
                // Display the result
                print_r($result);
        }  
    }
    
    if($tipo==2)
    {    
        $result= $client->call('Res', $params);
        echo '<h2>Resultat</h2><pre>';
        $err = $client->getError();
        if ($err) {
                // Display the error
                echo '<p><b>Error: '.$err.'</b></p>';
        } else {
                // Display the result
                print_r($result);
        }    
    }
    
    if($tipo==3)
    {
        $result= $client->call('Mul', $params);
        echo '<h2>Resultat</h2><pre>';
        $err = $client->getError();
        if ($err) {
                // Display the error
                echo '<p><b>Error: '.$err.'</b></p>';
        } else {
                // Display the result
                print_r($result);
        }   
        
    }
    
    if($tipo==4)
    {
        $result= $client->call('Div', $params);
        echo '<h2>Resultat</h2><pre>';
        $err = $client->getError();
        if ($err) {
                // Display the error
                echo '<p><b>Error: '.$err.'</b></p>';
        } else {
                // Display the result
                print_r($result);
        } 
        
        
    }
}

