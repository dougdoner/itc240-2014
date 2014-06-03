<?php

include("../connect.php");

$library_user = [
  "styles" => "light",
  "sort" => "BookTitle",
  "view" => "cover"
];

if (isset($_COOKIE["library_user"])) {
  //set second parameter so json_decode returns an array
  $library_user = json_decode($_COOKIE["library_user"], true);
};

if (isset($_REQUEST["styles"])) {
  $library_user["styles"] = $mysql->real_escape_string($_REQUEST["styles"]);
};

if (isset($_REQUEST["view"])) {
  $library_user["view"] = $mysql->real_escape_string($_REQUEST["view"]);
};

if (isset($_REQUEST["sort"])) {
  $library_user["sort"] = $mysql->real_escape_string($_REQUEST["sort"]);
};

function cookie_maker($name, $value) {
  setcookie($name, $value, time() + 60 * 60 * 24 * 30, "/");
};

function cookie_eater($name) {
  setcookie($name, "", time() - 60 * 60, "/");
};

//sets a new cookie based whether or not there are new variables
cookie_maker("library_user", json_encode($library_user));

//used aliases for request names to prevent using an external link
if ($library_user["view"] == "cover") {
  $library_user["view"] = "cover.php";
} else if ($library_user["view"] == "listing") {
  $library_user["view"] = "listing.php";
}

if ($library_user["styles"] == "light") {
  $library_user["styles"] = "light.css";
} else if ($library_user["styles"] == "dark") {
  $library_user["styles"] = "dark.css";
}

$sort = $mysql->real_escape_string($library_user["sort"]);

$prepared = $mysql->prepare("SELECT * FROM books ORDER BY $sort ASC");
$prepared->execute();
$results = $prepared->get_result();
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ITC 240 | Assignment-7</title>
    <link rel="stylesheet" type="text/css" href="<?= $library_user["styles"]; ?>">
  </head>
  <body>
    <header class="main-header">
      <h1>Seattle Central College Library</h1>
    </header>
    <div class="main">
      <div class="filter">
        <h2>Sort Books by:</h2>
        <p><a href="?sort=BookTitle">Title</a></p>
        <p><a href="?sort=BookAuthor">Author</a></p>
        
        <h2>View Books by:</h2>
        <p><a href="?view=cover">Cover</a></p>
        <p><a href="?view=listing">Listing with Description</a></p>
        
        <h2>Theme</h2>
        <p><a href="?styles=light">Light theme</a></p>
        <p><a href="?styles=dark">Dark theme</a></p>
      </div>
      <div class="content-right">
        <?php
foreach ($results as $r) {
  include($library_user["view"]);
};
        ?>
      </div>
    </div>
  </body>
</html>