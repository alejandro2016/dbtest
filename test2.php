
<?php 
$usrForm = $_GET["room"];
$pswForm = $_GET["apellido"];
$apellido = "%$pswForm%";
$con = mssql_connect('mssql2','sa','Zeus1234%') 
    or die('Could not connect to the server!');
	
mssql_select_db('ZEUS') 
    or die('Could not select a database.');
	
$SQL = "SELECT TOP 1000 [NumeroRegistro]
       ,[NumeroFolio]
       ,[NumeroHabitacion]
       ,[Nombre]
       ,[Identificacion]
       ,[FechaLlegada]
       ,[FechaSalida]
   FROM [ZEUS].[dbo].[vw_HoHuespedesCheckin] WHERE NumeroHabitacion=\"".$usrForm."\" AND Nombre LIKE \"".$apellido."\"";

$result = mssql_query($SQL) 
    or die('A error occured: ' . mysql_error());

	
while ($row = mssql_fetch_assoc($result))
  {
$id = $row['NumeroRegistro'];
$room = $row['NumeroHabitacion'];
$nombre = $row['Nombre'];
$salida = $row['FechaSalida'];
  }
          //header("Content-Type: application/json");
echo $_GET['callback'] . '(' . "{'id':'$id','room':'$room','nombre':'$nombre','salida':'$salida'}" . ')';

// prints: jsonp1232617941775({"symbol" : "IBM", "price" : "91.42"});
?>

