

<?php
//include("includes/init.php");
// declare the current location, utilized in header.php
//$current_page_id="shoes";
// open connection to database
$db = new PDO('sqlite:vibe.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
function exec_sql_query($db, $sql, $params) {
  $query = $db->prepare($sql);
  if ($query and $query->execute($params)) {
    return $query;
  }
  return NULL;
}
// An array to deliver messages to the user.
//$messages = array();
// Search Form
if (isset($_GET['search_option']) and isset($_GET['value'])) {
  $do_search = TRUE;
  $search_option = filter_input(INPUT_GET, "search_option", FILTER_SANITIZE_STRING);
  $value = filter_input(INPUT_GET, "value", FILTER_SANITIZE_STRING);
  //var_dump($category);
  //var_dump($search);
  //print $category;
  //print $search;
  $value = trim($value);
  //echo $search;
  //var_dump($search);
  //echo $category;
  //echo $search;
  // TODO: filter input for 'search' and 'category'
} else {
  // No search provided, so set the product to query to NULL
  $do_search = FALSE;
  $search_option = NULL;
  $value = NULL;
}
// Insert Form
// Get the list of shoes from the database.
//$shoes = exec_sql_query($db, "SELECT DISTINCT product_name FROM reviews", NULL)->fetchAll(PDO::FETCH_COLUMN);
// if (isset($_POST["submit_insert"])) {
//   $product_name = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_STRING);
//   $reviewer = filter_input(INPUT_POST, 'reviewer', FILTER_VALIDATE_EMAIL);
//   $rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT);
//   $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
//   $invalid_review = FALSE;
//   if ( $rating < 1 or $rating > 5 ) {
//     $invalid_review = TRUE;
//   }
//   if ( !in_array($product_name, $shoes) ) {

//     $invalid_review = TRUE;
//   }
//   if ($invalid_review) {
//     array_push($messages, "Failed to add review. Invalid product or rating.");
//   } else {
//     // TODO: write SQL to insert review
//     // $sql = "SELECT * FROM reviews WHERE ".$search_field." LIKE '%' :search '%'";
//     // $params = array(':search' => $search);
//     $sql = "INSERT INTO reviews (reviewer, rating, product_name, comment)
//     VALUES (:reviewer, :rating, :product_name, :comment)";
//     //" LIKE '%' || :search || '%'"
//     $params = array(':reviewer' => $reviewer,':rating' => $rating,':product_name' => $product_name,':comment' => $comment);
//     $result = exec_sql_query($db, $sql, $params);
//     if ($result) {
//       array_push($messages, "Your review has been record. Thank you!");
//     } else {
//       array_push($messages, "Failed to add review.");
//     }
//   }
// }
function print_record($record) {
  ?>
  <tr>
    <td><?php
    $url_song = "/Users/ninaghar/Desktop/hackathon/Vibe/Coldplay.mp3";
     exec($url_song);
     echo htmlspecialchars($record["artist"]);?></td>
    <td><?php echo htmlspecialchars($record["song_name"]);?></td>
    <td><?php echo htmlspecialchars($record["genre"]);?></td>
    <td><?php echo htmlspecialchars($record["song_time"]);?></td>
    <td><?php echo htmlspecialchars($record["note"]);?></td>

    </tr>

  <?php
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>

img {display:inline-block;margin-right:10px;}
audio{display:inline-block;}
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
  <title>Search a movie</title>

</head>

<body>


  <div id="content-wrap">
    <h1>Vibe</h1>
    <ul>
      <li><a href="index.php">All Vibes</a></li>
      <li><a href="add_vibe.php">Add a Vibe</a></li>
      <li><a href="search_vibe.php">Search a Vibe</a></li>
    </ul>
    <h>Search a vibe</h>
    <!-- <img src="spotify-icon.png" alt="spotify" style="width:50px;height:50px">
    <audio controls>
      <source src="Coldplay.mp3" type="audio/mpeg">
    </audio> -->

    <?php
    // Write out any messages to the user.
    // foreach ($messages as $message) {
    //   echo "<p><strong>" . htmlspecialchars($message) . "</strong></p>\n";
    // }
    ?>
<div>
    <form id="searchForm" action="search_vibe.php" method="get">
      <select name="search_option">
        <option value="" selected disabled>Search By</option>
        <option value="song_time">time</option>
        <option value="note">vibe</option>
      </select>
      <input type="text" name="value" required>
      <button type="submit">Search</button>
    </form>
    <img src="spotify-icon.png" alt="spotify" style="width:50px;height:50px">
    <audio controls>
      <source src="Coldplay.mp3" type="audio/mpeg">
    </audio>

    <?php
    if ($do_search) {
      // We have a specific shoe to query!
      ?>
      <h2>Search Results</h2>
      <?php
      // Be careful to filter $search_field above. If you're not careful, you can seriously break your database.
      // TODO: sql query and parameter markers
      //$sql = "TODO";
    //$params = array(/* TODO */);
      $sql = "SELECT * FROM vibe WHERE ".$search_option." LIKE '%' || :value || '%'";
      //echo $sql;
      $params = array(':value' => $value);
      // foreach($params as $val){
      //   echo $val;
      // }
    } else {
      // No shoe to query, so return everything!
      ?>
      <h2>All search results</h2>
      <?php
      $sql = "SELECT * FROM vibe";
      $params = array();
    }
    $records = exec_sql_query($db, $sql, $params)->fetchAll();
    //var_dump($records);
    if (isset($records) and !empty($records)) {
      ?>
      <table>
        <tr>
          <th>Artist</th>
          <th>Song name</th>
          <th>Genre</th>
          <th>Time</th>
          <th>Vibe</th>
          <!-- <th>Duration</th>
          <th>Review</th> -->

        </tr>
        <?php
         foreach($records as $record) {
           print_record($record);
         }
         ?>


      </table>
      <?php
    } else {
      echo "<p>No reviews.</p>";
    }
    ?>


  </div>


</body>

</html>
