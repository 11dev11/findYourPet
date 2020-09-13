<?php

function minStart($arr) {
   $x = 1-$arr[0];
   
   $y = $x;
   $c = count($arr);
   $w = 0;
   
   while(true){
       while($x>0){
           $x += $arr[$w];
           $w++;
           if($w == $c){
               return $y;
           }
       }
       $x = $y +1;
       $y = $x;
   }
   
}

minStart([4,-1,5]);

?>