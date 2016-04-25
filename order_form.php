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
    
}else{ //show form
    echo '
    <form action="order_form.php" method="post">
    
        <select id="item" name="item">
            <option value="title">Select Menu Item</option>
            <option value="gyros">Gyros</option>
            <option value="shawarma">Shawarma</option>
            <option value="shish_kabob">Shish Kabob</option>
            <option value="baba_ganoush">Baba Ganoush</option>
            <option value="hummus_plate">Hummus Plate</option>
            <option value="tabouleh">Tabouleh</option>
            <option value="falafel_plate">Falafel Plate</option>
            <option value="hot_tea">Hot Tea</option>
            <option value="lemonade">Lemonade</option>
            <option value="kefir">Kefir</option>
            <option value="grape_soda">Grape Soda</option>
            <option value="baklava">Baklava</option>
            <option value="kunafeh">Kunafeh</option>
            <option value="basbousa">Basbousa</option>
        </select>
    
        <select id="gyros_protein" name="gyros_protein">
            <option value="title">Protein</option>
            <option value="lamb">Lamb</option>
            <option value="chicken">Chicken</option>
            <option value="falafel">Falafel</option>
            <option value="eggplant">Eggplant</option>
        </select>
        
        <select id="shawarma_protein" name="shawarma_protein">
            <option value="title">Protein</option>
            <option value="lamb">Lamb</option>
            <option value="chicken">Chicken</option>
            <option value="beef">Beef</option>
        </select>
        
        <select id="gyros_toppings" name="gyros_toppings">
            <option value="title">Toppings</option>
            <option value="tahini">Tahini</option>
            <option value="roasted_garlic">Roasted Garlic</option>
            <option value="bell_pepper">Roasted Bell Pepper</option>
        </select>
        
        <select id="shawarma_toppings" name="shawarma_toppings">
            <option value="title">Toppings</option>
            <option value="hummus">Hummus</option>
            <option value="roasted_garlic">Roasted Garlic</option>
            <option value="bell_pepper">Roasted Bell Pepper</option>
        </select>
        
        <select id="shish_kabob_toppings" name="shish_kabob_toppings">
            <option value="title">Toppings</option>
            <option value="hummus">Hummus</option>
            <option value="garlic_sauce">Garlic Sauce</option>
            <option value="bell_pepper">Roasted Bell Pepper</option>
        </select>
        
        <input id="quantity" type="number" step=1 min="1" name="quantity"/>
        
        <input id="add_to_order" type=submit name="add_to_order" value="Add to Order"/>
        <input id="remove_from_order" type=submit name="remove_from_order" value="X"/>
        <input id="submit_order" type=submit name="submit_order" value="Submit Order"/>
    </form> ';
}
?>
       
</body>
</html>