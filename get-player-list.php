<?php
require_once("config.php");

$data_post = json_decode(file_get_contents('php://input'),true);
if (isset($data_post['token']) && $data_post['token'] == "70acbeef398242c68435c4fdc99c8f36") {
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  $data = array(
    'error' => 4, 
    'message' => $conn->connect_error
  );
  echo json_encode($data);
} else {

  $sql = "SELECT id, name, credits, prize, pin, played FROM players";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    $players = array();
    while($row = $result->fetch_assoc()) {
        $data = array(
          'error' => 0,
          'message' => 'success',
          'id' => $row["id"], 
          'name' => $row["name"], 
          'credits' => $row["credits"], 
          'prize' => $row["prize"], 
          'pin' => $row["pin"], 
          'played' => $row["played"], 
        );
      array_push($players, $data);
    }
    $participants = array(
      'participants' => $players 
    );
    echo json_encode($participants);
  } else {
    $data = array(
      'error' => 3, 
      'message' => 'User not found.'
    );
    echo json_encode($data);
  }
  $conn->close();
  } 
} else {
  $data = array(
    'error' => 2, 
    'message' => 'Auth failed.'
  );
  echo json_encode($data);
}
?>