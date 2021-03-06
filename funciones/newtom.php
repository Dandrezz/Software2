<?php
function newton($polinomio){
    $ori=$polinomio;
    $polinomio=str_replace('x','$xk', $polinomio);
    $delta_t = 0.1;
    $cont = 0;
    $derivada = 1;
    $fu;
    $aux=0;
    $xk=5;
    $k=1;
    eval('$fu = '.$polinomio.';');
    while( $fu>0.00001 || abs($xk-$aux)>0.0000001){
        do{
            $derivada_anterior = $derivada;
            eval('$fun1 = '.str_replace('$xk', '($xk + $delta_t)', $polinomio).';');
            eval('$fun2 = '.str_replace('$xk', '($xk - $delta_t)', $polinomio).';');
            $derivada=($fun1 - $fun2)/(2*$delta_t);
            $delta_t = $delta_t/2;
            $cont++;
        }while($delta_t > pow(10, -2));
        $aux=$xk;
        eval('$fu = '.$polinomio.';');
        $xk=$xk-$fu/$derivada;
        $k++;
        if($k>200){
          echo "No converge";
          break;
        }
      }
      if($xk<0.0001)$xk=0;
    echo '<table class="ui definition table">
    <tbody>
      <tr>
        <td class="two wide column">Funcion</td>
        <td>'.$ori.'</td>
      </tr>
      <tr>
        <td>Raiz</td>
        <td>'.$xk.'</td>
      </tr>
    </tbody>
  </table>';
}
?>