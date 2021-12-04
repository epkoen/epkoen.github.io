<?php
/* References:
    1.https://www.w3resource.com/php-exercises/challenges/1/php-challenges-1-exercise-20.php
*/
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $hamming = $_GET['number'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    // Converts input to ASCII
    $a = ord($_GET['a']);
    $b = ord($_GET['b']);
    $height = $_POST['height'];
    $radius = $_POST{'radius'};
    // Hamming number function adapted from reference #1
    function is_hamming_numbers($x)
    {
        if ($x == 1)
    	{
    		return True;
    	}
    	if ($x % 2 == 0)
    	{
    		return is_hamming_numbers($x/2);
    	}
    	if ($x % 3 == 0)
    	  {
    		return is_hamming_numbers($x/3);
    	  }
    	if ($x % 5 == 0)
    	{
    		return is_hamming_numbers($x/5);
    	}
       return False;
    }
    function validatePassword($user, $password){
        if($user == "test" && $password == "pass"){
            print "Credentials validated with POST";
        } else {
            print "Username or password is incorrect";
        }
    }
    function generateList($a,$b){
        $Characters = array();
        if($a < $b){
            for($i=$a;$i<=$b;$i++){
                $Characters[] = chr($i);
            }
            printList($Characters);
        }
        if($a > $b){
            for($i=$a;$i>=$b;$i--){
                $Characters[] = chr($i);
            }
            printList($Characters);
        }
    }
    function printList($Array){
        $List = implode(', ',$Array);
        print_r("Output:{".$List."}");
    }
    if ($fname != NULL && $lname != NULL) {
        print "Hello $fname $lname, welcome to my PHP playground, designed to simulate the value of server-side development and practical use in web development!";
    }
    if (is_numeric($hamming)){
        if(is_hamming_numbers($hamming)){
            print "$hamming is a Hamming number!";
        } else {
            print "$hamming is not a Hamming number!";
        }
    } elseif ($hamming != NULL){
        print "Invalid Input, Please enter a number.";
    }
    if ($user != NULL && $password != NULL){
        validatePassword($user, $password);
    }
    if ($a != NULL && $b != NULL){
        generateList($a,$b);
    }
    if (is_numeric($height) && is_numeric($radius)){
        $area = (2*pi()*$radius*$height) + (2*pi()*($radius*$radius));
        print number_format($area,2,".",",");
    } elseif ($height != NULL || $radius != NULL ){
        print "Invalid input, please enter a number.";
    }
?>
