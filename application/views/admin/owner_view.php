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
<?php  ?>
<div class="container">
	<div id="splitPaneLeftContainer"></div>
    <div id="splitPaneRightContainer"></div>

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
                            <form method="post" action="<?php echo base_url();?>account_setting/owner_save">
<!-- Person -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Owner</h3><div class="splitPlaneQuickDetails"><?php if($query!='empty'){ echo $query[0]->user_first_name .'  '.$query[0]->user_last_name;} ?></div>
                                <ul class="splitPaneRightDetails">
                                    <?php /*?><li class="row">
                                        <div class="labelInfo col span_4">First Name</div>
                                        <div class="formInfo col span_12"><input type="text" id="owner_first_name" name="owner_first_name" value="<?php echo $query[0]->agency_owner_person_first_name ?>" /><span class="required" id="first_name_required"></span></div>
                                    
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Last Name</div>
                                        <div class="formInfo col span_12"><input type="text" id="owner_last_name" name="owner_last_name" value="<?php echo $query[0]->agency_owner_person_last_name ?>" /><span class="required" id="last_name_required"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Email Address</div>
                                <div class="formInfo col span_12"><input type="email" id="owner_email_address" name="owner_email_address" value="<?php echo $query[0]->agency_owner_person_email_address ?>" /><span class="required" id="email_required"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Phone</div>
                                        <div class="formInfo col span_12"><input type="tel" id="owner_phone" name="owner_phone" value="<?php echo $query[0]->agency_owner_person_phone ?>" /><span class="required" id="required_phone_owner"></span></div>
                                    </li><?php */?>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Account Administrators </div>
                                        <div class="formInfo col span_12">
                                        	<select id="account_administrator" name="account_administrator" >
                                            	<option value="">Select Administrators</option>
                                                <?php foreach($all_admin as $row) { ?>
                                            	<option value="<?php echo  $row->user_id ?>" <?php if($selected_admin[0]->account_owner_id==$row->user_id) {?> selected="selected" <?php } ?>><?php  echo $row->user_first_name .'  '.$row->user_last_name;  ?></option>
                                                <?php } ?>
                                            </select>
                                        </span></div>
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
                            <input type="hidden" value="<?php if(isset($query[0]->owner_id)) echo $query[0]->owner_id; ?>" name="hiddenownerid" />
                            <!-- Desktop Buttons -->                    
                            <div class="splitPaneRightRow rightButtonsRow row gutters">
                            	
                                <div class="col span_4">
	                                <button class="remove" id="remove_btn">Remove</button>
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
       						 <?php }  ?>
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
	$('#remove_btn').attr("type", "button");
});
</script>
<script type="text/javascript">
$(document).ready(function(){

$('#save_btn').click(function(){	
var inputphone1=$('#owner_phone').val();

	
	if(inputphone1==''){
		$('#owner_phone').css({"border-color":"red"});
		$('#owner_phone_required').css({"color":"red"});
		$('#owner_phone').focus();	
		return false;
	}
			
	
		if(inputphone1!='') {
			/////////////////////////
			
		str = inputphone1.replace(/\s+/g, '');
	    str1 = str.replace(/[()]/g, '');
		str2 = str1.replace(/-/g, '');
		str3 = str2.replace('+', '');
		
		digits=str3.length;
		if(digits < 10){ 
			$('#owner_phone').css({"border-color":"red"});
			$('#owner_phone_required').css({"color":"red"});
			$('#owner_phone').focus();
			return false;
		}else{
		number = phoneCheckAndFormat(inputphone1, digits);
		$('#owner_phone').val(number);
		if (number === false) {
			$('#owner_phone').val('');
          	$('#owner_phone').css({"border-color":"red"});
			$('#owner_phone_required').css({"color":"red"});
			$('#owner_phone').focus();
			return false;
        }else{
		    $('#owner_phone').css({"border-color":"#63dfff"});
			 }
			
			
		}
			
		}
		
	var firstname_val= $('#owner_first_name').val();
	if(firstname_val==''){
		$('#owner_first_name').css({"border-color":"red"});
		$('#owner_first_name').focus();
		$('#first_name_required').css({"color":"red"});		
		return false;
	}	
	
	var lastname_val= $('#owner_last_name').val();
	if(lastname_val==''){
		$('#owner_last_name').css({"border-color":"red"});
		$('#owner_last_name').focus();
		$('#last_name_required').css({"color":"red"});		
		return false;
	}
	
	var email_val= $('#owner_email_address').val();
	if(email_val==''){
		$('#owner_email_address').css({"border-color":"red"});
		$('#email_required').css({"color":"red"});
		$('#owner_email_address').focus();
		
		return false;
	}	
		
});

$('#save_btn_mobile').click(function(e) {
	
	var inputphone1=$('#owner_phone').val();

	
	if(inputphone1==''){
		$('#owner_phone').css({"border-color":"red"});
		$('#owner_phone_required').css({"color":"red"});
		$('#owner_phone').focus();	
		return false;
	}
			
	
		if(inputphone1!='') {
			/////////////////////////
			
		str = inputphone1.replace(/\s+/g, '');
	    str1 = str.replace(/[()]/g, '');
		str2 = str1.replace(/-/g, '');
		str3 = str2.replace('+', '');
		
		digits=str3.length;
		if(digits < 10){ 
			$('#owner_phone').css({"border-color":"red"});
			$('#owner_phone_required').css({"color":"red"});
			$('#owner_phone').focus();
			return false;
		}else{
		number = phoneCheckAndFormat(inputphone1, digits);
		$('#owner_phone').val(number);
		if (number === false) {
			$('#owner_phone').val('');
          	$('#owner_phone').css({"border-color":"red"});
			$('#owner_phone_required').css({"color":"red"});
			$('#owner_phone').focus();
			return false;
        }else{
		    $('#owner_phone').css({"border-color":"#63dfff"});
			 }	
		}
			
		}
		
	var firstname_val= $('#owner_first_name').val();
	if(firstname_val==''){
		$('#owner_first_name').css({"border-color":"red"});
		$('#owner_first_name').focus();
		$('#first_name_required').css({"color":"red"});		
		return false;
	}	
	
	var lastname_val= $('#owner_last_name').val();
	if(lastname_val==''){
		$('#owner_last_name').css({"border-color":"red"});
		$('#owner_last_name').focus();
		$('#last_name_required').css({"color":"red"});		
		return false;
	}
	
	var email_val= $('#owner_email_address').val();
	if(email_val==''){
		$('#owner_email_address').css({"border-color":"red"});
		$('#email_required').css({"color":"red"});
		$('#owner_email_address').focus();
		
		return false;
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

  $('.edit').editable('<?php echo base_url()?>ajax/update_ajax_data_profile', {
		 id : 'elementid',
		 indicator : 'Saving...',
		 submitdata : {account_id: $('#account_id').val()},
         tooltip   : 'Click to edit...',
		 cancel : 'Cancel',
		 submit  : 'Save',
		 onblur : 'ignore',
     });
	
$('#remove_btn').click(function(){
	var r = confirm("Are you sure you want to delete");
	if (r == true) {
		var del_id=$('#account_administrator').val();
		window.location.href='<?php echo base_url() ?>account_setting/owner_option_delete/'+del_id;
	} else {
		
	}
});	
	
});
</script>
<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/jquery.jeditable.mini.js"></script>
</body>
</html>