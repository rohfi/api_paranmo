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
    
  if($_SERVER["REQUEST_METHOD"] != "GET"):
        echo json_encode(array('success'=>0, 'status'=>404 ,'message'=>'Page Not Found!!'));
  else:
    $sql = "SELECT * FROM product order by date_product desc";
    $query = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($query)){
      $item[] = array(
        'id' =>$data['id'],
        'image_product' =>$data['image_product'],
        'name_product' =>$data['name_product'],
        'price_product' =>$data['price_product'],
        'location' => $data['location'],
        'star_product' => $data['star_product'],
        "name_product_full" => $data['name_product_full'],
        "date_product" => $data['date_product'],
        "insight_product" => $data['insight_product'],
        "time_booking_product" => $data['time_booking_product'],
        "booking_product" => $data['booking_product'],
        "description_product" => $data['description_product'],
        "star_score_product" => $data['star_score_product'],
        "score_product" => $data['score_product'],
        "time_product_insight" => $data['time_product_insight'],
        "name_person_product" => $data['name_person_product'],
        "detail_insight" => $data['detail_insight'],
        "name_outlite" => $data['name_outlite'],
        "logo_outlite" => $data['logo_outlite']
      );
    }
    $respons = array(
      'success' => 1,
      'status' => 201,
      'message' => 'Get product successfully', 
      'article' => $item
    );
    echo json_encode($respons);
  endif;
?>
