<?php
	$hostname = "localhost";

	$username = "root";

	$password = "";

	$mysqli = @new mysqli($hostname, $username, $password);

	if (mysqli_connect_errno()) {
		echo "Unable to connect" . mysqli_connect_error() . "<br/>";
		exit();
	} else {
		echo "Connected Successfully" . "<br/>";

		$sql = "CREATE DATABASE db_chinarestaurant";

		if ($mysqli->query($sql) === true) {
			echo "Database created successfully<br/>";
		} else {
			echo $sql. " " . $mysqli->error . "<br/>";
		}

		$sql = "USE db_chinarestaurant";

		if ($mysqli->query($sql) === true) {
			echo "Using db_chinarestaurant<br/>";
		} else {
			echo $sql. " " . $mysqli->error . "<br/>";
		}

		$sql = "CREATE TABLE customers (
				customer_id INT NOT NULL AUTO_INCREMENT,
				customer_name VARCHAR(50),
        customer_surname VARCHAR(50),
				customer_email VARCHAR(50),
				customer_gender VARCHAR(20),
				PRIMARY KEY(customer_id))";

		if ($mysqli->query($sql)) {
			echo "Created customers table<br/>";
		} else {
			echo $sql . " " . $mysqli->error . "<br/>";
		}

		$sql = "CREATE TABLE reviews (
				review_id INT NOT NULL AUTO_INCREMENT,
				review_title VARCHAR(20) NOT NULL,
        review_content VARCHAR(200) NOT NULL,
				review_user INT NOT NULL,
				review_rating DOUBLE NOT NULL,
        CONSTRAINT fk_reviews FOREIGN KEY(review_user) REFERENCES customers(customer_id) ON DELETE CASCADE,
				PRIMARY KEY(review_id))";

		if ($mysqli->query($sql) === true) {
			echo "Created reviews table<br/>";
		} else {
			echo $sql . " " . $mysqli->error . "<br/>";
		}

		$mysqli->close();
	}
?>
