<?php
class Post{
 private $db;
 private $tableName=__CLASS__;
public function __construct(){
    $this->db = new Database;
    $this->db->query("SHOW TABLES LIKE :table");
        $this->db->bind(':table', $this->tableName);
        $result = $this->db->single();
        
    
        if (empty($result)) {
            $this->createTable();
            $this->insertPost();
        }


    }

    private function createTable() {
        // Define your table creation SQL here
        $createTableSQL = "
        CREATE TABLE $this->tableName (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            image VARCHAR(255) NOT NULL,
            `desc` TEXT NOT NULL,
            prix DECIMAL(10, 2) NOT NULL
        );        
        ";
        
        // Execute the table creation query
        $this->db->query($createTableSQL);
        $this->db->execute();
    }
    public function insertPost() {
        // Insert a new row into the table
        $this->db->query("
            INSERT INTO $this->tableName (name, image, `desc`, prix)
            VALUES (:name, :image, :desc, :prix)
        ");
        // Bind parameters
        $this->db->bind(':name', 'test');
        $this->db->bind(':image', 'https://flowbite.com/docs/images/blog/image-1.jpg');
        $this->db->bind(':desc', 'lorem ipsum dolor sit amet');
        $this->db->bind(':prix', '30');
        // Execute the query
        $this->db->execute();
    }
    
   public function getpost(){
    $this->db->query("SELECT * FROM post");
    $result = $this->db->resultSet();
    return $result;
   }
}