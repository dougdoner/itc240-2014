<tr>
  <td><?= htmlentities($r["taskDate"]) ?></td>
  <td><?= htmlentities($r["taskTitle"]) ?></td>
  <td><?= htmlentities($r["taskNotes"]) ?></td>
  <td><form><label for="<?= $r["taskID"] ?>"><input id="<?= $r["taskID"] ?>" name="delete" value="<?= $r["taskID"] ?>" type="checkbox" onChange="this.form.submit();"> Complete Task</label></form></td>
</tr>