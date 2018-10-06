<!-- have php code that checks the email -->
<!-- have php code that checks the email -->

<!-- <!DOCTYPE html> <html>
<head>
<title>Email received</title>
</head> <body> -->
<?php
  $artist = $_GET["artist"];
  $song_name = $_GET["song_name"];
  $genre = $_GET["genre"];
  $song_time = $_GET["song_time"];
  $note = $_GET["note"];

  //var_dump($title);
  //var_dump($actors);
  //echo $title;
  //$na ="na";
  //echo $na;
  $artist = filter_input(INPUT_GET, "artist", FILTER_SANITIZE_STRING);
  $song_name = filter_input(INPUT_GET, "song_name", FILTER_SANITIZE_STRING);
  $genre = filter_input(INPUT_GET, "genre", FILTER_SANITIZE_STRING);
  $song_time = filter_input(INPUT_GET, "song_time", FILTER_SANITIZE_STRING);
  $note = filter_input(INPUT_GET, "note", FILTER_SANITIZE_STRING);
  // $duration = filter_input(INPUT_GET, "duration", FILTER_SANITIZE_STRING);
  // $review = filter_input(INPUT_GET, "review", FILTER_SANITIZE_STRING);
  var_dump($tit);
  var_dump($actors);
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
  $sql = "SELECT * FROM vibe WHERE artist, song_name, genre, song_time, note
  LIKE '%' || :artist || '%',
      '%' || :song_name || '%',
      '%' || :genre || '%',
      '%' || :song_time || '%',
      '%' || :note || '%'";
  //var_dump($sql);
  //" LIKE '%' || :search || '%'"
  $params = array(':artist' => $artist,':song_name' => $song_name,':genre' => $genre,':song_time' => $song_time,':note' => $note);
  var_dump("one");
  $result = exec_sql_query($db, $sql, $params);
  var_dump("teo");
  // if ($result) {
  //   array_push($messages, "Your review has been record. Thank you!");
  // } else {
  //   array_push($messages, "Failed to add review.");
  // }
  var_dump("dog");
  var_dump($result);
  // $sql = "INSERT INTO movies (title, actors, genre, rating, year, duration, review)
  // VALUES (:title, :actors, :genre, :rating, :year, :duration, :review)";
  // //" LIKE '%' || :search || '%'"
  // $params = array(':title' => $title,':actors' => $actors,':genre' => $genre,':rating' => $rating,':year' => $year, ':duration' => $duration,':review' => $review);
  //
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
// var_dump($title);
// var_dump($actors);
// $usera = $_GET["name"];
// $userb = $_GET["email"];
// $userc = $_GET["netid"];
// if (!empty($usera) && !empty($userb)){
// 	print("Thanks $usera. We will email you back at $userb in a few days ");
// }else{
// 	print("Fill out name and email please");
// }
?>
<!-- <a href="contact.html">Return to contact</a>
<a href="index.html">Go to home</a> -->
<!-- </body> </html> -->
