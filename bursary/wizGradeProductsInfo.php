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
	This script handle school product information
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

session_id();

session_start();

     define('wizGrade', 'igweze');  /* define a check for wrong access of file */

         require 'configwizGrade.php';  /* load wizGrade configuration files */
		 
		 try {
		 
				$productsDataArr = productsData($conn);  /* school products array */
				$productsDataCount = count($productsDataArr);
				
		 }catch(PDOException $e) {
  			
					wizGradeDie( 'Ooops Database Error: ' . $e->getMessage());
			 
		 }		

		 
?>
				<script type='text/javascript'> $('#paginate-page').trigger('click');  /*  paginate table using Jquery dataTable */ </script>
				
				<!-- table -->
				<table  class='table table-hover style-table' id='wizGradePageTB'>
						<thead><tr>
                        <th>S/N</th> 
                        <th class='text-left'>Category</th> 
						<th class='text-left'>Title</th> 
						<th class='text-left'>Price</th> 
						<th class='text-left'>Date</th> 
						<th class='text-left'>Status</th> 
						<th class='text-left'>Tasks</th>
                        </tr></thead> <tbody>


        <?php
						
						if($productsDataCount >= $fiVal){  /* check array is empty */		
														
								
								for($i = $fiVal; $i <= $productsDataCount; $i++){  /* loop array */	
								
									$productID = $productsDataArr[$i]["pID"];
									$cat_id = $productsDataArr[$i]["cat_id"];
									$price = $productsDataArr[$i]["p_price"];
									$p_title = htmlspecialchars_decode($productsDataArr[$i]["p_title"]);
									$p_description = htmlspecialchars_decode($productsDataArr[$i]["p_description"]);
									$p_status = $productsDataArr[$i]["p_status"];
									$p_date = $productsDataArr[$i]["p_date"];
									
									$productCategoryInfoArr = productCategoryInfo($conn, $cat_id);  /* school products category information */
									$productCategory = $productCategoryInfoArr[$fiVal]['product'];
									
									$productID = trim($productID);									
									$pStatus = $productStatusArr[$p_status];						
									
									$p_date = date("j M Y", strtotime($p_date));
									
									$price = wizGradeCurrency($price, $curSymbol);  /* school currency information*/								
						
									$serailNo++;
								

$productsData =<<<IGWEZE
        
									<tr id="row-$productID" >
									<td class='text-left' width="5%">$serailNo</td> 
									<td class='text-left' width="15%"> $productCategory </td> 
									<td class='text-left' width="30%"> $p_title  </td> 
									<td class='text-left' width="15%"> $price</td> 						
									<td class='text-left' width="15%"> $p_date </td> 		
									<td class='text-left' width="15%"> $pStatus </td> 
									
									<td  class='text-left' width="5%"> 
									
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button">
										<i class="fa fa-wrench"></i> <span class="caret"></span></button>
											<ul role="menu" class="dropdown-menu pull-right"> 
											
													<li>
														<a href='javascript:;' id='$productID' class ='viewProducts'>
														<button class="btn btn-success btn-xs"><i class="fa fa-search-plus"></i></button> View</a>
													</li>
													<li class="divider"></li>						
													<li>					
													<a href='javascript:;' id='$productID' class ='editProducts'>
													<button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button> Edit</a>
													</li>
													<li class="divider"></li>
													<li>
													<a href='javascript:;' id='wizGrade-$productID-$productCategory' class ='removeProducts'> 
													<button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button> Remove</a>			
													</li> 
													
											</ul>        
													
									</div><!-- /btn-group -->
									
									
									</td>
									</tr>
		
IGWEZE;
                               
									echo $productsData; 

		                        } 
								
						}



				
          ?>
                        
                        
                    </tbody>
				</table>
				<!-- / table -->
						