<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ITC 240 | Assignment-4</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
  </head>
  <body>
      <header>
        <h1>Flash Cards and You</h1>
      </header>
      <div class="main">
        <p>Select the subject of your flash cards</p>
        
        <form>
          <select name="selection">
            <option value="Bioscientific_vocabulary">Bioscientific Vocab</option>
          </select>
          <button type="submit">Submit</button>
        </form>
        
<?php
  //checks if there is a request set for selection
  if (isset($_REQUEST["selection"])) {
    //sets $selection variable as the request variable
    $selection = $_REQUEST["selection"];
    //A prepared statement that selects three columns from the assignment_db table, ? is a placeholder
    $query = $mysql->prepare("SELECT subject, front_info, back_info FROM assignment_db WHERE subject = ?");
    //binds the $selection variable as a parameter, s stands for string
    $query->bind_param("s", $selection);
    //executes the database query
    $query->execute();
    //binds the results to three variables, as there are expected to be three results
    $query->bind_result($subject, $front_info, $back_info);
    //couldn't use fetchAll(), so had to use fetch() instead
  ?>
    <table>
      <tr>
        <th>Subject:</th>
        <th>Front Info:</th>
        <th>Back Info</th>
      </tr>
  <?php
    while ($query->fetch()) {
      //Replaces the underscore with a space, I want to learn a cleaner way of displaying subject without doing an if statement, possibly putting an extra column in the table that I can use for queries only. e.g. "BioVocab"
      if ($subject == "Bioscientific_vocabulary") {
        $subject = "Bioscientific Vocabulary";
      }
      include("template.php");
    }
  ?>
      </table>
  <?php
  }
?>
      </div><!-- end .main div -->
  </body>
</html>