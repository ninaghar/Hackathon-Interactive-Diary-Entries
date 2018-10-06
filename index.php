<?php

  // open connection to database
  $db = new PDO('sqlite:vibe.sqlite');
  // Throw an exception for incorrect SQL, instead of being silent.
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    h1{
      font-size: 36px;
      color : blue;
    }
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
     /* height: 100%;
      width: 25%;
      border: 1px solid #555;*/
      background-color: #f1f1f1;
      overflow: hidden;
    }
    li {
	     float:left;
      	/*display: inline;
          text-align: center;
          border-bottom: 1px solid #555*/;
        }
    li a {
        display: block;
        color: #000;
        text-align: center;
        padding: 16px 40px;
        text-decoration: none;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,th {
        border: 1px solid;
        border-color: #3498db;
        text-align: center;
        padding: 10px;
        width: 10%;
    }
  </style>
  <title>Home</title>
</head>

<body>

<h1>Vibe</h1>
<ul>
  <li><a href="index.php">All Vibes</a></li>
  <li><a href="add_vibe.php">Add a Vibe</a></li>
  <li><a href="search_vibe.php">Search a Vibe</a></li>
</ul>
<h>All Songs with vibes</h>
<?php
  $sql = "SELECT * FROM vibe";
  $params = array();
  try {
     $query = $db->prepare($sql);
     if ($query and $query->execute($params)) {
       $records = $query->fetchAll();
     }
   } catch(PDOException $e) {
     handle_db_error($e);
   }
   ?>
<table>
        <tr>
          <th>Artist</th>
          <th>Song</th>
          <th>Genre</th>
          <th>Time</th>
          <th>note</th>
          <!-- <th>Duration</th>
          <th>Review</th> -->
        </tr>
<?php
if (isset($records) and !empty($records)) {
  foreach ($records as $record) {
      echo '<tr>';
      echo "<td>". $record["artist"] . "</td>";
      echo "<td>". $record["song_name"] . "</td>";
      echo "<td>". $record["genre"] . "</td>";
      echo "<td>". $record["song_time"] . "</td>";
      echo "<td>". $record["note"] . "</td>";
      // echo "<td>". $record["duration"] . "</td>";
      // echo "<td>". $record["review"] . "</td>";
      echo '</tr>';
              }
}
 ?>

</table>
</body>
</html>
