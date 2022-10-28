<?php
session_start();
session_destroy();
header("location: \cscomas\index.php");
?>