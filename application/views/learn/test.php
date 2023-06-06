<h1>Hello</h1>
<h2>Sorun</h2>
Name:<?php echo $name;?><br>
Email:<?php echo $email;?><br><br>

<?php 
	foreach($nameArray as $key => $value){
		echo $value."<br>";
	}

	print_r($articleArray);
?>