<?php
    $server='localhost:8888';
    $user='root';
    $pass='root';
    $conn=mysql_connect($server,$user,$pass);
    if (!$conn) {
        die('Could not Connect To Database'.mysql_error());
    }
    mysql_select_db('LineBuddy');
    
    
    $json=file_get_contents("php://input");
    $data=json_decode($json,true);
    
//    $storeId=$data['storeId'];
//    $Name=$data['Name'];
//    $coupon=$data['coupon'];
//    $description=$data['description'];
//    $rewardPoints=$data['rewardPoints'];
//    $liners=$data['liners'];
//    $waitTime=$data['waitTime'];
//    $address=$data['address'];
//    $latitude=$data['latitude'];
//    $longitude=$data['longitude'];
//    $imagePath=$data['imagePath'];
//    $discount=$data['discount'];
//    $distance=$data['distance'];
//    $status=$data['status'];
//    $couponId=$data['couponId'];
   
    
//  $sql="INSERT INTO storeDetails(storeId,Name,coupon,description,rewardPoints,liners,waitTime,address,latitude,longitude,imagePath,discount,distance,status,couponId)VALUES (1)";
    
    
    $sql="SELECT * FROM storeDetails";
    
     $sql1="Select * from couponDetails where couponId IN($arrCoupons)";
    
    $coupons="SELECT coupon FROM storeDetails";
//     $query3=mysql_query($coupons,$conn);
//     $countStorelist3=0;
//     if(!$query3)
    
//     {
//         die('Could not create table: ' . mysql_error());
//     }
    
//     else
//     {
//         while($row = mysql_fetch_array($query3,MYSQL_ASSOC))
//         {
//             //            $arr=array("storeId"=>$row['storeId'],"Name"=>$row['Name'],"coupon"=>$row['coupon'],"description"=>$row['description'],"rewardPoints"=>);
//             $arrCoupons[$countStorelist3]=$row;
//             echo json_encode($arrCoupons);

//         }
        
//     }
   

    
    
//     foreach($arrCoupons as $values)
//     {
//         $sql1="Select * from couponDetails where couponId in($arrCoupons)";
//            }
    
    

    $query=mysql_query($sql,$conn);
    $query1=mysql_query($sql1,$conn);

    if(!$query )

    {
        die('Could not create table: ' . mysql_error());
    }
    
    else
    {
        while($row = mysql_fetch_array($query,MYSQL_ASSOC))
        {
//            $arr=array("storeId"=>$row['storeId'],"Name"=>$row['Name'],"coupon"=>$row['coupon'],"description"=>$row['description'],"rewardPoints"=>);
            $arr[$countStorelist]=$row;
            echo json_encode($arr);
            
            while($row = mysql_fetch_array($query1,MYSQL_ASSOC))
            {
                $arr1[$countStorelist1]=$row;
                echo json_encode($arr1);
                 //$countStorelist1++;
            }
        }
    }
            mysql_close($conn);
    ?>

