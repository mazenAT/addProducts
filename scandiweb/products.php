<?php 
    include('db_controller.php');
    abstract class Product
    {
        protected $SKU;
        protected $name;
        protected $price;
        protected $type;

        public function __construct($SKU, $name, $price, $type){
            $this->SKU = $SKU;
            $this->name = $name;
            $this->price = $price;
            $this->type = $type;
        }
        
        //getters
        public function getSKU(){
            return $this->SKU;
        }
        public function getName(){
           return $this->name;
        }
        public function GetPrice(){
            return $this->price;
        }
        public function getType(){
            return $this->type;
        }
        abstract public function addProduct($data);
        
    }
    class Dvd extends Product 
    {
        public $data; 
        protected $size;
        public function __construct($SKU, $name, $price, $type,$size) {
            $this->size = $size;
            parent::__construct($SKU, $name, $price, $type);
        }
        public function setSize($size){
            $this->size = $size;
        }
        public function getSize(){
        return $this->size;
        }
        public function addProduct($dvd){
            $cont = new Controller();
            $cont->addDVD($dvd);
        }
    
    }
    class Furnture extends Product 
    {
        protected $height;
        protected $width;
        protected $length;
        public function __construct($SKU, $name, $price, $type,$height,$width,$length) {
            $this->height = $height;
            $this->width = $width;
            $this->length = $length;
            parent::__construct($SKU, $name, $price, $type);
        }
        public function getHeight(){
            return $this->height;
        }
        public function getWidth()
        {
            return $this->width;
        }
        public function getLength()
        {
            return $this->length;
        }
        public function addProduct($furnture){
            $cont = new Controller();
            $cont->addFurnture($furnture);
        }
    }
    class Book extends Product 
    {
        protected $weight;
        public function __construct($SKU, $name, $price, $type,$weight) {
            $this->weight = $weight;
            parent::__construct($SKU, $name, $price, $type);
        }
        public function getWeight()
        {
            return $this->weight;
        }
        public function addProduct($book){
            $cont = new Controller();
            $cont->addBook($book);
        }
    }
    
?>