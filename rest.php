<?php
include "conexion.php";

	const STATUS_OK = 2;
	const STATUS_FAIL = 1;

		if($_GET['user']!='' && $_GET['pass']!=''){

			$user = $_GET['user'];
			$pass = $_GET['pass'];

		}else{
				echo json_encode(array('status'=>STATUS_FAIL,'msg'=>'Ingrese su usuario y contraseña'));
				exit;
		}
		
		$query = "SELECT * FROM Users where username=:user";
		$stmt = connect()->prepare($query);
		$stmt->bindParam(':user', $user);
	    $stmt->execute();
        $rsAdm = $stmt->fetch(PDO::FETCH_ASSOC);
        
        //var_dump($rsAdm);
        if($rsAdm){
        	
        	$passW = $rsAdm['password'];

        	if(password_verify($pass, $passW))
			{
					$cliente = $rsAdm['fullname'];

				echo json_encode(array('status'=>STATUS_OK,'cliente'=>$cliente));
				exit;
			}else{
				$error['msg']='Contraseña incorrecta';
			}
        }else{
        	$error['msg']='Usuario no encontrado';
        }

        if(count($error)>0){
        	echo json_encode(array('status'=>STATUS_FAIL,'msg'=>$error['msg']));
				exit;
        }
		
		echo json_encode(array('status'=>STATUS_FAIL,'msg'=>'Error al procesar los datos'));

?>