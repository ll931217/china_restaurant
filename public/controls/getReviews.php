<?php
  header("Content-Type: application/json");
  include 'connect.php';

  $sql = "SELECT * FROM reviews, customers WHERE review_user = customer_id";
  $datas = "";
  $x = 0;

  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $datas[$x] = array("fname" => $row["customer_name"], "lname" => $row["customer_surname"], "email" => $row["customer_email"], "gender" => $row["customer_gender"], "title" => $row["review_title"], "content" => $row["review_content"], "rating" => $row["review_rating"]);

      $x++;
    }
  }

  $con->close();

  echo json_encode($datas);
?>
