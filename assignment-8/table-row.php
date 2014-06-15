<tr>
  <td><?= htmlentities($r["taskDate"]) ?></td>
  <td><?= htmlentities($r["taskTitle"]) ?></td>
  <td><?= htmlentities($r["taskNotes"]) ?></td>
  <td><form><label for="<?= $r["taskID"] ?>"><input class="task-update" id="<?= $r["taskID"] ?>" name="delete" value="<?= $r["taskID"] ?>" type="checkbox"> Complete Task</label></form></td>
</tr>