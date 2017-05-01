<?php function validateComplete($fieldname,  $pattern = null){

	 if(!($pattern == null)){
		
		if(!(preg_match($pattern,  $fieldname))){
			return false;
			}
		else{
			echo "";
			return true;
			}
		}	
		
	else if (empty($fieldname)|| $fieldname == " "){

		return false;
		}
		
		else{
			echo "";
			return true;
		}
		
	}
	?>