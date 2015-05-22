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

	<!-- Push Wrapper -->
    <div class="mp-pusher" id="mp-pusher">

        <!-- mp-menu -->
        <nav id="mp-menu" class="mp-menu" >
            <div class="mp-level">
                <h2 class="icon icon-world">Audiences</h2>
                

                	<ul class="leftPaneFilters">
                    	
                    	<li id="searchButtonLI">
                        <form>
                        <input type="text" placeholder="Search"/>
                        <button id="searchButton" type="submit" name="searchButton" value=""></button>
                        </form>
                        </li>
                        <li><select>
                                <option>Filter</option>
                                <option>Active</option>
                                <option>Paused</option>
                        	</select>
                        </li>
                        <li><button type="button" />View All</button></li>
                    </ul>
                    
                    <div class="leftPaneFiltersDetails">
                    	<p>5 Audiences, Displaying 1-5</p>
                    </div>
                    
                	<ul class="cardsBox">
                        <li>
                        	<div class="plusSign">+</div>
                        	<div class="plusSignText">New Audience</div>
                        </li>
                    	<li>
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Board of Directors</p>
                            <!-- <p class="options"><span>Details</span><span>|</span><span>Open</span></p> -->
                            <div class="status statusGreen"></div>
                        </li>
                        <li>
                            <div class="pill"></div>
                            <p class="label">Camp Coordinators</p>
                            <div class="status statusYellow"></div>
                        </li>
                    	<li>
                        	<div class="pill"></div>
                            <p class="label">Camp Staff</p>
                            <div class="status statusGreen"></div>
                        </li>
                    	<li>
                            <div class="pill" style="background-image: url('http://perkapp.offunit.com/img/page-image-sample.png');"></div>
                            <p class="label">Partners</p>
                            <div class="status statusGreen"></div>
                        </li>
                    	<li class="selected">
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Vendors</p>
                            <div class="status statusGreen"></div>
                        </li>
					</ul>

                    <!--
                    <div class="leftPaneFiltersDetails">
                    	<p><a href="#">Load More</a></p>
                    </div>
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
                        
                            <ul class="leftPaneFilters">
                                
                                <li id="searchButtonLI">
                                <form>
                                <input type="text" placeholder="Search"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                </form>
                                </li>
                                <li><select>
                                        <option>Filter</option>
                                        <option>Active</option>
                                        <option>Paused</option>
                                    </select>
                                </li>
                                <li><button type="button" />View All</button></li>
                            </ul>
                            
		                    <div class="leftPaneFiltersDetails">
		                    	<p>05 Audiences, Displaying 1-5</p>
		                    </div>
		                    
		                	<ul class="cardsBox">
		                        <a href="<?php echo base_url() ?>audience/new_audience">
                                <li onclick="document.getElementById('audience_form').style.display='block';">
		                        	<div class="plusSign">+</div>
		                        	<div class="plusSignText">New Audience</div>
		                        </li></a>
                                <?php
								
								foreach($listing_data as $row){ ?>
		                    	<li>
		                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
		                            <p class="label"><?php echo $row->audience_profile_title;?></p>
		                            <!-- <p class="options"><span>Details</span><span>|</span><span>Open</span></p> -->
		                            <div class="status statusGreen"></div>
		                        </li>
		                       <?php } ?>
							</ul>
		
		                    <!--
		                    <div class="leftPaneFiltersDetails">
		                    	<p><a href="#">Load More</a></p>
		                    </div>
		                    -->

                        </div>
                        <!-- END OF splitPaneLeft -->
        
        
                        <div class="col span_8" id="splitPaneRight">
                        
                            <h2>Vendors</h2>
        
                            <form action="audience_add" method="post" id="audience_form">
<!-- Status -->                            
                            <div class="splitPaneRightRow statusGreen">
                            <h3  onclick="showSplitPlaneRow(this);">Status</h3><div class="splitPlaneQuickDetails">Active</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Status</div>
                                        <div class="formInfo col span_12">
                                            <select name="status" class="">
                                                <option value="active">Active</option>
                                                <option value="inactive">Pause</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
                                </ul>
                            </div>
<!-- Placement -->                           
                            <div class="splitPaneRightRow ">
                                <h3   onclick="showSplitPlaneRow(this);">Placement</h3><div class="splitPlaneQuickDetails">Selected</div>
                                <ul class="splitPaneRightDetails ">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Accounts</div>
                                        <div class="formInfo col span_12">
                                            <select name="select_account" class="">
                                                <option value="1">Selected Accounts</option>
                                                <option value="2">All Accounts</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
									<!-- If "Selected" is true above, then account checkboxes display. -->
                                    <li class="row">
                                        <div class="labelInfo col span_4"></div>
                                        <div class="formInfo col span_12">
                                            <div class="row">
                                                <div class="col span_7">
                                                    <input value="YES" name="checkbox1" id="checkbox1" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox1">Account 1</label>
                                                </div>
                                                <div class="col span_7">                                            
                                                    <input value="YES" name="checkbox2" id="checkbox2" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox2">Account 2</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col span_7">
                                                    <input value="YES" name="checkbox3" id="checkbox3" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox3">Account 3</label>
                                                </div>
                                                <div class="col span_7">                                            
                                                    <input value="YES" name="checkbox4" id="checkbox4" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox4">Account 4</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Websites</div>
                                        <div class="formInfo col span_12">
                                            <select class="">
                                                <option value="1">Selected Websites</option>
                                                <option value="2">All Websites</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
									<!-- If "Selected" is true above, then website checkboxes display. -->
                                    <li class="row">
                                        <div class="labelInfo col span_4"></div>
                                        <div class="formInfo col span_12">
                                            <div class="row">
                                                <div class="col span_7">
                                                    <input value="YES" name="checkbox1" id="checkbox1" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox1">Website 1</label>
                                                </div>
                                                <div class="col span_7">                                            
                                                    <input value="YES" name="checkbox2" id="checkbox2" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox2">Website 2</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col span_7">
                                                    <input value="YES" name="checkbox3" id="checkbox3" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox3">Website 3</label>
                                                </div>
                                                <div class="col span_7">                                            
                                                    <input value="YES" name="checkbox4" id="checkbox4" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox4">Website 4</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                            	<!-- Showing how a long domain can be displayed:
                                            	     > ellipses after 15 characters
                                            	     > show full domain on hover -->
                                                <div class="col span_7">
                                                    <input value="YES" name="checkbox5" id="checkbox5" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox5">reallylongdomai…</label>
                                                </div>
                                                 
                                                <div class="col span_7">                                            
                                                    <input value="YES" name="checkbox6" id="checkbox6" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox6">reallylongdomai…</label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </li>

                                </ul>
                            </div>
<!-- Profile -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails">Expand to view and add details.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Profile Image</div>
                                        <div class="formInfo col span_12"><input type="text" class="halfSize" /></div>
                                    
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Search Title</div>
                                        <div class="formInfo col span_12"><input type="text" name="audience_profile_title" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Search Summary</div>
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="audience_profile_summary"/></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Enrollment -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Enrollment</h3><div class="splitPlaneQuickDetails">Members can join automtically</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Enrollment</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="enrollment">
                                                <option value="join_automatically">Members can join automtically</option>
                                                <option value="join_request">Members can request to join</option>
                                                <option value="join_must_added">Members must be added</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
                                </ul>
                            </div>
<!-- Tags -->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Tags</h3><div class="splitPlaneQuickDetails">9 Tags</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Tags</div>
                                        <div class="formInfo col span_12"><textarea name="tags" class="doubleHeight"/></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Notes</div>
                                        <div class="formInfo col span_12"><textarea name="notes" class="doubleHeight"/></textarea></div>
                                    </li>
                                </ul>
                            </div>
                                                        
                            <div class="splitPaneRightRow rightButtonsRow">
                                <button class="remove">Remove</button><span class="floatRight"><button class="cancel">Cancel</button><button class="save">Save</button></span>
                            </div>
                            
                            </form>
        
                        </div><!-- END OF splitPaneRight -->
                        
                    </div><!-- END OF row gutters -->
        
                </main><!-- END OF contentContainer -->
                
                
                
                
                </div>
            </div><!-- /scroller-inner -->
        </div><!-- /scroller -->

        
    </div><!-- /pusher -->
</div>

<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
</body>
</html>