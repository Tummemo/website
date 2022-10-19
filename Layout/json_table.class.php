<?php
include("auid.class.php");
class Json_table{
    public static $value;
    public static $id;
    public static $Database = "Database/Database";
    public static $option;
    public static $update_data = array();
    public static $id_c;
    public static $Database_contents;
    public static $filedata_2;
    public static $Database_path = "Database/Database/key_file.json"; 
    public static $redir;
    public static $row = 0;
    public static $row_count = 0;
    public static $colspan = 0;
    public static $id_table;
   // public static $column_number;
  //  public static $filename;
    
    public static function json_table($title){


if(@scandir(self::$Database) == false){
    
    echo "<br><br><br><center><form action='admin.php'><input type='submit' style='background-color:pink; color:red; padding:10px;'value=' No Database Choosen! ' name='teacher'></form></center> ";
?>
<center>
<form>
    
    <input type="submit" value="Choose Database"> 
    <select name="database_choose">
        <option value="">Option </option>
    </select>
    
</form>
</center>
<?
}else{
/*$json =  array_diff(scandir($Database),array('.','..'));*/
$json = scandir(self::$Database);

?> <center>
     <h1 class="json_table_h1"><?php echo $title; ?></h1>
     <div class="json_table_div">
       <table class="json_table"> 
           <tr>
           <thead class="json_table_thead">   
              
              <th class="json_table_th">JSON Files As Table</th>
               <th class="json_table_th" colspan="2">OPTION</th>
            </thead>
            </tr>
            
<?php
           foreach($json as $jkey => $jval){             
          $jval_b = basename($jval,".json");
           ?>
                
<tr><td class="json_table_td"><?php echo $jval_b.".table"; ?></td>

<td class="json_table_td_up"><a  href="admin.php?id=<?php $id = $jkey; echo $jkey  ; ?>& option=select" class="json_table_td_up_a"> SELECT </a></td>

<td class="json_table_td_del"><a  href="admin.php?id=<?php $id = $jkey; echo $jkey  ; ?>& option=drop" class="json_table_td_up_a"> DROP </a></td>
         
<?php
    
 }//fe_inner
?>  <tfoot>
            <tr>

        <td class="transprent_td" style="background-color:transprent;"></td>
        
        <td class="json_table_td_cre" colspan="2"><a  href="admin.php?id=<?php $id = $jkey; echo $jkey  ; ?>& option=create" class="json_table_td_cre_a"> CREATE TABLE </a></td>
         
        
    </tr>
    </tfoot>
    </table>
    </div>
   </center>                  
<?php            
         
} //else
           
       }//func
       
        public static function json_table_option(){
            if(isset($_GET["option"]) && isset($_GET["id"])){
                
     self::$id = $_GET["id"];
     self::$option = $_GET["option"];
               
          /* switch သုံးလို့ရ */ 
                
      if(self::$option == "select"){      
            self::json_table_select();               
                }//if
      if(self::$option == "drop"){
             self::json_table_drop();
                }//if
      if(self::$option == "create"){
             self::$id_c =  self::$id + 1; 
             self::json_table_create();
                }//if
      if(self::$option == "alter_table"){
             Auid::alter();
               }//if
      if(self::$option == "update_data"){
             Auid::update();
               
           }//if
      if($_GET["option"] == "delete_data"){
               Auid::delete_();
             }
      if($_GET["option"] == "insert"){
               Auid::insert();
               
           } //if              
         }//if
      }//func
        
        
         /* alter table */ 
             public static function alter_table(){ 
            
             echo "<center>";
             echo "table id = ";
             echo $_GET["id_table"];
             $id_table = $_GET["id_table"];
             echo "<br>";
             echo "data id = "; 
             echo $_GET["id"];
             $id_data = $_GET["id"];
             echo "<br>";
             echo "option type = ";
             echo $_GET["option"];
             
             $json = scandir(self::$Database);  
             $json_str = json_encode($json,JSON_PRETTY_PRINT);
             //echo "<br>";
             //echo "<br>";
             //echo $json_str;
             //echo $json[$id_table];
             
             $Directory = self::$Database."/".$json[$id_table];
                    $data_retrieve = @file_get_contents($Directory);
             
             //echo $data_retrieve;
  $data_retrieve_arr = json_decode($data_retrieve);
             
             echo "<br>";
             echo "<br>";
             $qty_arr = count($data_retrieve_arr) -1;
             
             for($i = 0; $i <= $qty_arr; $i ++){
                 if($i == $id_data){
                     foreach($data_retrieve_arr[$i] as $datakey => $datavalue){
                 echo $datakey;
                 echo "=";
                 echo $datavalue;
                 echo "<br>";
             }//foreach inner 
            }//if condition check
          }//for loop
             echo "</center>";
        }// func 
       
       /* delete data */ 
             public static function update_data(){
             echo "<center>";
             echo "table id = ";
             echo $_GET["id_table"];
             $id_table = $_GET["id_table"];
             echo "<br>";
             echo "data id = "; 
             echo $_GET["id"];
             $id_data = $_GET["id"];
             echo "<br>";
             echo "option type = ";
             echo $_GET["option"];
             $json = scandir(self::$Database);  
             $json_str = json_encode($json,JSON_PRETTY_PRINT);
             echo "<br>";
             echo "<br>";
             //echo $json_str;
             //echo $json[$id_table];
             
             $Directory = self::$Database."/".$json[$id_table];
                    $data_retrieve = @file_get_contents($Directory);
             
             //echo $data_retrieve;
  $data_retrieve_arr = json_decode($data_retrieve);
             
             echo "<br>";
             echo "<br>";
             $qty_arr = count($data_retrieve_arr) -1;
             
             for($i = 0; $i <= $qty_arr; $i ++){
                 if($i == $id_data){
                     foreach($data_retrieve_arr[$i] as $datakey => $datavalue){
                 echo $datakey;
                 echo "=";
                 echo $datavalue;
                 echo "<br>";
             }//foreach inner 
            }//if condition check
          }//for loop
             echo "</center>";
               
       }//func
       
             public static function delete_data(){
               
             echo "<center>";
             echo "table id = ";
             echo $_GET["id_table"];
             $id_table = $_GET["id_table"];
             echo "<br>";
             echo "data id = "; 
             echo $_GET["id"];
             $id_data = $_GET["id"];
             echo "<br>";
             echo "option type = ";
             echo $_GET["option"];
             $json = scandir(self::$Database);  
             $json_str = json_encode($json,JSON_PRETTY_PRINT);
             echo "<br>";
             echo "<br>";
             //echo $json_str;
             //echo $json[$id_table];
             
             $Directory = self::$Database."/".$json[$id_table];
                    $data_retrieve = @file_get_contents($Directory);
             
             //echo $data_retrieve;
  $data_retrieve_arr = json_decode($data_retrieve);
             
             echo "<br>";
             echo "<br>";
             $qty_arr = count($data_retrieve_arr) -1;
             
             for($i = 0; $i <= $qty_arr; $i ++){
                 if($i == $id_data){
                     foreach($data_retrieve_arr[$i] as $datakey => $datavalue){
                 echo $datakey;
                 echo "=";
                 echo $datavalue;
                 echo "<br>";
             }//foreach inner 
            }//if condition check
          }//for loop
             echo "</center>";
             
       }//func 
         
       
         /*  second is first */ 
        
        
        
        
        
        
        
        
        
/* update start */ //select ဖြစ် 

        public static function json_table_select(){
            //table empty check 
$json = scandir(self::$Database);    
     foreach($json as $jk => $jv){
                if($jk == self::$id){
                    //form show
                    //$data_check = file_get_contents($jv);
                   
                    $Directory = self::$Database."/".$jv;
                    $data_retrieve = @file_get_contents($Directory);
                    if($data_retrieve == false){
                        self::form_for_no_data();
                    }//data has or not
                    else{
                        self::form_for_has_data($jk); 
                        
              /* Alt Upt dlt    */
                    }
                    break;
                }//id check if
            }//foreach
         }//func   
            
       
         public static function form_for_has_data($jk){ ?>
         <center>
         <h1 class="update_table_h1">Table has updatable data </h1>
         <div class="json_table_div">
         <table class = "table_creator_and_form_for_has_data">
             <thead class="json_table_thead">
             
<?php self::table_head_creator(); ?>
           <th class='json_table_th' colspan="3">
               OPTION
           </th>
           </tr>
           </thead>
           
           
<?php  self::table_data_filler(); ?>
         
          <tfoot>
            <tr>
        <td class="transprent_td" style="background-color:transprent;" colspan="<?php echo self::$row; ?>"></td>       
        <td class="json_table_td_cre" colspan ="3" ><a  href="admin.php?id=<?php echo $jk; ?> & option=insert" class="json_table_td_cre_a"> INSERT DATA </a></td>                
           </tr>
         </tfoot>  
      
         </table>
         </div>
         </center>
<?php }//fun 
         
         public static function table_head_creator(){ 
             $json = scandir(self::$Database);    
     foreach($json as $jk => $jv){
                if($jk == self::$id){
                    
                    $Directory = self::$Database."/".$jv;
                    $data_retrieve = @file_get_contents($Directory);
             
$data_retrieve_arr = json_decode($data_retrieve);
            foreach($data_retrieve_arr as $jkey => $jval){
                //column creation
              if($jkey == 0){
                    
  foreach($jval as $col_name => $col_data){
             echo "<th class='json_table_th'>".$col_name."</th>";
           
           self::$row += 1; 
           
     }//foreach__inner_inner__most
                    
          }//cl cre if           
                
       }//foreach__inner_most
        
     }//if_inner
             
   }//foreach_outer 
   
 } //func
 
 

 
         public static function table_data_filler(){
           $json = scandir(self::$Database);    
     foreach($json as $jk => $jv){
                if($jk == self::$id){
                    
                    $Directory = self::$Database."/".$jv;
                    $data_retrieve = @file_get_contents($Directory);
             self::table_name_show($jv);
$data_retrieve_arr = json_decode($data_retrieve);
       
 $qty_arr = count($data_retrieve_arr) -1 ;
                $temp_arr = array();
          /* row divided */ 
    
   for($i = 0; $i <= $qty_arr; $i ++){    
      
       foreach($data_retrieve_arr[$i] as $jkey => $jval){
             
          echo "<td>".$jval."</td>"; 
          self::$id_table = $jk;        
           }//foreach inner             
         self::alt_up_dl_button($jval);        
        }//for 
      break; /* brutally importance , it make me big trouble */
    }//if_outer       
  }//foreach_outer           
}//func main 
         
       public static function alt_up_dl_button($jval){ ?>
 <td class="json_table_td_alt"><a  href="admin.php?id=<?php self::$id = $jval; echo self::$id; ?>& option=alter_table&id_table=<?php echo self::$id_table; ?>" class="json_table_td_up_a"> ALTER </a></td>      
<td class="json_table_td_up"><a  href="admin.php?id=<?php echo $jval  ; ?>& option=update_data&id_table=<?php echo self::$id_table; ?>" class="json_table_td_up_a"> UPDATE </a></td>
<td class="json_table_td_del"><a  href="admin.php?id=<?php echo $jval  ; ?>& option=delete_data&id_table=<?php echo self::$id_table; ?>" class="json_table_td_up_a"> DELETE </a></td>       </tr>
       
<?php
}//inner function for table create
      
      public static function table_name_show($name){
          $json_name = basename($name,".json");
          $table_name = $json_name.".table";         
   echo "<h2 class='table_name_show'>".$table_name."</h2>";          
     }//func
        
        public static function form_for_no_data(){ 
        ?> <center>
       <h1 style="color:hotpink;"> Table has no updatable data </h1>
       </center>
            <form action="json_table_update.php?id=<?php echo self::$id ?>& formtype=<?php echo 'form_for_no_data'?>" method="post">
           

         <table class="update_table_form">
           <caption> Table has no data </caption>
             <tr>
                 <td>Table Column number</td>
                 <td colspan="2" ><input type="number" name="column_number"></td>
             </tr>
             <tr>
             <td rowspan="2">Table Name Change </td>
                
        <td>
      <input type="radio" name="change_table_name" value="change"> 
          Yes,I want to change
      </td>
      </tr>
      <tr>
      <td>
       <input type="radio" name="change_table_name" value="not_Change"
> No, Thanks 
       </td>
        </tr>
             <tr>
                 <td colspan="2" >
                     <input type="submit" name="update_submit" class="json_table_submit_update" value="UPDATE TABLE" maxlength="4" size="4" >
                 </td>
             </tr>
         </table>
     </form>
<?php

} //func

public static function if_select_isset(){
          if($_GET["formtype"] == "form_for_no_data"){
              
              //form_has_no_data_submit 
              echo "hello no data";
              
          }//formtype_if
          else{
              
              //form_has_data_submit
          if(isset($_POST["select_submit"]) && ! ($_POST["column_number"]) == null){
              self::if_select();
          }//isset_form_has_data_if
          elseif(isset($_POST["select_submit"]) && $_POST["column_number"] == null ){ ?>
              
        <div class="alert_box">
  <a href="admin.php" class="alert_link">
     <h1> 
         <sup><span>×</span></sup> 
           You have no set Table Column Quantity ! 
     </h1>
  </a>
</div>      
              
              
         <?php 
         
         }//isset_form_has_data_eleseif
          
        }//formtype_else
          
     
      }//func
      
      public static function if_select(){
            $table_id = $_GET["id"];
            $table_column_number = $_POST["column_number"];
            echo $table_column_number;
            echo $table_id;
            
            if($table_column_number > 10){
                ?>
                
<div class="alert_box">
  <a href="admin.php" class="alert_link">
     <h1> 
         <sup><span>×</span></sup> 
           Table Column 
           Must Be Integer & Not over 10 ! 
     </h1>
  </a>
</div> 
     <?php             
             }//col_number__check_if
              
      }//func
      
      
/* update end */       

        
         public static function json_table_drop(){ 
         
         self::if_drop_isset();
         
         }//func

          public static function if_drop_isset(){
         
         $json = scandir(self::$Database);
         if($json == false){
             echo "NO JSON FILE EXIST ";
         }//check file has or not
         else{ 
         self::$id = $_GET["id"];
?>
              
<div class="table_delete_div">
<form action="json_table_drop.php?id=<?php echo self::$id; ?>" method="post">
  <h1>ARE YOU SURE DROP TABLE ! </h1>
  <a href="admin.php" class="drop_cancel" >
  Cancel </a>
  <input type="submit" value="Confirm" name="drop_confirm" class="drop_confirm" >
  </form>

</div>
              
<?php        }//else 
         
         }//func

        public static function if_drop_isset_redir(){
            
            if(isset($_POST["drop_confirm"])){
           $json = scandir(self::$Database);
          
           //print_r($json);
           foreach($json as $jk => $jv){
              // print_r($jv);
               if($jk == $_GET["id"] ){
      $del_path = self::$Database."/".$jv;
      
      if(file_exists($del_path)){
          unlink($del_path);
          if(file_exists($del_path)){
              echo "no drop";
          }else{
              echo "has been drop";
              ?>
              
              <div class="success_box"><span>  <a class="success_link" href="admin.php"> You Have success !</a></span></div>

              <?php 
          }
      }else{
          echo "no exist";
      }
                   
               }//if 
           }//foreach
         }//confirm
        }//func

        
        public static function json_table_create(){ ?>            
<form action="json_table_create.php" method="post">
         <table class="create_table_form">
             <tr>
                 <td>Table Name</td>
                 <td><input type="text" name="file"></td>
             </tr>
         
             <tr>
                 <td colspan="2" >
                     <input type="submit" name="create_submit" class="json_table_submit" value="CREATE TABLE">
                 </td>
             </tr>
         </table>
     </form>
                  
            
      <?php  }//func
      
      public static function if_create_isset(){ 
    
if(isset($_POST["create_submit"]) && !($_POST["file"] == null) ){
      
       self::if_create();
          
}//if_isset
         
elseif(isset($_POST["create_submit"]) && $_POST["file"] == null){ ?>
<div class="alert_box">
  <a href="admin.php" class="alert_link">
     <h1> 
         <sup><span>×</span></sup> 
           You have no set Table Name ! 
     </h1>
  </a>
</div>
     <?php }//else_isset
}//func
      
       public static function if_create(){
$file = $_POST["file"];
$extension =".json";
$filename = $file.$extension;
$dir = self::$Database; 
$jsonfile = $dir."/".$filename;
fopen($jsonfile,"a");
//default table column_number is 1 that call id which has value 0.

$default_column_value = 0;
$default_column_name = "id";
$default_column_arr = array(array( 

$default_column_name => intval($default_column_value)

));//for new file

$default_column_str = json_encode($default_column_arr,JSON_PRETTY_PRINT);
file_put_contents($jsonfile,$default_column_str);


?>

<div class="success_box"><span>  <a class="success_link" href="admin.php"> You Have success !</a></span></div>

<?php   
}//func



      
 
           
      
      
      
      
    
        /* ဒါကို ဖျက်လို့ မရဘူး ညီမတို့ လိုအပ်ရင် Reference ယူရမှာ တစ်နေရာရာ issue ရှိခဲ့ရင်  public static function file_data_store(){   
$Database_contents_arr = json_decode(self::$Database_contents);
if(gettype($Database_contents_arr) == "array"){
    $qty_Database_contents_arr = count($Database_contents_arr) ; //dont minus 1 to reach next index auto 
    foreach($Database_contents_arr as $Dkey => $Dvalue){
     }
      $Database_contents_arr[$qty_Database_contents_arr] = self::$filedata_2;
$put_data = json_encode($Database_contents_arr,JSON_PRETTY_PRINT);      
file_put_contents(self::$Database_path,$put_data);
?>
        <div class="success_box"><span>  <a class="success_link" href="admin.php"> You Have success ! </a></span> </div>
<?php   
   }//check Database contents is arr or null if
   else{
       echo "<center><br><br>";
                 echo "Not Array Data contents ";
                 echo "</center>";
   }//chech Database contents is arr or null else
 }//func_file_data_store */
}//class

?>
