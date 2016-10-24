<html>
<body style="background-color: skyblue">
<?php
class Phone
{
    private $name;
    private $price;
    private $rate;
    
    public function __construct($name_, $cost, $rating)
    {
        $this->name  = $name_;
        $this->price = $cost;
        $this->rate  = $rating;
    }
    
    public function getMakeAndPrice()
    {
        return 'Name : ' . $this->name . ' Price : ' . $this->price . " Rating (out of 10) : " . $this->rate;
    }
}

class MobileFactory
{
    public static function create($name_, $cost, $rating)
    {
        return new Phone($name_, $cost, $rating);
    }
}

$mobile  = MobileFactory::create('Iphone', 30000, 5);
$mobile2 = MobileFactory::create('Iphone6s', 39000, 6);
$mobile3 = MobileFactory::create('Iphone7', 60000, 8);
$mobile4 = MobileFactory::create('Iphone5s', 20000, 5);


print_r($mobile->getMakeAndPrice());
echo "<br><hr>";
print_r($mobile2->getMakeAndPrice());
echo "<br><hr>";
print_r($mobile3->getMakeAndPrice());
echo "<br><hr>";
print_r($mobile4->getMakeAndPrice());
?>
</body>
</html>