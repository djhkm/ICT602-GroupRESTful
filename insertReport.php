<?php
	require_once 'db.php';

	$filteredPOST = filter_input_array(INPUT_POST,
		[
			'lat' => FILTER_SANITIZE_NUMBER_FLOAT,
			'lon' => FILTER_SANITIZE_NUMBER_FLOAT,
			'hazardID' => FILTER_SANITIZE_NUMBER_INT,
			'userID' => FILTER_SANITIZE_NUMBER_INT,
			'dateTime' => FILTER_SANITIZE_STRING
		]
	);
	
	//$ = $filteredPOST[''];
	$userType = $filteredPOST['userType'];
	$lat = $filteredPOST['lat'];
	$lon = $filteredPOST['lon'];
	$hazardID = $filteredPOST['hazardID'];
	$userID = $filteredPOST['userID'];
	$dateTime = $filteredPOST['dateTime'];
	
	if(isset($userType)){
		$query = "INSERT INTO Report(HazardID, UserID, time_Stamp, Latitude, Longitude)
					VALUES($hazardID, $userID, $dateTime, $lat, $lon);";
					
		$result = mysqli_query($conn, $query);
		
		if($result){
			echo mysqli_error($conn);
		}else{
			echo "Report successfully submitted.";
		}
	}else{
		die("Please login.");
	}
?>