<?php 

include('../application/model/functions.php');

$config=parse_ini_file('../application/configs/settings.ini',true);

/*
echo "<pre>";
print_r($config);
echo "</pre>";
*/


if(isset($_GET['action']))
	$action = $_GET['action'];
else
	$action = "select";

switch ($action)
{
	case 'update':	
		if($_POST)
		{
			// Dar formato al array post como una linea valida
			$array_out=formatUser($_POST);						
			$alumnos=file_get_contents($config['text_file']);
			$alumnos=explode("\n",$alumnos);
			$alumnos[$_POST['id']]=implode(',',$array_out);
			$alumnos=implode("\n",$alumnos);
			file_put_contents($config['text_file'], $alumnos);			
			header("Location: /usuarios.php");
			// TODO: change image
		}
		else
		{
			$usuario=getUserFromFile($config['text_file'], $_GET['id']); 
			
			ob_start();
				include('../application/views/usuarios/insert.php');
				$content=ob_get_contents();
			ob_end_clean();
			
		}		
	break;
	
	case 'insert':
		if($_POST)
		{
			$filename=getFileName($_SERVER['DOCUMENT_ROOT'], $_FILES['photo']['name']);
			uploadImage($filename, $_SERVER['DOCUMENT_ROOT'], $_FILES['photo']);
			$_POST[]=$filename;
			write2txt($config['text_file'], $_POST);			
			//Saltar a tabla de usuarios
			header("Location: /usuarios.php");
		}
		else 
		{
		
			ob_start();
				include('../application/views/usuarios/insert.php');
				$content=ob_get_contents();
			ob_end_clean();
		}				
	break;
	
	case 'delete':
		if($_POST)
		{
			if($_POST['Borrar']=="Si")
			{
				$alumnos=file_get_contents($config['text_file']);
				$alumnos=explode("\n",$alumnos);
				unset($alumnos[$_POST['id']]);
				$alumnos=implode("\n",$alumnos);
				file_put_contents($config['text_file'], $alumnos);
				// TODO: remove image				
			}
			header("Location: /usuarios.php");
		}
		else
		{
			$usuario=getUserFromFile($config['text_file'], $_GET['id']);
			include('../application/views/usuarios/delete.php');
		}
	break;
	
	case 'select':
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
		
		$filas = $getUsers($config['database']);
		
		
		
		ob_start();
			include ('../application/views/usuarios/select.php');
			$content=ob_get_contents();
		ob_end_clean();		
		break;
	
	default:
		break;
}

include('../application/views/layouts/backend.phtml');
