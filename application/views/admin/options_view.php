<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Perk CMS</title>
<link href="<?php echo base_url(); ?>assets/css/admin/styles.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/admin/responsive.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>assets/css/admin/mlpmenu/component.css" rel="stylesheet" type="text/css" />
<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="/css/ie8lte.css"/>
<![endif]-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/modernizr.custom.js"></script>
</head>
<body>
<div class="container">
	<div id="splitPaneLeftContainer"></div>
    <div id="splitPaneRightContainer"></div>
                    
<?php // echo $query[0]->option_id; ?>
	<!-- Push Wrapper -->
    <div class="mp-pusher" id="mp-pusher">

        <!-- mp-menu -->
        <nav id="mp-menu" class="mp-menu" >
            <div class="mp-level">
                <h2 class="icon icon-world"></h2>
                	
					 <?php if(isset($image) && $image[0]->account_profile_image!=''){?>
                       
                     <div class="account-logo"><img width="200" height="200" src="<?php echo base_url(); ?>assets/img/account/<?php echo $image[0]->account_profile_image; ?>" /></div>
                        	<?php }else{ ?>
              <div class="account-logo"><img width="200" height="200" src="<?php echo base_url(); ?>assets/img/admin/apple.jpg" /></div>
                            <?php } ?>				
<!--
                	<ul class="leftPaneFilters">
                    	
                    	<li id="searchButtonLI">
                        <form>
                        <input type="text" placeholder="Search"/>
                        <button id="searchButton" type="submit" name="searchButton" value=""></button>
                        </form>
                        </li>
                        <li><select>
                        		<option>Top Level Pages</option>
                                <option>Bottom Level Pages</option>
                                <option>Fun Level Pages</option>
                                <option>Cool Level Pages</option>
                        	</select>
                        </li>
                        <li><button type="button" />View All</button></li>
                    </ul>
                    
                    <div class="leftPaneFiltersDetails">
                    	<p>lorem ipsum dolor sit amet</p>
                    </div>
                    
                	<ul class="cardsBox">
                        <li>
                        	<div class="plusSign">+</div>
                        	<div class="plusSignText">New Page</div>
                        </li>
                    	<li>
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Home</p>
                            <p class="options"><span>Details</span><span>|</span><span>Open</span></p>
                            <div class="status statusGreen"></div>
                        </li>
                        <li>
                            <div class="pill"></div>
                            <p class="label">About</p>
                            <div class="status statusYellow"></div>
                        </li>
                    	<li class="selected">
                        	<div class="pill"></div>
                            <p class="label">Get on Board</p>
                            <div class="status statusGreen"></div>
                        </li>
                    	<li>
                            <div class="pill" style="background-image: url('http://perkapp.offunit.com/img/page-image-sample.png');"></div>
                            <p class="label">Things to Do</p>
                            <div class="status statusRed"></div>
                        </li>
                    	<li>
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Stories</p>
                            <div class="status statusGreen"></div>
                        </li>
					</ul>
					-->
            </div>
            
            <div id="trigger" class="mobileTriggerButton"></div>

        </nav>
        <!-- /mp-menu -->
		


        <div class="scroller"><!-- this is for emulating position fixed of the nav -->
            <div class="scroller-inner">
                <!-- site content goes here -->
                


				<?php $this->load->view('templates/admin/header'); ?>
        
                <main id="contentContainer">
                   
                    
                    <div class="row">
                        <div id="splitPaneLeft" class="col span_8">
                         <?php if(isset($image) && $image[0]->account_profile_image!=''){?>
                       
                     <div class="account-logo"><img width="200" height="200" src="<?php echo base_url(); ?>assets/img/account/<?php echo $image[0]->account_profile_image; ?>" /></div>
                        	<?php }else{ ?>
              <div class="account-logo"><img width="200" height="200" src="<?php echo base_url(); ?>assets/img/admin/apple.jpg" /></div>
                            <?php } ?>
                        	<!-- 
                            <ul class="leftPaneFilters">
                                
                                <li id="searchButtonLI">
                                <form>
                                <input type="text" placeholder="Search"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                </form>
                                </li>
                                <li><select>
                                        <option>Top Level Pages</option>
                                        <option>Bottom Level Pages</option>
                                        <option>Fun Level Pages</option>
                                        <option>Cool Level Pages</option>
                                    </select>
                                </li>
                                <li><button type="button" />View All</button></li>
                            </ul>
                            
                            <div class="leftPaneFiltersDetails">
                                <p>lorem ipsum dolor sit amet</p>
                            </div>
                            
                            <ul class="cardsBox">
                                <li>
                                    <div class="plusSign">+</div>
                                    <div class="plusSignText">New Page</div>
                                </li>
                                <li>
                                    <div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                                    <p class="label">Home</p>
                                    <p class="options"><span>Details</span><span>|</span><span>Open</span></p>
                                    <div class="status statusGreen"></div>
                                </li>
                                <li>
                                    <div class="pill"></div>
                                    <p class="label">About</p>
                                    <div class="status statusYellow"></div>
                                </li>
                                <li class="selected">
                                    <div class="pill"></div>
                                    <p class="label">Get on Board</p>
                                    <div class="status statusGreen"></div>
                                </li>
                                <li>
                                    <div class="pill" style="background-image: url('http://perkapp.offunit.com/img/page-image-sample.png');"></div>
                                    <p class="label">Things to Do</p>
                                    <div class="status statusRed"></div>
                                </li>
                                <li>
                                    <div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                                    <p class="label">Stories</p>
                                    <div class="status statusGreen"></div>
                                </li>
                            </ul>
                            -->
                        </div>

                        <!-- END OF splitPaneLeft -->
        
        
                        <div class="col span_8" id="splitPaneRight">
                            <?php if($this->uri->segment(3) || isset($query)) {?>

                             <h2 class="edit" id="edit"><?php echo $image[0]->account_title; ?></h2>
                            <input type="hidden" id="account_id" name="account_id" value="<?php echo $image[0]->account_id; ?>" />
        
                            <!--
                            <div class="pageNotes">
                                 <div class="note">Involved in 0 Campaigns</div>
                                <button class="editPage">Edit Page</button>
                            </div>
                            -->
                          
                            <form action="<?php echo base_url();?>account_setting/options_add" method="post">
<!-- Credentials -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Credentials</h3><div class="splitPlaneQuickDetails"><?php if(isset($query[0]->agency_option_credentials_licence_number)){ echo $query[0]->agency_option_credentials_licence_number; } ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">License Number</div>
              <div class="formInfo col span_12"><input type="text" name="agency_licence_number" value="<?php if(isset($query[0]->agency_option_credentials_licence_number)){ echo $query[0]->agency_option_credentials_licence_number; } ?>" /></div>
                                    
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Awards</div>
              <div class="formInfo col span_12"><input type="text" name="agency_awards" value="<?php if(isset($query[0]->agency_option_credentials_awards)){ echo $query[0]->agency_option_credentials_awards; } ?>" /></div>
                                    </li>

                                </ul>
                            </div>
<!-- Service Details -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Service Details</h3><div class="splitPlaneQuickDetails"><?php if(isset($query[0]->agency_option_servicedetail_hour_operation)){ echo $query[0]->agency_option_servicedetail_hour_operation; } ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_5">Hours of Operation</div>
             <div class="formInfo col span_11"><input type="text" name="agency_hours_operation" value="<?php if(isset($query[0]->agency_option_servicedetail_hour_operation)){ echo $query[0]->agency_option_servicedetail_hour_operation; } ?>" /></div>
                                    
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_5">Service Area/Cities</div>
             <div class="formInfo col span_11"><input type="text" name="agency_service_area" value="<?php if(isset($query[0]->agency_option_servicedetail_service_area)){ echo $query[0]->agency_option_servicedetail_service_area; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_5">Services Offered</div>
             <div class="formInfo col span_11"><input type="text" name="agency_service_offered" value="<?php if(isset($query[0]->agency_option_servicedetail_services_offered)){ echo $query[0]->agency_option_servicedetail_services_offered; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_5">Brands Offered</div>
             <div class="formInfo col span_11"><input type="text" name="agency_brand_offered" value="<?php if(isset($query[0]->agency_option_servicedetail_brands_offered)){ echo $query[0]->agency_option_servicedetail_brands_offered; } ?>" /></div>
                                    </li>
                                </ul>
                            </div>
<!-- Custom Fields -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Custom Fields</h3><div class="splitPlaneQuickDetails">Expand to view and add details.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 01</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_1" value="<?php if(isset($query[0]->agency_custom_option1)){ echo $query[0]->agency_custom_option1; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 02</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_2" value="<?php if(isset($query[0]->agency_custom_option2)){ echo $query[0]->agency_custom_option2; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 03</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_3" value="<?php if(isset($query[0]->agency_custom_option3)){ echo $query[0]->agency_custom_option3; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 04</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_4" value="<?php if(isset($query[0]->agency_custom_option4)){ echo $query[0]->agency_custom_option4; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 05</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_5" value="<?php if(isset($query[0]->agency_custom_option5)){ echo $query[0]->agency_custom_option5; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 06</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_6" value="<?php if(isset($query[0]->agency_custom_option6)){ echo $query[0]->agency_custom_option6; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 07</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_7" value="<?php if(isset($query[0]->agency_custom_option7)){ echo $query[0]->agency_custom_option7; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 08</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_8" value="<?php if(isset($query[0]->agency_custom_option8)){ echo $query[0]->agency_custom_option8; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 09</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_9" value="<?php if(isset($query[0]->agency_custom_option10)){ echo $query[0]->agency_custom_option9; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 10</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_10" value="<?php if(isset($query[0]->agency_custom_option10)){ echo $query[0]->agency_custom_option10; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 11</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_11" value="<?php if(isset($query[0]->agency_custom_option11)){ echo $query[0]->agency_custom_option11; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 12</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_12" value="<?php if(isset($query[0]->agency_custom_option12)){ echo $query[0]->agency_custom_option12; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 13</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_13" value="<?php if(isset($query[0]->agency_custom_option13)){ echo $query[0]->agency_custom_option13; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 14</div>
                              <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_14" value="<?php if(isset($query[0]->agency_custom_option14)){ echo $query[0]->agency_custom_option14; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 15</div>
                               <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_15" value="<?php if(isset($query[0]->agency_custom_option15)){ echo $query[0]->agency_custom_option15; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 16</div>
                                <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_16" value="<?php if(isset($query[0]->agency_custom_option16)){ echo $query[0]->agency_custom_option16; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 17</div>
                                <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_17" value="<?php if(isset($query[0]->agency_custom_option17)){ echo $query[0]->agency_custom_option17; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 18</div>
                                <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_18" value="<?php if(isset($query[0]->agency_custom_option18)){ echo $query[0]->agency_custom_option18; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 19</div>
                                 <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_19" value="<?php if(isset($query[0]->agency_custom_option19)){ echo $query[0]->agency_custom_option19; } ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Custom Field 20</div>
                                 <div class="formInfo col span_12"><input class=""  type="text" name="custom_option_20" value="<?php if(isset($query[0]->agency_custom_option20)){ echo $query[0]->agency_custom_option20; } ?>" /></div>
                                    </li>
                                </ul>
                            </div>
                            <?php
							$account_hidden_id= $this->uri->segment(3);
							if($account_hidden_id==''){
								$account_hidden_id=$this->session->userdata('account_id');
							} 
							?>
                            
                            <input type="hidden" value="<?php echo $account_hidden_id;?>" name="hidden_id" />
                            
                            <input type="hidden" value="<?php if(isset($query[0]->option_id)) echo $query[0]->option_id;  ?>" name="hiddenoptionid" />
                            <!-- Desktop Buttons -->                    
                            <div class="splitPaneRightRow rightButtonsRow row gutters">
                            	
                                <div class="col span_8">&nbsp;</div>
                                <div class="col span_4">
                                <a href="<?php echo base_url()?>agency">

									<button type="button" id="cancel_btn" class="cancel">Cancel</button>
                               </a>     
                                </div>
                                <div class="col span_4">                                    
                                    <button class="save">Save</button>
                                </div>
                            </div>
                            
                            </form>
        					<?php } ?>
                        </div><!-- END OF splitPaneRight -->
                        
                    </div><!-- END OF row gutters -->
        
                </main><!-- END OF contentContainer -->
                
                
                
                
                </div>
            </div><!-- /scroller-inner -->
        </div><!-- /scroller -->

        
    </div><!-- /pusher -->
</div>
<script>
$(document).ready(function() {
	$('#cancel_btn').attr("type", "button");
});
</script>

<script type="text/javascript">
$(document).ready(function(){

  $('.edit').editable('<?php echo base_url()?>ajax/update_ajax_data_profile', {
		 id : 'elementid',
		 indicator : 'Saving...',
		 submitdata : {account_id: $('#account_id').val()},
         tooltip   : 'Click to edit...',
		 cancel : 'Cancel',
		 submit  : 'Save',
		 onblur : 'ignore',
     });
	
});
</script>

<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/jquery.jeditable.mini.js"></script>
</body>
</html>