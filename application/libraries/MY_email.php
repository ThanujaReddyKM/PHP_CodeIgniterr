<?php
class MY_email extends CI_email{

public function mytest(){
echo" I am a extending library";

}
}

?>


<?php

//When we r doing override then we should remove My_email  extends and we should rename the file name aslo to only email.

// class CI_email{

// public function mytest(){
// echo" I am a extending library";
	
// }
// }

?>