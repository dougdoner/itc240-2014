<?php
$results_male = [
  ["user" => "Zim Jaynor", "age" => "26", "interests" => "Bowling"],
  ["user" => "John Carpenter", "age" => "34", "interests" => "fishing"],
  ["user" => "Bill Nash", "age" => "43", "interests" => "hiking"],
  ["user" => "Gary Newance", "age" => "56", "interests" => "knitting"],
];

$results_female = [
  ["user" => "Jill vaynor", "age" => "26", "interests" => "Candle making"],
  ["user" => "Josephine Corpentrar", "age" => "31", "interests" => "jogging"],
  ["user" => "Beth Jenkins", "age" => "43", "interests" => "Yoga"],
  ["user" => "Sharkisha Vance", "age" => "56", "interests" => "Gardening"],
];


$gender = "none";
if (isset($_REQUEST["gender"])) {
  $gender = $_REQUEST["gender"];
}

$gender_choice = "none";
if (isset($_REQUEST["gender_choice"])) {
 $gender_choice = $_REQUEST["gender_choice"];
}

$request = "front";
if (isset($_REQUEST["view"])) {
  $request = $_REQUEST["view"];
}

include("default.php");
