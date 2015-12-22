<!DOCTYPE html>
<html>
<head>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
    <script> $(document).ready(function() { 
        $("#datepicker").datepicker(); 
    }); 
    </script>
        <title>Comments</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
       <h1><b>CSLearner Comments</b></h1>
        <form style='display:inline;' action="http://www.cslearner.com">
            <input type="submit" style="width:125px; height:75px;" value="CSLearner Home">
        </form>
        
        <form style='display:inline;' action="index.html">
            <input type="submit" style="width:175px; height:75px;" value="Comments Home">
        </form>
        
        <form style='display:inline;' action="comment.php">
            <input type="submit" style="width:175px; height:75px;" value="Leave a Comment">
        </form>
        
        <form style='display:inline;' action="show.php">
            <input type="submit" style="width:175px; height:75px;" value="Display Comments">
        </form>
        <br>
<?php
    $date = '';
    $commentor = '';
    $comment = '';

  if (isset($_POST['submit'])) {
    $ok = true;
    if (!isset($_POST['date']) || $_POST['date'] === '') {
        $ok = false;
    } else {
        $date = $_POST['date'];
    }
    if (!isset($_POST['commentor']) || $_POST['commentor'] === '') {
        $ok = false;
    } else {
        $commentor = $_POST['commentor'];
    }
    if (!isset($_POST['comment']) || $_POST['comment'] === '') {
        $ok = false;
    } else {
        $comment = $_POST['comment'];
    }

    if ($ok) {
            //lubuntu virtual machine
            $host = "localhost";
            $dbname = "change";
            $user = "root";
            $pass = "";
            
            try{
                $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            $statement = $dbh->prepare("INSERT INTO `change`.`comment` (date, commentor, comment) VALUES (?, ?, ?)");
            $data = array($date, $commentor, $comment);
             
            $statement->execute($data);
                echo "<h1>Comment added successfully.</h1>";
            } catch (PDOException $e) {
                #echo "error: " . $e->getMessage();
                echo "<h1>Comment Creation Failed<h1>";
            }
    }
  }
?>
    <h3>Comment Form</h3>
        <form method="post" action="comment.php"> 
            Date: 
            <input input type="text" name="date" id="datepicker" value = "">
                <br>
                <br>
            Commentor, are you a:
            <input type="radio" name="commentor" value="student" checked>Student
            <input type="radio" name="commentor" value="developer" checked>Developer
            <input type="radio" name="commentor" value="other" checked>Other
                <br>
                <br>
            Comment: 
            <input type="text" name="comment" value="">
                <br>
                <br>
            <input type="submit" name="submit" value="Submit">
            
        </form>
        </body>
</html>