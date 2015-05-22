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
<?php  //	echo $image[0]->account_profile_image; ?>


	<!-- Push Wrapper -->
    <div class="mp-pusher" id="mp-pusher">

        <!-- mp-menu -->
        <nav id="mp-menu" class="mp-menu" >
            <div class="mp-level">
                <h2 class="icon icon-world">Settings</h2>
                	
                	<div class="account-logo"><img src="<?php echo base_url(); ?>assets/img/account/<?php echo $image[0]->account_profile_image; ?>"></div>
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
                


				<?php // $this->load->view('templates/admin/header'); ?>
        
                <main id="contentContainer">
                    <div id="splitPaneLeftContainer"></div>
                    <div id="splitPaneRightContainer"></div>
                    
                    
                    <div class="row">
                        <div id="splitPaneLeft" class="col span_8">
                        <div class="account-logo"><img src="<?php echo base_url(); ?>assets/img/account/<?php echo $image[0]->account_profile_image; ?>"></div>
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
                            <h2>Profile</h2>
        
                            <!--
                            <div class="pageNotes">
                                 <div class="note">Involved in 0 Campaigns</div>
                                <button class="editPage">Edit Page</button>
                            </div>
                            -->
                            <form action="<?php echo base_url();?>account_setting/profile_save" method="post">
<!-- Labels -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Labels</h3><div class="splitPlaneQuickDetails"><?php echo $query[0]->agency_profile_label ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Label</div>
                                        <div class="formInfo col span_12"><input type="text" name="profile_label" value="<?php echo $query[0]->agency_profile_label ?>" /><span class="required"></span></div>
                                    
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Logo (Color)</div>
                                        <div class="formInfo col span_12"><input type="text" name="profile_logo_color" value="<?php echo $query[0]->agency_profile_logo_color ?>" class="halfSize"/></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Logo (Reverse)</div>
                                        <div class="formInfo col span_12"><input type="text" name="profile_logo_reverse" value="<?php echo $query[0]->agency_profile_logo_reverse ?>" class="halfSize"/></div>
                                    </li>

                                </ul>
                            </div>
<!-- Address -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Address</h3><div class="splitPlaneQuickDetails">Expand to view and add details.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Address</div>
                                        <div class="formInfo col span_12"><input type="text" name="profile_address" value="<?php echo $query[0]->agency_profile_address_address ?>" /><span class="required"></span></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">City</div>
                                        <div class="formInfo col span_12"><input type="text" name="profile_city" value="<?php echo $query[0]->agency_profile_address_city ?>" /><span class="required"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">State</div>
                                        <div class="formInfo col span_12">
                                            <select name="profile_state">
											<option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District Of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option> 
                                            </select>                                
											<span class="required"></span>
                                        </div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Zip</div>
                                        <div class="formInfo col span_12"><input class="halfSize" name="profile_zip" value="<?php echo $query[0]->agency_profile_address_zip ?>"  type="text" /><span class="required"></span></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Country</div>
                                        <div class="formInfo col span_12">
                                            <select name="profile_country">
                                                <option value="1">Country</option>
                                                <option value="2">United States</option>
                                                <option value="3">Country</option>
                                                <option value="4">Country</option>
                                                <option value="5">Country</option>
                                            </select>
                                            <span class="required"></span>                              
                                        </div>
                                    </li>
                                </ul>
                            </div>
<!-- Timezone -->                            
                            <div class="splitPaneRightRow ">
                                <h3   onclick="showSplitPlaneRow(this);">Timezone</h3><div class="splitPlaneQuickDetails">Central</div>
                                <ul class="splitPaneRightDetails ">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Timezone</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="profile_timezone">
                                                <option value="1">Central</option>
                                                <option value="2">List of Timezones</option>
                                            </select>                                
                                        </div>
                                     </li>
                                </ul>
                            </div>
<!-- Phone -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Phone</h3><div class="splitPlaneQuickDetails"><?php echo $query[0]->agency_profile_phone_phone ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Phone</div>
                                    <div class="formInfo col span_12"><input class="" name="profile_phone" value="<?php echo $query[0]->agency_profile_phone_phone ?>" type="number" /><span class="required"></span></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Alternate Phone</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_alternate_phone" value="<?php echo $query[0]->agency_profile_phone_alternate_phone ?>" type="number" /></div>
                                    </li>
                                </ul>
                            </div>
<!-- Email -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Email</h3><div class="splitPlaneQuickDetails"><?php echo $query[0]->agency_profile_email_email ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Email</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_email" value="<?php echo $query[0]->agency_profile_email_email ?>"  type="email" /><span class="required"></span></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Alternate Email</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_alternate_email" value="<?php echo $query[0]->agency_profile_email_alternate_email ?>"  type="email" /></div>
                                    </li>
                                </ul>
                            </div>
<!-- Domains -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Domains</h3><div class="splitPlaneQuickDetails"><?php echo $query[0]->agency_profile_domains_domain ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Domain</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_domain" value="<?php echo $query[0]->agency_profile_domains_domain ?>"  type="text" /><span class="required"></span></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Blog Domain</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_blog_domain" value="<?php echo $query[0]->agency_profile_domains_blog_domain ?>"  type="text" /></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Alternate Domain</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_alternate_domain" value="<?php echo $query[0]->agency_profile_domains_alternate_domain ?>" type="text" /></div>
                                    </li>
                                </ul>
                            </div>
<!-- Social -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Social</h3><div class="splitPlaneQuickDetails">Expand to view and add details.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Facebook Address</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_facebook" value="<?php echo $query[0]->agency_profile_social_facebook ?>"  type="text" /></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Twitter Address</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_twitter" value="<?php echo $query[0]->agency_profile_social_twitter ?>"  type="text" /></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Google+ Address</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_googleplus" value="<?php echo $query[0]->agency_profile_social_googleplus ?>"  type="text" /></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Social: Other 1</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_other1"  value="<?php echo $query[0]->agency_profile_social_other1 ?>" type="text" /></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Social: Other 2</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_other2" value="<?php echo $query[0]->agency_profile_social_other2 ?>"  type="text" /></div>
                                    </li>

                                    <li class="row">
                                        <div class="labelInfo col span_4">Social: Other 3</div>
                                        <div class="formInfo col span_12"><input class="" name="profile_other3" value="<?php echo $query[0]->agency_profile_social_other3 ?>"  type="text" /></div>
                                    </li>
                                </ul>
                            </div>

<!-- Tags -->                            
                            <div class="splitPaneRightRow" >
                               <h3  onclick="showSplitPlaneRow(this);">Tags</h3>
                                 <?php if(isset($query[0]->agency_profile_tags_tags)){
								$tag_profile = rtrim($query[0]->agency_profile_tags_tags,',');
								$tags=explode(',',$tag_profile);
								$tags_count=count($tags);
							}
								?>
                         <div class="splitPlaneQuickDetails" id="form_tag_id"><?php if(isset($tags_count)){ echo $tags_count;} ?> tags.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Tags</div>
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="profile_tags"/><?php echo $query[0]->agency_profile_tags_tags ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Notes</div>
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="profile_notes"/><?php echo $query[0]->agency_profiel_notes_notes ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
                            <input type="hidden" value="<?php if(isset($postback)) echo $postback; else {echo $this->uri->segment(3); }?>" name="hiddenid" />
                            <div class="splitPaneRightRow rightButtonsRow">
                                <span class="floatRight"><button class="cancel" id="cancel_btn">Cancel</button><button class="save">Save</button></span>
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
	alert('ddddddddd');
	$('#cancel_btn').attr("type", "reset");
</script>

<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
</body>
</html>