<?php
function rectangulo($polinomio,$a,$b,$n){
echo 'Función = '.$polinomio.'<br>';
echo 'Integral entre los puntos '.$a.' y '.$b.'<br>';
echo 'Número de rectangulos '.$n.'<br>';
$polinomio=str_replace('x','$x', $polinomio);
$h=abs(($b-$a)/$n);
$area=0;
$fun1;
$x=$a;
for($i=0;$i<$n;$i++){
    eval('$fun1 = '.$polinomio.';');
    $rect=$fun1*$h;
    $area=$area+$rect;
    $x=$x+$h;
}
echo $area;
}
?>