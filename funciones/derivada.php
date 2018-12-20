<?php  
       function calcularDerivada($polinomio,$t){
        echo 'Función = '.$polinomio.'<br>';
        echo 'Punto de evaluación = '.$t.'<br>';
        $polinomio=str_replace('x','$x', $polinomio);
        $delta_t = 0.1;
        $cont = 0;
        $derivada = 0;
        do{
            $derivada_anterior = $derivada;
            eval('$fun1 = '.str_replace('$x', '($t + $delta_t)', $polinomio).';');
            eval('$fun2 = '.str_replace('$x', '($t - $delta_t)', $polinomio).';');
            $derivada=($fun1 - $fun2)/(2*$delta_t);
            $delta_t = $delta_t/2;
            $cont++;
        }while($delta_t > pow(10, -1));
        return $derivada;
    }
   
    //    DiferenciaAtrasadas();
    //    DiferenciaCentrada();
    //    DiferenciaAdelantada();        
?>