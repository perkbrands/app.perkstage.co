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
<?php  //	echo $image[0]->account_profile_image; ?>


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
                    <div id="splitPaneLeftContainer"></div>
                    <div id="splitPaneRightContainer"></div>
                    
                    
                    <div class="row">
                        <div id="splitPaneLeft" class="col span_8">
                        <?php if(isset($image) && $image[0]->account_profile_image!=''){?>
                       
                     <div class="account-logo" style="width:500px"><img width="100%" height="auto" src="<?php echo base_url(); ?>assets/img/account/<?php echo $image[0]->account_profile_image; ?>" /></div>
                        	<?php }else{ ?>
              <div class="account-logo" style="width:500px"><img width="100%" height="auto" src="<?php echo base_url(); ?>assets/img/admin/apple.jpg" /></div>
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
                            <form action="<?php echo base_url();?>account_setting/profile_save" id="my_form" enctype="multipart/form-data" method="post">
<!-- Labels -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Images</h3><div class="splitPlaneQuickDetails">Expand to View Images.</div>
                                <ul class="splitPaneRightDetails">
                                
                                <?php if(isset($image[0]->account_profile_image) && $image[0]->account_profile_image!=''){?>
                                    <li class="row">
                                    <div style="float:left;width:100px"><img src="<?php echo base_url(); ?>assets/img/account/<?php echo $image[0]->account_profile_image; ?>" height="auto" width="100%" /></div>
                                    
                                    </li>
                                   <?php }else{ ?>
                                  <li class="row">
                                  <div style="float:left;width:100px"><img src="<?php echo base_url(); ?>assets/img/admin/apple.jpg" height="auto" width="100%" /></div>
                                  </li>
                                 <?php } ?>
                         
                         <li class="row">
                                        <div class="labelInfo col span_4">Profile Image</div>
                                        <div class="formInfo col span_12"><input type="file"  name="account_image" class="halfSize" /></div>
                                    </li>
                         			
                         
                          <?php if(isset($query[0]->agency_profile_logo_color) && $query[0]->agency_profile_logo_color !=''){?>
                                    <li class="row">
                                    <div style="float:left;width:100px"><img src="<?php echo base_url(); ?>assets/img/account_color/<?php echo $query[0]->agency_profile_logo_color; ?>" height="auto" width="100%" /></div>
                                    
                                    </li>
                                  <?php }else{ ?>
                                  <li class="row">
                                  <div style="float:left;width:100px"><img src="<?php echo base_url(); ?>assets/img/admin/apple.jpg" height="auto" width="100%" /></div>
                                  </li>
                                 <?php } ?>
                         
                                    <li class="row">
                                        <div class="labelInfo col span_4">Logo (Color)</div>
                                        <div class="formInfo col span_12"><input type="file"  name="image_logo_color" class="halfSize" /></div>
                                    </li>
                                    
                                    <?php if(isset($query[0]->agency_profile_logo_reverse) && $query[0]->agency_profile_logo_reverse!=''){?>
                                    <li class="row">
                                    <div style="float:left;width:100px"><img src="<?php echo base_url(); ?>assets/img/account_reverse/<?php echo $query[0]->agency_profile_logo_reverse; ?>" height="auto" width="100%" /></div>
                                    
                                    </li>
                                   <?php }else{ ?>
                                  <li class="row">
                                  <div style="float:left; width:100px"><img src="<?php echo base_url(); ?>assets/img/admin/apple.jpg" height="auto" width="100%" /></div>
                                  </li>
                                 <?php } ?>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Logo (Reverse)</div>
                                        <div class="formInfo col span_12"><input type="file"  name="image_logo_reverse" class="halfSize" /></div>
                                    </li>

                                </ul>
                            </div>
<!-- Address -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Address</h3><div class="splitPlaneQuickDetails" id="form_pro_id"><?php if(isset($query[0]) && $query[0]->agency_profile_address_address!=''){ echo $query[0]->agency_profile_address_address; } ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Address</div>
                                        <div class="formInfo col span_12"><input type="text" id="profile_address" name="profile_address" value="<?php if(isset($query[0]) && $query[0]->agency_profile_address_address!=''){ echo $query[0]->agency_profile_address_address;} ?>" /><span class="required" id="profile_address_required"></span></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">City</div>
                                        <div class="formInfo col span_12"><input type="text" id="profile_city" name="profile_city" value="<?php if(isset($query[0]) && $query[0]->agency_profile_address_city!=''){ echo $query[0]->agency_profile_address_city;} ?>" /><span class="required" id="profile_city_required"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">State</div>
                                        <div class="formInfo col span_12">
                                            <select name="profile_state">
											 <?php if(isset($state_data)){
												foreach($state_data as $row_state){	
												?>
                                                <option <?php if(isset($query)){if($query[0]->agency_profile_address_state==$row_state->abbrev){echo 'selected=seleted';}} ?> value="<?php echo $row_state->abbrev; ?>"><?php echo $row_state->name; ?></option>
                                                <?php }} ?> 
                                            </select>                                
											<span class="required"></span>
                                        </div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Zip</div>
                                        <div class="formInfo col span_12"><input class="halfSize" id="profile_zip" name="profile_zip" value="<?php if(isset($query[0])){ echo $query[0]->agency_profile_address_zip;} ?>"  type="text" /><span class="required" id="profile_zip_required"></span></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Country</div>
                                        <div class="formInfo col span_12">
                                            <select name="profile_country">
                                                <?php if(isset($country_data)){
												foreach($country_data as $row_country){	
												?>
                                                <option <?php if(isset($query)){if($query[0]->agency_profile_address_country==$row_country->idCountry){echo 'selected=seleted';}} ?> value="<?php echo $row_country->idCountry; ?>"><?php echo $row_country->countryName; ?></option>
                                                <?php }} ?>
                                            </select>
                                            <span class="required"></span>                              
                                        </div>
                                    </li>
                                </ul>
                            </div>
<!-- Timezone -->                            
                            <div class="splitPaneRightRow ">
                             <?php
							 $time_zone='';
							 if(isset($timezone_data)){
										foreach($timezone_data as $row_timezone)
										{
										if(isset($query[0]->agency_profile_timezone_timezone)){if($query[0]->agency_profile_timezone_timezone==$row_timezone->id){
										$time_zone=$row_timezone->timezone_location.' '.$row_timezone->gmt;
										}
										}			
										}
										 }
												?>
                                <h3   onclick="showSplitPlaneRow(this);">Timezone</h3><div class="splitPlaneQuickDetails"><?php if($time_zone!=''){ echo $time_zone;}?></div>
                                <ul class="splitPaneRightDetails ">
                                   <!-- <li class="row">
                                        <div class="labelInfo col span_4">Timezone</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="profile_timezone">
                                                <option value="1">Central</option>
                                                <option value="2">List of Timezones</option>
                                            </select>                                
                                        </div>
                                     </li>-->
                                     
                                     
                                      <li class="row">
                                        <div class="labelInfo col span_4">Timezone</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="profile_timezone">
                                                <?php if(isset($timezone_data)){
												foreach($timezone_data as $row_timezone){
													$time_zone_selected=$row_timezone->timezone_location.' '.$row_timezone->gmt;
												?>
                                          <option <?php if(isset($query[0]->agency_profile_timezone_timezone)){if($query[0]->agency_profile_timezone_timezone==$time_zone_selected){echo 'selected=selected';}}  ?> value="<?php echo $row_timezone->timezone_location.' '.$row_timezone->gmt; ?>"><?php echo $row_timezone->timezone_location.' '.$row_timezone->gmt; ?></option>
                                                <?php }} ?>
                                               
                                            </select>                                
                                        </div>
                                    </li>
                                     
                                     
                                </ul>
                            </div>
<!-- Phone -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Phone</h3><div class="splitPlaneQuickDetails" id="phone_phone_id"><?php if(isset($query[0]->agency_profile_phone_phone)){ echo $query[0]->agency_profile_phone_phone;} ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Phone</div>
                                    <div class="formInfo col span_12"><input class="" id="profile_phone" name="profile_phone" value="<?php if(isset($query[0]->agency_profile_phone_phone)){ echo $query[0]->agency_profile_phone_phone; } ?>" type="tel" /><span class="required" id="profile_phone_required"></span></div>
                                    </li>
                                    
                                    <li class="row">
                            <div class="labelInfo col span_4">Alternate Phone</div>
   							<div class="formInfo col span_12">
                 	<input class="" id="profile_alternate_phone" name="profile_alternate_phone" value="<?php if(isset($query[0]->agency_profile_phone_alternate_phone)){ echo $query[0]->agency_profile_phone_alternate_phone; } ?>" type="tel" />
                 </div>
                                    </li>
                                </ul>
                            </div>
<!-- Email -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Email</h3><div class="splitPlaneQuickDetails" id="prof_email_id"><?php if(isset($query[0]->agency_profile_email_email)){ echo $query[0]->agency_profile_email_email; } ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Email</div>
                                        <div class="formInfo col span_12"><input class="" id="email_id" name="profile_email" value="<?php if(isset($query[0]->agency_profile_email_email)){ echo $query[0]->agency_profile_email_email; } ?>"  type="email" /><span class="required" id="email_required"></span></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Alternate Email</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_alternate_email" value="<?php if(isset($query[0]->agency_profile_email_alternate_email)){ echo $query[0]->agency_profile_email_alternate_email; } ?>"  type="email" /></div>
                                    </li>
                                </ul>
                            </div>
<!-- Domains -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Domains</h3><div class="splitPlaneQuickDetails" id="prof_domain_id"><?php if(isset($query[0]->agency_profile_domains_domain)){ echo $query[0]->agency_profile_domains_domain; } ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Domain</div>
                                        <div class="formInfo col span_12"><input class="" id="domain_id" name="profile_domain" value="<?php if(isset($query[0]->agency_profile_domains_domain)){ echo $query[0]->agency_profile_domains_domain; } ?>"  type="text" /><span class="required" id="domain_required"></span></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Blog Domain</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_blog_domain" value="<?php if(isset($query[0]->agency_profile_domains_blog_domain)){ echo $query[0]->agency_profile_domains_blog_domain;} ?>"  type="text" /></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Alternate Domain</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_alternate_domain" value="<?php if(isset($query[0]->agency_profile_domains_alternate_domain)){ echo $query[0]->agency_profile_domains_alternate_domain; } ?>" type="text" /></div>
                                    </li>
                                </ul>
                            </div>
<!-- Social -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Social</h3><div class="splitPlaneQuickDetails"><?php if(isset($query[0]->agency_profile_social_facebook)){ echo $query[0]->agency_profile_social_facebook; } ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Facebook Address</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_facebook" value="<?php if(isset($query[0]->agency_profile_social_facebook)){ echo $query[0]->agency_profile_social_facebook; } ?>"  type="text" /></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Twitter Address</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_twitter" value="<?php if(isset($query[0]->agency_profile_social_twitter)){ echo $query[0]->agency_profile_social_twitter; } ?>"  type="text" /></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Google+ Address</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_googleplus" value="<?php if(isset($query[0]->agency_profile_social_googleplus)){ echo $query[0]->agency_profile_social_googleplus; } ?>"  type="text" /></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Social: Other 1</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_other1"  value="<?php if(isset($query[0]->agency_profile_social_other1)){ echo $query[0]->agency_profile_social_other1; } ?>" type="text" /></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Social: Other 2</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_other2" value="<?php if(isset($query[0]->agency_profile_social_other2)){ echo $query[0]->agency_profile_social_other2; } ?>"  type="text" /></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Social: Other 3</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_other3" value="<?php if(isset($query[0]->agency_profile_social_other3)){ echo $query[0]->agency_profile_social_other3; } ?>"  type="text" /></div>
                                    </li>
                                </ul>
                            </div>

<!-- Tags -->                            
                            <div class="splitPaneRightRow" >
                               <h3  onclick="showSplitPlaneRow(this);">Tags</h3>
                                 <?php if(isset($query[0]->agency_profile_tags_tags)){
								$tag_profile = rtrim($query[0]->agency_profile_tags_tags,',');
								
								$tags_count=0;
							if($tag_profile!=''){
								$tags=explode(',',$tag_profile);
							
								$tags_count=count($tags);
							}
							}
								?>
                         <div class="splitPlaneQuickDetails" id="form_tag_id"><?php if(isset($tags_count)){ echo $tags_count;} ?> tags.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Tags</div>
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="profile_tags"/><?php if(isset($query[0]->agency_profile_tags_tags)){ echo $query[0]->agency_profile_tags_tags; } ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Notes</div>
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="profile_notes"/><?php if(isset($query[0]->agency_profiel_notes_notes)){ echo $query[0]->agency_profiel_notes_notes; } ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
                            
                            <?php
							$account_hidden_id= $this->uri->segment(3);
							if($account_hidden_id!=''){
								$account_hidden_id=$this->session->userdata('current_account_id');
								
							} 
							?>
                            
                            <input type="hidden" value="<?php echo $account_hidden_id;?>" name="hidden_id" />
                            
                            <input type="hidden" value="<?php if(isset($query[0]->profile_id)) echo $query[0]->profile_id; ?>" name="hiddenprofileid" />
                            
                            <!-- Desktop Buttons -->                    
                            <div class="splitPaneRightRow rightButtonsRow row gutters">
                            	
                                <div class="col span_8">&nbsp;</div>
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
<script>
$(document).ready(function() {
	$('#cancel_btn').attr("type", "button");
	$('#email_id').attr("type", "email");
});
</script>
<script type="text/javascript">
$(document).ready(function(){	
$('#save_btn').click(function(e) {


 var profile_address= $('#profile_address').val();
	if(profile_address==''){
		
		$('#form_pro_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		
		$('#profile_address').css({"border-color":"red"});
		$('#profile_address').focus();
		$('#profile_address_required').css({"color":"red"});		
		return false;
	}else{
		    $('#profile_address').css({"border-color":"#63dfff"});
			$('#profile_address_required').css({"color":"#fff"});	
		}	
	
	
	var profile_city= $('#profile_city').val();
	if(profile_city==''){
		$('#form_pro_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		$('#profile_city').css({"border-color":"red"});
		$('#profile_city').focus();
		$('#profile_city_required').css({"color":"red"});		
		return false;
	}else{
		    $('#profile_city').css({"border-color":"#63dfff"});
			$('#profile_city_required').css({"color":"#fff"});	
		}	
	var profile_zip= $('#profile_zip').val();
	if(profile_zip==''){
		$('#form_pro_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		$('#profile_zip').css({"border-color":"red"});
		$('#profile_zip').focus();
		$('#profile_zip_required').css({"color":"red"});		
		return false;
	}else{
		    $('#profile_zip').css({"border-color":"#63dfff"});
			$('#profile_zip_required').css({"color":"#fff"});	
		}	

	
var inputphone1=$('#profile_phone').val();
var inputphone2=$('#profile_alternate_phone').val();


	
	if(inputphone1==''){
		$('#phone_phone_id').parent().addClass('splitPaneRightSelected'); 
		$('#phone_phone_id').parent().children("ul").eq(0).show(300); 
		$('#phone_phone_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		
		$('#profile_phone').css({"border-color":"red"});
		$('#profile_phone_required').css({"color":"red"});
		$('#profile_phone').focus();	
		return false;
	}else{
		    $('#profile_phone').css({"border-color":"#63dfff"});
			$('#profile_phone_required').css({"color":"#fff"});	
		}	
			
	
	if(inputphone1!=''){		
        str = inputphone1.replace(/\s+/g, '');
	    str1 = str.replace(/[()]/g, '');
		str2 = str1.replace(/-/g, '');
		str3 = str2.replace('+', '');
		
		digits=str3.length;
		if(digits < 10){
			$('#phone_phone_id').parent().addClass('splitPaneRightSelected'); 
		    $('#phone_phone_id').parent().children("ul").eq(0).show(300); 
		    $('#phone_phone_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
			$('#profile_phone').css({"border-color":"red"});
			$('#profile_phone_required').css({"color":"red"});
			$('#profile_phone').focus();
			return false;
		}else{
		number = phoneCheckAndFormat(inputphone1, digits);
		$('#profile_phone').val(number);
		if (number === false) {
			$('#profile_phone').val('');
			$('#phone_phone_id').parent().addClass('splitPaneRightSelected'); 
		    $('#phone_phone_id').parent().children("ul").eq(0).show(300); 
		    $('#phone_phone_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
          	/*$('#form_pro_id').parent().toggleClass('splitPaneRightSelected'); 
			$('#form_pro_id').parent().children("ul").eq(0).slideToggle(300); */
			$('#profile_phone').css({"border-color":"red"});
			$('#profile_phone_required').css({"color":"red"});
			$('#profile_phone').focus();
			return false;
        }else{
		    $('#profile_phone').css({"border-color":"#63dfff"});
			$('#profile_phone_required').css({"color":"#fff"});	
			 }
			
			
		}
		}

		
		if(inputphone2!='') {
			////////////////////////
			
		str = inputphone2.replace(/\s+/g, '');
	    str1 = str.replace(/[()]/g, '');
		str2 = str1.replace(/-/g, '');
		str3 = str2.replace('+', '');
		
		digits=str3.length;
		if(digits < 10){
			
		$('#phone_phone_id').parent().addClass('splitPaneRightSelected'); 
		$('#phone_phone_id').parent().children("ul").eq(0).show(300); 
		$('#phone_phone_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);	
		
			$('#profile_alternate_phone').css({"border-color":"red"});
			$('#profile_alternate_phone').focus();
			return false;
		}else{
		number = phoneCheckAndFormat(inputphone2, digits);
		$('#profile_alternate_phone').val(number);
		if (number === false) {
			$('#phone_phone_id').parent().addClass('splitPaneRightSelected'); 
		    $('#phone_phone_id').parent().children("ul").eq(0).show(300); 
		    $('#phone_phone_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
			$('#profile_alternate_phone').val('');
          	$('#profile_alternate_phone').css({"border-color":"red"});
			$('#profile_alternate_phone').focus();
			$('#profile_alternate_phone').focus();
			return false;
        }else{
		    $('#profile_alternate_phone').css({"border-color":"#63dfff"});
			 }
			
			
		}
			
		}

  
	var email_id= $('#email_id').val();
	if(email_id==''){
		
		$('#prof_email_id').parent().addClass('splitPaneRightSelected'); 
		$('#prof_email_id').parent().children("ul").eq(0).show(300); 
		$('#prof_email_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);

		$('#email_id').css({"border-color":"red"});
		$('#email_id').focus();
		$('#email_required').css({"color":"red"});		
		return false;
	}else{
	 $('#email_id').css({"border-color":"#63dfff"});
			$('#email_required').css({"color":"#fff"});	
	}
	
	if(email_id!=''){
		
	  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	  
	  if(!emailReg.test(email_id)) {
		
		$('#prof_email_id').parent().addClass('splitPaneRightSelected'); 
		$('#prof_email_id').parent().children("ul").eq(0).show(300); 
		$('#prof_email_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		

		$('#email_id').focus();
		$('#email_required').css({"color":"red"});		
		return false;
		  
	  }
		
		
	}else{
	 $('#email_id').css({"border-color":"#63dfff"});
			$('#email_required').css({"color":"#fff"});	
	}
	
	var domain_id= $('#domain_id').val();
	if(domain_id==''){
		
		$('#prof_domain_id').parent().addClass('splitPaneRightSelected'); 
		$('#prof_domain_id').parent().children("ul").eq(0).show(300); 
		$('#prof_domain_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		$('#domain_id').css({"border-color":"red"});
		$('#domain_id').focus();
		$('#domain_required').css({"color":"red"});		
		return false;
	}else{
	 $('#domain_id').css({"border-color":"#63dfff"});
			$('#domain_required').css({"color":"#fff"});	
	}


});

///////////////for mobile starts here////////////////////////////
	$('#save_btn_mobile').click(function(e) {


 var profile_address= $('#profile_address').val();
	if(profile_address==''){
		
		$('#form_pro_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		
		$('#profile_address').css({"border-color":"red"});
		$('#profile_address').focus();
		$('#profile_address_required').css({"color":"red"});		
		return false;
	}else{
		    $('#profile_address').css({"border-color":"#63dfff"});
			$('#profile_address_required').css({"color":"#fff"});	
		}	
	
	
	var profile_city= $('#profile_city').val();
	if(profile_city==''){
		$('#form_pro_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		$('#profile_city').css({"border-color":"red"});
		$('#profile_city').focus();
		$('#profile_city_required').css({"color":"red"});		
		return false;
	}else{
		    $('#profile_city').css({"border-color":"#63dfff"});
			$('#profile_city_required').css({"color":"#fff"});	
		}	
	var profile_zip= $('#profile_zip').val();
	if(profile_zip==''){
		$('#form_pro_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		$('#profile_zip').css({"border-color":"red"});
		$('#profile_zip').focus();
		$('#profile_zip_required').css({"color":"red"});		
		return false;
	}else{
		    $('#profile_zip').css({"border-color":"#63dfff"});
			$('#profile_zip_required').css({"color":"#fff"});	
		}	

	
var inputphone1=$('#profile_phone').val();
var inputphone2=$('#profile_alternate_phone').val();


	
	if(inputphone1==''){
		$('#phone_phone_id').parent().addClass('splitPaneRightSelected'); 
		$('#phone_phone_id').parent().children("ul").eq(0).show(300); 
		$('#phone_phone_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		
		$('#profile_phone').css({"border-color":"red"});
		$('#profile_phone_required').css({"color":"red"});
		$('#profile_phone').focus();	
		return false;
	}else{
		    $('#profile_phone').css({"border-color":"#63dfff"});
			$('#profile_phone_required').css({"color":"#fff"});	
		}	
			
	
	if(inputphone1!=''){		
        str = inputphone1.replace(/\s+/g, '');
	    str1 = str.replace(/[()]/g, '');
		str2 = str1.replace(/-/g, '');
		str3 = str2.replace('+', '');
		
		digits=str3.length;
		if(digits < 10){
			$('#phone_phone_id').parent().addClass('splitPaneRightSelected'); 
		    $('#phone_phone_id').parent().children("ul").eq(0).show(300); 
		    $('#phone_phone_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
			$('#profile_phone').css({"border-color":"red"});
			$('#profile_phone_required').css({"color":"red"});
			$('#profile_phone').focus();
			return false;
		}else{
		number = phoneCheckAndFormat(inputphone1, digits);
		$('#profile_phone').val(number);
		if (number === false) {
			$('#profile_phone').val('');
			$('#phone_phone_id').parent().addClass('splitPaneRightSelected'); 
		    $('#phone_phone_id').parent().children("ul").eq(0).show(300); 
		    $('#phone_phone_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
          	/*$('#form_pro_id').parent().toggleClass('splitPaneRightSelected'); 
			$('#form_pro_id').parent().children("ul").eq(0).slideToggle(300); */
			$('#profile_phone').css({"border-color":"red"});
			$('#profile_phone_required').css({"color":"red"});
			$('#profile_phone').focus();
			return false;
        }else{
		    $('#profile_phone').css({"border-color":"#63dfff"});
			$('#profile_phone_required').css({"color":"#fff"});	
			 }
			
			
		}
		}

		
		if(inputphone2!='') {
			////////////////////////
			
		str = inputphone2.replace(/\s+/g, '');
	    str1 = str.replace(/[()]/g, '');
		str2 = str1.replace(/-/g, '');
		str3 = str2.replace('+', '');
		
		digits=str3.length;
		if(digits < 10){
			
		$('#phone_phone_id').parent().addClass('splitPaneRightSelected'); 
		$('#phone_phone_id').parent().children("ul").eq(0).show(300); 
		$('#phone_phone_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);	
		
			$('#profile_alternate_phone').css({"border-color":"red"});
			$('#profile_alternate_phone').focus();
			return false;
		}else{
		number = phoneCheckAndFormat(inputphone2, digits);
		$('#profile_alternate_phone').val(number);
		if (number === false) {
			$('#phone_phone_id').parent().addClass('splitPaneRightSelected'); 
		    $('#phone_phone_id').parent().children("ul").eq(0).show(300); 
		    $('#phone_phone_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
			$('#profile_alternate_phone').val('');
          	$('#profile_alternate_phone').css({"border-color":"red"});
			$('#profile_alternate_phone').focus();
			$('#profile_alternate_phone').focus();
			return false;
        }else{
		    $('#profile_alternate_phone').css({"border-color":"#63dfff"});
			 }
			
			
		}
			
		}

  
	var email_id= $('#email_id').val();
	if(email_id==''){
		
		$('#prof_email_id').parent().addClass('splitPaneRightSelected'); 
		$('#prof_email_id').parent().children("ul").eq(0).show(300); 
		$('#prof_email_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);

		$('#email_id').css({"border-color":"red"});
		$('#email_id').focus();
		$('#email_required').css({"color":"red"});		
		return false;
	}else{
	 $('#email_id').css({"border-color":"#63dfff"});
			$('#email_required').css({"color":"#fff"});	
	}
	
	if(email_id!=''){
		
	  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	  
	  if(!emailReg.test(email_id)) {
		
		$('#prof_email_id').parent().addClass('splitPaneRightSelected'); 
		$('#prof_email_id').parent().children("ul").eq(0).show(300); 
		$('#prof_email_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		

		$('#email_id').focus();
		$('#email_required').css({"color":"red"});		
		return false;
		  
	  }
		
		
	}else{
	 $('#email_id').css({"border-color":"#63dfff"});
			$('#email_required').css({"color":"#fff"});	
	}
	
	var domain_id= $('#domain_id').val();
	if(domain_id==''){
		
		$('#prof_domain_id').parent().addClass('splitPaneRightSelected'); 
		$('#prof_domain_id').parent().children("ul").eq(0).show(300); 
		$('#prof_domain_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		$('#domain_id').css({"border-color":"red"});
		$('#domain_id').focus();
		$('#domain_required').css({"color":"red"});		
		return false;
	}else{
	 $('#domain_id').css({"border-color":"#63dfff"});
			$('#domain_required').css({"color":"#fff"});	
	}


});
	
//////////////mobile ends here////////////////////////////

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