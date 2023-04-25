<?php

$oldValue = null;
$oldValue = old('gender');

$objectValue = $patient->gender;

if($oldValue == ''){
	$oldValue = null;
}
if ($objectValue == ''){
	$objectValue = null;
}

$data = "<option value=''>Select Gender</option>";

	if($btnLabel === "Save"){
		if ($oldValue === null && $objectValue === null){
			$data = $data ."<option value='1'>Male</option>";
			$data = $data ."<option value='0'>Female</option>";

		} else if($oldValue !== null && $objectValue === null){
			if($oldValue == 1){
				$data = $data ."<option value= '1' selected>Male</option>";
			} else{
				$data = $data ."<option value= '1'>Male</option>";
			}
			if($oldValue == 0){
				$data = $data ."<option value= '0' selected>Female</option>";
			}else{
				$data = $data ."<option value= '0'>Female</option>";
			}
		}

	} else if($btnLabel === "Update"){
		if($oldValue === null && $objectValue !== null){
			if ($objectValue == 1){
				$data = $data ."<option value= '1' selected>Male</option>";
			} else{
				$data = $data ."<option value= '1'>Male</option>";
			}

			if ($objectValue == 0){
				$data = $data ."<option value= '0' selected>Female</option>";
			}else{
				$data = $data ."<option value= '0'>Female</option>";
			}
		}
		if ($oldValue !== null && $objectValue !== null){
			if($oldValue == 1){
				$data = $data ."<option value= '1' selected>Male</option>";
			} else{
				$data = $data ."<option value= '1'>Male</option>";
			}
			if($oldValue == 0){
				$data = $data ."<option value= '0' selected>Female</option>";
			}else{
				$data = $data ."<option value= '0'>Female</option>";
			}
		}


	}

?>