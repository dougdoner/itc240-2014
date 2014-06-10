<?php

include("../connect.php");

include("assignment-functions.php");

if (isset($_REQUEST["delete"])) {
    $taskDelete = $_REQUEST["delete"];
    complete_task($taskDelete);
  }
  
if (isset($_REQUEST["taskTitle"])) {
  $taskTitle = $_REQUEST["taskTitle"];
};

if (isset($_REQUEST["taskNotes"])) {
  $taskNotes = $_REQUEST["taskNotes"];
};

if (isset($taskTitle) && isset($taskNotes)) {
  create_task($taskTitle, $taskNotes);
}

  $statement = $mysql->prepare("SELECT * FROM tblTasks");
  $statement->execute();
  $results = $statement->get_result();
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ITC 240 | Assignment-8</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <header>
      <h1>Task Manager 1.0</h1>
    </header>
    <div class="main">
      <div class="task-form">
        <h2>Create a task, then submit!</h2>
        <!-- takes the action and method as parameters to create a form tag -->
        <?php form("index.php", "POST"); ?>
          <input type="text" name="taskTitle" placeholder="Task Name">
          <textarea name="taskNotes" placeholder="Write notes for the task"></textarea>
          <button>Submit</button>
        </form>
      </div><!-- end .task-form div -->
      <div class="task-table">
        <table>
          <thead>
            <th>Task Date</th>
            <th>Task Name</th>
            <th>Task Notes</th>
            <th></th>
          </thead>
          <tbody>
            <?php
              foreach($results as $r) {
                include("table-row.php");
              }
            ?>
          </tbody>
        </table>
      </div><!-- end .task-table div -->
    </div>
  </body>
</html>