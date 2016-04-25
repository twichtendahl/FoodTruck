<?php
// common.php
// Contains classes such as menu items and functions for menu logic

// **************** MENU DATA CLASSES **************** //
// Generic template for an item on the menu
class Menu_Item {
    
    public $name = ''; // e.g. gyro, babaGanoush, grapeSoda
    public $price = 0;
    
    function __construct($name, $price) {
        $this->name = $name;
        $this->$price = $price;
    }
}

// Lookup class contains information about topping prices
class Topping_Prices {
    
    // Associate the price of each topping with its name
    public $tahini = .5;
    public $garlic_sauce = .5;
    public $garlic = .5;
    public $bell_pepper = .5;
    public $hummus = .5;
}

// Classes store data about menu items (allowable toppings, meats, etc)
class Gyros extends Menu_Item {
    
    public $proteins = array('lamb', 'chicken', 'beef', 'falafel', 'eggplant');
    public $toppings = array('tahini', 'garlic', 'bell_pepper');
    
    function __construct() {
        parent::__construct('gyro', 7);
    }
}

class Shawarma extends Menu_Item {
    
    public $proteins = array('lamb', 'chicken', 'beef');
    public $toppings = array('garlic', 'bell_pepper', 'hummus');
    
    function __construct() {
        parent::__construct('shawarma', 9);
    }
}

class Shish_Kabob extends Menu_Item {
    
    public $proteins = array('lamb', 'chicken', 'beef');
    public $toppings = array('garlic_sauce', 'bell_pepper', 'hummus');
    
    function __construct() {
        parent::__construct('shish_kabob', 8);
    }
}

class Baba_Ganoush extends Menu_Item {
    
    function __construct() {
        parent::__construct('baba_ganoush', 5);
    }
}

class Hummus_Plate extends Menu_Item {
    
    function __construct() {
        parent::__construct('hummus_plate', 4);
    }
}

class Tabouleh extends Menu_Item {
    
    function __construct() {
        parent::__construct('tabouleh', 3);
    }
}

class Falafel_Plate extends Menu_Item {
    
    function __construct() {
        parent::__construct('falafel_plate', 5);
    }
}

class Baklava extends Menu_Item {
    
    function __construct() {
        parent::__construct('baklava', 4.25);
    }
}

class Kunafeh extends Menu_Item {
    
    function __construct() {
        parent::__construct('kunafeh', 4.25);
    }
}

class Basbousa extends Menu_Item {
    
    function __construct() {
        parent::__construct('baba_ganoush', 5);
    }
}

class Hot_Tea extends Menu_Item {
    
    function __construct() {
        parent::__construct('hot_tea', 2.25);
    }
}

class Lemonade extends Menu_Item {
    
    function __construct() {
        parent::__construct('lemonade', 2.25);
    }
}

class Kefir extends Menu_Item {
    
    function __construct() {
        parent::__construct('kefir', 2.50);
    }
}

class Grape_Soda extends Menu_Item {
    
    function __construct() {
        parent::__construct('grape_soda', 2.50);
    }
}

// **************** ORDER CLASSES **************** //
// Object represents single line item on an order receipt
class Line_Item {
    
    public $item = ''; // Name of menu item
    public $toppings = array(); // Array of toppings on that item
    public $quantity = 0; // Number of this item/topping combination in context of order
    
    function __construct($item, $toppings, $quantity) {
        $this->item = $item;
        $this->toppings = $toppings;
        $this->quantity = $quantity;
    }
    
    function __toString() {// styled to fit a receipt
        return $this->quantity . ' ' . strtoupper($this->item) . ' | ' . $this->price() . PHP_EOL . '  ' . implode(PHP_EOL . '  ', $this->toppings);
    }
    
    function price() {// determine the price of this line item by combining the item price with the price of each topping, 
                      // then multiply by quantity
        
        // get the price of the item
        $itemName = ucfirst($this->item); // Capitalize first letter of $item so it matches the data class name for that item        
        $itemAsAnObject = new $itemName(); // Create an object with that name so its price can be accessed
        $lineItemPrice = $itemAsAnObject->price; // Initialize $price as the price of that item
        
        // add the price of each topping in $toppings property to price of item
        // name is lower case topping names with underscores, convert these to
        // uppercase without underscores for Topping_Price lookup
        foreach($this->toppings as $name) {
            $toppingPrices = new Topping_Prices();
            $lineItemPrice += $toppingPrices->name;
        }
        
        // Multiply the price of one item with associated toppings to the correct number of that item
        $lineItemPrice = $lineItemPrice * $this->quantity;
        return $lineItemPrice;
    }
}

class Order {
    
    // constant tax rate for local jurisdiction
    const TAXRATE = .095;
    
    // information for particular order
    public $lineItems = array();
    public $customerName = '';
    
    function __construct($lineItems, $customerName) {
        $this->lineItems = $lineItems;
        $this->customerName = $customerName;
    }
    
    function getSubtotal() { // returns the subtotal of an order
        // loop through lineItems and add the price of each to the subtotal
        $subtotal = 0;
        foreach($this->lineItems as $lineItem) {
            $subtotal += $lineItem->price();
        }
        return $subtotal;
    }
    
    function getTotal() { // returns the total after tax
        return $this->getSubtotal() * (1 + TAXRATE);
    }
}

/*
Gyros ($7)
Choose meat:
Lamb
Chicken
Beef
Falafel (vegetarian)
Eggplant (vegetarian)
Extra Toppings ($.50 each)
Tahini sauce
Roast garlic
Roast bell pepper

Shawarma Plate ($9)
Choose meat:
Lamb
Chicken
Beef
Extra Toppings ($.50 each)
Roast garlic
Roast bell pepper
Hummus

Shish Kabob ($8)
Choose meat:
Lamb
Chicken
Beef
Extra Toppings ($.50 each)
Garlic Sauce
Roast bell pepper
Hummus

Side Dishes
Baba Ganoush 5, Hummus Plate 4, Tabouleh 3, Falafel Plate 5

Desserts
Baklava, Kunafeh, Basbousa

Beverages
Hot Tea, Lemonade, Kefir, Grape Soda
*/