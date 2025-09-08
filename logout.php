<?php
session_start();
session_destroy();
header("Location: http://localhost/Corelia/Corelia-Internship/login.php");
