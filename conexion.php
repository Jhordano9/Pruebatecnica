<?php

  //Abrir conexion a la base de datos
  function connect()
  {
      $link = new PDO("mysql:host=movistardb.cjcmv3tc2pyq.us-east-1.rds.amazonaws.com;port=3306;dbname=interview_db",
            "interview",
            "interview123",
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );

      

    return $link;
  }


 //Obtener parametros para updates
 function getParams($input)
 {
    $filterParams = [];
    foreach($input as $param => $value)
    {
            $filterParams[] = "$param=:$param";
    }
    return implode(", ", $filterParams);
	}

  //Asociar todos los parametros a un sql
	function bindAllValues($statement, $params)
  {
		foreach($params as $param => $value)
    {
				$statement->binParam(':'.$param, $value, PDO::PARAM_STR);
		}
		return $statement;
   }
 ?>