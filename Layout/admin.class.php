<?php
include("index.class.php");
include("user_table.class.php");
include("json_table.class.php");
class Admin{
        public static $value = 1;
        public static $val = 0;
        public static $redir = "json_table_create.php";
        public static $title = "Admin Box";
        public static function page_header(){
  ?>      
<html><head><title><?php echo $title; ?></title><link rel="stylesheet" href="CSS/common.css"> </head><body>   
<div class="container">
<?php     

   $file = file_get_contents("Database/user.json");
           $code = json_decode($file);
          
           if(gettype($code) !== "array" ){
               
               echo "<center><br><br>";
               echo "<h1 style='color:red;'>JSON FORMAT IS INVALID ! ";      
               echo "</h1></center>";
               self::go_back_login();
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
                  
              //PAGE SHOW LAYOUT
User_table::user_table("User Data");
Json_table::json_table("Database");
Json_table::json_table_option();  
              }//if_user_valid 
              else{
                  
                  echo "<center><h1 style='color:chocolate; margin-left:auto; margin-right:auto; margin-top:50%;'> You are not a valid User</center>";
                  /*echo "<center><a   href='index.home.php' style='background-color:hotpink; color:white; padding:10px; text-decoration:none;  ><div class='go_back_login'> Go Back Login </div> </a></center> "; */
                  self::go_back_login();
              }//else 
       
       
       }//elseif
       
       }//fun
       
       public static function go_back_login(){ ?>
       
<center> <br><br>
<a href='index.home.php' style='background-color:hotpink; color:white; padding:10px; text-decoration:none; ' >
Go Back Login </a></center>
           
      <?php }//func
       
             
       public static function page_footer(){ ?> </div>
       </body>
   </html>        
     <?php  } //func
       
       
       
       }//class
?>
       
      
