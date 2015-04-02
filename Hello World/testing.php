<?php
    $con=mysqli_connect("localhost","root","root","LineBuddy");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $counta=0;
    $StoreResult = mysqli_query($con,"SELECT * FROM storeDetails");
    
    
    
    while($row = mysqli_fetch_array($StoreResult,MYSQL_ASSOC))
    {
        $arraaa=explode(',',$row['coupon']);
        $couponCount=0;
        foreach($arraaa as $values)
        {
            $CouponResult = mysqli_query($con,"SELECT * FROM couponDetails where couponId=$values");
            while($Couponrow = mysqli_fetch_array($CouponResult,MYSQL_ASSOC))
            {
                $CopnArr[$couponCount]=$Couponrow;
                
            }
            $couponCount++;
        }
        
        $arr[$counta]=$row;
        
       
        
        array_push($arr[$counta]['coupons']=$CopnArr);
        
//        array_push($arr[$counta],["coupons"=>$CopnArr]);
        
        
//        $stack = array("orange", "banana");
//        array_push($stack, "apple", "raspberry");
       // print_r($arr);
        
        
        
        $CopnArr=null;
        $counta++;
    }
    echo json_encode($arr);
    
    
    mysqli_close($con);
    ?>