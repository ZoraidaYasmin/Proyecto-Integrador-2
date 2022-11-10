<?php
session_start();
session_destroy();
header("location: \cscomas\vista\index.php");
?>