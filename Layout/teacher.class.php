<?php
include("index.class.php");
class Teacher{
        public static $value = 1;
        public static $val = 0;
        public static function page_header($title){
session_start();   ?>      
<html><head><title><?php echo $title; ?></title><link rel="stylesheet" href="CSS/common.css"> </head><body>   

<?php     

   $file = file_get_contents("Database/user.json");
           $code = json_decode($file);
          
           if(gettype($code) !== "array" ){
               
               echo "<center><br><br>";
               echo "<h1 style='color:red;'>JSON FORMAT IS INVALID ! ";      
               echo "</h1></center>";
               
           }elseif(gettype($code) == "array"){ 
            $qty = count($code);
            
           $qty_arr = $qty -1;
     $username = @$_SESSION["username"];
     $password = @$_SESSION["password"];
     $level = @$_SESSION["level"];   
         
          
          for($i = 0 ; $i <= $qty_arr ; $i++){
              if($username == $code[$i]->username && $password == $code[$i]->password && $level == $code[$i]->level ){
              
              self::$val = self::$value;
              
              
              }//if_userchek
               
       }//for_usercheck       
       
       if(self::$val > 0 ){
                  
              //PAGE SHOW
              echo " Hello   >>>> " ; 
              
              }//if_user_valid 
              else{
                  
                  echo "<center><h1 style='color:chocolate; margin-left:auto; margin-right:auto; margin-top:50%;'> You are not a valid User</center>";
                  echo "<center><a   href='index.home.php' style='background-color:hotpink; color:white; padding:10px; text-decoration:none;  ><div class='go_back_login'> Go Back Login </div> </a></center> "; 
              }//else 
       
       
       }//elseif
       
       }//fun
       
       
             
       public static function page_footer(){ ?> 
       </body>
   </html>        
     <?php  }
       
       
       }//class
?>
