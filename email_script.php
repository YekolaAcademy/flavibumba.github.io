<?PHP

//variables
$from="flavib@ymail.com";
$name=$_POST['name'];
$email=$_POST['email'];
$number=$_POST['number'];
$discourse=$_POST['discourse'];

//function
mail($name, $email, $number, $discourse, "From:".$from);

print "Your message has been sent: </br>$name</br>$discourse ";

?>