<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php crud1</title>
</head>
<body>
	<h1>Les joies du CRUD</h1>
	<?php 
	try{
		echo"<h3>Exo 1</h3>"."<br>";
		$dbh = new PDO('mysql:host=localhost; dbname=colyseum','root','root');
		foreach ($dbh->query('SELECT*FROM clients')as $row) {
			echo $row['lastName']." ".$row['firstName']."</br>";
		}
		echo"<h3>Exo 2</h3>"."<br>";
		foreach ($dbh->query('SELECT*FROM shows')as $row) {
			echo $row['title']." ".$row['performer']." ".$row['date'].'</br>';
		}
		echo"<h3>Exo 3</h3>"."<br>";

		foreach ($dbh->query('SELECT*FROM clients LIMIT 0,20')as $row) {
			echo $row['lastName']." ".$row['firstName']."</br>";
		}
		echo"<h3>Exo 4</h3>"."<br>";

		foreach ($dbh->query('SELECT * FROM clients AS client, cards AS card WHERE card.cardNumber = client.cardNumber AND card.cardTypesId = 1')as $row) {
			echo $row['lastName']." ".$row['firstName']."<br/> ";
		}
		echo"<h3>Exo 5</h3>"."<br>";

		foreach ($dbh->query('SELECT*FROM clients WHERE lastName LIKE "M%" ORDER BY lastName ASC;
			')as $row) {
			echo "Nom : ".$row['lastName']." "."Prenom : ".$row['firstName']."</br>";
		}
		echo"<h3>Exo 6</h3>"."<br>";

		foreach ($dbh -> query('SELECT title, performer, date, startTime FROM shows') as $row) {
			echo $row['title']." "." par ".$row['performer']." le ".$row['date']." à ".$row['startTime']."<br/>";
		}
		echo"<h3>Exo 7</h3>"."<br>";

		$dbh=null;
	}catch(PDOException$e){
		print"Erreur!:".$e->getMessage().'</br>';
		die();
	}

	?>
</body>
</html>