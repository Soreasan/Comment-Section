<!DOCTYPE>
<html>
<head>
        <title>Comments</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1><b>CSLearner Comments</b></h1>
        <form style='display:inline;' action="http://www.cslearner.com">
            <input type="submit" style="width:175px; height:75px;" value="CSLearner Home">
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
        <br>
    <table border="3">
        <tr>
            <td><b>DATE</b></td>
            <td><b>COMMENTOR</b></td>
            <td><b>COMMENT</b></td>
        </tr>
    <?php
            $host = "localhost";
            $dbname = "change";
            $user = "root";
            $pass = "";
            
            try{
                $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $statement = $dbh->query('SELECT * from `comment` order by date desc');
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                
                while($row = $statement->fetch()){
                    echo "<tr>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['commentor'] . "</td>";
                    echo "<td>" . $row['comment'] . "</td>";
                    echo "</tr>";
                }
               
            }catch (PDOException $e) {
                #echo "error: " . $e->getMessage();
                echo "<h1>Select Failed<h1>";
            }
            //end of php
        ?>
    </table>
</body>
</html>