<?php

/*  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 	
	wizGrade V 1.1 (Formerly SDOSMS) is Developed by Igweze Ebele Mark | https://www.iem.wizgrade.com 
	https://www.wizgrade.com | Release Date � 2nd April, 2019
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 	
	Copyright 2014-2019 IGWEZE EBELE MARK | https://www.iem.wizgrade.com 
	
	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at

		http://www.apache.org/licenses/LICENSE-2.0

	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
	wizGrade School App is Dedicated To Almighty God, My Amazing Parents ENGR Mr & Mrs Igweze Okwudili Godwin, 
	To My Fabulous and Supporting Wife Mrs Igweze Nkiruka Jennifer
	and To My Inestimable Sons Osinachi Michael, Ifechukwu Othniel and My Unborn lil Child.  
	
	WEBSITE 					PHONES												EMAILS
	https://www.wizgrade.com	+234 - 80 - 30 716 751, +234 - 80 - 22 000 490 		info@wizgrade.com	
	
	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Page/Code Explanation~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	This script handle users logout
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

session_id();

session_start();

		define('wizGrade', 'igweze');  /* define a check for wrong access of file */

        require 'configwizGrade.php';  /* load wizGrade configuration files */	 
		 
		$_SESSION = array();

		if (ini_get("session.use_cookies")) {
    		$params = session_get_cookie_params();
    		setcookie(session_name(), '', time() - 42000,
        		$params["path"], $params["domain"],
        		$params["secure"], $params["httponly"]
    		);
		}
		
		session_unset();	
		session_destroy();
		
		/*echo "<script type='text/javascript'> 
		
			parent.ifeOsiFrame.location.href  = '$wizGradeLogOutDir'; 
			window.location.href  = '$wizGradeLogOutDir'; 
			
			parent.ifeOsiFrame.location.reload();  			
			window.location.reload(true);
			
		</script>"; exit; 	
		*/	
		
		echo "<script type='text/javascript'> window.location.href = '$wizGradeLogOutDir';</script>";exit;  

?>
