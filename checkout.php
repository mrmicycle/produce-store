<?php

    // for counting total price
    $total = 0;
    // check that something is clicked?
    if (!isset($_GET['item']))
    {
        echo "No items selected!<br>";
        echo "<a href='store.php'>Go back to store?</a>";
    } 
    else// everything only runs if something is clicked
    {
        // take in selections
        $item = $_GET["item"];
        
        // open file, declare array.
        $filename = "./data.txt";
        $file = fopen($filename, "r") or die("Unable to open file!");//or die statement for errors.
        $data_assoc = array();

        // loop takes data from file and puts it in associative array
        while(!feof($file))
        {
            // each line of string on the opened text file to $line
            $line = fgets($file);
            // create an array that has key and value in one array, key is [0] value is [1]
            $key_value = explode(" ", $line);
            // add key and value to $data_ky associative array.
            $data_assoc[$key_value[0]] = $key_value[1];         
        }

        // display items and prices for user
        echo "The price of your items today: <br>";
        foreach($item as $fruit)
        {
            $price = $data_assoc[$fruit];
            $total += $price;
            echo "$fruit: $$price<br>"; 
        }
        // then tell them the total cost.
        echo "Your total today is: $$total" . "<br><br>";

        // links to admin, store page
        echo
            "<a href='admin.php'>Admins click here</a>" . "<br>" .
            "<a href='store.php'>Back to store?</a>";
        
        // close file after use
        fclose ($file);
    }
    

?>