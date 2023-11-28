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
       public function signIn($email,$password){
        $this->db->query("SELECT * from $this->tableName WHERE email=:email");
        $this->db->bind(':email', $email);

        $row=$this->db->single();
        $hashed_password = $row->password;
        if(password_verify($password,$hashed_password)){
        return $row;
       }else{
        return false;
       }
       }
    
       public function signUp($data){
        $this->db->query(
            "INSERT INTO $this->tableName (`name`, email, `password`) VALUES (:name, :email, :password)"
        );
    //    bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
               // Execute the query
               if( $this->db->execute()){
                return true;
               }else{
                return false;
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
    


    public function getUserByID($id){
        $this->db->query("select name,email from $this->tableName where userId = :id");
        $this->db->bind(':id', $id);
        $row =$this->db->single();
        if( $this->db->rowcount() >0 ){
            return $row;
        }else{
             return false;
        }
    }

   
}