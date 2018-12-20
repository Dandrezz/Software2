<!doctype html>
<head>
<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!–Con esto garantizamos que se vea bien en dispositivos móviles–> 
    <title>INTEGRACIÓN MÉTODO DE SIMPSON</title> 
     <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> <!–Llamamos al archivo CSS –>   
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!– Importante llamar antes a jQuery para que funcione bootstrap.min.js   –> 
<script src="js/bootstrap.min.js"></script> <!– Llamamos al JavaScript de Bootstrap –> 

<!-- Versión compilada y comprimida del CSS de Bootstrap -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
 
<!-- Tema opcional -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
 
<!-- Versión compilada y comprimida del JavaScript de Bootstrap -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>


<h1 align="center">INTEGRACIÓN MÉTODO DE SIMPSON</h1>


<table width="30%" border="2px" align="center" class="table table-striped">

<form action="simpson.php" method="post">
    <tr align="center">
        <td> f(x):  </td>
        <td> <input class="form-control input-sm" id="inputsm" type="text" name = "funcion" value = "<?php if(isset($_POST['funcion'])){echo $_POST['funcion'];}?>"/>  </td>
    </tr>
    <tr align="center">
        <td> Límite inferior (a):  </td>      
        <td> <input class="form-control input-sm" id="inputsm" type="text" name="a">  </td>
    </tr>
    <tr align="center">
        <td> Límite superior (b):  </td>      
        <td> <input class="form-control input-sm" id="inputsm" type="text" name="b">  </td>
    </tr>
    <tr align="center">
        <td> n:  </td>      
        <td> <input class="form-control input-sm" id="inputsm" type="text" name="incremento">  </td>
    </tr>
    <tr align="center">
        <td> <input class="form-control input-sm" type="submit" value="Calcular"> </td>
    </tr>
</form>
</table>



<?php
    function f($x){
        
	    return $x*$x -4;
    } 

    
    function validarCampos($a,$b,$n){
        if($a == '' or $b == '' or $n == ''){
            return false;
         }else{
            return true;
         }
    }


    function simpson($polinomio,$a,$b,$n){
        echo 'Función = '.$polinomio.'<br>';
        echo 'Integral entre los puntos '.$a.' y '.$b.'<br>';
        echo 'Número de rectangulos '.$n.'<br>';
        $polinomio=str_replace('x','$x', $polinomio);
        $h=abs(($b-$a)/$n);
        $area=0;
        $fun1;
        $x=$a;
        $areaimpar;
        $areapar;
        for($i=1;$i<($n/2);$i++){

            eval('$fun1 = '.str_replace('x','2*$i-1', $polinomio).';');
            $rect=$fun1*$h;
            $area=$area+$rect;
            //$x=$x+2*$h;
            $areaimpar = $areaimpar + $fun1;
            //$areaimpar=$areaimpar+(f($a+((2*$i-1)*$h)));
        }
        $x=$a+$h;
        for($i=1;$i<(($n/2)-1);$i++){
            eval('$fun1 = '.eval('$fun1 = '.str_replace('x','2*$x-1', $polinomio).';');.';');
            $rect=$fun1*$h;
            $area=$area+$rect;
            $x=$x+$h;
            $areapar = $areapar + $fun1;
            //$areapar=$areapar+(f($a+(2*$i*$h)));
        }   

        for($i=0;$i<$n;$i++){
            eval('$fun1 = '.$polinomio.';');
            $rect=$fun1*$h;
            $area=$area+$rect;
            $x=$x+$h;
        }
        echo $area;
        }

    function validarEntero($a,$b,$n){
        $bool = true;
        if(is_numeric($a) === FALSE){
            echo    '<script type="text/javascript">
            alert("VALOR DE a INCORRECTO");
            </script>';
           $bool = false;
        }
        if(is_numeric($b) === FALSE){
            echo    '<script type="text/javascript">
            alert("VALOR DE b INCORRECTO");
            </script>';
           $bool = false;
        }
        if(is_numeric($n) === FALSE){
            echo    '<script type="text/javascript">
            alert("VALOR DE n INCORRECTO");
            </script>';
           $bool = false;
        }

        if($n%2!=0){
            echo    '<script type="text/javascript">
            alert("VALOR DE n DEBE SER PAR");
            </script>'; 
            $bool = false;
        }

        return $bool;
        
    }

    function simpson2($a,$b,$n){
        $h=abs(($b-$a)/$n);
        $areapar=0;
        $areaimpar=0;
        for($i=1;$i<($n/2);$i++){
            $areaimpar=$areaimpar+(f($a+((2*$i-1)*$h)));
        }

        for($i=1;$i<(($n/2)-1);$i++){
                $areapar=$areapar+(f($a+(2*$i*$h)));
        }
        return ($h/3)*(f($a)+4*$areapar+2*$areaimpar+f($b));
    }

    if($_POST){
            $a=$_POST['a'];
            $b=$_POST['b'];
            $n=$_POST['incremento'];

            $funcion = $_POST['funcion'];
           
            if(validarCampos($a, $b, $n)){
                if (validarEntero($a,$b,$n)){
                    $error=pow(10,-3);
                    $ite1=simpson($a,$b,2);
                    $ite2=simpson($a,$b,$n);
                    $n=2;
                    $aumento=10000;
                    while(true){
                        if(abs($ite1-$ite2)<$error){

                            echo    "   <table width=\"30%\" border=\"2px\" align=\"center\" class=\"table table-striped\">
                                            <tr align=\"center\">
                                                <td> Área calculada </td>
                                                <td class=\"success\">". $ite2 ." </td>
                                            </tr>

                                            <tr align=\"center\">
                                                <td> Error relativo </td>
                                                <td class=\"warning\">". abs($ite1-$ite2)." </td>
                                            </tr> 

                                            <tr align=\"center\">
                                                <td> n: </td>
                                                <td class=\"success\">". $n ." en aumento de ".$aumento."</td>
                                            </tr>
                                        </table>";
                            break;
                        }
                        $n=$n+$aumento;
                        $ite1=$ite2;
                        //$i = $i+1;
                        $ite2=simpson($a,$b,$n);
                        //echo "ite". $i ."=". $ite2. "<br>";
                   } 
                }   
            }else{
                 echo    '<script type="text/javascript">
                        alert("INGRESE TODOS LOS CAMPOS");
                        </script>';
            }
    }

?>

</body>