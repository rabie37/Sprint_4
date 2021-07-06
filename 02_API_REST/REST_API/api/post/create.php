<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: Product');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, prixization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Product.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog Product object
$Product = new Products($db);

// Get raw Producted data
$data = json_decode(file_get_contents("php://input"));

$Product->nom = $data->nom;
$Product->description = $data->description;
$Product->prix = $data->prix;
$Product->categories_id = $data->categories_id;

// Create Product
if ($Product->create()) {
  echo json_encode(
    array('message' => 'Product Created')
  );
} else {
  echo json_encode(
    array('message' => 'Product Not Created')
  );
}
