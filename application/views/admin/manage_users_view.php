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
                <h2 class="icon icon-world">Manage Users</h2>
                

                	<ul class="leftPaneFilters">

                                <form action="<?php echo base_url(); ?>agency/agency_search" method="post" name="search_form" id="search_form" style="float:left; margin-right:-20px;">
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
                                    <input type="hidden" name="selected_value" id="selected_value" />
                                       
                               </li>
                               </li> 
                                </form>
                                <a href="<?php echo base_url(); ?>agency/all_agency"><li><button type="button" />View All</button></li></a>
                            </ul>
                    
                    <div class="leftPaneFiltersDetails">
                            <?php /*if(isset($listing_data)){ ?>
                                <p><?php echo count($listing_data).' Account(s)'; ?></p>
                            <?php }*/ ?>
                            </div>
                    
                    <ul class="cardsBox">                                 
								
                               <?php  /*if(isset($query) && $query!='') { ?>                               	
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
                                 <?php } ?> 
   
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
                                    <p class="options"><span id="setting_id"><?php echo "<a  href=".base_url()."agency/account_setting/$row->account_id>Settings</a>
									"; ?></span><span class="pipe">|</span>
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
                                <?php }*/ ?>
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
                        
                            <?php /*?><ul class="leftPaneFilters">

                                <form action="<?php echo base_url(); ?>agency/agency_search" method="post" name="search_form" id="search_form" style="float:left; margin-right:-20px;">
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
                                    <input type="hidden" name="selected_value" id="selected_value" />  
                               </li>
                               </li> 
                                </form>
                                <a href="<?php echo base_url(); ?>agency/all_agency"><li><button type="button" />View All</button></li></a>
                            </ul><?php */?>
                            
                            <div class="leftPaneFiltersDetails">
                            <?php /*if(isset($listing_data)){ ?>
                                <p><?php echo count($listing_data).' Account(s)'; ?></p>
                            <?php }*/ ?>
                            </div>
                            <ul class="cardsBox">                                 
								
                               <?php  /*if(isset($query) && $query!='') { ?>                               	
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
                                 <?php }*/ ?> 
   
                                <?php /*foreach($listing_data as $row){ 
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
                                     <p class="options"><span id="setting_id"><?php echo "<a  href=".base_url()."agency/account_setting/$row->account_id>Settings</a>
									"; ?></span><span class="pipe">|</span>
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
                                <?php }*/ ?>
                                <li class="spacer"></li>
                                <li class="spacer"></li>
                                <li class="spacer"></li>                                
                            </ul>
        
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
							<table id="user_roles" border="1" width="100%">
                            <tr>
                            <td width="33%">User Accounts</td>
                            <td width="33%">Roles</td>
                            <td width="34%">Action</td>
                            </tr>
                            
                            <tr>
                            <td width="33%">
                            <select>
                            <?php foreach($listing_data as $row){ 
							if(isset($row->user_id)){ ?>
                            <option value="<?php echo $row->user_id; ?>">
                            <?php echo $row->user_first_name.' '.$row->user_last_name; ?>
                            </option>
                            <?php }} ?>
                            </select>
                            </td>
                            <td width="33%">
                            <select>
                            <option value="1">Administrator</option>
                            <option value="2">Editor</option>
                            <option value="3">Member</option>
                            <option value="4">Public</option>
                            </select>
                            </td>
                            <td width="34%"><a style="color:blue" href="#">Delete</a> | <a style="color:blue" href="#">Edit</a></td>
                            </tr>
                            <tr align="right">
                             <td colspan="3" width="34%" align="right"><a style="color:blue;margin-right:10px" href="#">Add</a></td>
                            </tr>
                            
                            </table>
                        </div><!-- END OF splitPaneRight -->
                        
                    </div><!-- END OF row gutters -->
        
                </main><!-- END OF contentContainer -->               
                
                </div>
            </div><!-- /scroller-inner -->
        </div><!-- /scroller -->

        
    </div><!-- /pusher -->
</div>

<script type="text/javascript">
          function submit_change_val(selected_value){
			$('#selected_value').val(selected_value);
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
	$('#cancel_btn').attr("type", "reset");
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
	var phoneno = "/^\+?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/";
	
	if(inputphone1==''){
		$('#phone_one_id').css({"border-color":"red"});
		$('#phone_one_id').focus();
		$('#phone_first_required').css({"color":"red"});		
		return false;
	}
			
	
		if(inputphone1!='') {
			if((inputphone1.match(phoneno)))
			{
	
			}else{
				$('#phone_one_id').css({"border-color":"red"});
				$('#phone_first_required').css({"color":"red"});
				$('#phone_one_id').focus();
				 return false;  
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
if(inputphone==''){
		$('#phone_id').css({"border-color":"red"});
		$('#phone_id').focus();
		$('#phone_second_required').css({"color":"red"});		
		return false;
	}
		if(inputphone!='') {
		  if((inputphone.match(phoneno)))
			{
				
			}else{
					 
							$('#phone_id').css({"border-color":"red"});
							$('#phone_id').focus();
							 return false;  
				 
			}
			}  
	
		

   	});
	
	
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
	var phoneno = "/^\+?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/";
	
	if(inputphone1==''){
		$('#phone_one_id').css({"border-color":"red"});
		$('#phone_one_id').focus();
		$('#phone_first_required').css({"color":"red"});		
		return false;
	}
			
	
		if(inputphone1!='') {
			if((inputphone1.match(phoneno)))
			{
	
			}else{
				$('#phone_one_id').css({"border-color":"red"});
				$('#phone_first_required').css({"color":"red"});
				$('#phone_one_id').focus();
				 return false;  
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
if(inputphone==''){
		$('#phone_id').css({"border-color":"red"});
		$('#phone_id').focus();
		$('#phone_second_required').css({"color":"red"});		
		return false;
	}
		if(inputphone!='') {
		  if((inputphone.match(phoneno)))
			{
				
			}else{
					 
							$('#phone_id').css({"border-color":"red"});
							$('#phone_id').focus();
							 return false;  
				 
			}
			}  
	
		

   	});
	
	
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

});


</script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/jquery.jeditable.mini.js"></script>

</body>
</html>