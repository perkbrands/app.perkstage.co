<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Account</title>
<!--/*<link rel="stylesheet" type="text/css" href="css/styles.css"/>

<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
*/-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/mlpmenu/component.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/responsive.css" />

<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="/css/ie8lte.css"/>
<![endif]-->

<?php //echo $query[0]->account_id; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php  echo base_url() ?>assets/js/admin/jquery.form.js"></script>
</head>
<body>
<?php // print_r($listing_data); // if(isset($profile)) // print_r($profile); 
 //if(isset($query[0]->account_contact_firstname)) echo $query[0]->account_contact_firstname; ?>
<div class="container">
<div id="splitPaneLeftContainer"></div>
	<div id="splitPaneRightContainer"></div>
	<!-- Push Wrapper -->
    <div class="mp-pusher" id="mp-pusher">

        <!-- mp-menu -->
        <nav id="mp-menu" class="mp-menu" >
            <div class="mp-level">
                <h2 class="icon icon-world">Accounts</h2>
                

                	<ul class="leftPaneFilters">

                                <form action="<?php echo base_url(); ?>agency/agency_search" method="post" name="search_form" id="search_form_first" style="float:left; margin-right:-20px;">
                               <li id="searchButtonLI">
                                <input type="text" placeholder="Search" name="txt_search"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                
                               </li>
                               <li>
                                    <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter" style="margin-right:-7px;">
                                        <option value="2" <?php  if(isset($search_status) && $search_status=='2'){echo "selected=selected";} ?>>All</option>
                                         <option value="1" <?php  if(isset($search_status) && $search_status==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_status) && $search_status==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                                    <input type="hidden" name="selected_value" id="selected_value_first" />
                                       
                               </li>
                               </li> 
                                </form>
                                <a href="<?php echo base_url(); ?>agency/all_agency"><li><button type="button" />View All</button></li></a>
                            </ul>
                    
                    <div class="leftPaneFiltersDetails">
                            <?php if(isset($listing_data)){ ?>
                                <p><?php echo count($listing_data).' Account(s)'; ?></p>
                            <?php } ?>
                            </div>
                    
                    <ul class="cardsBox">                                 
							   <?php if($this->session->userdata('isdefault')=='1'){?>
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>agency/user_login/new">
							     <li id="new_account">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Account</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else if(isset($profile) && $profile!='') { ?> 
	                             	<a href="<?php echo base_url(); ?>agency/agency_login/new">
							     <li id="new_account" onclick="showform()">
                                 	<div class="plusSign">+</div>
                                    <div class="plusSignText">New Account</div>
                                   
                                </li>
                                </a>
                              <?php } 
								 else
								 { ?>
							     <li id="new_account" onclick="document.getElementById('my_form').style.display='block';">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Account</div>
                                </li>
                                 <?php }} ?> 
   
                                <?php foreach($listing_data as $row){ 
								if(isset($query[0]->account_id))
								{ ?>
                              	  <li <?php if($row->account_id==$this->uri->segment(3)|| $query[0]->account_id==$row->account_id) {?> class="selected" <?php } ?>>
								<?php
								}
								else
								{
								?>
                                <li <?php if($row->account_id==$this->uri->segment(3)) {?> class="selected" <?php } ?>>
	                           <?php } ?>
                                   <div class="pill" <?php if($row->account_profile_image!=''){?> style="background-image: url('<?php echo base_url(); ?>assets/img/account/<?php echo $row->account_profile_image; ?>');"<?php }else{ ?>style="background-image: url('<?php echo base_url(); ?>assets/img/admin/apple.jpg');"<?php }?>>&nbsp;</div>
                                    <p class="label"><?php echo $row->account_title;?></p>
                                    <?php if($this->session->userdata('role_id')==1){ ?>
                                    
                                    <p class="options">
                                    <?php if($this->session->userdata('isdefault')==1){ ?>
                                    <span id="setting_id"><?php echo "<a  href=".base_url()."agency/account_setting/$row->account_id>Settings</a>
									"; ?></span>
                                    
                                    <span class="pipe">|</span>
                                    <?php } ?>
                                  <!--  <p class="options"><span>-->
                                    <span><?php  echo "<a  href=".base_url()."account_setting/profile/$row->account_id>Open</a>"; ?></span></p>
                                    <?php } ?>
                                    <?php if($this->session->userdata('role_id')==2){ ?>
                                     <p class="options">
                                  <!--  <p class="options"><span>-->
                                    <span><a  href="<a  href="<?php echo base_url() ?>"agency/activity_account/"<?php echo $row->account_id?>"">Open</a></span></p>
                                    <?php } ?>
								  <?php if($row->account_status==1) {?>
                                   <div class="status statusGreen"></div>
                                   <?php } else
								   { ?>
                                   <div class="status statusRed"></div>
                                  <?php } ?>
                                </li>
                                <?php } ?>
                                <li class="spacer"></li>
                                <li class="spacer"></li>
                                <li class="spacer"></li>                                
                            </ul>


							
							
                	<!--<ul class="cardsBox">
                        <li>
                        	<div class="plusSign">+</div>
                        	<div class="plusSignText">New Account</div>
                        </li>
                    	<li>
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Children's Harbor</p>
                            <p class="options"><span><a href="#">Settings</a></span><span class="pipe">|</span><span><a href="#">Open</a></span></p>
                            <div class="status statusGreen"></div>
                        </li>
                        <li class="selected">
                            <div class="pill" style="background-image: url('http://perkcms.offunit.com/img/p3/perk.jpg');"></div>
                            <p class="label">Perk Brands</p>
                            <p class="options"><span><a href="#">Settings</a></span><span class="pipe">|</span><span><a href="#">Open</a></span></p>
                            <div class="status statusYellow"></div>
                        </li>
                    	<li>
                        	<div class="pill" style="background-image: url('http://perkcms.offunit.com/img/p3/offunit.jpg');"></div>
                            <p class="label">Off Unit</p>
                            <p class="options"><span><a href="#">Settings</a></span><span class="pipe">|</span><span><a href="#">Open</a></span></p>
                            <div class="status statusGreen"></div>
                        </li>
                    	<li>
                            <div class="pill" style="background-image: url('http://perkcms.offunit.com/img/p3/google.jpg');"></div>
                            <p class="label">Google</p>
                            <p class="options"><span><a href="#">Settings</a></span><span class="pipe">|</span><span><a href="#">Open</a></span></p>
                            <div class="status statusRed"></div>
                        </li>
                    	<li>
                        	<div class="pill" style="background-image: url('http://perkcms.offunit.com/img/p3/apple.jpg');">&nbsp;</div>
                            <p class="label">Apple</p>
                            <p class="options"><span><a href="#">Settings</a></span><span class="pipe">|</span><span><a href="#">Open</a></span></p>
                            <div class="status statusGreen"></div>
                        </li>
					</ul>-->
					
                    

            </div>
            
            <div id="trigger" class="mobileTriggerButton"></div>

        </nav>
        <!-- /mp-menu -->
        <div class="scroller"><!-- this is for emulating position fixed of the nav -->
            <div class="scroller-inner">
                <!-- site content goes here -->
                
				<?php $this->load->view('templates/admin/header'); ?>
                <main id="contentContainer"><!--<div class="message" style="float:right; margin-right:255px;">Account Create Successfully.</div>-->
                    
                    <div class="row">
                        <div id="splitPaneLeft" class="col span_8">
                                <form action="<?php echo base_url(); ?>agency/agency_search" method="post" name="search_form" id="search_form">                        
                            <ul class="leftPaneFilters">

                               <li id="searchButtonLI">
                                <input type="text" placeholder="Search" value="<?php if(isset($txt_search) && $txt_search!='') echo $txt_search; ?>" id="input_id" name="txt_search"/>
                                <button id="searchButton" type="button" name="searchButton" onclick="submit_change_submit()" value=""></button>
                                
                               </li>
                               <li>
                                    <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter" id="lst_filters">
                                        <option value="2" <?php  if(isset($search_status) && $search_status=='2'){echo "selected=selected";} ?>>All</option>
                                         <option value="1" <?php  if(isset($search_status) && $search_status==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_status) && $search_status==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                               			<input type="hidden" id="selected_value" name="selected_value" />
                                  		<input type="hidden" id="input_value" name="input_value" />

                               </li>
                               </li> 
                    <a href="<?php echo base_url(); ?>agency/all_agency"><li><button type="button" />View All</button></li></a>

                            </ul>
                                </form>
                            
                            <div class="leftPaneFiltersDetails">
                            <?php if(isset($listing_data)){ ?>
                                <p><?php echo count($listing_data).' Account(s)'; ?></p>
                            <?php } ?>
                            </div>
                            <ul class="cardsBox">                                 
								<?php if($this->session->userdata('isdefault')=='1'){?>
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>agency/user_login/new">
							     <li id="new_account">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Account</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else if(isset($profile) && $profile!='') { ?> 
	                             	<a href="<?php echo base_url(); ?>agency/agency_login/new">
							     <li id="new_account" onclick="showform()">
                                 	<div class="plusSign">+</div>
                                    <div class="plusSignText">New Account</div>
                                   
                                </li>
                                </a>
                              <?php } 
								 else
								 { ?>
							     <li id="new_account" onclick="document.getElementById('my_form').style.display='block';">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Account</div>
                                </li>
                                 <?php }} ?> 
   
                                <?php foreach($listing_data as $row){ 
								if(isset($query[0]->account_id))
								{ ?>
                              	  <li <?php if($row->account_id==$this->uri->segment(3)|| $query[0]->account_id==$row->account_id) {?> class="selected" <?php } ?>>
								<?php
								}
								else
								{
								?>
                                <li <?php if($row->account_id==$this->uri->segment(3)) {?> class="selected" <?php } ?>>
	                           <?php } ?>
                                   <div class="pill" <?php if($row->account_profile_image!=''){?> style="background-image: url('<?php echo base_url(); ?>assets/img/account/<?php echo $row->account_profile_image; ?>');"<?php }else{ ?>style="background-image: url('<?php echo base_url(); ?>assets/img/admin/apple.jpg');"<?php }?>>&nbsp;</div>
                                    <p class="label"><?php echo $row->account_title;?></p>
                                    
                                    <?php if(isset($row->role_id) && $row->role_id==1){ ?>
                                     <p class="options">
                                      <?php if($this->session->userdata('isdefault')==1){ ?>
                                     <span id="setting_id"><?php echo "<a  href=".base_url()."agency/account_setting/$row->account_id>Settings</a>
									"; ?></span><span class="pipe">|</span><?php } ?>
                                  <!--  <p class="options"><span>-->
                                    <span><?php  echo "<a  href=".base_url()."account_setting/profile/$row->account_id>Open</a>"; ?></span></p>
                                    <?php }else{ ?>
                                    <?php if($this->session->userdata('role_id')==1 && !isset($row->role_id)){ ?>
                                    <p class="options"><span id="setting_id"><?php echo "<a  href=".base_url()."agency/account_setting/$row->account_id>Settings</a>
									"; ?></span><span class="pipe">|</span>
                                  <!--  <p class="options"><span>-->
                                    <span><?php  echo "<a  href=".base_url()."account_setting/profile/$row->account_id>Open</a>"; ?></span></p>
                                    <?php }} ?>
                                    <?php if($this->session->userdata('role_id')==2 || (isset($row->role_id) && $row->role_id==2)){ ?>
                                     <p class="options">
                                  <!--  <p class="options"><span>-->
                                    <span><?php  echo "<a  href=".base_url()."agency/activity_account/$row->account_id>Open</a>"; ?></span></p>
                                    <?php } ?>
								  <?php if($row->account_status==1) {?>
                                   <div class="status statusGreen"></div>
                                   <?php } else
								   { ?>
                                   <div class="status statusRed"></div>
                                  <?php } ?>
                                </li>
                                <?php } ?>
                                <li class="spacer"></li>
                                <li class="spacer"></li>
                                <li class="spacer"></li>                                
                            </ul>
        					<div class="leftPaneFiltersDetails">
                          
		                    	<p><?php //echo $links; ?></p>
		                    </div>
                        </div>
                        <!-- END OF splitPaneLeft -->
         					
                         <?php // echo '<textarea>';print_r($profile);echo '</textarea>'; ?>
                        <div class="col span_8" id="splitPaneRight">
                         <?php
							 if(isset($error) && $error!=''){
							 
							 echo '<div style="color:red;margin:10px 0 0 10px;font-weight:bold;font-size:20px">'.$error.'</div>';
							 }
							 ?>
                        <?php if(isset($query)) {
								?>
                                <?php  if(isset($query[0]->account_title)){ ?>
                            
                            <h2 class="edit" id="edit"><?php echo $query[0]->account_title; ?></h2>
                            <input type="hidden" id="account_id" name="account_id" value="<?php echo $query[0]->account_id; ?>" />
                           
                               <?php } } ?>
                                <?php  if(isset($query[0]->account_notes)){
									$ac_id=$query[0]->account_id;
									 ?>
                                     
                                     <div class="row pageNotes splitPaneRightRow">
                                <div class="col span_9 note">&nbsp;</div>
                                <div class="col span_7">
	                                <?php  echo "<a  href=".base_url()."account_setting/profile/$ac_id>" ?> <button id="open_account_ic">Open Account</button>
                            	</a>
                                </div>
                            </div>
                            <?php } ?>
							 <?php if(isset($profile)) {/*?>
                        <form action="<?php echo base_url();?>agency/agency_profile" method="post" enctype="multipart/form-data">
                               
                        <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails" id="prifile_id"><?php if(isset($profile[0]->account_profile_address)) echo $profile[0]->account_profile_address; ?>" /></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Address</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_address" value="<?php if(isset($profile[0]->account_profile_address)) echo $profile[0]->account_profile_address; ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">City</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_city" value="<?php if(isset($profile[0]->account_contact_firstname)) echo $profile[0]->	account_contact_firstname; ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">State</div>
                                        <div class="formInfo col span_12"><?php if(isset($profile[0]->account_state) && $profile[0]->account_state==0){ echo 'selected';} ?>
                                          
                                            <select name="lst_profile_state">
				 								<?php if(isset($state_data)){
												foreach($state_data as $row_state){	
												?>
                                              <option <?php if(isset($query[0]->account_profile_state)){if($query[0]->account_profile_state==$row_state->id){echo 'selected=selected';}}  ?> value="<?php echo $row_state->id; ?>"><?php echo $row_state->name; ?></option>
                                                <?php }} ?>
                                           </select>                                
                                                 
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Zip </div>
                                        <div class="formInfo col span_12">
                                        	<input class="halfSize"  type="text" name="txt_zip" value="<?php if(isset($profile[0]->account_profile_zip)) echo $profile[0]->account_profile_zip; ?>" /> 
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Country</div>
                                        <div class="formInfo col span_12">
                                            <select name="lst_country">
                                               <?php if(isset($country_data)){
												foreach($country_data as $row_country){	
												?>
                                              <option <?php if(isset($query[0]->account_profile_country)){if($query[0]->account_profile_country==$row_country->idCountry){echo 'selected=selected';}}  ?> value="<?php echo $row_country->idCountry; ?>" <?php if($row_country->sort_by==3){ echo 'here';exit; echo 'disabled=disabled';} ?>><?php echo $row_country->countryName; ?></option>
                                                <?php }} ?>
                                            </select>                                
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Phone</div>
                                        <div class="formInfo col span_12"><input class=""  type="text"  name="txt_profPhone" value="<?php if(isset($profile[0]->account_profile_phone)) echo $profile[0]->account_profile_phone; ?>" /></div>
                                    </li>                                  
                                    <li class="row">
                                        <div class="labelInfo col span_4">Timezone</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="lst_timezone">
                                                <?php if(isset($timezone_data)){
												foreach($timezone_data as $row_timezone){	
												?>
                                                <option <?php if(isset($query[0]->user_profile_timezone)){if($query[0]->user_profile_timezone==$row_timezone->id){echo 'selected=selected';}}  ?> value="<?php echo $row_timezone->id; ?>"><?php echo $row_timezone->timezone_location.' '.$row_timezone->gmt; ?></option>
                                                <?php }} ?>
                                               
                                            </select>                                
                                        </div>
                                    </li>                            
                                </ul>
                        	
                        </div>
                        <input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="hidden_id"  />
                        <div class="splitPaneRightRow rightButtonsRow">
                                <button class="remove">Remove</button>
                                <span class="floatRight">
                                <button class="cancel">Cancel</button>
                                <button class="save">Save</button></span>
                        	</div>
                         </form>
						 <?php */} else { ?>  
                            <!--ffffffffffffffffffffffffffffffffffffffpageStatus status statusGreen-->
                            <!--ffffffffffffffffffffffffffffffffffffffpageStatus status statusGreen-->
                            <!--ffffffffffffffffffffffffffffffffffffffpageStatus status statusGreen-->
                            <form action="<?php echo base_url();?>agency/agency_add"  method="post" name="account_form" <?php if(isset($query) && $query!='') { ?>  style="display:none;" <?php }else { ?> style="display:none;" <?php } ?> enctype="multipart/form-data" id="my_form">
                            <?php if(!isset($query)){?>
                        <div style="float:left;margin:5px 0 20px 10px;width:90%">
                        <div class="labelInfo col span_4" style="color:#00A3E8" id="error_title">Account Title</div>
                        <input style="width: 100%; height: 44px;" autocomplete="off" name="account_title" id="account_title_id" onkeyup="acounttile(this.value)">
                        </div>
                        <?php } ?>                                                    
                            <div class="splitPaneRightRow <?php  if(isset($query[0]->account_status)  && $query[0]->account_status==1) {?> statusGreen <?php } else if(isset($query[0]->account_status)  && $query[0]->account_status==0){ ?>statusRed <?php } ?>">
                                <h3  onclick="showSplitPlaneRow(this);">Status</h3><div class="splitPlaneQuickDetails" id="form_act_id"><?php if(isset($query[0]->account_status) && $query[0]->account_status==1){echo 'Active';}else{echo 'Paused';}?></div>
                                <ul class="splitPaneRightDetails ">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Status</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="lst_activeaccount">
                                            <option value="1" <?php if(isset($query[0]->account_status) && $query[0]->account_status==1){ echo 'selected';} ?>>Active</option>
                                           <option value="0" <?php if(isset($query[0]->account_status) && $query[0]->account_status==0){ echo 'selected';} ?>>Paused</option>

                                            </select>                                
                                        </div>
                                    
                                    </li>

                                </ul>
                            </div>
                            
                           
                            
                            <div class="splitPaneRightRow ">
                                <h3   onclick="showSplitPlaneRow(this);">Contact</h3><div class="splitPlaneQuickDetails" id="form_cont_id"><?php if(isset($query[0]->account_contact_email)) echo $query[0]->account_contact_email; ?></div>
                                <ul class="splitPaneRightDetails ">                                
                                    <li class="row">
                                        <div class="labelInfo col span_4">Email</div>
                                        <div class="formInfo col span_12"><input type="email" name="txt_email" value="<?php if(isset($query[0]->account_contact_email)) echo $query[0]->account_contact_email; else echo 'Email Address'; ?>"  id="email_idd" onkeyup="email(this.value)" onblur="if(this.value==''){this.value='Email Address'}" onclick="if(this.value=='Email Address'){this.value=''}" /><span class="required" id="error_id"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">First Name</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_firstname" id="txt_firstname_id" value="<?php if(isset($query[0]->account_contact_firstname)) echo $query[0]->account_contact_firstname; ?>" /><span class="required" id="firstname_required"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Last Name</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_lastname" value="<?php if(isset($query[0]->account_contact_lastname)) echo $query[0]->account_contact_lastname; ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Phone</div>
                                        <div class="formInfo col span_12"><input type="tel" name="txt_contPhone"  id="phone_id" value="<?php if(isset($query[0]->account_contact_phone)) echo $query[0]->account_contact_phone; ?>"   /><span class="required" id="phone_second_required"></span></div>
                                    </li>
                                    <li class="row">
                                       <div class="labelInfo col span_4">Text Notification</div>
                                        <div class="formInfo col span_12">
                                            <select name="lst_notification">
                                                <option value="1"<?php if(isset($query[0]->account_contact_notification) && $query[0]->account_contact_notification==1){ echo 'selected';} ?>>Send texts</option>
                                                <option value="0" <?php if(isset($query[0]->account_contact_notification) && $query[0]->account_contact_notification==0){ echo 'selected';} ?>>Don't send texts</option>
                                            </select>                                
                                       </div>
                                   </li>
                               </ul>
                            </div>   
                            <div class="splitPaneRightRow ">
                                <h3 onclick="showSplitPlaneRow(this);">Content Options</h3><div class="splitPlaneQuickDetails" id="form_opt_id">
                                <?php if(isset($query[0]->account_content_accept) && $query[0]->account_content_accept==1){ echo "Accepts content from others";}else{
								echo "Doesn't accept content from others";
								} ?>
                                </div>
                                <ul class="splitPaneRightDetails">
                                  <li class="row">
                                    <div class="labelInfo col span_4">Accept Content</div>
                                      <div class="formInfo col span_12">
                                          <select name="lst_acceptaccount">
                                            <option value="1" <?php if(isset($query[0]->account_content_accept) && $query[0]->account_content_accept==1){ echo 'selected';} ?>>Accepts content from others</option>
                                            <option value="0"<?php if(isset($query[0]->account_content_accept) && $query[0]->account_content_accept==0){ echo 'selected';} ?>>Doesn't accept content from others</option>
                                            </select>                                
                                     </div>
                                  </li>
                                  <li class="row">
                                        <div class="labelInfo col span_4">Share Content</div>
                                        <div class="formInfo col span_12">
                                          <select name="lst_sharecontent">
                                             <option value="1" <?php if(isset($query[0]->account_content_share) && $query[0]->account_content_share==1){ echo 'selected';} ?>>Share content with others</option>
                                             <option value="0" <?php if(isset($query[0]->account_content_share) && $query[0]->account_content_share==0){ echo 'selected';} ?>>Don't share content with others</option>
                                           </select>                                
                                        </div>
                                  </li>
                                </ul>
                            </div>
                            <input type="hidden" value="<?php if(isset($query[0]->account_id)) echo $query[0]->account_id;  ?>" name="hiddenid" id="hiddenid" />
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                  <li class="row">
                                    <div class="labelInfo col span_4">Notes</div>
                                    <div class="formInfo col span_12"><textarea class="doubleHeight" name="txt_note" ><?php if(isset($query[0]->account_notes)) echo $query[0]->account_notes; ?></textarea></div>
                                  </li>
                                </ul>
                            </div>
                            
                            
                            <div class="splitPaneRightRow rightButtonsRow row gutters">
                            	<div class="col span_4">
	                                <?php
							if(isset($query)){		
							$current_message=$this->uri->segment(2); 
							 $current_id=$this->uri->segment(3); 
							if($current_message=='account_setting') {
								if($query[0]->is_default!=1){
								?>
                                
									<button id="remove_btn" class="remove">Remove</button> 
                                <?php }}} ?>
                                </div>
                                <div class="col span_4">&nbsp;</div>
                                <div class="col span_4">
                                <a href="<?php echo base_url()?>agency">
									<button type="button" id="cancel_btn" class="cancel">Cancel</button>
                                </a>
                                </div>
                                <div class="col span_4">                                    
                                    <button class="save" id="save_btn">Save</button>
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

<script type="text/javascript">
 function submit_change_val(select_value){
$('#selected_value').val(select_value);
var	inputValue=$('#input_id').val();
$('#input_value').val(inputValue);
$('#search_form').submit();
}

function submit_change_submit(){
var	select_value=$('#lst_filters').val();
$('#selected_value').val(select_value);
var	inputValue=$('#input_id').val();
$('#input_value').val(inputValue);
$('#search_form').submit();
}
</script>
<script>
function showform()
{
	   // document.getElementById('my_form').style.display='block';	
		$('#form_act_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_act_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_act_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
		$('#form_pro_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
		$('#form_cont_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_cont_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
		$('#form_opt_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_opt_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_opt_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
		$('#form_not_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_not_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_not_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 		

}

function address(value)
{
	if(value!='')
	$('#address_id').css({"border-color":"#63dfff"});
	$('#error_id').css({"color":"white"});
}
function email(email_value)
{
	if(email_value!='')
	$('#email_idd').css({"border-color":"#63dfff"});
}
function acounttile(value)
{
	if(value!='')
	$('#account_title_id').css({"border-color":"#535a60"});
	$('#account_title_id').css({"outline":"medium none"});
	$('#error_title').css({"color":"#00A3E8"});
}



$(document).ready(function() {
	
	$('#remove_btn').attr("type", "button");
	$('#cancel_btn').attr("type", "button");
	$('#email_id').attr("type", "email");
	
	$('#save_btn').click(function(e) {

	var account_val= $('#account_title_id').val();
	if(account_val==''){
		$('#account_title_id').css({"border-color":"red"});
		$('#error_title').css({"color":"red"});
		$('#account_title_id').focus();
		return false;
	}
	
	/*var address_val= $('#address_id').val();
	if(address_val==''){
		$('#address_id').css({"border-color":"red"});
		$('#address_id').focus();
		$('#error_id').css({"color":"red"});		
		return false;
	}*/
	////////for profile phone///////////
	var inputphone1=$('#phone_one_id').val();
	var inputphone=$('#phone_id').val();
	var phoneno = /^\+?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	
	if(inputphone1==''){

		$('#form_pro_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		$('#phone_one_id').css({"border-color":"red"});
		$('#phone_one_id').focus();
		$('#phone_first_required').css({"color":"red"});		
		return false;
	}else{
		$('#phone_one_id').css({"border-color":"#63dfff"});
		$('#phone_first_required').css({"color":"#fff"});
	}
	
		if(inputphone1!=''){		
        str = inputphone1.replace(/\s+/g, '');
	    str1 = str.replace(/[()]/g, '');
		str2 = str1.replace(/-/g, '');
		str3 = str2.replace('+', '');
		
		digits=str3.length;
		if(digits < 10){ 
		
		$('#form_pro_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
			$('#phone_one_id').css({"border-color":"red"});
			$('#phone_first_required').css({"color":"red"});
			$('#phone_one_id').focus();
			return false;
		}else{
		number = phoneCheckAndFormat(inputphone1, digits);
		$('#phone_one_id').val(number);
		if (number === false) {
			$('#phone_one_id').val('');
			
			$('#form_pro_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0); 
			
          	/*$('#form_pro_id').parent().toggleClass('splitPaneRightSelected'); 
			$('#form_pro_id').parent().children("ul").eq(0).slideToggle(300); */	
			$('#phone_one_id').css({"border-color":"red"});
			$('#phone_first_required').css({"color":"red"});
			$('#phone_one_id').focus();
			return false;
        }else{
		    $('#phone_one_id').css({"border-color":"#63dfff"});
			$('#phone_first_required').css({"color":"#fff"});	
		}
			
			
		}
		}
	
	var email_val= $('#email_idd').val();
	if(email_val=='' || email_val=='Email Address'){
		$('#form_cont_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_cont_id').parent().children("ul").eq(0).show(300); 
		$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		$('#email_idd').css({"border-color":"red"});
		$('#error_id').css({"color":"red"});
		$('#email_idd').focus();
		
		return false;
	}else{
		 $('#email_idd').css({"border-color":"#63dfff"});
		$('#error_id').css({"color":"#fff"});
	}
		

	if(email_val!=''){
		
	  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	  
	  if(!emailReg.test(email_val)) {
		  
		$('#form_cont_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_cont_id').parent().children("ul").eq(0).show(300); 
		$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		
		
		
		$('#error_id').css({"color":"red"});
		$('#email_idd').focus();		
		return false;
		  
	  }else{
		 $('#email_idd').css({"border-color":"#63dfff"});
		 $('#error_id').css({"color":"#fff"});  
	  }
		
		
	}

   var firstname_val= $('#txt_firstname_id').val();
	if(firstname_val==''){
		$('#form_cont_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_cont_id').parent().children("ul").eq(0).show(300); 
		$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		$('#txt_firstname_id').css({"border-color":"red"});
		$('#txt_firstname_id').focus();
		$('#firstname_required').css({"color":"red"});		
		return false;
	}else{
		$('#txt_firstname_id').css({"border-color":"#63dfff"});
		$('#firstname_required').css({"color":"#fff"});	
	}

		
		///////////for contact phone///////////////////
if(inputphone==''){
	
		$('#form_cont_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_cont_id').parent().children("ul").eq(0).show(300); 
		$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
	
		$('#phone_id').css({"border-color":"red"});
		$('#phone_id').focus();
		$('#phone_second_required').css({"color":"red"});		
		return false;
	}else{
		$('#phone_id').css({"border-color":"#63dfff"});
		$('#phone_second_required').css({"color":"#fff"});	
	}
		if(inputphone!='') {
		
		str = inputphone.replace(/\s+/g, '');
	    str1 = str.replace(/[()]/g, '');
		str2 = str1.replace(/-/g, '');
		str3 = str2.replace('+', '');
		
		digits=str3.length;
		if(digits < 10){ 
			$('#phone_id').css({"border-color":"red"});
			$('#phone_id').focus();
			return false;
		}else{
		number = phoneCheckAndFormat(inputphone, digits);
		$('#phone_id').val(number);
		if (number === false) {
			$('#phone_id').val('');
          	$('#form_cont_id').parent().addClass('splitPaneRightSelected'); 
		    $('#form_cont_id').parent().children("ul").eq(0).show(300); 
		    $('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0); 
					 
			$('#phone_id').css({"border-color":"red"});
			$('#phone_id').focus();
				 return false;  
        }else{
		    $('#phone_id').css({"border-color":"#63dfff"});
		}
			
			
			}
		

						}  
	
		

   	});
	
	///////////////for mobile starts here////////////////////////////
	$('#save_btn_mobile').click(function(e) {

	var account_val= $('#account_title_id').val();
	if(account_val==''){
		$('#account_title_id').css({"border-color":"red"});
		$('#error_title').css({"color":"red"});
		$('#account_title_id').focus();
		return false;
	}
	
	/*var address_val= $('#address_id').val();
	if(address_val==''){
		$('#address_id').css({"border-color":"red"});
		$('#address_id').focus();
		$('#error_id').css({"color":"red"});		
		return false;
	}*/
	////////for profile phone///////////
	var inputphone1=$('#phone_one_id').val();
	var inputphone=$('#phone_id').val();
	var phoneno = /^\+?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	if(inputphone1=='')
	{
		$('#form_pro_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
		$('#phone_one_id').css({"border-color":"red"});
		$('#phone_one_id').focus();
		$('#phone_first_required').css({"color":"red"});		
		return false;
	}
			
	
		if(inputphone1!=''){		
        str = inputphone1.replace(/\s+/g, '');
	    str1 = str.replace(/[()]/g, '');
		str2 = str1.replace(/-/g, '');
		str3 = str2.replace('+', '');
		
		digits=str3.length;
		if(digits < 10){ 
			$('#phone_one_id').css({"border-color":"red"});
			$('#phone_first_required').css({"color":"red"});
			$('#phone_one_id').focus();
			return false;
		}else{
		number = phoneCheckAndFormat(inputphone1, digits);
		$('#phone_one_id').val(number);
		if (number === false) {
			$('#phone_one_id').val('');
          	/*$('#form_pro_id').parent().toggleClass('splitPaneRightSelected'); 
			$('#form_pro_id').parent().children("ul").eq(0).slideToggle(300); */
			$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 	
			$('#phone_one_id').css({"border-color":"red"});
			$('#phone_first_required').css({"color":"red"});
			$('#phone_one_id').focus();
			return false;
        }else{
		    $('#phone_one_id').css({"border-color":"#63dfff"});
			$('#phone_first_required').css({"color":"#fff"});	
		}
			
			
		}
		}
	
	var email_val= $('#email_idd').val();
	if(email_val==''){
		$('#email_idd').css({"border-color":"red"});
		$('#error_id').css({"color":"red"});
		$('#email_idd').focus();
		
		return false;
	}

   var firstname_val= $('#txt_firstname_id').val();
	if(firstname_val==''){
		$('#txt_firstname_id').css({"border-color":"red"});
		$('#txt_firstname_id').focus();
		$('#firstname_required').css({"color":"red"});		
		return false;
	}

		
		///////////for contact phone///////////////////
	if(inputphone=='')
	{
		$('#form_cont_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_cont_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
		$('#phone_id').css({"border-color":"red"});
		$('#phone_id').focus();
		$('#phone_second_required').css({"color":"red"});		
		return false;
	}
		if(inputphone!='') {
		
		str = inputphone.replace(/\s+/g, '');
	    str1 = str.replace(/[()]/g, '');
		str2 = str1.replace(/-/g, '');
		str3 = str2.replace('+', '');
		
		digits=str3.length;
		if(digits < 10){ 
			$('#phone_id').css({"border-color":"red"});
			$('#phone_id').focus();
			return false;
		}else{
		number = phoneCheckAndFormat(inputphone, digits);
		$('#phone_id').val(number);
		if (number === false) {
			$('#phone_id').val('');
          	$('#form_cont_id').parent().toggleClass('splitPaneRightSelected'); 
			$('#form_cont_id').parent().children("ul").eq(0).slideToggle(300); 
			$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
					 
			$('#phone_id').css({"border-color":"red"});
			$('#phone_id').focus();
				 return false;  
        }else{
		    $('#phone_id').css({"border-color":"#63dfff"});
		}
			
			
			}
		

						}  
	
		

   	});
	
	
	function phoneCheckAndFormat(phone, digits) {
    phone = phone.replace(/[^0-9]/g,'');
    digits = (digits > 0 ? digits : 10);
    if (phone.length != digits) {
        return false;
    } else {
        code = '';
        if (digits == 11) {
            code = '1 ';
            phone = phone.substring(1);
        }
        area = phone.substring(0,3);
        prefix = phone.substring(3,6);
        line = phone.substring(6);
        return code + '(' + area + ') ' + prefix + '-' + line;
    }
}

	
	///////////////////mobile ends here///////////////////////
	<?php $add_form=$this->uri->segment(2);
	if($add_form=='agency_add')
	{
	?> 
		$(".message").show();
		$(".message").fadeOut(2500);
	<?php } ?>

	//var abc=$('.edit').val();
 	//alert(abc);
  $('.edit').editable('<?php echo base_url()?>ajax/update_ajax_data', {
		 id : 'elementid',
		 indicator : 'Saving...',
		 submitdata : {account_id: $('#account_id').val()},
         tooltip   : 'Click to edit...',
		 cancel : 'Cancel',
		 submit  : 'Save',
		 onblur : 'ignore',
     });
});



$('#prifile_id').parent().toggleClass('splitPaneRightSelected'); 
$('#prifile_id').parent().children("ul").eq(0).slideToggle(300); 
$('#prifile_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

$(document).ready(function() {
	$('#open_account_ic').click(function(){
		document.getElementById('my_form').style.display='block';
	});
});
$(document).ready(function() {		
<?php 
$add_form=$this->uri->segment(2); 
if($add_form=='account_setting')
	{
	}
	else if(isset($query[0]->account_id)&& $query[0]->account_id!='')
	 { 
	 }
	 else
	 {?>
	$('#form_act_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_act_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_act_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_pro_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_pro_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_cont_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_cont_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_opt_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_opt_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_opt_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_not_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_not_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_not_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	<?php } ?>
	});
	
	
function agency_filter(selectedValue)
 {
	 if(selectedValue)
	 {	
		$.ajax({
			url: '<?php echo base_url(); ?>agency/agency_filter',
			type: 'POST',
			data: {option :selectedValue},
			success: function(data) {
			}
		});
	}
}

</script>
<?php $add_form=$this->uri->segment(3); 
	if($add_form=='new')
	{
	?>
	<script>
     document.getElementById('my_form').style.display='block';	
    </script>
<?php }
	?>

</script>
<?php $add_form=$this->uri->segment(2);
	if($add_form=='account_setting')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='block';	
    </script>
<?php }
	?>
    <?php $add_form=$this->uri->segment(2);
	if($add_form=='agency_add')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='block';	
    </script>
<?php }
	?>
<script type="text/javascript">
$('document').ready(function(){
	
function onsuccess(response,status){
  $("#loader").hide();
  $("#onsuccessmsg").html('<div id="msg" style="margin-left:127px">'+response+'</div>');
 }
 $('#upload_img_btn').click(function(){
	  var f = document.getElementById("account_image").value;
        if(f==''){
		 alert("Please select file to upload");
		 return false;	
		}
	 $('#my_form').attr('action', 'upload_images');
	//alert($('#my_form').attr('action'));
	$("#my_form").submit(); 
 });

 $("#my_form").on('submit',function(){
 if($('#my_form').attr('action')=='upload_images'){
 $("#loader").show();
  var options={
   //url     : $(this).attr("action"),
   url     : '<?php echo base_url()?>agency/upload_images',
   success : onsuccess
  };
  $(this).ajaxSubmit(options);
 return false;
  }
 });

$('#save_btn').click(function(){
	
	$('#my_form').attr('action', '<?php echo base_url();?>agency/agency_add');
});

$('#save_btn_mobile').click(function(){
	$('#my_form').attr('action', '<?php echo base_url();?>agency/agency_add');
});

$('#remove_btn').click(function(){
	var r = confirm("Are you sure you want to delete");
	if (r == true) {
		var del_id=$('#hiddenid').val();
		window.location.href='<?php echo base_url() ?>agency/account_delete/'+del_id;
	} else {
		
	}
	
	//echo "<a  href=".base_url()."agency/account_delete/$current_id>"; ?></a>
});

});


</script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/jquery.jeditable.mini.js"></script>

</body>
</html>