<?php

require_once('connectMysql.php');

Class Website{

    public $title ="Your Order";
    public $product1;
    public $product2;
    public $costOfProduct1=4;
    public $costOfProduct2=10;
    protected $cost;
    public function Show(){
        $this->ShowTitle();
        $this->ShowBody();
    }

    protected function ShowTitle(){
        echo "<head> \n";
        echo "<title>";
        echo $this->title;
        echo "</title>";
        echo '<link rel="stylesheet" href="style.css" type="text/css" /> ';
        echo "</head>";
    }

    public function ShowBody(){
        echo "<body>\n";
        echo "You have to pay: $this->cost". "$";
        echo '<div style="height:500px;"></div>';
        echo '<a href="index.php">Go Home</a>';
        echo "</body>";
    }

    protected function sqlQuery($host, $db_user, $db_password, $db_name, $sql){
        $connection = new DataBase($host, $db_user, $db_password, $db_name );
    
        $conn = mysqli_connect($connection->host,$connection->db_user, $connection->db_password, $connection->db_name);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        
        if (mysqli_query($conn, $sql)) {
          //echo "New record created successfully";
        } else {
          //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
        //header('Location: index.php');
    }  

    function __construct($firstProduct, $secondProduct){
        $this->product1 = intval($firstProduct);
        $this->product2 = intval($secondProduct);
        $this->cost = $this->product1* $this->costOfProduct1 +
        $this->product2* $this->costOfProduct2;
        $date = (string)date('Y-m-d H:i:s');
        $sql = "INSERT INTO bakery0001 (value, date)
                VALUES('$this->cost','$date' )";
        $this->sqlQuery("localhost","root", "","order0001", $sql);

    }
  
}