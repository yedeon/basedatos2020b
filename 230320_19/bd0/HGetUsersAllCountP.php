
<?php
            require 'SQLGlobal.php';

            if($_SERVER['REQUEST_METHOD']=='POST'){
                try{
                    $datos = json_decode(file_get_contents("php://input"),true);

                    $nroemp = $_POST["nroemp"]; // obtener parametros POST
                    $respuesta = SQLGlobal::selectArrayFiltro(
                        "SELECT * FROM bd0  WHERE nroemp =?",
                        array($nroemp) 
                    );//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
                    echo json_encode(array(
                            'respuesta'=>'200',
                            'estado' => 'Se Filtro ok',
                            'data'=>$respuesta, //. concatea en php // en +
                            'error'=>''
                        ));
                    }catch(PDOException $e){
                        echo json_encode(array(
                            'respuesta'=>'-1',
                            'estado' => 'No EXISTE y',
                            'data'=>'',
                            'error'=>$e->getMessage())
                
                    );
                }
            }
            ?>


