<?php
// function f($x){
//   return $x*$x-3;
// }
// function derivada($x){
//   $derivada=(f($x+0.000001)-f($x-0.000001))/(2*0.000001);
//   return $derivada;
// }

// function metodoNewton(){
//   $aux=0;
//   $xk=4;
//   $k=1;
//   while(f($xk)>0.0000001 || abs($xk-$aux)>0.0000001){
//     if(derivada($xk)==0){
//       echo "E1. Derivada nula";
//       return;
//     }
//     $aux=$xk;
//     $xk=$xk-f($xk)/derivada($xk);
//     echo $xk."<br><br>";
//     $k++;
//     if($k>200){
//       echo "No converge";
//       break;
//     }
//   }
//   echo "La raiz esta en: ".$xk;
// }

function newton($polinomio){
    echo 'Función = '.$polinomio.'<br>';
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
        }while($delta_t > pow(10, -1));
        $aux=$xk;
        eval('$fu = '.$polinomio.';');
        $xk=$xk-$fu/$derivada;
        $k++;
        if($k>200){
          echo "No converge";
          break;
        }
      }
      echo "Raiz = ".$xk;
}
?>