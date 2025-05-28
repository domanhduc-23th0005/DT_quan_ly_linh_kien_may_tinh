<?php
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");  // Sửa lại đường dẫn đến index.php
exit();
