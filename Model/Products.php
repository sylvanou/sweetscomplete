<?php
class Products {
    public $products = array();

    // mysql connection params
    public $user = "sweetscomplete";
    public $dbname = "sweetscomplete";
    public $pass = "123456";
    public $host = "localhost";
    public $dsn = "";
    public $pdo = "";
    public $testmode = TRUE;

    public function __construct(){
        $this->dsn = sprintf("mysql:dbname=%s;host=%s;", $this->dbname, $this->host);
        if ($this->testmode) {
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass,
              array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));            
        }  else {
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass);
        }

        $sql = 'SELECT * FROM `products`';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->products[] = $row;
        }
    }

    public function getProducts() {
        return $this->products;
    }

    public function getTitles() {
        $titles = array();
        foreach($this->products as $row) {
            $titles[] = $row['title'];
        }
        return $titles;
    }
}