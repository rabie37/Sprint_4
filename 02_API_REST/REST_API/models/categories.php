<?php
class categories
{
  // DB Stuff
  private $conn;

  // Properties
  public $id;
  public $nom;
  public $Descr;
  public $created_at;
  public $Update_at;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get categories
  public function read()
  {
    // Create query
    $query = 'SELECT * FROM categories';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  // Get Single categories
  public function read_single()
  {
    // Create query
    $query = 'SELECT * FROM categories WHERE id = ? LIMIT 1';

    //Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(2);

    // set properties
    $this->id = $row['id'];
    $this->nom = $row['nom'];
    $this->Descr = $row['Descr'];
    $this->created_at = $row['created_at'];
    $this->Update_at = $row['Update_at'];
  }

  // Create categories
  public function create()
  {
    // Create Query
    $query = 'INSERT INTO categories(nom, Descr) VALUES(:nom, :Descr) ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->nom = htmlspecialchars(strip_tags($this->nom));
    $this->Descr = htmlspecialchars(strip_tags($this->Descr));

    // Bind data
    $stmt->bindParam(':nom', $this->nom);
    $stmt->bindParam(':Descr', $this->Descr);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Update categories
  public function update()
  {
    // Create Query
    $query = 'UPDATE categories
    SET
      nom = :nom, Descr = :Descr
      WHERE
      id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->nom = htmlspecialchars(strip_tags($this->nom));
    $this->Descr = htmlspecialchars(strip_tags($this->Descr));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':nom', $this->nom);
    $stmt->bindParam(':Descr', $this->Descr);
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Delete categories
  public function delete()
  {
    // Create query
    $query = 'DELETE FROM categories WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
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
