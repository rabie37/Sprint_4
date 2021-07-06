<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, prixization,X-Requested-With');

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

$categories->nom = $data->nom;
$categories->Descr = $data->Descr;

// Update Product
if ($categories->update()) {
  echo json_encode(
    array('message' => 'categories Updated')
  );
} else {
  echo json_encode(
    array('message' => 'categories not updated')
  );
}
