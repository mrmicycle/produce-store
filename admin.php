<?php
    // counter for writing to function
    $counter =1;
    // FIRST READ, THEN CLOSE
    // OPEN AGAIN FOR WRITING

    // "#$fruit \d*#" regex for finding specific 
    // fruit price combo in file, but may not use

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
     // close file. will reopen for writing
    fclose ($file);

    
    
    
    echo 
        "<form action='admin.php' method='GET'>";
        
            // use $data_assoc to create a form that can override prices.
            foreach($data_assoc as $fruit => $price)
            {
                echo "$fruit: <input type=text name='item[$fruit]' value='$price'> <br>";
            }


    echo 
        "<input type=submit name='submit' value='change'><br><br>" .
        "</form>" .
        "<a href='store.php'>shoppers click here</a>";

    
    
    // code to be run after clicking submit
    if (isset($_GET['submit']))
    {
        // reopen file for writing
        $file = fopen($filename, "w") or die("Unable to open file!");//or die statement for errors.
        // loop through each form for the fruit name and new price
        foreach ($_GET['item'] as $fruit => $price) 
        {
            if ($counter == count($_GET['item']))
            {
                // if at end of list of fruit, do not append new line
                fwrite($file, "$fruit $price");
            } 
            else 
            {
                // else write the fruit name and price to file with new line appended.
                fwrite($file, "$fruit $price\n");
                $counter++;
            }
            
        }
        // close file after writing.
        fclose($file);
        // redirect user to store after setting up prices.
        header("Location: store.php");  
    } 

?>