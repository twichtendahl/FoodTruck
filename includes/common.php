<?php
// common.php
// Contains classes such as menu items and functions for menu logic

// Object represents single line item on an order receipt
class Line_Item {
    
    public $item = '';
    public $toppings = array();
    public $quantity = 0;
    
    function __construct($item, $toppings, $quantity) {
        $this->item = $item;
        $this->toppings[] = $toppings;
        $this->quantity = $quantity;
    }
    
    /*function __toString() {
        return $this->quantity . ' ' . strtoupper($this->item) . PHP_EOL 
    }*/
}

// Generic template for an item on the menu
class Menu_Item {
    
    public $name = ''; // e.g. gyro, babaGanoush, grapeSoda
    public $price = 0;
    
    function __construct($name, $price) {
        $this->name = $name;
        $this->$price = $price;
    }
}

// Classes store data about menu items (allowable toppings, meats, etc)
class Gyro extends Menu_Item {
    
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