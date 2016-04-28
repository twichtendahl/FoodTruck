<?php
//order_form.php

include 'includes/common.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rea's Order Form</title>
</head>
<body>
   <header>
       <h1>Rea's Mediterranean Specialties</h1>
       <h2>Place an Order</h2>
   </header>
   
<?php
    
if(isset($_POST['submit_order'])) { //order was submitted
    
    // ============== ATTEMPT AT SCALABLE ============== //
    $lineItems = array(); // Array to store each line item, extracted from form in its turn by while() loop below:
    $itemNumber = 1; // This number is appended to strings to see whether the form contains those elements.
    while($_POST['item' . $itemNumber]) { // See whether there is an item whose label matches our counter
        
        // ============== FORM CONTROL NAMES ==============
        $itemSelectName = 'item' . $itemNumber; // name of select element for that item
        $itemQuantityName = $itemSelectName . '_quantity'; // name of quantity element for that item
        $toppingSelectName = 'topping' . $itemNumber; // name of topping select element for that item
        $toppingQuantityName = $toppingSelectName . '_quantity'; // name of quantity element for that topping
        
        $toppings = array(
            new Topping($_POST[$toppingSelectName], $_POST[$toppingQuantityName])
        );
        $lineItems[] = new Line_Item(new $_POST[$itemSelectName](), $_POST[$itemQuantityName], $toppings); // value at select element $itemSelectName will corrrespond with Class name for a menu item. We create a new instance of that menu item as the <<item>> property of our LineItem object.
        
        $itemNumber++; // Increment by 1
    }
    
    // Order
    $order = new Order($lineItems);
    
    // Show information about order
    $orderedItems = $order->lineItems;
    
    foreach($orderedItems as $itemKey => $orderedItem) {
        $itemKeyListForm = $itemKey + 1;
        echo "<p>Item {$itemKeyListForm}: {$orderedItem->item->name}</p>";
        echo "<p>Description: {$orderedItem->item->description}</p>";
        foreach($orderedItem->toppings as $toppingKey => $topping) {
            $toppingKeyListForm = $toppingKey + 1;
            echo "<p>Topping {$toppingKeyListForm}: {$topping->type}</p>";
            echo "<p>Quantity: {$topping->quantity}</p>";
        }
        echo "<p>Item Price: $ {$orderedItem->price()}</p>";
    }
    echo "Order Subtotal: $" . $order->getSubtotal();
    echo "Order Total: $" . $order->getTotal();
    
    /*
    // Items info
    echo "<p>Your first item: {$lineItems[0]->item->name}";
    echo "<p>Your second item: {$lineItems[1]->item->name}";
    
    // Toppings info
    echo "<p>Item One Toppings: <pre>";
    echo var_dump($lineItems[0]->toppings);
    echo "</pre></p>";
    echo "<p>Item Two Toppings: <pre>";
    echo var_dump($lineItems[1]->toppings);
    echo "</pre></p>";
    echo "<p>Item One Total: $" . $lineItems[0]->price() . "</p>";
    echo "<p>Item Two Total: $" . $lineItems[1]->price() . "</p>";
    echo "<p>Subtotal: $" . $order->getSubtotal() . "</p>";*/
    
}else{ //show form
    echo '
    <form action="order_form.php" method="post">
        
        <fieldset id="order_item1">
            <legend>Item 1</legend>
            <select id="item1" name="item1">
                <option value="title">Select Menu Item</option>
                <option value="Gyros">Gyros</option>
                <option value="Shawarma">Shawarma</option>
                <option value="Shish_Kabob">Shish Kabob</option>
                <option value="Baba_Ganoush">Baba Ganoush</option>
                <option value="Hummus_Plate">Hummus Plate</option>
                <option value="Tabouleh">Tabouleh</option>
                <option value="Falafel_Plate">Falafel Plate</option>
                <option value="Hot_Tea">Hot Tea</option>
                <option value="Lemonade">Lemonade</option>
                <option value="Kefir">Kefir</option>
                <option value="Grape_Soda">Grape Soda</option>
                <option value="Baklava">Baklava</option>
                <option value="Kunafeh">Kunafeh</option>
                <option value="Basbousa">Basbousa</option>
            </select>
            
            <fieldset id="item1_toppings">
                <legend>Toppings</legend>
                <select id="topping1" name="topping1">
                    <option value="title">Select Topping</option>
                    <option value="Tahini">Tahini</option>
                    <option value="Garlic">Roast Garlic</option>
                    <option value="Bell_Pepper">Roast Bell Pepper</option>
                    <option value="Hummus">Hummus</option>
                    <option value="Garlic_Sauce">Garlic Sauce</option>
                </select>
                <label for="topping1_quantity">Quantity: </label>
                <input id="topping1_quantity" type="number" step=1 min="1" name="topping1_quantity"/>
            </fieldset>

            <label for="item1_quantity">Quantity: </label>
            <input id="item1_quantity" type="number" step=1 min="1" value="1" name="item1_quantity"/>
        </fieldset>        
        
        <fieldset id="order_item2">
            <legend>Item 2</legend>
            <select id="item2" name="item2">
                <option value="title">Select Menu Item</option>
                <option value="Gyros">Gyros</option>
                <option value="Shawarma">Shawarma</option>
                <option value="Shish_Kabob">Shish Kabob</option>
                <option value="Baba_Ganoush">Baba Ganoush</option>
                <option value="Hummus_Plate">Hummus Plate</option>
                <option value="Tabouleh">Tabouleh</option>
                <option value="Falafel_Plate">Falafel Plate</option>
                <option value="Hot_Tea">Hot Tea</option>
                <option value="Lemonade">Lemonade</option>
                <option value="Kefir">Kefir</option>
                <option value="Grape_Soda">Grape Soda</option>
                <option value="Baklava">Baklava</option>
                <option value="Kunafeh">Kunafeh</option>
                <option value="Basbousa">Basbousa</option>
            </select>
            
            <fieldset id="item2_toppings">
                <legend>Toppings</legend>
                <select id="topping2" name="topping2">
                    <option value="title">Select Topping</option>
                    <option value="Tahini">Tahini</option>
                    <option value="Garlic">Roast Garlic</option>
                    <option value="Bell_Pepper">Roast Bell Pepper</option>
                    <option value="Hummus">Hummus</option>
                    <option value="Garlic_Sauce">Garlic Sauce</option>
                </select>
                <label for="topping2_quantity">Quantity: </label>
                <input id="topping2_quantity" type="number" step=1 min="1" name="topping2_quantity"/>
            </fieldset>
            
            <label for="item2_quantity">Quantity: </label>
            <input id="item2_quantity" type="number" step=1 min="1" value="1" name="item2_quantity"/>
        </fieldset>
        
        <input id="submit_order" type="submit" name="submit_order" value="Submit Order"/>
    </form> ';
}
?>
       
</body>
</html>