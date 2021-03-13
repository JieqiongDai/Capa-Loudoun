<?php 
if(isset($_POST['submit'])){
    $to = $receiving_email_address; // this is your Email address
    $from_email = $_POST['email']; // this is the sender's Email address
    $from_name = $_POST['name'];
    $subject = $_POST['subject'];
    #$to = "email@example.com"; // this is your Email address
    #$from = $_POST['email']; // this is the sender's Email address
    #$first_name = $_POST['first_name'];
    #$last_name = $_POST['last_name'];
    #$subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $from_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $from_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from_email;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $from_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

#<!DOCTYPE html>
#<head>
#<title>Form submission</title>
#</head>
#<body>

#<form action="" method="post">
#First Name: <input type="text" name="first_name"><br>
#Last Name: <input type="text" name="last_name"><br>
#Email: <input type="text" name="email"><br>
#Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
#<input type="submit" name="submit" value="Submit">
#</form>

#</body>
#</html> 
