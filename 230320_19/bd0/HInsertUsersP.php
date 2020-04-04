<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);
                $id = $_POST["id"];
                $nroemp  = $_POST["nroemp"]; 
                $nombref = $_POST["nombref"];
                $nombrec = $_POST["nombrec"]; 
                $pass = $_POST["pass"];
                $correo = $_POST["correo"]; 
                $oficina = "nombrec"; 
                $puesto = "puesto"; 
                $respuesta = SQLGlobal::cudFiltro("INSERT INTO bd0 values (?,?,?,?,?,?,?,?)",
                array($id,$nroemp,$nombrec,$pass,$correo,$oficina,$correo,$puesto));
           
				
                    if($respuesta>0){
                        echo json_encode(array(
                            'respuesta'=>'200',
                            'estado' => 'Se inserto ok',
                            'data'=>'Nro registros afectados son: '.$respuesta,
                            'error'=>''
                        ));
                    }else{
                        echo json_encode(array(
                            'respuesta'=>'100',
                            'estado' => 'No se registro',
                            'data'=>'Nro registros afectados son: '.$respuesta,
                            'error'=>''
                        ));
                    }
            
        }catch(PDOException $e){
                echo json_encode(
                    array(
                        'respuesta'=>'-1',
                        'estado' => 'Ocurrio un error, intentelo mas tarde',
                        'data'=>'',
                        'error'=>$e->getMessage())
                );
		}
	}
?>
