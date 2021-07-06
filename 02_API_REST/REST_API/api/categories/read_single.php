<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/categories.php';
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
// Instantiate blog categories object
$categories = new categories($db);

// Get ID
$categories->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get Product
$categories->read_single();

// Create array
$categories_arr = array(
  'id' => $categories->id,
  'nom' => $categories->nom,
  'Descr' => $categories->Descr
);

// Make JSON
print_r(json_encode($categories_arr));
