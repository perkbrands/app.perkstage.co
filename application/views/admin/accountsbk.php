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
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/mlpmenu/component.css" />
<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="/css/ie8lte.css"/>
<![endif]-->


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/modernizr.custom.js"></script>
</head>
<body>
<?php if(isset($profile)) // print_r($profile); 
 //if(isset($query[0]->account_contact_firstname)) echo $query[0]->account_contact_firstname; ?>
<div class="container">
	<!-- Push Wrapper -->
    <div class="mp-pusher" id="mp-pusher">

       <!-- mp-menu -->
        <nav id="mp-menu" class="mp-menu" >
            <div class="mp-level">
                <h2 class="icon icon-world">Accounts</h2>
                

                	<ul class="leftPaneFilters">
                    	
                    	<li id="searchButtonLI">
                        <form>
                        <input type="text" placeholder="Search"/>
                        <button id="searchButton" type="submit" name="searchButton" value=""></button>
                        </form>
                        </li>
                        <li>
                        	<select>
                        		<option>Filter</option>
                                <option>Account Type 1</option>
                                <option>Account Type 2</option>
                                <option>Account Type 3</option>
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
					</ul>
					
                    

            </div>
            
            <div id="trigger" class="mobileTriggerButton"></div>

        </nav>
        <!-- /mp-menu -->
		


        <div class="scroller"><!-- this is for emulating position fixed of the nav -->
            <div class="scroller-inner">
                <!-- site content goes here -->
                
				<?php $this->load->view('templates/admin/header'); ?>
                <main id="contentContainer">
                    <div id="splitPaneLeftContainer"></div>
                    <div id="splitPaneRightContainer"></div>
                    
                    
                    <div class="row">
                        <div id="splitPaneLeft" class="col span_8">
                        
                            <ul class="leftPaneFilters">

                                <form action="<?php echo base_url(); ?>agency/agency_search" method="post" name="search_form" id="search_form" style="float:left; margin-right:-20px;">
                               <li>
                                    <select name="lst_filter" style="margin-right:-7px;">
                                        <option>Filter</option>
                                        <option value="name" selected="selected">Name</option>
                                        <option value="address">Address</option>
                                        <option value="city">City</option>
                                    </select>
                               </li>
                               <li id="searchButtonLI">
                                <input type="text" placeholder="Search" name="txt_search"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                
                               </li>
                                
                                </form>
                                <a href="<?php echo base_url(); ?>agency/all_agency"><li><button type="button" />View All</button></li></a>
                            </ul>
                            
                            <div class="leftPaneFiltersDetails">
                                <p>lorem ipsum dolor sit amet</p>
                            </div>
                            <ul class="cardsBox">                                 
								
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>agency/agency_login/new">
							     <li id="new_account" onclick="document.getElementById('my_form').style.display='block';">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Account</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else if(isset($profile) && $profile!='') { ?> 
	                             	<a href="<?php echo base_url(); ?>agency/agency_login/new">
							     <li id="new_account" onclick="document.getElementById('my_form').style.display='block';">
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
                                 <?php } ?> 
   
                                <?php foreach($listing_data as $row){ ?>
                                <li>
                                    <div class="pill" style="background-image: url('http://perkcms.offunit.com/img/p3/apple.jpg');">&nbsp;</div>
                                    <p class="label"><?php echo $row->account_contact_firstname;?></p>
                                    <p class="options"><span id="setting_id"><?php echo "<a  href=".base_url()."agency/account_setting/$row->account_id>Settings</a>
									"; ?></span><span class="pipe">|</span>
                                  <!--  <p class="options"><span>-->
                                    <span><?php  echo "<a  href=".base_url()."agency/account_profile/$row->account_id>Open</a>"; ?></span></p>
                                   <div class="status statusGreen"></div>
                                </li>
                                <?php } ?>
                                <li class="spacer"></li>
                                <li class="spacer"></li>
                                <li class="spacer"></li>                                
                            </ul>
        
                        </div>
                        <!-- END OF splitPaneLeft -->
         
        
                        <div class="col span_8" id="splitPaneRight">
                        
                            <h2 class="edit">Perk Brands</h2>

                            <div class="pageNotes">
                                <div class="note">lorem ipsum dolor sit amet</div>
                                <button id="open_account_ic">Open Account</button>
                            </div>
							<?php if(isset($profile)) {
								?>
                        <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails" id="prifile_id">Lorem ipsum dolor sit amet</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Address</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_address" value="<?php if(isset($profile[0]->account_profile_address)) echo $profile[0]->account_profile_address; ?>" required /><span class="required"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">City</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_city" value="<?php if(isset($profile[0]->account_contact_firstname)) echo $profile[0]->	account_contact_firstname; ?>" /><span class="validation green"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">State</div>
                                        <div class="formInfo col span_12"><?php if(isset($profile[0]->account_status) && $profile[0]->account_status==0){ echo 'selected';} ?>
                                          
                                            <select name="lst_profile_state">
											<option value="<?php if(isset($profile[0]->account_status)) echo $profile[0]->account_status;?>">All</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District Of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option> 
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
                                                <option value="1" <?php if(isset($profile[0]->account_profile_country) && $profile[0]->account_profile_country==1){ echo 'selected';} ?>>Country</option>
                                                <option value="2" <?php if(isset($profile[0]->account_profile_country) && $profile[0]->account_profile_country==2){ echo 'selected';} ?>>USA</option>
                                                <option value="3" <?php if(isset($profile[0]->account_profile_country) && $profile[0]->account_profile_country==3){ echo 'selected';} ?>>USA</option>
                                                <option value="4" <?php if(isset($profile[0]->account_profile_country) && $profile[0]->account_profile_country==4){ echo 'selected';} ?>>USA</option>
                                                <option value="5" <?php if(isset($profile[0]->account_profile_country) && $profile[0]->account_profile_country==5){ echo 'selected';} ?>>USA</option>
                                            </select>                                
                                        </div>
                                    </li>


                                    <li class="row">
                                        <div class="labelInfo col span_4">Phone</div>
                                        <div class="formInfo col span_12"><input class=""  type="text" name="txt_profPhone" value="<?php if(isset($profile[0]->account_contact_phone)) echo $profile[0]->account_contact_phone; ?>" /></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Timezone</div>
                                        <div class="formInfo col span_12"><input class=""  type="text" name="txt_timezone" value="<?php if(isset($profile[0]->account_profile_timezone)) echo $profile[0]->account_profile_timezone; ?>" /> </div>
                                    </li>
                                    
                                </ul>
                            </div>
                         <?php } else { ?>  
                            <!--ffffffffffffffffffffffffffffffffffffffpageStatus status statusGreen-->
                            <!--ffffffffffffffffffffffffffffffffffffffpageStatus status statusGreen-->
                            <!--ffffffffffffffffffffffffffffffffffffffpageStatus status statusGreen-->
                            <form action="<?php echo base_url();?>agency/agency_add"  method="post" name="account_form" <?php if(isset($query) && $query!='') { ?>  style="display:block;" <?php }else { ?> style="display:none;" <?php } ?> id="my_form">
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Status</h3><div class="splitPlaneQuickDetails" id="form_act_id">Active</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Status</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="lst_activeaccount">
                                                <option value="1" <?php if(isset($query[0]->account_status) && $query[0]->account_status==1){ echo 'selected';} ?> >Active Account</option>								
                                                <option value="0"<?php if(isset($query[0]->account_status) && $query[0]->account_status==0){ echo 'selected';} ?>>Pause Account</option>
                                            </select>                                
                                        </div>
                                    
                                    </li>

                                </ul>
                            </div>
                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails" id="form_pro_id">Lorem ipsum dolor sit amet</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Address</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_address" value="<?php if(isset($query[0]->account_profile_address)) echo $query[0]->account_profile_address; ?>" required="required" /><span class="required"></span></div>

                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">City</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_city" value="<?php if(isset($query[0]->	account_contact_firstname)) echo $query[0]->account_contact_firstname; ?>" /><span class="validation green"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">State</div>
                                        <div class="formInfo col span_12"><?php if(isset($query[0]->account_status) && $query[0]->account_status==0){ echo 'selected';} ?>
                                            <select name="lst_profile_state">
											<option value="<?php if(isset($query[0]->account_status)) echo $query[0]->account_status;?>" selected >All</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District Of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option> 
                                            </select>                                
                                        
                                        </div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Zip </div>
                                        <div class="formInfo col span_12">
                                        	<input class="halfSize"  type="text" name="txt_zip" value="<?php if(isset($query[0]->account_profile_zip)) echo $query[0]->account_profile_zip; ?>" /> 
                                        </div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Country</div>
                                        <div class="formInfo col span_12">
                                            <select name="lst_country">
                                                <option value="1" <?php if(isset($query[0]->account_profile_country) && $query[0]->account_profile_country==1){ echo 'selected';} ?>>Country</option>
                                                <option value="2" <?php if(isset($query[0]->account_profile_country) && $query[0]->account_profile_country==2){ echo 'selected';} ?>>USA</option>
                                                <option value="3" <?php if(isset($query[0]->account_profile_country) && $query[0]->account_profile_country==3){ echo 'selected';} ?>>USA</option>
                                                <option value="4" <?php if(isset($query[0]->account_profile_country) && $query[0]->account_profile_country==4){ echo 'selected';} ?>>USA</option>
                                                <option value="5" <?php if(isset($query[0]->account_profile_country) && $query[0]->account_profile_country==5){ echo 'selected';} ?>>USA</option>
                                            </select>                                
                                        </div>
                                    </li>


                                    <li class="row">
                                        <div class="labelInfo col span_4">Phone</div>
                                        <div class="formInfo col span_12"><input class=""  type="text" name="txt_profPhone" value="<?php if(isset($query[0]->account_contact_phone)) echo $query[0]->account_contact_phone; ?>" /></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Timezone</div>
                                        <div class="formInfo col span_12"><input class=""  type="text" name="txt_timezone" value="<?php if(isset($query[0]->account_profile_timezone)) echo $query[0]->account_profile_timezone; ?>" /> </div>
                                    </li>
                                    
                                </ul>
                            </div>
                            
                            <div class="splitPaneRightRow ">
                                <h3   onclick="showSplitPlaneRow(this);">Contact</h3><div class="splitPlaneQuickDetails" id="form_cont_id">Lorem ipsum dolor sit amet</div>
                                <ul class="splitPaneRightDetails ">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Email</div>
                                        <div class="formInfo col span_12"><input type="email" name="txt_email" value="<?php if(isset($query[0]->account_contact_email)) echo $query[0]->account_contact_email; ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">First Name</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_firstname" value="<?php if(isset($query[0]->account_contact_firstname)) echo $query[0]->account_contact_firstname; ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Last Name</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_lastname" value="<?php if(isset($query[0]->account_contact_lastname)) echo $query[0]->account_contact_lastname; ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Phone</div>
                                        <div class="formInfo col span_12"><input type="number" name="txt_contPhone" value="<?php if(isset($query[0]->account_contact_phone)) echo $query[0]->account_contact_phone; ?>" /></div>
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
                                <h3  onclick="showSplitPlaneRow(this);">Content Options</h3><div class="splitPlaneQuickDetails" id="form_opt_id">Lorem ipsum dolor sit amet</div>
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
                            <input type="hidden" value="<?php if(isset($query[0]->account_id)) echo $query[0]->account_id;  ?>" name="hiddenid" />
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails" id="form_not_id" class="div_form_id">Lorem ipsum dolor sit amet</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Notes</div>
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="txt_note" ><?php if(isset($query[0]->account_notes)) echo $query[0]->account_notes; ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
                            
                            
                            <div class="splitPaneRightRow rightButtonsRow">
                                <button class="remove">Remove</button>
                                <span class="floatRight">
                                <button class="cancel">Cancel</button>
                                <button class="save">Save</button></span>
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
 //For inline editor
<!--$(document).ready(function() {
//	alert('ssssssssss');
 //});-->
$(document).ready(function() {
     $('.edit').editable('<?php base_url();?>assets/ajax/admin/accounts-editAccountLabel.php', {
         indicator : 'Saving...',
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
	//$('#new_account').click(function(){
		
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

<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/jquery.jeditable.mini.js"></script>
<script>

</script>
</body>
</html>