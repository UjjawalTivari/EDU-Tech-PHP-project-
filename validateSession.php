<?php
if(isset($_SESSION['userId'])) {
    header('Location: welcome.php');
}
?>