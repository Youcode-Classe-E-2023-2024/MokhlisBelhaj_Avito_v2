<?php
class UserModel{
    private $db;
    private $tableName=__CLASS__;
   public function __construct(){
       $this->db = new Database;
       $this->db->query("SHOW TABLES LIKE :table");
           $this->db->bind(':table', $this->tableName);
           $result = $this->db->single();
           
       
           if (empty($result)) {
               $this->createTable();
               //admine 
               $this->insertAdmin('admin', 'admin@admin.com', 'admine1234');
           }
   
   
       }
   
       private function createTable() {
           // Define your table creation SQL here
           $createTableSQL = "
           CREATE TABLE $this->tableName (
                userId INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                role BOOL DEFAULT FALSE
           );        
           ";
           
           // Execute the table creation query
           $this->db->query($createTableSQL);
           $this->db->execute();
       }
       private function insertAdmin($name, $email, $password) {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Define your insert SQL here
        $insertAdminSQL = "
            INSERT INTO $this->tableName (name, email, password, role)
            VALUES (:name, :email, :password, TRUE)
        ";
            // Use prepared statements to prevent SQL injection
            $this->db->query($insertAdminSQL);
            $this->db->bind(':name', $name);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $hashedPassword);
                   // Execute the query
            $this->db->execute();
    }
    public function FindUserbyEmail($email){
        $this->db->query("select * from $this->tableName where email = :email");
        $this->db->bind(':email', $email);
        $row =$this->db->single();
        if( $this->db->rowcount() >0 ){
            return true;
        }else{
             return false;
        }
    }
}