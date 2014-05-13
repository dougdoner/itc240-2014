<?php

include("../passwords.php");

//creates a connection to the database, using password variable stored in passwords.php
$mysql = new mysqli("localhost", "ddoner01", $mysql_password, "ddoner01");

include("front.php");