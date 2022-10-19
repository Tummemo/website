 <?php
    class Auid{
        public static $file_name;
        public static $Dir;
        public static $submit_name ="insert";
        public static $table_data_retrieve_arr_0;
        public static function insert(){            
$json = scandir(Json_table::$Database);  
$json_str = json_encode($json,JSON_PRETTY_PRINT); 
 $index = Json_table::$id;
     if(array_key_exists(intval($index),$json)){
       self::$file_name = $json[intval($index)];
   }//if 
          self::$Dir = Json_table::$Database."/".self::$file_name;
      self::insert_form_table(self::$Dir); 
       }//func insert
       
        public static function insert_form_table($Dir){  
    $table_name = basename(self::$file_name,"json");
    echo "<br><br><center>";
    echo "<h2>".$table_name."table </h2>";
    echo "<br>";
    ?> 
    <form action ="auid.insert.php?dir=<?php echo $Dir;?>" method = 'post'>
    <?php 
    echo "<table>";
    self::insert_form($Dir);
    
    }//func
       
       public static function insert_form($Dir){
 
            $data_retrieve = file_get_contents($Dir);
      $data_retrieve_arr = json_decode($data_retrieve,JSON_PRETTY_PRINT); 
 self::input_field_creator($data_retrieve_arr); 
          }//func
            
            public static function input_field_creator($data_retrieve_arr){
            $counter = 0;   
            $label_arr = array();
             foreach($data_retrieve_arr[0] as $label => $input ){ 
               if($label !== "id"){
               echo "<tr>";
               echo "<td>".$label."</td>";
               echo "<td>";
               echo "<input type='text' name='".$label."'>"; 
               echo "</td>";
               echo "</tr>";               
               $counter += 1;
               }//id hide
               
               elseif($counter < 1){
                   echo "You Cant Insert this Table , You Need to Choose Alter Option";
               }
               }//foreach 
               if($counter >= 1){
               echo "<tr><td class='insert_confirm'>";
    echo "<input type='submit' name='insert' value='INSERT' class='insert_confirm'>";
    echo "</td>"; ?>
    <td class="insert_cancel"><a  href="admin.php" class="json_table_td_up_a"> CANCEL </a></td><?php
    echo "</tr>"   ;
    echo "</table>";
    echo "</form>";
    echo "</center>";
    
                } //if
            }//func
            
           public static function if_insert_isset(){
               
               if(isset($_POST["insert"])){
                   
        $counter = 0;
        $usdpcounter = 0;
                   
                   
             
               //$data_retrieve = file_get_contents($Dir);
              // echo $_GET["dir"];
               
               //print_r($data_retrieve_arr);
    
     /* ဒါက အော်တို Check ပေးမှာ form data ကို ။ ဒါစဥ်းစားရတာ အကြာကြီး code က အတိုလေး */ 
             
     foreach($_POST as $key => $value){
            if($_POST[$key] == null){
                       
                $counter += 1;
                   }//isset post 
                   else{
                    $usdpcounter += 1;
                   }
                   
               }//foreach
               
               if($counter >= 1){
                   echo "miss data fill";
       /* ဒီနားကနေ ရုပ်ထွက်နဲ့ ဖန်ရှင် လှမ်းခေါ် */ 
       self::if_form_miss_field();
               }//anti check
               else{
                   
      /* ဒီနားကနေ ရုပ်ထွက်နဲ့ ဖန်ရှင် လှမ်းခေါ် */ 
      self::if_form_full_fill();
               }
               
               
               }//isset first
               
           }//func
 
     public static function if_form_full_fill(){
         $dir = $_GET["dir"];
         $data_retrieve = file_get_contents($dir);
         $data_retrieve_arr = json_decode($data_retrieve);
        // print_r($_POST);
       //  print_r($dir);
       //  print_r($data_retrieve_arr);
       //  print_r(count($_POST));
         //print_r(json_encode($_POST,JSON_PRETTY_PRINT));
        $data_retrieve_qty = count($data_retrieve_arr);
        $_POST_qty = count($_POST) - 1;
        $temp_arr = array();
        //for($i = 0; $i <= $_POST_qty; $i ++) {
            //$temp_arr[$i] = $_POST[$i];
        //}//for
        
        //Temp obj class ဟိုးအောက်မှာ
        //$temp = new Temp();
        //obj သုံးမရပါ
       
            $count = 0;
        foreach($_POST as $K => $V){
            $temp_arr[$K] = $V;
            $count += 1; 
            
            if($count == $_POST_qty){
$temp_arr["id"] = $data_retrieve_qty;
                break;
            }
            
            }
           
        
      
       
       $data_retrieve_arr[$data_retrieve_qty] = $temp_arr;

$temp_str = json_encode($data_retrieve_arr,JSON_PRETTY_PRINT);
/* data inserting */
file_put_contents($dir,$temp_str);
      ?>
              
  <div class="success_box"><span>  <a class="success_link" href="admin.php"> You Have success !</a></span></div>

      <?php 
      print_r($temp_str);
     //print_r($temp_arr);
     }//func
     
     
     public static function if_form_miss_field(){
        
        /* ရုပ်ထွက်သာ ရေးရန်လိုသည် လုပ်ဆောင်ချက် ဟူ၍ redirect link ပြန်ထည့်ရန်သာ */ 
     }//func
                    
        
        public static function alter(){
            
            
            echo "<center>";
             echo "table id = ";
             echo $_GET["id_table"];
             $id_table = $_GET["id_table"];
             echo "<br>";
             echo "HELLO ALTER";
            //echo "data id = "; 
            //echo $_GET["id"];
            //$id_data = $_GET["id"];
            /* data id ဖမ်းဖို့ မလိုဘူး ဘယ်အတန်း ဘယ် rowမှာ နှိပ်နှိပ် table ကိုပဲ index ထောက်မှာ */ 
             echo "<br>";
             echo "option type = ";
             echo $_GET["option"];
             $Directory_arr = scandir(Json_table::$Database);  
$Directory_str = json_encode($Directory_arr,JSON_PRETTY_PRINT); 
              echo "<br>";
              echo "<br>";
              $json_file_name = $Directory_arr[$id_table];
            // echo $json_file_name;
             echo "<br>";
             //print_r($Directory_arr); 
         /* if(property_exists(obj,property)){
              
          }; */ 
          
   /* foreach($Directory_arr as $DK => $DV){
        echo "<br>";
        if($json_file_name == $DV ){
            echo $DV;
        }//if
    }//foreach */
    
    $Directory_path = Json_table::$Database."/".$json_file_name;
     //echo $Directory_path;
$table_data_retrieve = file_get_contents($Directory_path);
$table_data_retrieve_arr = json_decode($table_data_retrieve);
             //print_r($table_data_retrieve_arr);
     $table_data_retrieve_arr_qty = count($table_data_retrieve_arr);
     ?> 
     <center>
        <form>
            <table>
<?php
     foreach($table_data_retrieve_arr[0] as $tk => $tv ){ 
    echo "<tr>";
    echo "<td>";
    echo "<label>".$tk."</label>";
    echo "</td><td>";
    echo "<input type='text' value='".$tv."'>";
    echo "</td></tr>";
    }//foreach
     //$table_data_retrieve_arr[0] 
             
             
        }//func alt
        
        
        public static function alter_form(){
             ?> 
            </table>
        </form>
     </center>
        
            
       <?php 
       
       }//func
        
        
        
        
        public static function update(){
            echo "HELLO UPDATE";
        }//func upt 
        
        public static function delete_(){
            echo "HELLO DELETE";
        }//func del
        
        
    }//class
    
class Temp{
    
}

?>
