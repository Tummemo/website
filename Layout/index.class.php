<?php
include("loc.class.php");
    class Index{
        
        public static function login(){ ?>
            <center>
    <br><br><br>
    <form action="" method="post">
        <table>
            <tr>
                <td>Username </td>
                <td><input type="text" name="username" id="username" ></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><select name="level" id="level">
                <option value="none">Level</option>
                <option value="student">Student</option><option value="teacher">Teacher</option><option value="admin">Admin</option>
                </select></td>
                <td><input type="submit" onclick="login();" name="submit" id="submit"></td>
            </tr>
        </table> 
    </form>
    <br>
    
    <?php }//function
    
            public static function page_header_index($title){
session_start();               
           
include_once("Layout/JS/script.php") ;  
           ?>      
<html><head><title><?php echo $title; ?></title><link rel="stylesheet" href="Layout/CSS/common.css"> </head><body>                     
            
           
       <?php }
        
            public static function page_header($title){
session_start();           
include("JS/script.php");  
            ?>      
<html><head><title><?php echo $title; ?></title><link rel="stylesheet" href="CSS/common.css"> </head><body>   <?php   }                
            
             public static function page_footer(){ ?> 
                     </center>
                   </body>
               </html>
                 
            <?php }//function
            
            public static function valid(){
                if(isset($_POST["submit"]) && !($_POST["username"] == null)  && !($_POST["password"] == null ) && !($_POST["level"]  == "none")){
        $user_data = file_get_contents("Layout/Database/user.json");
        $user_obj = json_decode($user_data);
        if($user_data == false){
      $user_arr_add = array( array( "username" => "tumdy", "password" => "1000", "level" => "admin", "id" => 0 )) ;
    
$put_data = json_encode($user_arr_add,JSON_PRETTY_PRINT);    
@file_put_contents("Layout/Database/user.json",$put_data);
echo "<center> <h4 style='color:chocolate;'> Login Again , I set admin account </h4><br><br></center>";
        }else{
             echo "<center> <h4 style='color:mediumslateblue;'> You Can Go ! </h4></center>";
          $username = $_POST["username"];
          $password = $_POST["password"];
          $level = $_POST["level"];
          $_SESSION["username"] = $username;
          $_SESSION["password"] = $password;
          $_SESSION["level"] = $level;
          
               
                if($level == "teacher"){
            echo "<center><form action='Layout/teacher.php'><input type='submit' style='background-color:mediumslateblue; color:white; padding:10px;'value=' You Can Go Student Home Page >>' name='teacher'></form></center> ";
        }//teach
                if($level == "student"){
                    echo "<center><form action='Layout/student.php'><input type='submit' style='background-color:mediumslateblue; color:white; padding:10px;'value=' You Can Go Student Home Page >>' name='student'></form></center> ";
            
        }//stu
                if($level == "admin"){
                    echo "<center><form action='Layout/admin.php'><input type='submit' style='background-color:mediumslateblue; color:white; padding:10px;'value=' You Can Go Admin Box >>' name='teacher'></form></center> ";
             
             } //adm
        
        }//else
          
     }//if_false    
       
              else{
                    
                   echo "<center> <h4 style='color:darkred;'> You must set all fields ! ' </h4><br><br></center>";
                   
                }
            
           }
           
            
    }

?>
