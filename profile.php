<?php

session_start();
echo "hi" . " " . $_SESSION["name"];
echo  "<br>";
echo  "your password is" . " " . $_SESSION["psw"];
?>