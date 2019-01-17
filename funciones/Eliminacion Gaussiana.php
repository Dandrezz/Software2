<?php
if(isset($_POST['a00']) && isset($_POST['a01']) && isset($_POST['a02'])
&& isset($_POST['a10']) && isset($_POST['a11']) && isset($_POST['a12'])
&& isset($_POST['a20']) && isset($_POST['a21']) && isset($_POST['a22'])
&& isset($_POST['b0']) && isset($_POST['b1']) && isset($_POST['b2'])){

  $a[0][0]=$_POST['a00'];
  $a[0][1]=$_POST['a01'];
  $a[0][2]=$_POST['a02'];
  $a[1][0]=$_POST['a10'];
  $a[1][1]=$_POST['a11'];
  $a[1][2]=$_POST['a12'];
  $a[2][0]=$_POST['a20'];
  $a[2][1]=$_POST['a21'];
  $a[2][2]=$_POST['a22'];

  $b[0]=$_POST['b0'];
  $b[1]=$_POST['b1'];
  $b[2]=$_POST['b2'];

function imprimirMatriz($matriz){
for($i=0;$i<sizeof($matriz);$i++){
  for($j=0;$j<sizeof($matriz);$j++){
    echo " ".$matriz[$i][$j]." ";
  }
  echo "<br>";
}
}


function eliminacionGaussiana(){
global $a;
global $b;
for ($i = 0; $i < sizeof($a)-1; $i++) {
           for ($j = $i+1; $j < sizeof($a); $j++) {
               $mik=$a[$j][$i]/$a[$i][$i];
               for ($k = 0; $k < sizeof($a); $k++) {
                   $a[$j][$k]=$a[$j][$k]-$mik*$a[$i][$k];
               }
               $b[$j]=$b[$j]-$mik*$b[$i];
           }
       }

       echo "Matriz escalonada<br>";
       imprimirMatriz($a);
       echo "<br>";
       for($i=0;$i<sizeof($a);$i++){
          $x[$i]=0;
       }

       for ($i = sizeof($a)-1; $i >= 0 ; $i--) {
              $suma=0;
              for ($j = $i; $j < sizeof($a); $j++) {
              $suma = $suma+$a[$i][$j]*$x[$j];
              }

              $x[$i]=(1/$a[$i][$i])*($b[$i]-$suma);
          }

        for($i = 0; $i < sizeof($x) ; $i++){
          echo "x[".$i."] = ".$x[$i]."<br>";
        }
  }
echo "<br>Matriz original<br>";
imprimirMatriz($a);
echo "<br>";
eliminacionGaussiana();
}
?>
