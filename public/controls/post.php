<?php
  header("Content-Type: application/json");

  include "connect.php";

  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $title = mysqli_real_escape_string($con, $_POST['title']);
  $rating = mysqli_real_escape_string($con, $_POST['rating']);
  $message = mysqli_real_escape_string($con, $_POST['message']);

  echo $fname . ";";
  echo $lname . ";";
  echo $email . ";";
  echo $gender . ";";
  echo $title . ";";
  echo $rating . ";";
  echo $message . ";";

  $sql = "SELECT * FROM customers WHERE customer_email = '$email'";
  $result = $con->query($sql);
  $id = 0;
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['customer_id'];
  } else {
    $sql = "INSERT INTO customers(customer_name, customer_surname, customer_gender, customer_email) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ssss', $fname, $lname, $gender, $email);
    $stmt->execute();
    $stmt->close();

    $sql = "SELECT * FROM customers WHERE customer_email = '$email'";
    $result = $con->query($sql);
    $id = 0;
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $id = $row['customer_id'];
    }
  }

  $sql = "INSERT INTO reviews(review_title, review_content, review_user, review_rating) VALUES (?, ?, ?, ?)";

  $stmt = $con->prepare($sql);
  $stmt->bind_param('ssid', $title, $message, $id, $rating);
  $stmt->execute();
  $stmt->close();

  header('location: ../reviews');
?>
