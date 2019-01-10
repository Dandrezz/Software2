<?php
function rectangulo($polinomio,$a,$b,$n){
echo 'Función = '.$polinomio.'<br>';
$ori=$polinomio;
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
// echo $area;
echo '<table class="ui definition table">
                <tbody>
                  <tr>
                    <td class="six wide column">Función</td>
                    <td>'.$ori.'</td>
                  </tr>
                  <tr>
                    <td>Integral entre los puntos</td>
                    <td>'.$a.' y '.$b.'</td>
                  </tr>
                  <tr>
                    <td>Número de rectangulos</td>
                    <td>'.$n.'</td>
                  </tr>
                  <tr>
                    <td>Calculo de la integral</td>
                    <td>'.$area.'</td>
                  </tr>
                </tbody>
              </table>';
}
?>