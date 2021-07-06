<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: Product');
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

$categories->nom = $data->nom;
$categories->Descr = $data->Descr;

// Create categories
if ($categories->create()) {
  echo json_encode(
    array('message' => 'categories Created')
  );
} else {
  echo json_encode(
    array('message' => 'categories Not Created')
  );
}
