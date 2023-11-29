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
   public function getpostById($id){
  
    $this->db->query("SELECT * FROM $this->tableName where id = :id");
    $this->db->bind(':id', $id);
    $row = $this->db->resultSet();
        if( $this->db->rowcount() >0 ){
            return $row;
        }else{
             return false;
        }
    }

   public function getpostByUserId($id){
  
    $this->db->query("SELECT * FROM $this->tableName where user_id = :id");
    $this->db->bind(':id', $id);
    $row = $this->db->resultSet();
        if( $this->db->rowcount() >0 ){
            return $row;

        }else{
             return false;
        }
    }

  public function addPost($data){
      $this->db->query("INSERT INTO $this->tableName ( `name`, `image`, `desc`, `prix`, `user_id`) VALUES(:name, :image, :desc,:prix,:user_id)");
      // Bind values
      $this->db->bind(':name', $data['name'] );
        $this->db->bind(':image',$data['image'] );
        $this->db->bind(':desc',$data['desc'] );
        $this->db->bind(':prix',$data['prix'] ); 
        $this->db->bind(':user_id',$_SESSION['user_id']); 


      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function deletePostById($data){
        $this->db->query("DELETE FROM  $this->tableName WHERE id=:id");
        $this->db->bind(':id',$data); 
        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }
    public function updatePost($data){
        $this->db->query("UPDATE  $this->tableName SET `name`=:name ,`image`=:image,`desc`=:desc,`prix`=:prix WHERE id=:id");
        $this->db->bind(':id',$data['id']); 
        $this->db->bind(':name',$data['name']); 
        $this->db->bind(':desc',$data['desc']); 
        $this->db->bind(':prix',$data['prix']); 
        $this->db->bind(':image',$data['image']); 
        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }
}