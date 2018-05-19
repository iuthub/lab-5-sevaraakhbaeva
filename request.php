<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $quick = $_POST['quick'];
    $isValid1 = preg_match("/quick/", $quick);
    
    $email = $_POST['email'];
    $isValid2 = preg_match("/[a-z0-9]+@[a-z]+\.[a-z]+/", $email);
    
    $number = $_POST['number'];
    $isValid3 = preg_match("/\+[0-9]{3}\-[0-9]{2}\-[0-9]{3}\-[0-9]{2}\-[0-9]{2}/", $number);
    
    $whitespace = $_POST['whitespace'];
    $message1 = preg_replace("/\s/", "", $whitespace);
    
    $nonnumeric = $_POST['nonnumeric'];
    $message2 = preg_replace("/[^0-9,.]/", "", $nonnumeric);
    
    $newline = $_POST['newlines'];
    $message3 = preg_replace("/\n/", "", $newline);
    
    $bracket = $_POST['brackets'];
    $message4 = preg_split("/\[|\]/", $bracket);
}
?>

<html>
    <head>
        <title>Lab #5: Regular expression</title>
        <meta charset="windows-1251">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                font-size: 18px;
                font-family: "Georgia";
            }
            input{
                margin-top: 5px;
            }
            textarea{
                margin-top: 5px;
                width: 50%;
                height: 50px;
                border: 1px solid purple;
            }
            input[type=text]{
                border: 1px solid purple;
                width: 50%;
                height: 30px;
            }
            input[type=submit]{
                border: 3px solid #C2E9E9;
                background-color: #E8FBFB;
            }
            .message{
                color: green;
            }
            .error{
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="main_wrapper">
            <form action="request.php" method="POST">
                <label>Enter text: </label>
                <input type="text" name="quick" value="<?=$quick?>"/><span class="<?php if($isValid1) print "message"; else print "error";?>"><?php if($isValid1) print "Correct"; else print "Incorrect";?></span><br/>
                <label>Enter email: </label>
                <input type="text" name="email" value="<?=$email?>"/><span class="<?php if($isValid2) print "message"; else print "error";?>"><?php if($isValid2) print "Correct"; else print "Incorrect";?></span><br/>
                <label>Enter number: </label>
                <input type="text" name="number" value="<?=$number?>"/><span class="<?php if($isValid3) print "message"; else print "error";?>"><?php if($isValid3) print "Correct"; else print "Incorrect";?></span><br/>
                <label>Enter text: </label>
                <input type="text" name="whitespace" value="<?=$whitespace?>"/><span class="message"><?php isset($message1)? print "$message1" : "" ?></span><br>
                <label>Enter text: </label>
                <input type="text" name="nonnumeric" value="<?=$nonnumeric?>"/><span class="message"><?php isset($message2)? print "$message2" : "" ?></span><br>
                <label>Enter text: </label>
                <textarea name="newlines"><?=$newline?></textarea><span class="message"><?php isset($message3)? print "$message3" : "" ?></span><br>
                <label>Enter text: </label>
                <input type="text" name="brackets" value="<?=$bracket?>"/><span class="message"><?php isset($message4)? print "$message4[1]" : "" ?></span><br>
                <input type="submit" value="Send"/><br/>

            </form>
        </div>
    </body>
</html>

