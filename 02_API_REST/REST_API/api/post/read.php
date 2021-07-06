<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Product.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog product$product object
$product = new Products($db);

// Blog product$product query
$result = $product->read();
// Get row count
$num = $result->rowCount();

// Check if any product$products
if ($num > 0) {
  // product$product array
  $products_arr = array();
  // $products_arr['data'] = array();

  while ($row = $result->fetch(2)) {
    extract($row);

    $product_item = array(
      'id' => $id,
      'nom' => $nom,
      'description' => html_entity_decode($description),
      'prix' => $prix,
      'categories_id' => $categories_id,
      'created_at' => $created_at,
      'updated_at' => $updated_at
    );

    // Push to "data"
    array_push($products_arr, $product_item);
    // array_push($products_arr['data'], $product_item);
  }

  // Turn to JSON & output
  echo json_encode($products_arr);
} else {
  // No product$products
  echo json_encode(
    array('message' => 'No product$products Found')
  );
}
