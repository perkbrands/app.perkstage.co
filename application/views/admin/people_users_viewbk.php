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

<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/modernizr.custom.js"></script>
<script type="text/javascript">
function submit_change_val(){

$('#search_form').submit();
}
</script>
</head>

<body>
<div class="container">

	<!-- Push Wrapper -->
    <div class="mp-pusher" id="mp-pusher">

        <!-- mp-menu -->
        <nav id="mp-menu" class="mp-menu" >
            <div class="mp-level">
                <h2 class="icon icon-world">Administrators</h2>
                

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
                    	<p>37 Administrators, Displaying 1-11</p>
                    </div>
                    
                	<ul class="cardsBox">
                        <li>
                        	<div class="plusSign">+</div>
                        	<div class="plusSignText">New Person</div>
                        </li>
                    	
                        
                          <?php foreach($listing_data as $row){ ?>
                                 <a  href="#">
                                  <li>
                            <div class="pill" style="background-image: url('http://perkapp.offunit.com/img/page-image-sample.png');"></div>
                            <p class="label"><?php echo $row->user_first_name;?></p>
                            <div class="status statusGreen"></div>
                        </li>
                             </a>   
                                <?php } ?>   
                        
                        
                       
					</ul>

                    <div class="leftPaneFiltersDetails">
                    	<p><a href="#">Load More</a></p>
                    </div>

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
                                <form action="<?php echo base_url(); ?>people_user_controller/poeple_search" method="post" name="search_form" id="search_form" style="float:left; margin-right:-20px;">
                               
                               <li id="searchButtonLI">
                               <?php
							   $search_in=''; 
							   if($this->uri->segment(2)=='people_administrator'){
							    $search_in='administrator';
							   }
							   if($this->uri->segment(2)=='people_editor'){
							    $search_in='editor';
							   }
							   if($this->uri->segment(2)=='people_member'){
							    $search_in='member';
							   }
							   ?>
                               <input type="hidden" name="hidden_val_people" value="<?php echo $search_in; ?>"  />
                                <input type="text" placeholder="Search" name="txt_search"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                
                               </li>
                                <li>
                                    <select onchange="submit_change_val()" name="lst_filter" style="margin-right:-7px;">
                                        <option>Filter</option>
                                         <option value="1" <?php if(isset($search_var) && $search_var==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var==0){echo "selected=selected";} ?>>Pause</option>
                                    </select>
                               </li>
                                </form>
                                <a href="<?php echo base_url(); ?>people_user_controller/all_people"><li><button type="button" />View All</button></li></a>
                            </ul>
                            
                            
		                      <div class="leftPaneFiltersDetails">
		                    	 <?php if(isset($listing_data)){ ?>
                                 <?php if($this->uri->segment(2)=='people_administrator'){ ?>
                    	<p><?php echo count($listing_data);?> Administrators, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_editor'){ ?>
                    	<p><?php echo count($listing_data);?> Editors, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 
                                 <?php if($this->uri->segment(2)=='people_member'){ ?>
                    	<p><?php echo count($listing_data);?> Members, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_me'){ ?>
                    	<p>      Me, Displaying</p>
                                 <?php } ?>
                    <?php } ?>
		                    </div>
		                    
		                	<ul class="cardsBox">
                            <?php if($this->uri->segment(2)!='people_me'){ ?>
							     	<?php if(isset($query) && $query!='') { 
                                    if($this->uri->segment(2)=='edit_people_editor')
									{ 
									?>
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/enew">
                                    <?php }
									else if($this->uri->segment(2)=='edit_people_administrator') { ?>
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/anew">
                                    <?php }
                                    else if($this->uri->segment(2)=='edit_people_administrator') { ?>
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/mnew">
									<?php } ?>
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
                                 <?php }} ?> 
        
                                
		                    	
                                 <?php 
								 foreach($listing_data as $row){ ?>
                                 <?php if($this->uri->segment(2)=='people_administrator'){ ?>
                                <a  href="<?php echo base_url()."people_user_controller/edit_people_administrator/".$row->user_id ?>">
                                <?php }?>
                                <?php if($this->uri->segment(2)=='people_editor'){ ?>
                                 <a  href="<?php echo base_url()."people_user_controller/edit_people_editor/".$row->user_id ?>">
                                 <?php } ?>
                                  <?php if($this->uri->segment(2)=='people_member'){ ?>
                                 <a  href="<?php echo base_url()."people_user_controller/edit_people_member/".$row->user_id ?>">
                                 <?php } ?>
                                 
                                  <li>
								<div class="pill" style="background-image: url('<?php echo base_url(); ?>assets/img/people/<?php echo $row->user_profile_image; ?>')">&nbsp;</div>                            <p class="label"><?php echo  $row->user_first_name;?></p>
                            <div class="status statusGreen"></div>
                        </li>
                        </a>
                           <?php } ?>   
							</ul>

		                   <!-- <div class="leftPaneFiltersDetails">
		                    	<p><a href="#">Load More</a></p>
		                    </div>-->

                        </div>
                        <!-- END OF splitPaneLeft -->
        
        
                        <div class="col span_8" id="splitPaneRight">
                        
                             <?php if(isset($query[0]->user_first_name) && $this->uri->segment(3)!=''){?>
                            <h2><?php echo $query[0]->user_first_name; ?></h2>
                            <?php } ?>
                       <form action="<?php echo base_url();?>people_user_controller/people_add" enctype="multipart/form-data" method="post" id="my_form" <?php if(isset($query) && $query!='') { ?>  style="display:block;" <?php }else { ?> style="display:none;" <?php } ?>>
<!-- Status -->                       

							<?php
							$edit_hidden_value='';
							if($this->uri->segment(2)=='edit_people_administrator'){
                            $edit_hidden_value='edit_administrator';
                            }
                            
                            if($this->uri->segment(2)=='people_editor'){
                            $edit_hidden_value='edit_editor';
                            }
                            
                            if($this->uri->segment(2)=='edit_people_member'){
                            $edit_hidden_value='edit_member';
                            }  ?>  
                            <input type="hidden" name="people_values" value="<?php echo $edit_hidden_value;?>" />
                            <div class="splitPaneRightRow statusGreen">
                                <h3  onclick="showSplitPlaneRow(this);">Status</h3><div class="splitPlaneQuickDetails" id="form_act_id"><?php
								 if(isset($query[0]->user_status)){if($query[0]->user_status==1){ echo 'Active';}else{ echo 'Pause'; }} ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Status</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="user_status">
                                                  <option <?php if(isset($query[0]->user_status) && $query[0]->user_status==1){echo 'selected=selected';}?> value="1">Active</option>
                                                <option <?php if(isset($query[0]->user_status) && $query[0]->user_status==0){echo 'selected=selected';}?> value="0">Pause</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Role</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="user_role">
                                                <option value="1" <?php if(isset($query[0]->role_id)){?> <?php  if($query[0]->role_id==1){ echo 'selected=selected';} ?>  <?php }?>>Administrator</option>
                                                <option value="2" <?php if(isset($query[0]->role_id)){?> <?php  if($query[0]->role_id==2){ echo 'selected=selected';} ?>  <?php }?>>Editor</option>
                                                <option value="3" <?php if(isset($query[0]->role_id)){?> <?php  if($query[0]->role_id==3){ echo 'selected=selected';} ?>  <?php }?>>Member</option>
                                                <option value="4">Public</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    
                                    </li>

                                </ul>
                            </div>
<!-- Sign In -->                            
                            <div class="splitPaneRightRow ">
                                <h3   onclick="showSplitPlaneRow(this);">Sign In</h3><div class="splitPlaneQuickDetails" id="form_pro_id">Expand to view and add details.</div>
                                <ul class="splitPaneRightDetails ">
                                  
                                    <li class="row">
                                        <div class="labelInfo col span_4">Username(Email)</div>
   <div class="formInfo col span_12"><input type="email" name="username" value="<?php if(isset($query[0]->user_email)){ echo $query[0]->user_email;}?>" id="user_email" onkeyup="user_view(this.value)"  /><span class="required" id="user_error"></span></div>
                                    </li>
                                  <li class="row">
                                        <div class="labelInfo col span_4">Password</div>
                                        <div class="formInfo col span_12"><input type="text" name="password" value="<?php if(isset($query[0]->user_password)){ echo base64_decode($query[0]->user_password);}?>" id="password_id" onkeyup="password_field(this.value)" /><span class="required" id="password_error"></span></div>
                                    </li>
                                </ul>
                            </div>
<!-- Profile -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails" id="form_cont_id">Expand to view and add details.</div>
                                <ul class="splitPaneRightDetails">
                                 <?php if(isset($query[0]->user_profile_image)){?>
                                    <li class="row">
                                    <div style="float:left;padding-left:127px"><img src="<?php echo base_url(); ?>assets/img/people/<?php echo $query[0]->user_profile_image; ?>" height="100" width="100" /></div>
                                    </li>
                                   <?php } ?> 
                                  
                                        <li class="row">
                                    <div class="labelInfo col span_4">Image</div>
                                    <div class="formInfo col span_12"><input type="file"  name="poeple_image" class="halfSize" value="<?php if(isset($query[0]->user_profile_image)) echo $query[0]->user_profile_image; ?>" /></div>
                                    </li>
                               
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">First Name</div>
                                        <div class="formInfo col span_12"><input type="text" name="first_name" value="<?php if(isset($query[0]->user_first_name)){ echo $query[0]->user_first_name;}?>" onkeyup="name_field(this.value)" id="name_id" /><span class="required" id="name_error"></span></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Last Name</div>
                                        <div class="formInfo col span_12"><input type="text" name="last_name" value="<?php if(isset($query[0]->user_last_name)){ echo $query[0]->user_last_name;}?>"  id="last_name_id" onkeyup="last_field(this.value)"/><span class="required" id="last_error"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Timezone</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="time_zone">
                                                <option value="1">Central</option>
                                                <option value="2">List of Timezones</option>
                                            </select>                                
                                        </div>
                                    </li>
                                </ul>
                            </div>
<!-- Notifications -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Notifications</h3><div class="splitPlaneQuickDetails" id="form_opt_id">ann@perkbrands.co, No Texts</div>
                                <ul class="splitPaneRightDetails">

                                    <li class="row">
                                        <div class="labelInfo col span_4">Receive emails at:</div>
                                        <div class="formInfo col span_12"><input class=""  type="email" name="recieve_email_at" value="<?php if(isset($query[0]->user_notification_recieve_email_at)){ echo $query[0]->user_notification_recieve_email_at;}?>" id="recieve_email" onkeyup="email1(this.value)"  /></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Receive texts at:</div>
     <div class="formInfo col span_12"><input class=""  type="email" name="recieve_text_at" value="<?php if(isset($query[0]->user_notification_recieve_text_at)){ echo $query[0]->user_notification_recieve_text_at;}?>" id="last_email" onkeyup="recieve_text(this.value)" /></div>
                                    </li>
                                </ul>
                            </div>
<!-- Audiences -->                            
                            <div class="splitPaneRightRow ">
                                <h3   onclick="showSplitPlaneRow(this);">Audiences</h3><div class="splitPlaneQuickDetails" id="form_aud_id">All</div>
                                <ul class="splitPaneRightDetails ">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Audiences</div>
                                        <div class="formInfo col span_12">
                                            <div class="row">
                                                <div class="col span_7">
                                                    <input value="YES" name="checkbox1" id="checkbox1" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox1">All</label>
                                                </div>
                                                <div class="col span_7">                                            
                                                    <input value="YES" name="checkbox2" id="checkbox2" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox2">Audience 1</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col span_7">
                                                    <input value="YES" name="checkbox3" id="checkbox3" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox3">Audience 2</label>
                                                </div>
                                                <div class="col span_7">                                            
                                                    <input value="YES" name="checkbox4" id="checkbox4" type="checkbox"/>
                                                    <label class="checkboxButton" for="checkbox4">Audience 3</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
<!-- Tags -->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Tags</h3><div class="splitPlaneQuickDetails" id="form_tag_id">Expand to view and add tags.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Tags</div>
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="user_tags" /><?php if(isset($query[0]->user_tags_tags)){ echo $query[0]->user_tags_tags;}?></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails" id="form_note_id">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Notes</div>
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="user_notes" /><?php if(isset($query[0]->user_notes_notes)){ echo $query[0]->user_notes_notes;}?></textarea></div>
                                    </li>
                                </ul>
                            </div>
                            <input type="hidden" name="hiddenid" value="<?php if(isset($query[0]->user_id)){ echo $query[0]->user_id;}?>"  />                            
                            <div class="splitPaneRightRow rightButtonsRow">
                           <?php $current_id=$this->uri->segment(3);
						   if(isset($query[0]->user_id)){
							  if($query[0]->is_default!=1){  
         echo "<a  href=".base_url()."people_user_controller/people_administrator_delete/$current_id>"; ?><button id="remove_btn" class="remove">Remove</button> </a>
                          <?php } } ?>
         <span class="floatRight"><button class="cancel">Cancel</button>
         
         <?php 
		 if(isset($query[0]->user_id)){
		 
		 	if($query[0]->is_default!=1){ 
		 ?>
         <button class="save" id="save_btn">Save</button></span>
         <?php } }else{ ?>
         <button class="save" id="save_btn">Save</button></span>
         <?php } ?>
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
<script>
function user_view(value)
{
	if(value!='')
	$('#user_email').css({"border-color":"#63dfff"});
	$('#user_error').css({"color":"white"});		

}

function email1(email_value)
{
	if(email_value!='')
	$('#recieve_email').css({"border-color":"#63dfff"});

}
function password_field(value)
{
	if(value!='')
	$('#password_id').css({"border-color":"#63dfff"});
	$('#password_error').css({"color":"white"});		
}

function name_field(value)
{
	if(value!='')
	$('#name_id').css({"border-color":"#63dfff"});
	$('#name_error').css({"color":"white"});		
}
function last_field(value)
{
	if(value!='')
	$('#last_name_id').css({"border-color":"#63dfff"});
	$('#last_error').css({"color":"white"});		
}
function recieve_text(value)
{
	if(value!='')
	$('#last_email').css({"border-color":"#63dfff"});
	$('#last_email').css({"color":"white"});		
}

$(document).ready(function() {
	
	$('#remove_btn').attr("type", "button");
	$('#cancel_btn').attr("type", "cancel");	
	$('#save_btn').click(function(e) {


	var email_val= $('#user_email').val();
	if(email_val==''){
		$('#user_email').css({"border-color":"red"});
		$('#user_email').focus();
		$('#user_error').css({"color":"red"});		
		return false;
	}
	var password_val= $('#password_id').val();
	if(password_val==''){
		$('#password_id').css({"border-color":"red"});
		$('#password_id').focus();
		$('#password_error').css({"color":"red"});		
		return false;
	}
	var name_val= $('#name_id').val();
	if(name_val==''){
		$('#name_id').css({"border-color":"red"});
		$('#name_id').focus();
		$('#name_error').css({"color":"red"});		
		return false;
	}
	var last_name_val= $('#last_name_id').val();
	if(last_name_val==''){
		$('#last_name_id').css({"border-color":"red"});
		$('#last_name_id').focus();
		$('#last_error').css({"color":"red"});		
		return false;
	}


	var email_val= $('#recieve_email').val();
	if(email_val==''){
		$('#recieve_email').css({"border-color":"red"});
		$('#recieve_email').focus();
		$('#error_message').css({"color":"red"});		
		return false;
	}
	var email_val= $('#last_email').val();
	if(email_val==''){
		$('#last_email').css({"border-color":"red"});
		$('#last_email').focus();
		return false;
	}
  	});
});

 $(document).ready(function() {
	<?php	
	$add_form=$this->uri->segment(2); 
	if($add_form=='edit_people_administrator')
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

	$('#form_tag_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_tag_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_tag_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_aud_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_aud_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_aud_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 


	$('#form_note_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_note_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_note_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	<?php } ?>
	});


	$('#open_audience_ic').click(function(){
		document.getElementById('my_form').style.display='block';
});
	
	
function administrator_filter(selectedValue)
 {
	 if(selectedValue)
	 {	
		$.ajax({
			url: '<?php echo base_url(); ?>audience/audience_filter',
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
<?php } ?>


<?php $edit_form=$this->uri->segment(2);
	if($edit_form=='edit_people_administrator')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='block';	

    </script>
<?php } ?>
    
    
<?php $add_form=$this->uri->segment(2);
	if($add_form=='people_add')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='none';	

    </script>
<?php }
	?>
<?php $add_form=$this->uri->segment(3);
	if($add_form=='new')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='block';	

    </script>
<?php }
	if($this->uri->segment(3)=='enew')
	{ ?>
<script>
    document.getElementById('my_form').style.display='block';	
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

	$('#form_tag_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_tag_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_tag_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_aud_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_aud_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_aud_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 


	$('#form_note_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_note_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_note_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	
    </script>
<?php }
	?>	
    
</script>

<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/splitPlane.js"></script>

</body>
</html>