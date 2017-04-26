<?php  
define("TAG", "0");
require('connection.php');
$data_email = $_REQUEST['email'];
$data_msg = $_REQUEST['msg'];
$msg=     end($data_msg);

$server_key = 'AIzaSyA4zpq0hHjPvH6pO5jN0RU0E-lu87E1ISo';
// //FCM api URL
$url = 'https://fcm.googleapis.com/fcm/send';

for($i=0;$i<count($data_email);$i++)
 {
      //echo $i.' -id :',$data_email[$i];
      $val = "select device_id ,os_type from users  where ( email = '$data_email[$i]')";
       $result = pg_query($dbconn,$val);
      $data= pg_fetch_all($result);
      //print_r($data);
      $id1 = $data['0']['device_id'];
      $os_type= $data['0']['os_type'];
      
      if($os_type == "android")
      {
          //$id1='eLMqyJOoDgk:APA91bFSm8gA2vCaJJsjxCEl0b0RzlA7eSSpYO5sKFO8PvXzYLdvzxQOvpEp7cGhFCWGyMDe40TgL2sb74vyA0iixvmLJicva_n-bEsNXAkROOBUuSW5Iy0LgMaE49fZD4xt4_doeTEB';
        $fields = array (
            'registration_ids' => array($id1),
            'data' => array( "title" =>  "PoochPlay",
                             "body" =>  $msg,
                             "type"=>TAG
                                    ),

            'notification' => array( "body" =>  $msg,
                                       "title" => "PoochPlay", 
                                       "icon"=>"icon",
                                       "tag"=>TAG
                                     )
                );
        //header with content_type api key
        $headers = array('Content-Type:application/json',
        'Authorization:key='.$server_key);
      
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
          die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        print_r($data_msg);
      }
      
      else if($os_type == "ios")
      {


      }


      

  }
?>