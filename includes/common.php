<?php
// common.php
// Contains classes such as menu items and functions for menu logic

// Instantiate class that matches value of menu item field
// Use that class' properties to associate a price with an order

class Order {
    
    public $lineItems = array(); // This property is an array of the line items in the order
    public $tax = .095;
    
    /**
     * Order constructor from an array of line items
     * @param array $lineItems constructs order from submitted choices
    */
    function __construct($lineItems) {// constructor takes an array of line items for that order
        $this->lineItems = $lineItems;    
    }
    
    /**
     * Subtotal calculator
     * @return float $subtotal subtotal for order price
    */
    function getSubtotal() {
        
        $subtotal = 0;        
        // loop through the array of line items in the order, adding the price of each to the subtotal
        foreach($this->lineItems as $lineItem) {
            $subtotal += $lineItem->price();
        }
        return $subtotal;
        
    }
    
    /**
     * Calculates total including tax
     * @return float $this->getSubtotal() * (1 + $this->tax) - total price for order
    */
    function getTotal() {
        
        return $this->getSubtotal() * (1 + $this->tax);
        
    }
}

class Line_Item {
    
    public $item = (Item); // This property specifies the type of menu item. It is an object associated with that item.
    public $quantity = 0; // This property specifies the quantity of that item.
    public $toppings = array(); // Array of Topping objects, which associate topping types with topping quantities
    
    /**
     * Constructs an order from submitted values
     * @param Item $item ordered item
     * @param int $quantity quantity selected
     * @param array $toppings ordered toppings
    */
    function __construct($item, $quantity, $toppings) {
        $this->item = $item;
        $this->quantity = $quantity;
        $this->toppings = $toppings;
    }
    
    /**
     * Calculates the price of a line item
     * @return float $price price of one line item
    */
    function price() { // Function returns the price of just one line item
        
        $price = $this->item->price * $this->quantity; // Initialize price variable as cost of single item times quantity of that item
        foreach($this->toppings as $topping) {
            $price += $topping->price(); // Inquire topping object about its price
        }
        return $price;
    }
}

class Topping {
    
    //Initialize item and quantity
    public $type = (Item); 
    public $quantity = 0; 
    
    /**
     * Topping constructor
     * @param Item $type type ordered
     * @param int $quantity quantity selected
    */
    function __construct($type, $quantity) {
        $this->type = $type;
        $this->quantity = $quantity;
    }
    
    /**
     * Calculates topping price
     * @return float $this->type->price * $this->quantity - price of toppings
    */
    function price() {
        return $this->type->price * $this->quantity;
    }
}

class Item {
    public $name = '';
    public $description = '';
    public $price = 0;
}

class Gyros {    
    public $name = 'Gyros';
    public $description = 'Meditteranean flatbread sandwich with grilled meat or falafel and mixed fresh vegetables';
    public $price = 7;
}

class Shawarma {    
    public $name = 'Shawarma';
    public $description = 'Grilled meat flavored with Egyptian spices, served with vegetables';
    public $price = 9;
}

class Shish_Kabob {    
    public $name = 'Shish Kabob';
    public $description = 'Skewered grilled meats with Egyptian seasonings';
    public $price = 8;
}

class Baba_Ganoush {    
    public $name = 'Baba Ganoush';
    public $description = 'Traditional Mediterranean favorite featuring seared eggplant, served with flatbread';
    public $price = 7;
}

class Hummus_Plate {    
    public $name = 'Hummus Plate';
    public $description = 'Hearty combination of garbanzo beans, olive oil, and seasonings, served with warm pita and vegetables';
    public $price = 4;
}

class Tabouleh {    
    public $name = 'Tabouleh';
    public $description = 'Egyptian salad featuring wheat bulghur, citrus, and herbs';
    public $price = 3;
}

class Falafel_Plate {    
    public $name = 'Falafel Plate';
    public $description = 'Fried dish featuring pureed garbanzo beans and spices, served with tahini sauce and grilled vegetables';
    public $price = 6;
}

class Hot_Tea {    
    public $name = 'Hot Tea';
    public $description = 'Traditional Egyptian treat, with sugar, mint, and milk on the side';
    public $price = 2.25;
}

class Lemonade {    
    public $name = 'Lemonade';
    public $description = 'Fresh squeezed in house!';
    public $price = 2.75;
}

class Kefir {    
    public $name = 'kefir';
    public $description = 'Smooth dairy drink with a yogurt-like flavor';
    public $price = 3.25;
}

class Grape_Soda {    
    public $name = 'Grape Soda';
    public $description = 'Favorite soft drink of Egypt, with whole peeled grapes';
    public $price = 2.5;
}

class Baklava {    
    public $name = 'Baklava';
    public $description = 'Mediterranean desert with sweet, rich pastry layered with nuts and honey';
    public $price = 4.5;
}

class Kunafeh {    
    public $name = 'Kunafeh';
    public $description = 'Traditional Egyptian cheese pie';
    public $price = 6.5;
}

class Basbousa {    
    public $name = 'Basbousa';
    public $description = 'Middle-eastern egg cake with pistacchio butter';
    public $price = 5.5;
}

// Topping items
class Tahini {
    public $name = 'Tahini';
    public $description = 'Cool sauce of toasted sesame';
    public $price = 1;
}

class Garlic {
    public $name = 'Roast Garlic';
    public $description = 'Whole cloves of garlic roasted in a brick oven';
    public $price = .5;
}

class Bell_Pepper {
    public $name = 'Roast Bell Pepper';
    public $description = 'Red bell pepper, roasted in a brick oven then sliced';
    public $price = 1;
}

class Garlic_Sauce {
    public $name = 'Garlic Sauce';
    public $description = 'Savory thin sauce of garlic and Egyptian seasonings';
    public $price = 1.5;
}

class Hummus {
    public $name = 'Hummus';
    public $description = 'Hearty combination of garbanzo beans, olive oil, and seasonings';
    public $price = 1.5;
}
