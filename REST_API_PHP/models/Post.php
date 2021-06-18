<?php 
  class Post {
    
    private $conn;
    private $table = 'Task';

    // Post Properties
    public $task_id;
    public $user_id;
    public $title;
    public $description;
    public $pic;
    public $create_date_time;
    public $status;

    
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      
      $query = 'SELECT * FROM '. $this->table .' ';

      $stmt = $this->conn->prepare($query);

      
      $stmt->execute();

      return $stmt;
    } 



    // Create Post
    public function create() {
      
      $query = 'INSERT INTO ' . $this->table . ' SET user_id = :user_id, title = :title, description = :description, pic = :pic, status = :status';

      
      $stmt = $this->conn->prepare($query);

     
      $this->user_id = htmlspecialchars(strip_tags($this->user_id));
      $this->title = htmlspecialchars(strip_tags($this->title));
      $this->description = htmlspecialchars(strip_tags($this->description));
      $this->pic = htmlspecialchars(strip_tags($this->pic));
      $this->status = htmlspecialchars(strip_tags($this->status));

     
      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':description', $this->description);
      $stmt->bindParam(':pic', $this->pic);
      $stmt->bindParam(':status', $this->status);

      
      if($stmt->execute()) {
        return true;
      }

      
      printf("Error: %s.\n", $stmt->error);

      return false;
    }


    // Update Post
    public function update() {
      
      $query = 'UPDATE ' . $this->table . '
                            SET title = :title, description = :description, pic = :pic, status = :status
                            WHERE task_id = :task_id';

    
      $stmt = $this->conn->prepare($query);

      
      $this->title = htmlspecialchars(strip_tags($this->title));
      $this->description = htmlspecialchars(strip_tags($this->description));
      $this->pic = htmlspecialchars(strip_tags($this->pic));
      $this->status = htmlspecialchars(strip_tags($this->status));
      $this->task_id = htmlspecialchars(strip_tags($this->task_id));

     
      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':description', $this->description);
      $stmt->bindParam(':pic', $this->pic);
      $stmt->bindParam(':status', $this->status);
      $stmt->bindParam(':task_id', $this->task_id);

      
      if($stmt->execute()) {
        return true;
      }

      
      printf("Error: %s.\n", $stmt->error);

      return false;
  }

    // Delete Post
    public function delete() {
      
      $query = 'DELETE FROM ' . $this->table . ' WHERE task_id = :task_id';

      
      $stmt = $this->conn->prepare($query);

      
      $this->task_id = htmlspecialchars(strip_tags($this->task_id));

      
      $stmt->bindParam(':task_id', $this->task_id); 

      
      if($stmt->execute()) {
        return true;
      }

      
      printf("Error: %s.\n", $stmt->error);

      return false;
}
 }
  ?>
