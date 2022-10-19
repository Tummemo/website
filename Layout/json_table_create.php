<?php
session_start(); 
include("json_table.class.php"); ?>
<html><head><title>Table create</title><link rel="stylesheet" href="CSS/common.css"> </head><body>   
<div class="container">
<center> 
<?php 
Json_table::if_create_isset();
?>

<center>
</div>
</body>
</html>
?>
