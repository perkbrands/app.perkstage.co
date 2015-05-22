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
                <h2 class="icon icon-world">Owner</h2>
                	
                	<div class="account-logo"><img src="http://cms.perkstage.co/img/logo.png"></div>
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
                        <div class="account-logo"><img src="http://cms.perkstage.co/img/logo.png"></div>
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
                        
                            <h2>Owner</h2>
        
                            <!--
                            <div class="pageNotes">
                                 <div class="note">Involved in 0 Campaigns</div>
                                <button class="editPage">Edit Page</button>
                            </div>
                            -->
                            <form method="post" action="owner_save">
<!-- Person -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Person</h3><div class="splitPlaneQuickDetails">Children's Harbor</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">First Name</div>
                                        <div class="formInfo col span_12"><input type="text" name="owner_first_name" /><span class="required"></span></div>
                                    
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Last Name</div>
                                        <div class="formInfo col span_12"><input type="text" name="owner_last_name" /><span class="required"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Email Address</div>
                                        <div class="formInfo col span_12"><input type="text" name="owner_email_address" /><span class="required"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Phone</div>
                                        <div class="formInfo col span_12"><input type="text" name="owner_phone" /><span class="required"></span></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notifications -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Notifications</h3><div class="splitPlaneQuickDetails">jason@perkbrands.co, No Texts</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Receive emails at:</div>
                                        <div class="formInfo col span_12"><input class="" name="owner_recieve_email"  type="text" /></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Receive texts at:</div>
                                        <div class="formInfo col span_12"><input class="" name="owner_recieve_text"  type="text" /></div>
                                    </li>
                                </ul>
                            </div>
<!-- Tags -->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Tags</h3><div class="splitPlaneQuickDetails">Expand to view and add tags.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Tags</div>
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="owner_tags"/></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Notes</div>
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="owner_notes"/></textarea></div>
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