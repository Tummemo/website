<?php

class Table_creator{
    
            public static function table_creator($arr){ 
         ?>    
   <table>
     <thead><?php self::thead_($arr); ?></thead>
     <tbody><?php self::tdata_($arr); ?></tbody>
   </table>
        <?php }//table_
        
        public static function thead_($arr){ 
              echo "<tr>";
          foreach($arr as $k => $v){
              echo "<th>";
              echo $k;
              echo "</th>";
              
          }//foreach
              echo "</tr>";
            
        }//thead_
        
        public static function tdata_($arr){
              echo "<tr>";
            foreach($arr as $k => $v){
              echo "<td>";
              echo $v;
              echo "</td>";
            }//foreach
              echo "</tr>";
        }//tdata_

    }//class

?>
