<?php
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"], 1);

  $conn = new mysqli($server, $username, $password, $db);
  if(!$conn){
    die("error");
   }
  $query_str = "SELECT * FROM tbl_user WHERE status = 'A'";
  $result = $conn->query($query_str);
  while($row = $result->fetch_assoc()){
    echo $row['id']." ".$row['username']." ".$row['password']."<br/>";
  }
?>
