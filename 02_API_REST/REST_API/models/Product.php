<?php
class Products
{
  private $conn;

  // Products Properties
  public $id;
  public $nom;
  public $description;
  public $prix;
  public $categories_id;
  public $created_at;
  public $updated_at;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get Products
  public function read()
  {
    // Create query
    $query = 'SELECT * FROM categories INNER JOIN products on products.categories_id = categories.id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  // Get Single Product
  public function read_single()
  {
    // Create query
    $query = 'SELECT * FROM categories INNER JOIN products on products.categories_id = categories.id WHERE products.id = ? LIMIT 1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(2);

    // Set properties
    $this->nom = $row['nom'];
    $this->description = $row['description'];
    $this->prix = $row['prix'];
    $this->categories_id = $row['categories_id'];
    $this->created_at = $row['created_at'];
    $this->updated_at = $row['updated_at'];
  }

  // // Create Product
  public function create()
  {
    // Create query
    $query = 'INSERT INTO products (nom, description, prix, categories_id) VALUES (:nom, :description, :prix, :categories_id)';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->nom = htmlspecialchars(strip_tags($this->nom));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->prix = htmlspecialchars(strip_tags($this->prix));
    $this->categories_id = htmlspecialchars(strip_tags($this->categories_id));

    // Bind data
    $stmt->bindParam(':nom', $this->nom);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':prix', $this->prix);
    $stmt->bindParam(':categories_id', $this->categories_id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // // Update Product
  public function update()
  {
    // Create query
    $query = 'UPDATE products SET nom = :nom, description = :description, prix = :prix, categories_id = :categories_id WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->nom = htmlspecialchars(strip_tags($this->nom));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->prix = htmlspecialchars(strip_tags($this->prix));
    $this->categories_id = htmlspecialchars(strip_tags($this->categories_id));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':nom', $this->nom);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':prix', $this->prix);
    $stmt->bindParam(':categories_id', $this->categories_id);
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Delete Product
  public function delete()
  {
    // Create query
    $query = 'DELETE FROM products WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }
}
