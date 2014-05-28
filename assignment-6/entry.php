<?php

include("../connect.php");

if (isset($_REQUEST["activity_desc"])) {
$activity_desc = $mysql->real_escape_string($_REQUEST["activity_desc"]);
};

if (isset($_REQUEST["calories"])) {
$calories = $mysql->real_escape_string($_REQUEST["calories"]);
};

$preparedForm = $mysql->prepare('INSERT INTO fat_cat (activity_desc, calories, activity_date) VALUES(?, ?, NOW());');
$preparedForm->bind_param('si', $activity_desc, $calories);
$preparedForm->execute();
header("Location: index.php");