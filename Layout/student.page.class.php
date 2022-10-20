<?php


class Studentpage{
    
   public static function page(){ ?> 
    <div class="table">
 <a href="student.php?option=opt"> OPTION </a>
  </div>
<?php
 
 }//func
   
        public static function opt(){
       if(isset($_GET["option"])){ 
       ?>
<div class="table">    
<a href="student.php?option=course" target="_blank" class="table">Course</a>       
 </div>
           
       <?php 
       self::usc();
       }
       
    } 
       
       public static function usc(){
       if($_GET["option"] == "course"){ 
       $user_str = file_get_contents("Database/user.json");
       $user_arr = json_decode($user_str);
       foreach($user_arr as $k => $v){
        if($_SESSION["username"] == $v->username && $_SESSION["password"] == $v->password){
            $id = $v->id ;
        }
          
       }
      // echo $id; //id ရယူ 
       
       //student ဖြစ်တဲ့ အတွက် student.json ထဲ index သွားထောက်ရုံပဲ။ မထောက်ခင် json အရင်ထုတ်ဖို့လိုတယ်။ array ပြောင်းဖို့လည်းလိုတယ်။ 
       
       $stu_str = file_get_contents("Database/student.json");
       $stu_arr = json_decode($stu_str);
       
       foreach($stu_arr as $k => $v){
           if($v->id == $id){
               echo "<br>";
               echo "Student data" ;
               echo "<br><br>";
               echo "name = ".$v->name;
               echo "<br>";
               $year = $v->year;
               echo "year = ".$year;
               
               echo "<br>";
               $semester = $v->semester;
               echo "semester = ".$semester; 
               echo "<br>";
               $major = $v->major;
               echo "major = ".$major;
               echo "<br>";
               
           } break;
       }
       
       
       $cur_str = file_get_contents("Database/course.json");
       $cur_arr = json_decode($cur_str);
       
       
           
           
       }//
  
    }
    

  }//class


 ?>
