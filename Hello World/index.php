 <?php
  $server='localhost:8888';
    $user='root';
    $pass='root';
    $conn=mysql_connect($server,$user,$pass);
    if (!$conn) {
        die('Could not Connect To Database'.mysql_error());
    }
    mysql_select_db('LineBuddy');
    
    
    $sql="SELECT * FROM storeDetails";
    
    $query=mysql_query($sql,$conn);
    
    $arr=array();
    $coupens=array();
    $storeDetails=array();
    
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
    		array_push($storeDetails, $arr);
    		$arr['Coupens']=$row['coupon'];
    	
    		array_push($coupens, $arr['Coupens']);
//     		echo json_encode($arr['Coupens']);
    
		
    	}
    }
   
  
    $ids = implode(',', $coupens); 
   
    
    $Second = "SELECT * FROM couponDetails WHERE couponId IN ($ids)";
     

//     echo json_encode($storeDetails);
    
    $query1=mysql_query($Second,$conn);
    
    if(!$query1 )
    
    {
    	die('Could not create table: ' . mysql_error());
    }
    
    else
    {
    
    		while($row = mysql_fetch_array($query1,MYSQL_ASSOC))
    		{
    			$arr1[$countStorelist1]=$row;
   			echo json_encode($arr1);
    			
    		}
    	
    
    }
    
    mysql_close($conn);
    
    
    ?>
