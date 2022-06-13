<?php

  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: access");
  header("Access-Control-Allow-Methods: POST");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  $db_host = '34.101.119.70';
  $db_name = 'paranmo';
  $db_username = 'root';
  $db_password = 'paranmo1234';
  $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
    
  if($_SERVER["REQUEST_METHOD"] != "GET"):
        echo json_encode(array('success'=>0, 'status'=>404 ,'message'=>'Page Not Found!!'));
  else:
    $sql = "SELECT * FROM article order by id desc";
    $query = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($query)){
      $item[] = array(
        'id' =>$data['id'],
        'plant_name' =>$data['name_plant'],
        'latin_name' =>$data['name_latin'],
        'benefit' =>$data['benefit'],
        'description' => $data['description'],
        'photo_url' => 'upload/' . $data['url_photo'],
        "createdAt" => $data['date']
      );
    }
    $respons = array(
      'success' => 1,
      'status' => 201,
      'message' => 'Get articles successfully', 
      'article' => $item
    );
    echo json_encode($respons);
  endif;
?>