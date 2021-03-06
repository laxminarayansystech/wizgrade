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
	This script handle school scratch card pins
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

session_id();

session_start();

     define('wizGrade', 'igweze');  /* define a check for wrong access of file */

        require 'configINwizGrade.php';  /* load wizGrade configuration files */	  
		 
					try {
				 
						$cardPinDataArr = cardPinData($conn);  /* school cardPin array */ 
						$cardPinDataCount = count($cardPinDataArr);
						
					}catch(PDOException $e) {
					
							wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
					 
					}	
						
?>

  
				<script type='text/javascript'> $('#paginate-page').trigger('click');  /*  paginate table using Jquery dataTable */ </script> 
				<button class="paginate-page display-none"  type="submit">Paginate Page</button> 
				
				<!-- table -->
				<table  class='table table-hover style-table' id="wizGradePageTB">
						<thead><tr>
                        <th>S/N</th>                         
						<th class='text-left'>Card Pin</th> 						 
						<th class='text-left'>Serial No.</th> 
						<th class='text-left'>Status</th>
						<th class='text-left'>Tasks</th>
                        </tr></thead> <tbody>


<?php
						
							if($cardPinDataCount >= $fiVal){  /* check array is empty */		
														
								
								for($i = $fiVal; $i <= $cardPinDataCount; $i++){  /* loop array */	
									
									$iiii_id = $cardPinDataArr[$i]["iiii_id"]; 
									$iiii_pin_iiii = $cardPinDataArr[$i]["iiii_pin_iiii"];
									$iiii_serial_iiii = $cardPinDataArr[$i]["iiii_serial_iiii"]; 
									$cardPin = $cardPinDataArr[$i]["cardPin"]; 
									$iiii_status = $cardPinInfoArr[$i]["iiii_status"];
									
									if($iiii_status == ""){ $iiii_status = $i_false; }

									$cardStatus = $cardStatusArr[$iiii_status]; 
									
									$serailNo++;
								

$cardPinData =<<<IGWEZE
        
									<tr id="row-$iiii_id" >
									<td class='text-left' width="5%">$serailNo</td>  
									<td class='text-left' width="40%"> <b>$iiii_pin_iiii</b>  </td>  
									<td class='text-left' width="35%"> <b>$iiii_serial_iiii</b>  </td>  
									<td class='text-left' width="10%"> <b>$cardStatus</b> </td>  
									<td  class='text-left' width="5%"> 
									
										<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button">
											<i class="fa fa-wrench"></i> <span class="caret"></span></button>
												<ul role="menu" class="dropdown-menu pull-right"> 					
														<li>
															<a href='javascript:;' id='$iiii_id' class ='viewCardPin'>
															<button class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i></button> View</a>
														</li>
														<li class="divider"></li>						
														<li>
														<a href='javascript:;' id='wizGrade-$iiii_id-$cardPin' class ='removeCardPin'> 
														<button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button> Remove</a>			
														</li>
												</ul>		 
														
										</div><!-- /btn-group -->
									
									
									</td>
									</tr>
		
IGWEZE;
                               
		                  		echo $cardPinData;
								
								

		                        } 
								
							}
 
				
?>
                        
                        
                        </tbody>
				</table>
				<!-- / table -->  