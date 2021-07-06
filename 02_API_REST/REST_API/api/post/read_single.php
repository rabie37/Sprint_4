<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Product.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog Product object
$Product = new Products($db);

// Get ID
$Product->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get Product
$Product->read_single();

// Create array
$Product_arr = [
  'id' => $Product->id,
  'nom' => $Product->nom,
  'description' => $Product->description,
  'prix' => $Product->prix,
  'categories_id' => $Product->categories_id,
  'created_at' => $Product->created_at,
  'updated_at' => $Product->updated_at
];

// Make JSON
print_r(json_encode($Product_arr));
