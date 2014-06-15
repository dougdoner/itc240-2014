<?php

function create_task($taskTitle, $taskNotes) {
  global $mysql;
  $prepared = $mysql->prepare('INSERT INTO tblTasks (taskDate, taskTitle, taskNotes) VALUES(Now(), ?, ?)');
  $prepared->bind_param("ss", $taskTitle, $taskNotes);
  $prepared->execute();
};

function complete_task($task) {
  global $mysql;
  $prepared = $mysql->prepare("DELETE FROM tblTasks WHERE taskID = $task");
  $prepared->execute();
};

function form($action, $method) {
  echo "<form action='$action' method='$method'>";
};