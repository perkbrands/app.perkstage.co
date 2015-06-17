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

<script type="text/javascript" src="<?php  echo base_url() ?>assets/js/admin/jquery.form.js"></script>

<!--<script src="http://malsup.github.io/jquery.form.js"></script> -->

</head>
<?php // print_r($account_data); 
//print_r($account_data);
 ?>
<body>
<?php // print_r($audiencedata); ?>
  <?php if(isset($audiencedata) && $audiencedata!='')
  {
  		$array_length=count($audiencedata); 
	  		for($i=0;$i<$array_length; $i=$i+1)
			{
				$postback[]=$audiencedata[$i]->audience_id; 
			}
  }
  else
  {
	$postback='null';	
 }
?>
<div class="container">
<div id="splitPaneLeftContainer"></div>
	<div id="splitPaneRightContainer"></div>
	<!-- Push Wrapper -->
    <div class="mp-pusher" id="mp-pusher">

        <!-- mp-menu -->
        <nav id="mp-menu" class="mp-menu" >
            <div class="mp-level">
                <h2 class="icon icon-world">Manage User Account</h2>
                

                	 <?php if($this->uri->segment(2)!='people_me' && $this->uri->segment(2)!='edit_people_me'){ ?>
                            <ul class="leftPaneFilters">
                                <form action="<?php echo base_url(); ?>people_user_controller/poeple_search" method="post" name="search_form" id="search_form">
                               
                               <li id="searchButtonLI">
                               <?php
							   $search_in='';
							   if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(3)=='anew' || isset($roles) && $roles==1){
							    $search_in='administrator';
							   }
							   if($this->uri->segment(2)=='people_editor' || $this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(3)=='enew' || isset($roles) && $roles==2){
							    $search_in='editor';
							   }
							   if($this->uri->segment(2)=='people_member' || $this->uri->segment(2)=='edit_people_member' || $this->uri->segment(3)=='mnew' || isset($roles) && $roles==3){
							    $search_in='member';
							   }
							   ?>
                               <input type="hidden" name="hidden_val_people" value="<?php echo $search_in; ?>"  />
                                <input type="text" placeholder="Search" name="txt_search" value="<?php if(isset($search_field_value) && $search_field_value!=''){echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                
                               </li>
                               
                                <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter">
                                        <option value="2" <?php if(isset($search_var) && $search_var=='2'){echo "selected=selected";}?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var=='1'){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var=='0'){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                                    <input type="hidden" id="selected_value" name="selected_value" />
                               </li>
                                <li>
                                <?php if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(3)=='anew'  || isset($roles) && $roles==1){?>
                                <a href="<?php echo base_url(); ?>people_user_controller/all_administrator">
                                <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_editor' || $this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(3)=='enew'  || isset($roles) && $roles==2){?>
                                <a href="<?php echo base_url(); ?>people_user_controller/all_editor">
                                <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_member' || $this->uri->segment(2)=='edit_people_member' || $this->uri->segment(3)=='mnew'  || isset($roles) && $roles==3){?>
                                <a href="<?php echo base_url(); ?>people_user_controller/all_member">
                                <?php } ?>
                                
                                <button type="button" />View All</button></a></li>
                            </ul>
                            </form>
                            <?php } ?>
                    
                    <div class="leftPaneFiltersDetails">
		                    	 <?php if(isset($listing_data)){ ?>
                                 <?php if($this->uri->segment(2)=='people_administrator' || isset($roles) && $roles==1 || $this->uri->segment(2)=='edit_people_administrator'){ ?>
                    	<p><?php echo count($listing_data);?> Administrators, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_editor' || isset($roles) && $roles==2 || $this->uri->segment(2)=='edit_people_editor'){ ?>
                    	<p><?php echo count($listing_data);?> Editors, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 
                                 <?php if($this->uri->segment(2)=='people_member' || isset($roles) && $roles==3 || $this->uri->segment(2)=='edit_people_member'){ ?>
                    	<p><?php echo count($listing_data);?> Members, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_me' || $this->uri->segment(2)=='edit_people_me'){ ?>
                    	<p>      Me, Displaying</p>
                                 <?php } ?>
                    <?php } ?>
		                    </div>
                    
                	 <?php 
							$add_label_account = '';
							if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(3)=='anew'  || isset($roles) && $roles==1){
							$add_label_account='New Administrator';
							}
							if($this->uri->segment(2)=='people_editor' || $this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(3)=='enew'  || isset($roles) && $roles==2){
							$add_label_account='New Editor';
							}
							if($this->uri->segment(2)=='people_member' || $this->uri->segment(2)=='edit_people_member' || $this->uri->segment(3)=='mnew'  || isset($roles) && $roles==3){
							$add_label_account='New Member';
							}
							 ?>
		                	<ul class="cardsBox">
                            <?php if($this->uri->segment(2)!='people_me' && $this->uri->segment(2)!='edit_people_me' && !isset($me)){ ?>
							   
                                    <?php if($this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(2)=='select_account_administrator'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/anew">
                                    
                                    <?php } ?>
                                    <?php if($this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(2)=='select_account_editor'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/enew">
                                    <?php } ?>
                                    <?php if($this->uri->segment(2)=='edit_people_member' || $this->uri->segment(2)=='select_account_member'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/mnew">
                                    <?php } ?>
							     <li id="new_account">
                                 	<div class="plusSign">+</div>
                                    <div class="plusSignText"><?php echo $add_label_account; ?></div>
                                   
                                </li>
                                </a>
                              <?php }?> 
        
<?php
								  $goto_url=''; 
								 foreach($listing_data as $row){
     if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(3)=='anew' || isset($roles) && $roles==1 || $this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(2)=='select_account_administrator'){
                                 $goto_url= base_url()."people_user_controller/edit_people_administrator/".$row->user_id;
                               }
         if($this->uri->segment(2)=='people_editor' || $this->uri->segment(3)=='enew' || isset($roles) && $roles==2 || $this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(2)=='select_account_editor'){
                                 $goto_url= base_url()."people_user_controller/edit_people_editor/".$row->user_id; 
                                  }
         if($this->uri->segment(2)=='people_member' || $this->uri->segment(3)=='mnew'  || isset($roles) && $roles==3 || $this->uri->segment(2)=='edit_people_member' || $this->uri->segment(2)=='select_account_member'){
                                 $goto_url= base_url()."people_user_controller/edit_people_member/".$row->user_id;
                                  } 
         if($this->uri->segment(2)=='people_me' || isset($me) && $me=='people_me'){
                                 $goto_url= base_url()."people_user_controller/edit_people_me/".$row->user_id;
                                 } ?>
                                 
                                
                                 
                                  <li <?php if($row->user_id==$this->uri->segment(3)) {?> class="selected" <?php } ?>>
								<div class="pill" <?php if($row->user_profile_image!=''){?>style="background-image: url('<?php echo base_url(); ?>assets/img/people/<?php echo $row->user_profile_image; ?>')"<?php }else{?>style="background-image: url('<?php echo base_url(); ?>assets/img/people/apple.jpg')"<?php } ?>>&nbsp;</div>                            <p class="label"><?php echo  $row->user_first_name.' '.$row->user_last_name;?></p>
                             
                                    <p class="options"><span id="setting_id"><?php echo "<a  href=".$goto_url.">Settings</a>
									"; ?></span><span class="pipe">|</span>
                                  <!--  <p class="options"><span>-->
                                  <?php 
								  $url_manage_user='';
								 if($this->uri->segment(2)=='people_member' || $this->uri->segment(2)=='select_account_member'){
								      $url_manage_user=base_url()."manage_user_controller/select_account_member/".$row->user_id;
								  }
								  if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(2)=='select_account_administrator'){
								      $url_manage_user=base_url()."manage_user_controller/select_account_administrator/".$row->user_id;
								  }
								  if($this->uri->segment(2)=='people_editor' || $this->uri->segment(2)=='select_account_editor'){
								      $url_manage_user=base_url()."manage_user_controller/select_account_editor/".$row->user_id;
								  }
									 ?>
                                    <span><?php  echo "<a  href=".$url_manage_user.">Accounts</a>"; ?></span></p>
                                    
                           <?php if($row->user_status==1) {?>
                                   <div class="status statusGreen"></div>
                                   <?php } else
								   { ?>
                                   <div class="status statusRed"></div>
                                  <?php } ?>
                        </li>
         
                           <?php } ?>    
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
                    <div class="row">
                        <div id="splitPaneLeft" class="col span_8">
                        <?php if($this->uri->segment(2)!='people_me' && $this->uri->segment(2)!='edit_people_me'){ ?>
                            <form action="<?php echo base_url(); ?>people_user_controller/poeple_search" method="post" name="search_form" id="search_form">
                            <ul class="leftPaneFilters">
                                
                               
                               <li id="searchButtonLI">
                               <?php
							   $search_in='';
							   if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(3)=='anew' || isset($roles) && $roles==1){
							    $search_in='administrator';
							   }
							   if($this->uri->segment(2)=='people_editor' || $this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(3)=='enew' || isset($roles) && $roles==2){
							    $search_in='editor';
							   }
							   if($this->uri->segment(2)=='people_member' || $this->uri->segment(2)=='edit_people_member' || $this->uri->segment(3)=='mnew' || isset($roles) && $roles==3){
							    $search_in='member';
							   }
							   ?>
                               <input type="hidden" name="hidden_val_people" value="<?php echo $search_in; ?>"  />
                                <input type="text" placeholder="Search" name="txt_search" value="<?php if(isset($search_field_value) && $search_field_value!=''){echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                
                               </li>
                                <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter">
                                        <option value="2" <?php if(isset($search_var) && $search_var=='2'){echo "selected=selected";}?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                                    <input type="hidden" id="user_id" value="<?php echo $this->uri->segment(3); ?>" />
                               </li>
                                
                                <li>
                                <?php if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(3)=='anew'  || isset($roles) && $roles==1){?>
                                <a href="<?php echo base_url(); ?>people_user_controller/all_administrator">
                                <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_editor' || $this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(3)=='enew'  || isset($roles) && $roles==2){?>
                                <a href="<?php echo base_url(); ?>people_user_controller/all_editor">
                                <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_member' || $this->uri->segment(2)=='edit_people_member' || $this->uri->segment(3)=='mnew'  || isset($roles) && $roles==3){?>
                                <a href="<?php echo base_url(); ?>people_user_controller/all_member">
                                <?php } ?>
                                
                                <button type="button" />View All</button></a></li>
                            </ul>
                            </form>
                            <?php } ?>
                            
		                      <div class="leftPaneFiltersDetails">
		                    	 <?php if(isset($listing_data)){ ?>
                                 <?php if($this->uri->segment(2)=='select_account_administrator'){ ?>
                    	<p><?php echo count($listing_data);?> Administrators, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 <?php if($this->uri->segment(2)=='select_account_editor'){ ?>
                    	<p><?php echo count($listing_data);?> Editors, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 
                                 <?php if($this->uri->segment(2)=='select_account_member'){ ?>
                    	<p><?php echo count($listing_data);?> Members, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_me' || $this->uri->segment(2)=='edit_people_me'){ ?>
                    	<p>      Me, Displaying</p>
                                 <?php } ?>
                    <?php } ?>
		                    </div>
		                    <?php 
							$add_label_account = '';
							if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(3)=='anew'  || isset($roles) && $roles==1 || $this->uri->segment(2)=='select_account_administrator'){
							$add_label_account='New Administrator';
							}
							if($this->uri->segment(2)=='people_editor' || $this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(3)=='enew'  || isset($roles) && $roles==2 || $this->uri->segment(2)=='select_account_editor'){
							$add_label_account='New Editor';
							}
							if($this->uri->segment(2)=='people_member' || $this->uri->segment(2)=='edit_people_member' || $this->uri->segment(3)=='mnew'  || isset($roles) && $roles==3 || $this->uri->segment(2)=='select_account_member'){
							$add_label_account='New Member';
							}
							 ?>
		                	<ul class="cardsBox">
                           <?php if($this->uri->segment(2)!='people_me' && $this->uri->segment(2)!='edit_people_me' && !isset($me)){ ?>
							   
                                    <?php if($this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(2)=='select_account_administrator'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/anew">
                                    
                                    <?php } ?>
                                    <?php if($this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(2)=='select_account_editor'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/enew">
                                    <?php } ?>
                                    <?php if($this->uri->segment(2)=='edit_people_member' || $this->uri->segment(2)=='select_account_member'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/mnew">
                                    <?php } ?>
							     <li id="new_account">
                                 	<div class="plusSign">+</div>
                                    <div class="plusSignText"><?php echo $add_label_account; ?></div>
                                   
                                </li>
                                </a>
                              <?php }?> 
        
<?php
								  $goto_url=''; 
								 foreach($listing_data as $row){
     if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(3)=='anew' || isset($roles) && $roles==1 || $this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(2)=='select_account_administrator'){
                                 $goto_url= base_url()."people_user_controller/edit_people_administrator/".$row->user_id;
                               }
         if($this->uri->segment(2)=='people_editor' || $this->uri->segment(3)=='enew' || isset($roles) && $roles==2 || $this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(2)=='select_account_editor'){
                                 $goto_url= base_url()."people_user_controller/edit_people_editor/".$row->user_id; 
                                  }
         if($this->uri->segment(2)=='people_member' || $this->uri->segment(3)=='mnew'  || isset($roles) && $roles==3 || $this->uri->segment(2)=='edit_people_member' || $this->uri->segment(2)=='select_account_member'){
                                 $goto_url= base_url()."people_user_controller/edit_people_member/".$row->user_id;
                                  } 
         if($this->uri->segment(2)=='people_me' || isset($me) && $me=='people_me'){
                                 $goto_url= base_url()."people_user_controller/edit_people_me/".$row->user_id;
                                 } ?>
                                 
                                
                                 
                                  <li <?php if($row->user_id==$this->uri->segment(3)) {?> class="selected" <?php } ?>>
								<div class="pill" <?php if($row->user_profile_image!=''){?>style="background-image: url('<?php echo base_url(); ?>assets/img/people/<?php echo $row->user_profile_image; ?>')"<?php }else{?>style="background-image: url('<?php echo base_url(); ?>assets/img/people/apple.jpg')"<?php } ?>>&nbsp;</div>                            <p class="label"><?php echo  $row->user_first_name.' '.$row->user_last_name;?></p>
                             
                                    <p class="options"><span id="setting_id"><?php echo "<a  href=".$goto_url.">Settings</a>
									"; ?></span><span class="pipe">|</span>
                                  <!--  <p class="options"><span>-->
                                  <?php 
								  $url_manage_user='';
								  if($this->uri->segment(2)=='people_member' || $this->uri->segment(2)=='select_account_member'){
								      $url_manage_user=base_url()."manage_user_controller/select_account_member/".$row->user_id;
								  }
								  if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(2)=='select_account_administrator'){
								      $url_manage_user=base_url()."manage_user_controller/select_account_administrator/".$row->user_id;
								  }
								  if($this->uri->segment(2)=='people_editor' || $this->uri->segment(2)=='select_account_editor'){
								      $url_manage_user=base_url()."manage_user_controller/select_account_editor/".$row->user_id;
								  }
									 ?>
                                    <span><?php  echo "<a  href=".$url_manage_user.">Accounts</a>"; ?></span></p>
                                    
                           <?php if($row->user_status==1) {?>
                                   <div class="status statusGreen"></div>
                                   <?php } else
								   { ?>
                                   <div class="status statusRed"></div>
                                  <?php } ?>
                        </li>
         
                           <?php } ?>     
							</ul>

		                   <!-- <div class="leftPaneFiltersDetails">
		                    	<p><a href="#">Load More</a></p>
		                    </div>-->

                        </div>
                        <!-- END OF splitPaneLeft -->
   
                        
                        <div class="col span_8" id="splitPaneRight">
                        
                             <?php
							 if(isset($error) && $error!=''){
							 
							 echo '<div style="color:red;margin:10px 0 0 10px;font-weight:bold;font-size:20px">'.$error.'</div>';
							 }
							 ?>
                           <?php if(isset($title)){?>
                            <h2><?php echo $title; ?></h2>
                            <?php } ?>
        
                            <div class="splitPaneRightRow splitPaneRightSelected" id="edit_role">
								<h3 onclick="showSplitPlaneRow(this);" id="form_act_id">Accounts</h3><div class="splitPlaneQuickDetails" style="display: none;">
								<?php echo $this->session->userdata('account_title');?>
                                </div>
							        <ul class="splitPaneRightDetails" style="display: block;">
							        	<!-- Show Current Account Access -->
                                        <form method="post" id="account_role_form" action="<?php echo base_url()?>manage_user_controller/update_account_user_role">
                                        <li class="row">
                                        
                                        <input type="hidden" id="hidden_user_id" name="hidden_user_id" value="<?php echo $this->uri->segment(3); ?>" />
                                        <?php 
										global $roles_assigned;
										$i=1;
										
										foreach($main_account_data as $data_main){?>
                                            <?php   if(isset($account_data) && $account_data!='false') { ?>
                                           	<div class="formInfo col span_6">
                                           		<input type="text" id="account_readonly_title" value="<?php echo $data_main->account_title; ?>" readonly="readonly">
                                                
                                           	</div>
                                            <?php } ?>
                                            <div class="formInfo col span_6">
							                     <?php if($query[0]->is_default==1) {?>
                                            <select id="user_role_<?php echo $i?>" name="user_role_<?php echo $i?>">
                                                 <option <?php if($data_main->role_id==1){echo 'selected=selected';}?> value="1">Administrator</option>
                                            </select> 

<?php } else { ?>
                                             <select id="user_role_<?php echo $i?>" name="user_role_<?php echo $i?>">
                                             <option value="none">Select Role</option>
                                             <?php if($this->session->userdata('role_id')=='1' && $this->session->userdata('editor_page')==''){?>
                                                 <option <?php if($data_main->role_id==1){echo 'selected=selected';}?> value="1">Administrator</option>
                                                <option <?php if($data_main->role_id==2){echo 'selected=selected';}?>  value="2">Editor</option>
                                             <?php } ?>
                                                <option <?php if($data_main->role_id==3){echo 'selected=selected';}?> value="3">Member</option>
                                                <option <?php if($data_main->role_id==4){echo 'selected=selected';}?>  value="4">Public</option>
                                            </select>
                                            <?php } ?>                           
							                </div>
                                            
                                             <div class="formInfo col span_4">
							                	<button href="javascript:void(0)" id="delete_link_<?php echo $i?>" class="delete_link" id="delete_link_1">Remove</button>
								                <button style="display:none;" href="javascript:void(0)" class="update_link" id="update_role_1">Save</button>
							                </div>
                                          
                                            
                                          <?php /*?>  <a href="javascript:void(0)" class="delete_link" id="delete_link_<?php echo $i?>" style="margin-left:10px">Delete</a> | <a href="javascript:void(0)" class="update_link" id="update_role_<?php echo $i?>">Update</a></span><?php */?>
                                            
                                                                     
                                      
                                      
                                        <?php $i++; } ?>   
                                    </li>
                                    </form>

							          <!-- Add Person to New Account
                                      <!-- If _ci_models[0] = "manage_user_model", then we do not 
                                      <!-- want to see the option to assign account owner again
                                      <!-- unsure if this is used in another context which is why
                                      <!-- the conditional was added instead of just removing the
                                      <!-- code entirely.
                                      <?php   if (!($this->_ci_models[0] == "manage_user_model")) { 
                                          if(count($new_account)>0){ ?>
                                 <?php if($query[0]->is_default==0) {?>									
                                    <li class="row">
                                <div class="formInfo col span_6">
                                <?php echo $this->session->userdata('account_title');?>
                                </div>
                                </li>
							            <li class="row">
							                <div class="formInfo col span_6">
							            		 <select id="new_user_account" name="new_user_account">
                                            <option value="none">Select Account</option>
                                                 <?php foreach($account_data as $account_new){ ?>
                                                <option value="<?php echo $account_new->account_id; ?>"><?php echo $account_new->account_title; ?></option>
                                                <?php ?>
												<?php } ?>
                                            </select>
							            	</div>
							            	<div class="formInfo col span_6">
							                  <select id="new_user_role" class="" id="user_roles" name="user_role">
                                               <option value="none">Select Role</option>
                                                <?php if($this->session->userdata('role_id')=='1' && $this->session->userdata('editor_page')==''){?>
                                                <option value="1">Administrator</option>
                                                <option value="2">Editor</option>
                                                <?php } ?>
                                                <option value="3">Member</option>
                                                <option value="4">Public</option>
                                            </select>                               
							                </div>
							                <div class="formInfo col span_4">
								                <button href="javascript:void(0)" id="save_role">Save</button>
								                <button style="display:none;" href="javascript:void(0)" class="delete_link" id="delete_link_1">Remove</button>
							                </div>
							
							            </li>
                                 <?php }}}?>
							        </ul>
							</div>
                            
                                                                               
                            <!-- Desktop Buttons -->                    
                            <div class="splitPaneRightRow rightButtonsRow row gutters">
                            	<div class="col span_4">
	                                <?php /*?><button class="remove">Remove</button><?php */?>
                                </div>
                                <div class="col span_4">&nbsp;</div>
                                <div class="col span_4">
									<button type="button" class="cancel">Cancel</button>
                                </div>
                                <div class="col span_4">                                    
                                    <button type="button" id="update_role_btn" class="save">Save</button>
                                </div>
                            </div>
                            
                          
        
                        </div>
        
                </main><!-- END OF contentContainer -->
                
                
                
                
                </div>
            </div><!-- /scroller-inner -->
        </div><!-- /scroller -->

        
    </div><!-- /pusher -->
</div>
<script>
function submit_change_val(select_value){
$('#selected_value').val(select_value);
$('#search_form').submit();
}

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
	$('#last_email').css({"color":"black"});		
}

$(document).ready(function() {
	
	$('#remove_btn').attr("type", "button");
	$('#cancel_btn').attr("type", "cancel");	
	$('#save_btn').click(function(e) {


	var email_val= $('#user_email').val();
	if(email_val=='' || email_val=='Email Address'){
		$('#user_email').css({"border-color":"red"});
		$('#user_email').val('');
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
	/*var email_val= $('#last_email').val();
	if(email_val==''){
		$('#last_email').css({"border-color":"red"});
		$('#last_email').focus();
		return false;
	}*/
  	});
	
	///////////for mobile//////////////////////
	
	$('#save_btn_mobile').click(function(e) {


	var email_val= $('#user_email').val();
	if(email_val=='' || email_val=='Email Address'){
		$('#user_email').css({"border-color":"red"});
		$('#user_email').val('');
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
	/*var email_val= $('#last_email').val();
	if(email_val==''){
		$('#last_email').css({"border-color":"red"});
		$('#last_email').focus();
		return false;
	}*/
  	});
	
	/////////// mobile ends/////////////////
});

 $(document).ready(function() {
	 document.getElementById('form_act_id').style.display='block';
	<?php	
	$edit_form=$this->uri->segment(2); 
	if($edit_form=='edit_people_administrator' || $edit_form=='edit_people_editor' || $edit_form=='edit_people_member')
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
	if($add_form=='anew' || $add_form=='enew' || $add_form=='mnew')
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
    if($this->uri->segment(3)!='anew' && $this->uri->segment(3)!='enew' && $this->uri->segment(3)!='mnew'){
	if($add_form=='people_add')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='none';	

    </script>
<?php }}
	?>

    
</script>
<script type="text/javascript">
$('document').ready(function(){
$('#new_ul').show();

$('#form_act_id').parent().toggleClass('splitPaneRightSelected'); 
$('#form_act_id').parent().children("ul").eq(0).slideToggle(300); 
$('#form_act_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0);

});


var delete_link_count = $('.delete_link').length;

for(var d=1;d<=delete_link_count;d++){
$('#delete_link_'+d).click(function(){
	id=this.id;
	new_id=id.split('_');	
	
var account_id=$('#user_account_'+new_id[2]).val();
var role_id=$('#user_role_'+new_id[2]).val();
var user_id = $('#hidden_user_id').val();
	
	if(account_id=='none'){
		alert("Please select account from dropdown to save");
		$('#user_account').focus();
		}
		else if(role_id=='none'){
		alert("Please select role from dropdown to save");
		$('#user_role').focus();	
	
}else{
	var r = confirm("Are you sure you want to delete");
	if (r == true) {
	$.ajax({
	type    : 'POST',
	url     : '<?php echo base_url()?>manage_user_controller/delete_account_role',
	data    : 'account_id='+account_id+'&user_id='+user_id+'&role_id='+role_id,
	success :function(data){
	if(data=='success'){
		window.location.reload();
	}
	}
	});
	} else {
		
	}
}
});
}

$('#update_role_btn').click(function(){

	$('#account_role_form').submit();
	
});

var update_link_count = $('.update_link').length;

for(var j=1;j<=update_link_count;j++){
$('#update_role_'+j).click(function(){
	id=this.id;
	new_id=id.split('_');
var role = $('#user_role_'+new_id[2]).val();

var account_id = $('#user_account_'+new_id[2]).val();

var user_id = $('#hidden_user_id').val();

if(account_id=='none'){
alert("Please select account from dropdown to save");
$('#user_account').focus();
}
else if(role=='none'){
alert("Please select role from dropdown to save");
$('#user_role').focus();	
	
}else{

	$.ajax({
	type    : 'POST',
	url     : '<?php echo base_url()?>manage_user_controller/update_account_role',
	data    : 'account_id='+account_id+'&user_id='+user_id+'&role_id='+role,
	success :function(data){
	if(data=='success'){
		window.location.reload();
	}
	}
	});
}

});

}
$('#save_role').click(function(){
var account = $('#new_user_account').val();
var role = $('#new_user_role').val();
var user_id=$('#user_id').val();

if(account=='none'){
alert("Please select account from dropdown to save");
$('#new_user_account').focus();
}
else if(role=='none'){
alert("Please select role from dropdown to save");
$('#new_user_role').focus();	
	
}else{
$.ajax({
	type    : 'POST',
	url     : '<?php echo base_url()?>manage_user_controller/add_account_role',
	data    : 'account_id='+account+'&user_id='+user_id+'&role_id='+role,
	success :function(data){
	if(data=='success'){
		window.location.reload();
	}
	}
	});
}
});

</script>


<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/splitPlane.js"></script>

</body>
</html>