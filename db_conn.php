<?php



        class DatabaseConnection
        {
            public $servername;
            public $username;
            public $password;
            public $dbname;
            public $con;
        
            public function __construct(
                $dbname = "cms",
                $servername = "localhost",
                $username = "root",
                $password = ""
            )
            {
                $this->dbname = $dbname;
                $this->servername = $servername;
                $this->username = $username;
                $this->password = $password;
        
                // Create connection
                $this->con = mysqli_connect($servername, $username, $password);
        
                // Check connection
                if (!$this->con) {
                    die("Connection failed : " . mysqli_connect_error());
                }
        
                // Create or use existing database
                $this->createDatabase();
        
                // Connect to the database
                $this->con = mysqli_connect($servername, $username, $password, $dbname);
            }
        
            private function createDatabase()
            {
                $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
                if (!mysqli_query($this->con, $sql)) {
                    die("Error creating database: " . mysqli_error($this->con));
                }
            }
        }
//menu table
        class MenuTable extends DatabaseConnection
  {
    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Menu
                (f_id INT AUTO_INCREMENT PRIMARY KEY,
                FoodName VARCHAR(255) NOT NULL,
                Price INT (11) NOT NULL,
                Type VARCHAR(255) NOT NULL,	
                Imgpath VARCHAR(255) NOT NULL
                );";

        if (!mysqli_query($this->con, $sql)) {
            echo "Error creating table : " . mysqli_error($this->con);
        }
    }
    public function getDataDrinks(){
      $sql = "SELECT * FROM Menu WHERE Type = 'Drinks'";

      $result = mysqli_query($this->con, $sql);

      if(mysqli_num_rows($result) > 0){
          return $result;
      }
  }
  public function getDataDesserts(){
    $sql = "SELECT * FROM Menu WHERE Type = 'Desserts'";

    $result = mysqli_query($this->con, $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}
public function getDataRice(){
  $sql = "SELECT * FROM Menu WHERE Type = 'Rice'";

  $result = mysqli_query($this->con, $sql);

  if(mysqli_num_rows($result) > 0){
      return $result;
  }
}
public function getDataSpecial(){
$sql = "SELECT * FROM Menu WHERE Type = 'Special Offers'";

$result = mysqli_query($this->con, $sql);

if(mysqli_num_rows($result) > 0){
    return $result;
}
}
    // Add other methods related to Menu table here
}
//customer table
class CustomerTable extends DatabaseConnection
{
    public function createTable()
    {
      $sql = "CREATE TABLE IF NOT EXISTS Customer
      (c_id INT AUTO_INCREMENT PRIMARY KEY,
      c_fname VARCHAR(255) NOT NULL,
      c_lname VARCHAR(255) NOT NULL,
      Balance INT(11) NOT NULL
      );";

if (!mysqli_query($this->con, $sql)) {
  echo "Error creating table : " . mysqli_error($this->con);
}
    }
}

//cart table
class CartTable extends DatabaseConnection
{
    public function createTable()
    {
      $sql = "CREATE TABLE IF NOT EXISTS Cart
      (order_id INT AUTO_INCREMENT PRIMARY KEY,
      c_id INT , /*remember theres suppposed to be not null here */
      FoodName VARCHAR(255) NOT NULL,
      Price INT (11) NOT NULL,
      Quantity INT(11) NOT NULL
     /*add constraint here*/
      );";
       
if (!mysqli_query($this->con, $sql)) {
  echo "Error creating table : " . mysqli_error($this->con);
}

    }
    public function insertOrUpdateCartItem($c_id,$foodName, $price) {
        //after login is fixed, include c_id from session variable
        $id = $_SESSION['ID'];
        $c_id = $id;
        
        // Check if the cart item already exists for the customer
        $sql = "SELECT * FROM Cart WHERE c_id = '$c_id' AND FoodName = '$foodName'";
        $result = mysqli_query($this->con, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            // Update the existing cart item quantity or other details
            $updateSql = "UPDATE Cart SET Price = '$price' WHERE c_id = '$c_id' AND FoodName = '$foodName'";
            mysqli_query($this->con, $updateSql);
        } else {
            // Insert a new cart item
            $insertSql = "INSERT INTO Cart (c_id, FoodName, Price, Quantity) 
                        VALUES ('$c_id', '$foodName', '$price', 1)";
            mysqli_query($this->con, $insertSql);
        }
    }
    public function clearCart($c_id) {
        $sql = "DELETE FROM Cart WHERE c_id = 1";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $c_id);

        if ($stmt->execute()) {
            return true; // Cart cleared successfully
        } else {
            error_log("Error clearing cart: " . $stmt->error);
            return false;
        }
    }
    public function removeCartItem($c_id, $foodName) {
        // Ensure that you're using prepared statements to prevent SQL injection
        $stmt = $this->con->prepare("DELETE FROM Cart WHERE c_id = ? AND FoodName = ?");
        $stmt->bind_param("is", $c_id, $foodName);
    
        if ($stmt->execute()) {
            return true; // Item removed successfully
        } else {
            // You can log the error or handle it as needed
            error_log("Error removing cart item from database: " . $stmt->error);
            return false;
        }
    }
    
    public function getDataDrinks(){
      $sql = "SELECT * FROM Menu WHERE Type = 'Drinks'";

      $result = mysqli_query($this->con, $sql);

      if(mysqli_num_rows($result) > 0){
          return $result;
      }
  }
  public function getDataDesserts(){
    $sql = "SELECT * FROM Menu WHERE Type = 'Desserts'";

    $result = mysqli_query($this->con, $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}
public function getDataRice(){
  $sql = "SELECT * FROM Menu WHERE Type = 'Rice'";

  $result = mysqli_query($this->con, $sql);

  if(mysqli_num_rows($result) > 0){
      return $result;
  }
}
public function getDataSpecial(){
$sql = "SELECT * FROM Menu WHERE Type = 'Special Offers'";

$result = mysqli_query($this->con, $sql);

if(mysqli_num_rows($result) > 0){
    return $result;
}
}
}
?>





