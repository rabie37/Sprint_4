<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/categories.php';
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog Product object
$categories = new categories($db);

// Get raw Producted data
$data = json_decode(file_get_contents("php://input"));

// Set ID to UPDATE
$categories->id = $data->id;

// Delete Product
if ($categories->delete()) {
  echo json_encode(
    array('message' => 'categories deleted')
  );
} else {
  echo json_encode(
    array('message' => 'categories not deleted')
  );
}
