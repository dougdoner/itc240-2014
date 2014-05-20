<table>
  <thead>
    <tr>
      <th>Cost of Receipt</th>
      <th>Month</th>
      <th>Location of Cost</th>
      <th>Reason for Cost</th>
    </tr>
  </thead>
<tbody>
<?php
$view_receipts = $_REQUEST["view_receipts"];
    //after getting some weird results with storing the cost as a float, I researched a solution online and came upon the decimal type. I was able to set a limit on how many numbers come after the decimal point, in this case 2. The exact way I did it was decimal(15, 2). 15 is the max number of digits that can be stored in the column, including after the decimal, and the second value is limiting how many digits are allowed after the decimal.
    $statement = $mysql->prepare('SELECT receipt_cost, receipt_location, MONTH(receipt_date) AS month, receipt_reason FROM receipts WHERE MONTH(receipt_date) = ?;');
    $statement->bind_param("s", $view_receipts);
    $statement->execute();
    $result = $statement->get_result();
    
    foreach($result as $r) {
      include("receipts-template.php");
}
?>
</tbody>
</table>