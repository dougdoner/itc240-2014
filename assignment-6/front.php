<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ITC 240 | assignment-6</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <header>
      <h1>Fat Feline Activity Tracker</h1>
    </header>
    <div class="main">
      <div class="table">
      <table>
        <thead>
          <tr>
            <th>
              Date
            </th>
            
            <th>
              Description of Activity
            </th>
            
            <th>
              Calories Burned
            </th>
          </tr>
        </thead>
      <?php
$statement = $mysql->prepare('SELECT * FROM fat_cat ORDER BY activity_date DESC;');
$statement->execute();
$tableResults = $statement->get_result();

foreach ($tableResults as $r) {
  include('table-row.php');
}

$sumStatement= $mysql->prepare('SELECT SUM(calories) AS sum FROM fat_cat');
$sumStatement->execute();
$sumResult = $sumStatement->get_result();
$sumRow = $sumResult->fetch_array();

$maxStatement = $mysql->prepare('SELECT MAX(calories) as max FROM fat_cat;');
$maxStatement->execute();
$maxResult = $maxStatement->get_result();
$maxRow = $maxResult->fetch_array();
      ?>
        </table>
        
        <p>Total of all calories burned: <?= htmlentities($sumRow["sum"]) ?></p>
        <p>Maximum calories burned in a single activity: <?= htmlentities($maxRow["max"]) ?></p>
      </div><!-- end .table div -->
      <div class="form">
        <form action="entry.php" method="POST">
          <input type="text" name="activity_desc" placeholder="Cat's activity">
          <input type="text" name="calories" placeholder="Calories burned">
          <input type="submit" value="Submit entry">
        </form>
      </div><!-- end .form div -->
    </div><!-- end .main div div -->
  </body>
</html>