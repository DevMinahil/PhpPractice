
<?php
class Product{
   
 public function __construct(public $name="soap",public $price=10)
 {
    $this->name=$name;
    $this->price=$price;
 }
    public function priceASCurrency($divisor,$currencySymbol="$")
    {
        $symbol= $this->price/$divisor;
       return  $symbol.$currencySymbol;
      
    }


}
$product=new Product(price:1);
print $product->price.PHP_EOL;
print $product->name.PHP_EOL;
 
 
?>

