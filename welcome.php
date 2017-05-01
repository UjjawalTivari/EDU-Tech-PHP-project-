<?php
  session_start();
  require_once('Database.php');

  include_once('header.php');
  include_once('navigation_bar.php');

  if ($_SESSION['role'] == 'student') {
    include_once('./welcome/student.php');
  } elseif ($_SESSION['role'] == 'teacher') {
    include_once('./welcome/teacher.php');
  }

  include_once('footer.php');
?>
