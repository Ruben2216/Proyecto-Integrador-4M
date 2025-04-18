<?php
session_start();
session_destroy();
header("Location: ../../Index.php"); //ruta del menu
exit();
