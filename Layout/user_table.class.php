<?php

class User_table{
          public static function user_table($title){

            $user_str = file_get_contents("Database/user.json");
            $user_arr = json_decode($user_str);
           // print_r($user_arr);
           // print_r($user_str);
           // echo json_encode($user_arr,JSON_PRETTY_PRINT);
           
 ?> <center>
     <h1 class="user_table_h1"><?php echo $title; ?></h1>
       <table class="user_table"> 
           <thead class="user_table_thead">
                 <tr> 
<?php          
           





           
            foreach($user_arr[0] as $ukey => $uval){
               ?> 
                
<th class="user_table_th"><?php print_r($ukey); ?></th>            
                
                <?php 
            
        }//fe_outer
?>        

            </tr>
            </thead>
<?php
           foreach($user_arr as $ukey => $uval){  echo "<tr>";
                foreach($uval as $uk => $uv ){ ?> 

<td><?php  print_r($uv); ?></td>

         
                    <?php }//fe_inner
                    echo "</tr>";
            }//fe_out 
?>   
    </table>
   </center>                  
<?php            
            
       }//func
  
    
}//class

?>
