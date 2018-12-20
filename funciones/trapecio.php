<!doctype html>
<head>
<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!–Con esto garantizamos que se vea bien en dispositivos móviles–> 
    <title>INTEGRACIÓN MÉTODO DE TRAPECIO</title> 
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


<h1 align="center">INTEGRACIÓN MÉTODO DE TRAPECIO</h1>


<?php
function f($x){
	return $x*$x -4;
} 
function trapecio($a,$b,$n){
$h=abs(($b-$a)/$n);
$area=0;
for($i=1;$i<$n-1;$i++){
$area=$area+(f($a+($i*$h)));
}
return $h*((f($a)/2)+$area+(f($b)/2));
}
$a=-2;
$b=2;
$error=pow(10,-8);
$n=3;
$inte1=trapecio($a,$b,2);
$inte2=trapecio($a,$b,$n);
while(true){
if(abs($inte1-$inte2)<$error){
echo "n=".$n."<br>";
echo "Area igual a ".$inte2."<br>";
echo "Error ".abs($inte1-$inte2);
break;
}
$n=$n+1;
$inte1=$inte2;
$inte2=trapecio($a,$b,$n);
}
?>