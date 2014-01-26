<?php

    // configuration
    require("../includes/config.php"); 

    // render quote
    render("stock_form.php", ["title" => "Stock Prices"]);
    
    //if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["symbol"]))
        {
            apologize("Please input a stock symbol");
        }
        else if ($result === false)
        {
            apologize("Please input a correct stock symbol");
        }
        else
        {
            //else render stock price
            $stock = lookup($_POST["symbol"]);
            render("stockprice.php", ["price" => "$price"]);
        }
    }
?>
