<?php
include("table_creator.class.php");

    class Studentpage{
        public static $opt;
        public static $menu = 0;
        public static $page = null;
        public static $css = array(
        "white",
        "black",
        "moccasin",
        "firebrick",
        "black",
        "blue"
        );
        
       public static function opt(){ 
      
  
          if(@$_GET["option"] == null){
          self::default_(0);
          }//if
          elseif($_GET["option"] == 0){ 
          self::default_(1);
          }//elseif 
          elseif($_GET["option"] == 1){
          self::default_(2);
          }
          elseif($_GET["option"] == 2){
          self::default_(3);
          }
          elseif($_GET["option"] == 3){
          self::default_(null);
          }
          
       
      }//func option
     
      
       public static function default_($default_){
           self::$menu = $default_;
           if(self::$menu == null){
               self::$menu = 0;
           }
      ?>
<session id="<?php echo self::$opt; ?>">

<a href="student.php?option=<?php echo self::$menu; ?>"> 
<h1>
Page <?php self::$menu += 1; echo self::$menu ; ?> 
</h1> 
</a> 
<div id=<?php echo self::$css[self::$menu]; ?>>
<?php self::page($_SESSION); ?>
</div>
</session>    
      <?php } //func default_ 
    

        public static function page($arr){
            if(self::$menu == 1){
      Table_creator::table_creator($arr);          
                }//1st page 1
            }//page
            
            
       /*  public static function table_creator($arr){ 
         ?>    
   <table>
     <thead><?php self::thead_($arr); ?></thead>
     <tbody><?php self::tdata_($arr); ?></tbody>
   </table>
        <?php }//table_
        
        public static function thead_($arrl){ 
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
        
        */
        
       }//class

?>
