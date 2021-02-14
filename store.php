<?php
    
    // read from associative array for current fruit prices.
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

    // print associative array
    //print_r($data_assoc);




    // all html is echoed out so I can edit it with php!
    echo 
    "<html>" .
        "<body>" .
            "<h1>FOOD FOR LESS</h1>" . 
            "<form action='checkout.php'>" . 
                "<table>";

                    // loop to print out each item using data from text file
                    foreach($data_assoc as $key => $value) 
                    {
                        echo
                        "<tr>" .
                        "<td> <input type=checkbox name='item[]' value='$key'><img src='$key.jpg' height =100 widt=100> </td>" .
                        "<td> Price: $$value</td>" .
                        "<t/r>";
                    }
    echo
                "</table>" .
                "<input type=submit value='BUY'>" .
            "</form>" .

            "<a href='admin.php'>Admins click here</a>" .
        "</body>" .
    "</html>";

    


    echo "<br><br><br>";
    // close file after use
    fclose ($file);


?>

