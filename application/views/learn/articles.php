
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Model Example</title>
</head>
<body>
	
	<table border="1">
		<tr>
			<td>ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Created Date</td>
		</tr>
		<?php
		if(!empty($articles)){
			foreach($articles as $article){
		 ?>
		 <tr>
		 	<td><?php echo $article['id']; ?></td>
		 	<td><?php echo $article['title']; ?></td>
		 	<td><?php echo $article['author']; ?></td>
		 	<td><?php echo $article['created_at']; ?></td>
		 </tr>
		<?php }}
		else
		{
			?>
			<tr>
				<td>Redords not found</td>
			</tr>
			<?php
		}?>
	</table>

<!-- <?php 
echo word_limiter($string,4);
?> -->

</body>
</html>