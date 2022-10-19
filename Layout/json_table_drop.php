<?php
session_start(); 
include("json_table.class.php"); ?>
<html><head><title>Drop Table </title><link rel="stylesheet" href="CSS/common.css"> </head><body>   
<div class="container">
<center> 
<?php Json_table::if_drop_isset_redir();
?>
<center>
</div>
</body>
</html>
