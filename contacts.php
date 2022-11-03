<!DOCTYPE html>
<html>
    <head>
        <title>
        News
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header> 
            <a href="index.html" class=logo>Darkshade Inc.</a>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="products.html">Products</a></li>
                <li><a href="news.html">News</a></li>
                <li><a href="contacts.php" class="active">Contacts</a></li>
                <li><a href="password.html">Admin Login</a></li>
            </ul>
            
        </header>
        
        <h1 div="aboutsec" class="aboutsec">Contact Us</h1>
        <h3><?php
            $filename = "data.txt";
            $file = fopen($filename,"r");
            while (($line = fgets($file)) !== false) {
            echo $line;
            echo "<br>";
            }
            if($file == false){
                echo "Error opening the file";
                }
            $filesize = filesize($filename);
            $filetext = fread($file, $filesize);

            
            echo $filetext;
            echo "<br>";
            fclose($filename);
            ?>
        </h3>
    </body>
</html>