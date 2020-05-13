<?php 
    if(!isset($_SESSION)){
        session_start();
    }
?>
<?php
echo "error";
echo "<br>";
echo $_SESSION['client_existz'];
?>