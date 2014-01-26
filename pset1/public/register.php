<?php
    //configuration
    require("../includes/config.php");
    
    //if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["username"]))
        {
            apologize("Please fill out your username and password");
        }
        else if (!($_POST["password"] == $_POST["confirmation"]))
        {
            apologize("Please make passwords match");
        }
        else
        {
            query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
        }
        if ($result === false)
        {
            return 1;
        }
        else
        {
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        $_SESSION["id"];
        redirect("index.php");
        }
    }
    else
    {
        //else render form
        render("register_form.php", ["title" => "Register"]);
    }
?>
