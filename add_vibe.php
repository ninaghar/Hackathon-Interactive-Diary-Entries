<?php
  // open connection to database
  $db = new PDO('sqlite:vibe.sqlite');
  // Throw an exception for incorrect SQL, instead of being silent.
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // open connection to database
  function exec_sql_query($db, $sql, $params) {
    $query = $db->prepare($sql);
    if ($query and $query->execute($params)) {
      return $query;
    }
    return NULL;
  }
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    #searchForm, #reviewShoe{
      margin: 25px 5px 25px 5px;
    }
    #reviewShoe li{
      margin: 5px;
      list-style: none;
    }
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
<h2>Form for Adding a Vibe</h2>
<form id ="add_movie" action="action_add.php">
<!-- <form id ="add_movie" action="action_page.php"> -->
Artist:<br>
<input type="text" name="artist" required>
<br>
Song name:<br>
<input type="text" name="song_name">
<br>
Time(yyyy-mm-dd):<br>
<input type="text" name="song_time">
<br>
<!-- Genre:<br>
<input type="text" name="genre">
<br> -->
<td>Genre:</td>
<br>
<select name="genre">
<option value="pop">pop</option>
<option value="rock">rock</option>
<option value="jazz">jazz</option>
</select>

<br>
<!-- Year released:<br>
<input type="number" name="year_released" min="1888" max="2017"> -->

<!-- <input type="text" name="year_released"> -->
<!-- <br> -->
<!-- Duration:<br>
<input type="text" name="duration">
<br> -->
<!-- <td>Is this a question?:</td>
<input type=“radio” name="question" value="Yes"> Yes
<input type=“radio” name="question" value="No"> No -->
<td>Vibe:</td>
<div>
<textarea rows="10" cols="50" name="note" id="note" style="font-family:sans-serif;font-size:1.2em;">
Write a Vibe!
</textarea>
</div>

<!-- <input
Comments:<br>
<input type="text" name="Comments">
<br><br> -->
<!-- <input id = "form_button" type = "submit" name = "submit" value= "add_entry"> -->
<input type = "submit">
</form>
<?php
  // if (isset($_REQUEST["submit"])) {
  //   $title = $_POST["title"];
  //   $actors = $_POST["actors"];
  //   $genre = $_POST["genre"];
  //   $rating = $_POST["rating"];
  //   $year = $_POST["year"];
  //   $duration = $_POST["duration"];
  //   $review = $_POST["review"];
  //   $sql = "INSERT INTO movies (title, actors, genre, rating, year, duration, review)
  //   VALUES (:title, :actors, :genre, :rating, :year, :duration, :review)";
  //   //" LIKE '%' || :search || '%'"
  //   $params = array(':title' => $title,':actors' => $actors,':genre' => $genre,':rating' => $rating,':year' => $year, ':duration' => $duration,':review' => $review);
  //   $result = exec_sql_query($db, $sql, $params);
  // }
  // $sql = "INSERT INTO movies (title, actors, genre, rating, year, duration, review)
  // VALUES (:title, :actors, :genre, :rating, :year, :duration, :review)";
  // //" LIKE '%' || :search || '%'"
  // $params = array(':title' => $title,':actors' => $actors,':genre' => $genre,':rating' => $rating,':year' => $year, ':duration' => $duration,':review' => $review);
  // $result = exec_sql_query($db, $sql, $params);
  // if ($result) {
  //   array_push($messages, "Your review has been record. Thank you!");
  // } else {
  //   array_push($messages, "Failed to add review.");
  // }
  //var_dump(result);
 ?>
 <?php
  // $sql = "INSERT INTO movies (title, actors, genre, rating, year, duration, review)
  // VALUES (:title, :actors, :genre, :rating, :year, :duration, :review)";
  // //" LIKE '%' || :search || '%'"
  // $params = array(':title' => $title,':actors' => $actors,':genre' => $genre,':rating' => $rating,':year' => $year, ':duration' => $duration,':review' => $review);
  //  //$sql = "SELECT * FROM movies";
  //  //$params = array();
  //  try {
  //     $query = $db->prepare($sql);
  //     if ($query and $query->execute($params)) {
  //       $records = $query->fetchAll();
  //     }
  //   } catch(PDOException $e) {
  //     handle_db_error($e);
  //   }
    ?>
 <!-- <table>
         <tr>
           <th>Title</th>
           <th>Actors</th>
           <th>Genre</th>
           <th>Rating</th>
           <th>Year released</th>
           <th>Duration</th>
           <th>Review</th>
         </tr> -->
  <?php
 // if (isset($records) and !empty($records)) {
 //   foreach ($records as $record) {
 //       echo '<tr>';
 //       echo "<td>". $record["title"] . "</td>";
 //       echo "<td>". $record["actors"] . "</td>";
 //       echo "<td>". $record["genre"] . "</td>";
 //       echo "<td>". $record["rating"] . "</td>";
 //       echo "<td>". $record["year"] . "</td>";
 //       echo "<td>". $record["duration"] . "</td>";
 //       echo "<td>". $record["review"] . "</td>";
 //       echo '</tr>';
 //               }
 // }
  ?>
<!-- <form id="reviewShoe" action="add_movie.php" method="post">
  <ul>
    <li>
      <label>Email:</label>
      <input type="email" name="reviewer" required/>
    </li><br>
    <li>
      <label>Rating:</label>
      <input type="radio" name="rating" value="5" checked/>5
      <input type="radio" name="rating" value="4"/>4
      <input type="radio" name="rating" value="3"/>3
      <input type="radio" name="rating" value="2"/>2
      <input type="radio" name="rating" value="1"/>1
    </li>
    <li>
      <label>Product Name:</label>
      <select name="product_name" required>
        <option value="" selected disabled>Choose Shoe</option>
      </select>
    </li>
    <li>
      <label>Comment:</label>
    </li>
    <li>
      <textarea name="comment" cols="40" rows="5"></textarea>
    </li>
    <li>
      <button name="submit_insert" type="submit">Add Review</button>
    </li>
  </ul>
</form> -->
</div>
</body>
</html>
