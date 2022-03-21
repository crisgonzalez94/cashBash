<?php
require_once("config.php");

$data_post = json_decode(file_get_contents('php://input'),true);
if (isset($data_post['token']) && $data_post['token'] == "70acbeef398242c68435c4fdc99c8f36") {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        $data = array(
            'error' => 4, 
            'message' => $conn->connect_error
          );
          echo json_encode($data);
    } else {
        $sql = "UPDATE players SET played = 1 WHERE id=" . $data_post['id'];
        if($conn->query($sql) == TRUE)
        {
            $data = array(
                'error' => 0, 
                'message' => 'Update success.'
            );
            echo json_encode($data);
        } else {
            $data = array(
                'error' => 1, 
                'message' => 'Update error. Please check Id.'
            );
            echo json_encode($data);
        }
    }
} else {
  $data = array(
    'error' => 2, 
    'message' => 'Auth failed.'
  );
  echo json_encode($data);
}
$conn->close();
?>