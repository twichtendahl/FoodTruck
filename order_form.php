<?php 
//order_form.php

if(isset($_POST['temp']))
{
    $output = "";
  	$result = 0.0;
  
  	// Here we need our if/else conditions to determine which type of conversion we're conducting.
  	// Each case should store the calculated value in the $result variable
    
    if($_POST['Item'] == "C" && $_POST['convertType'] == "F")
    {
        $result = ($_POST['temp'] * 1.8 + 32);
    }
    
    /*
	$output = $_POST['temp'].'° '.$_POST['Item'].' is equivalent to '.round($result, 2).'° '.$_POST['convertType'];
  	echo $output;
    */
  
}else{
    echo '
    <form action="P2.php" method="post">
    
        <select name="Order Item">
            <option value="title">Items</option>
            <option value="G">Gyros</option>
            <option value="S">Shawarma</option>
            <option value="SK">Shish Kabob</option>
            <option value="BG">Baba Ganoush</option>
            <option value="HP">Hummus Plate</option>
            <option value="TB">Tabouleh</option>
            <option value="FP">Falafel Plate</option>
            <option value="HT">Hot Tea</option>
            <option value="L">Lemonade</option>
            <option value="K">Kefir</option>
            <option value="GS">Grape Soda</option>
            <option value="B">Baklava</option>
            <option value="K">Kunafeh</option>
            <option value="BA">Basbousa</option>
        </select>
    
        <select name="Protein">
            <option value="title">Protein</option>
            <option value="L">Lamb</option>
            <option value="C">Chicken</option>
            <option value="F">Falafel</option>
            <option value="E">Eggplant</option>
        </select>
        
        <select name="Toppings" value="Toppings">
            <option value="title">Toppings</option>
            <option value="T">Tahini</option>
            <option value="RG">Roasted Garlic</option>
            <option value="RB">Roasted Bell Pepper</option>
            <option value="H">Hummus</option>
        </select>
        
        <input type="number" step=1 min="1" name="quantity"/>
        
        <p><input type=submit name="Add to Order" value="Add to Order"/></p>
        <p><input type=submit name="Remove from Order" value="X"/></p>
        <p><input type=submit name="Submit Order" value="Submit Order"/></p>
    </form> ';
}









