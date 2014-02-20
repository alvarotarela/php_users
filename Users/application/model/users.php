<?php


/**
 * Get users array
 * @param unknown $config
 * @return array
 */
function getUsers($config)
{
	
}

/**
 * Get DBMS link connection
 * @param unknown $config
 * @return link
 */
function connet($config)
{

}

/**
 * Select database
 * @param unknown $config
 * @return null
 */
function selectDB($config)
{

}


/*
// Conectar al DBMS
$link = mysqli_connect($config['database']['host'],
		$config['database']['user'],
		$config['database']['password']);
// Seleccionar la DB
mysqli_select_db($link,$config['database']['db']);
// Hacer la consulta
$sql = "SELECT * FROM users";
$result = mysqli_query($link,$sql);

while($row = mysqli_fetch_assoc($result))
{
	$rows[]=$row;
}
*/
