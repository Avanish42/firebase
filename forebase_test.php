<?php 

#API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AAAANYa3Tpo:APA91bFFgq6p2EqPi2OPhNFYdHChomOILYJr4mqbPGQANq5w6axeEZwojxfkL0Iyknsvte825OgjfhyJ7dnIMVOzS7uRMqE502y0amwipgpw6GM5yeQAilUUgiCASrvkYpc8vwNj9EQk' );
    $registrationIds = 'deeSDmxSi50:APA91bHNawMFOeafW6TDD3xKfgnEP0rKZpLOJjYIiVdE5zMxK2seKoc8rPnqzcbuc25ASKNTUm73kvUUbD_ElB07Z_VDUhv3a7Cr-8390Q8AAhErXJKIc8qxeBulv3vx7bdXldh0Dj85';
#prep the bundle
     $msg = array
          (
        'body'     => 'Body  Of Notification',
        'title'    => 'Title Of Notification',
                 'icon'    => 'myicon',/*Default Icon*/
                  'sound' => 'mySound'/*Default sound*/
          );
    $fields = array
            (
                'to'        => $registrationIds,
                'notification'    => $msg
            );
    
    
    $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );
#Send Reponse To FireBase Server    
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
#Echo Result Of FireBase Server
        echo "3rd try";
echo $result;

// =======================================================
// $server_key ='AIzaSyDx-dvXr-M29201oRPCMfXWYFpoFp6uFh0';
//         // //FCM api URL
//         $url = 'https://fcm.googleapis.com/fcm/send';
// $id1='deeSDmxSi50:APA91bHNawMFOeafW6TDD3xKfgnEP0rKZpLOJjYIiVdE5zMxK2seKoc8rPnqzcbuc25ASKNTUm73kvUUbD_ElB07Z_VDUhv3a7Cr-8390Q8AAhErXJKIc8qxeBulv3vx7bdXldh0Dj85';
//         $fields = array (
//             'registration_ids' => array($id1),
//             'data' => array( "title" =>  "Behindbars",
//                              "body" =>  "test",
//                              "type"=>0
//                                     ),

//            'notification' => array( "body" =>  "test",
//                                        "title" => "Behindbars",
//                                        "icon"=>"icon",
//                                        "tag"=>0
//                                      )
//                 );
//         //header with content_type api key
//         $headers = array('Content-Type:application/json',
//         'Authorization:key='.$server_key);
      
//        $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $url);
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
//         $result = curl_exec($ch);
//         print_r($result);
//         if ($result == FALSE) {
//           die('FCM Send Error: ' . curl_error($ch));
//         }
//         curl_close($ch);








 //====================================================================================

          // $tokens = array("deeSDmxSi50:APA91bHNawMFOeafW6TDD3xKfgnEP0rKZpLOJjYIiVdE5zMxK2seKoc8rPnqzcbuc25ASKNTUm73kvUUbD_ElB07Z_VDUhv3a7Cr-8390Q8AAhErXJKIc8qxeBulv3vx7bdXldh0Dj85");

          //  //Title of the Notification.
          //   $title = "behind";

          //  //Body of the Notification.
          //   $body = "this is behindbars app";

          //  //Creating the notification array.
          //   $notification = array('title' =>$title , 'text' => $body);

          //  //This array contains, the token and the notification. The 'to' attribute stores the token.
          //   $arrayToSend = array('registration_ids' => $tokens, 'notification' => $notification,'priority'=>'high');

          //  //Generating JSON encoded string form the above array.
          //   $json = json_encode($arrayToSend);
          //   //Setup headers:
          //   $headers = array();
          //   $headers[] = 'Content-Type: application/json';
          //   $headers[] = 'Authorization: key= AIzaSyDx-dvXr-M29201oRPCMfXWYFpoFp6uFh0'; // key here

          //  //Setup curl, add headers and post parameters.
          //  // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
          //   $ch = curl_init();
          //   curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );            
          //  curl_setopt( $ch,CURLOPT_POST, true );
          //   curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
          //   curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );                          
          //  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
          //   curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);      

          //  //Send the request
          //   $response = curl_exec($ch);
          //   //print_r($arrayToSend);
          //   //Close request
          //   curl_close($ch);
          //   echo "pre";
          //   print_r($response);
?>