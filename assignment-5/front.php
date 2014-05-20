<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ITC 240 | Assignment-5</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
  <div class="header-wrapper">
    <header>
      <h1>Receipt Tracker version 0.1</h1>
      <h2>For all of your receipt-tracking needs</h2>
    </header>
  </div><!-- end .header-wrapper div -->
  <div class="main-wrapper">  
    <div class="main">
      <p>Input your receipt here, then press "Submit Receipt"</p>
      <form action="index.php" method="POST">
        <input name ="receipt_cost" type="text" placeholder="Total Cost">
        <input name="receipt_location" type="text" placeholder="Where money was spent">
        <input name="receipt_date" type="text" placeholder="date of expenditure">
        <textarea name="receipt_reason" placeholder="What the money was spent on"></textarea>
        <input type="submit" value="Submit Receipt">
      </form>
      
      <hr />
      
      <p>Select a month, then press the "lookup receipts" button to show all receipts for the given month</p>
      <form action="index.php">
        <select name="view_receipts">
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
        <input type="submit" value="lookup receipts">
      </form>
          <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $statement = $mysql->prepare('INSERT INTO receipts (receipt_cost, receipt_location, receipt_date, receipt_reason) VALUE(?, ?, ?, ?);');
    
  $statement->bind_param('ssss', $_REQUEST["receipt_cost"], $_REQUEST["receipt_location"], $_REQUEST["receipt_date"], $_REQUEST["receipt_reason"]);
  $statement->execute();
}
if (isset($_REQUEST["view_receipts"])) {
  include("lookup.php");
}
          ?>
        </tbody>
      </table>
    </div><!-- end .main div -->
  </div><!-- end .main-wrapper div -->  
  </body>
</html>