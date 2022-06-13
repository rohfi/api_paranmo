<?php

  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: access");
  header("Access-Control-Allow-Methods: POST");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  $db_host = '34.69.122.100';
  $db_name = 'paranmo';
  $db_username = 'root';
  $db_password = 'paranmo1234';
  $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
  // input name
  $name = $_POST['name_plant'];

  if($_SERVER["REQUEST_METHOD"] != "POST"){
    echo json_encode(array('error'=>0, 'status'=>404 ,'message'=>'Page Not Found!!'));
  }
  else if(empty($name)){
    echo json_encode(array('error'=>0, 'status'=>422 ,'message'=>'Name is empty!!'));
  }
  else{
    $sql = "SELECT * FROM article where name_plant = '$name'";
    $query = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($query)){
      $item = array(
        'id' =>$data['id'],
        'name' =>$data['name'],
        'plant_name' =>$data['name_plant'],
        'latin_name' =>$data['name_latin'],
        'benefit' =>$data['benefit'],
        'description' => $data['description'],
        'photo_url' => $data['url_photo'],
        "createdAt" => $data['date']
      );
    }
    $respons = array(
      'success' => 1,
      'status' => 201,
      'message' => 'Get article by name successfully', 
      'article' => $item
    );
    echo json_encode($respons);
  }
?>
