<html>
	<head>
		<title>Basic LAMP Test</title>
	</head>
	<body>
		<?php
		echo $_SERVER['SERVER_ADDR'];
		try {
		  $conn = new PDO('mysql:host=192.168.56.104;dbname=test;port=3306', 'neal', 'zildjian');
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  echo "Connection successful";
		  if(empty($_GET["page"])):
		  	$page = 1;
			else:
				$page=$_GET["page"];
			endif;

			$sth = $conn->prepare('SELECT * FROM pages WHERE id = :id');
			$sth->bindParam(':id', $page);
			$sth->execute();
			$row = $sth->fetch(PDO::FETCH_ASSOC);
			 ?>

			<h1><?php echo $row['title'];?></h1>
			<p><?php echo $row['content'];?></p>

	<?php 
		} catch (PDOException $er) {
		  echo "Error!: " . $er->getMessage();
		}
		?>
	</body>
</html>