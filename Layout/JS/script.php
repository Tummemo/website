<?php

/* အသုံးပြုနည်းကိုအောက်တွင်ဖတ်ရှုရန် */

  class Script{
      private static $alert = "You are wrong Something !   Click me "; 
      public static $value = 2 ;
      private static $success = "You have successed !   Click me ";
      private static $unmatch_3 = "Course and department are not match ! Click me";
      private static $unmatch_4 = "Teacher or Course and Department are not match ! Click me";
      
      public static function alert(){
          if(self::$value == 0){
              echo "<div style='display: solid 1px red; background-color:red; padding:0; color:white; width:50%; heigh:10%;'><form action='' method='post'><input type='submit' name='alert' value='".self::$alert."' style='width:100%; background-color:red; color:white; border:none; padding:7px;'></form></div>";
          }
        }
      public static function match_c_d(){  
          if(self::$value == 3){
              echo "<div style='display: solid 1px red; background-color:red; padding:0; color:white; width:50%; heigh:10%;'><form action='' method='post'><input type='submit' name='alert' value='".self::$unmatch_3."' style='width:100%; background-color:red; color:white; border:none; padding:7px;'></form></div>";
          }
      }
      public static function match_t_d(){
          if(self::$value == 4){
              echo "<div style='display: solid 1px red; background-color:red; padding:0; color:white; width:50%; heigh:10%;'><form action='' method='post'><input type='submit' name='alert' value='".self::$unmatch_4."' style='width:100%; background-color:red; color:white; border:none; padding:7px;'></form></div>";
          }
      }  
          
      
      public static function success(){
          if(self::$value == 1 ){
              echo "<div style='display: solid 1px red; background-color:red; padding:0; color:white; width:50%; heigh:10%;'><form action='' method='post'><input type='submit' name='alert' value='".self::$success."' style='width:100%; background-color:chocolate; color:white; border:none; padding:7px;'></form></div>";
          }
      }
      
  }
  
  /*အသုံးပြုနည်းကိုအထက်တွင်ဖတ်ရှုရန်*/
?>
