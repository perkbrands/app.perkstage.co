<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Perk CMS</title>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Collections</title>
<!--/*<link rel="stylesheet" type="text/css" href="css/styles.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
*/-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/mlpmenu/component.css" />
<!-- Editabel Css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/mlpmenu/jquery-ui-1.8.13.custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/mlpmenu/ui.dropdownchecklist.css" />

<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="/css/ie8lte.css"/>
<![endif]-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/admin/jquery.js"></script>
<script type="text/javascript">jQuery.noConflict(true);</script> 
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/modernizr.custom.js"></script>
			<!-- DropDown  Jq -->

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/admin/jquery-1.6.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/admin/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript">jQuery.noConflict(true);</script> 
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/admin/ui.dropdownchecklist-1.4-min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#s4").dropdownchecklist({ firstItemChecksAll: true,maxDropHeight: 120,width:320 });
        });
    </script>
<style>
#ddcl-s4-ddw{height:98px !important;width:320px !important;background:none !important; background-color:#EDEDED !important}
#ddcl-s5-ddw{height:98px !important;;width:320px !important;background:none !important;  background-color:#EDEDED !important}
.ui-widget-content{height:98px !important;width:320px !important}
.ui-dropdownchecklist-item input[type='checkbox']{display:inline-block !important}
.ui-widget-content{background:none !important}
</style>
</head>

<body>
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
                <h2 class="icon icon-world">Accounts</h2>
                

                	 <?php if($this->uri->segment(2)!='people_me' && $this->uri->segment(2)!='edit_people_me' && !isset($me)){ ?>
                            <form action="<?php echo base_url(); ?>people_user_controller/poeple_search" method="post" name="search_form" id="search_form_first">
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
                                <input type="text" placeholder="Search" id="" name="txt_search" value="<?php if(isset($search_field_value) && $search_field_value!=''){echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                
                               </li>
                               
                                <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter">
                                        <option value="2" <?php if(isset($search_var) && $search_var=='2'){echo "selected=selected";}?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var=='1'){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var=='0'){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                                    <input type="hidden" id="selected_value_first" name="selected_value" />
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
      <?php if($this->uri->segment(2)=='people_administrator' || (isset($roles) && $roles==1) || $this->uri->segment(2)=='edit_people_administrator' && (!isset($me))){ ?>
                    	<p><?php echo count($listing_data);?> Administrators, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_editor' || isset($roles) && $roles==2 || $this->uri->segment(2)=='edit_people_editor'){ ?>
                    	<p><?php echo count($listing_data);?> Editors, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 
                                 <?php if($this->uri->segment(2)=='people_member' || isset($roles) && $roles==3 || $this->uri->segment(2)=='edit_people_member'){ ?>
                    	<p><?php echo count($listing_data);?> Members, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_me' || $this->uri->segment(2)=='edit_people_me' || (isset($me))){ ?>
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
							     	<?php if(isset($query) && $query!='') { ?>
                                    <?php if($this->uri->segment(2)=='edit_people_administrator'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/anew">
                                    
                                    <?php } ?>
                                    <?php if($this->uri->segment(2)=='edit_people_editor'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/enew">
                                    <?php } ?>
                                    <?php if($this->uri->segment(2)=='edit_people_member'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/mnew">
                                    <?php } ?>
							     <li id="new_account" onclick="document.getElementById('my_form').style.display='block';">
                                 	<div class="plusSign">+</div>
                                    <div class="plusSignText"><?php echo $add_label_account; ?></div>
                                   
                                </li>
                                </a>
                              <?php } 
								 else
								 { ?>
							     <li id="new_account" onclick="document.getElementById('my_form').style.display='block';">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText"><?php echo $add_label_account;?></div>
                                </li>
                                 <?php }} ?>
                               <?php $goto_url=''; 
								 foreach($listing_data as $row){
         if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(3)=='anew' || isset($roles) && $roles==1 || $this->uri->segment(2)=='edit_people_administrator' ){
                                 $goto_url= base_url()."people_user_controller/edit_people_administrator/".$row->user_id;
                               }
         if($this->uri->segment(2)=='people_editor' || $this->uri->segment(3)=='enew' || isset($roles) && $roles==2 || $this->uri->segment(2)=='edit_people_editor'){
                                 $goto_url= base_url()."people_user_controller/edit_people_editor/".$row->user_id; 
                                  }
         if($this->uri->segment(2)=='people_member' || $this->uri->segment(3)=='mnew'  || isset($roles) && $roles==3 || $this->uri->segment(2)=='edit_people_member'){
                                 $goto_url= base_url()."people_user_controller/edit_people_member/".$row->user_id;
                                  } 
         if($this->uri->segment(2)=='people_me' || isset($me) && $me=='people_me'){
                                 $goto_url= base_url()."people_user_controller/edit_people_me/".$row->user_id;
                                 } ?>
                                 
                                
                                 
                                  <li <?php if($row->user_id==$this->uri->segment(3) || (isset($updated_id) && $row->user_id==$updated_id)) {?> class="selected" <?php } ?>>
								<div class="pill" <?php if($row->user_profile_image!=''){?>style="background-image: url('<?php echo base_url(); ?>assets/img/people/<?php echo $row->user_profile_image; ?>')"<?php }else{?>style="background-image: url('<?php echo base_url(); ?>assets/img/admin/noimage.jpg')"<?php } ?>>&nbsp;</div>                            <p class="label"><?php echo  $row->user_first_name.' '.$row->user_last_name;?></p>
                             
                                    <p class="options"><span id="setting_id"><?php echo "<a  href=".$goto_url.">Settings</a>
									"; ?>
                                   <?php if($this->uri->segment(2)!='people_me' && $this->uri->segment(2)!='edit_people_me'  && (!isset($me))){ ?>
                                    </span><span class="pipe">|</span>
                                  <!--  <p class="options"><span>-->
                                 <?php 
								  $url_manage_user='';
								  if($this->uri->segment(2)=='people_member' || $this->uri->segment(3)=='mnew'  || isset($roles) && $roles==3 || $this->uri->segment(2)=='edit_people_member'){
								      $url_manage_user=base_url()."manage_user_controller/select_account_member/".$row->user_id;
								  }
								  if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(3)=='anew' || isset($roles) && $roles==1 || $this->uri->segment(2)=='edit_people_administrator' ){
								      $url_manage_user=base_url()."manage_user_controller/select_account_administrator/".$row->user_id;
								  }
								  if($this->uri->segment(2)=='people_editor' || $this->uri->segment(3)=='enew' || isset($roles) && $roles==2 || $this->uri->segment(2)=='edit_people_editor'){
								      $url_manage_user=base_url()."manage_user_controller/select_account_editor/".$row->user_id;
								  }
									 ?>
                                    
                                    <span><?php  echo "<a  href=".$url_manage_user.">Accounts</a>"; ?></span>
                                   <?php } ?> 
                                    </p>
                                    
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
                        <?php if($this->uri->segment(2)!='people_me' && $this->uri->segment(2)!='edit_people_me' && !isset($me)){ ?>
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
                                <input type="text" placeholder="Search" id="input_id" name="txt_search" value="<?php if(isset($search_field_value) && $search_field_value!=''){echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="button" name="searchButton" onclick="submit_change_submit()" value=""></button>
                                
                               </li>
                               
                                <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter" id="lst_filters" >
                                        <option value="2" <?php if(isset($search_var) && $search_var=='2'){echo "selected=selected";}?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                    	           <input type="hidden" id="selected_value" name="selected_value" />
                                 <input type="hidden" id="input_value" name="input_value" />

                                    
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
            <?php if(($this->uri->segment(2)=='people_administrator' || (isset($roles) && $roles==1) || $this->uri->segment(2)=='edit_people_administrator') && (!isset($me))){ ?>
                    	<p><?php echo count($listing_data);?> Administrators, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_editor' || isset($roles) && $roles==2 || $this->uri->segment(2)=='edit_people_editor'){ ?>
                    	<p><?php echo count($listing_data);?> Editors, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 
                                 <?php if($this->uri->segment(2)=='people_member' || isset($roles) && $roles==3 || $this->uri->segment(2)=='edit_people_member'){ ?>
                    	<p><?php echo count($listing_data);?> Members, Displaying 1-<?php echo count($listing_data);?></p>
                                 <?php } ?>
                                 <?php if($this->uri->segment(2)=='people_me' || $this->uri->segment(2)=='edit_people_me' || (isset($me) && $me=='people_me')){ ?>
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
							     	<?php if(isset($query) && $query!='') { ?>
                                    <?php if($this->uri->segment(2)=='edit_people_administrator'||$this->uri->segment(2)=='people_add'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/anew">
                                    
                                    <?php } ?>
                                    <?php if($this->uri->segment(2)=='edit_people_editor'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/enew">
                                    <?php } ?>
                                    <?php if($this->uri->segment(2)=='edit_people_member'){?> 
	                             	<a href="<?php echo base_url(); ?>people_user_controller/people_add/mnew">
                                    <?php } ?>
							     <li id="new_account" onclick="document.getElementById('my_form').style.display='block';">
                                 	<div class="plusSign">+</div>
                                    <div class="plusSignText"><?php echo $add_label_account; ?></div>
                                </li>
                                </a>
                              <?php } 
								 else
								 { ?>
							     <li id="new_account" onclick="document.getElementById('my_form').style.display='block';">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText"><?php echo $add_label_account;?></div>
                                </li>
                                 <?php }} ?> 
        
                                
		                    	
                                 <?php
								 $goto_url=''; 
								 foreach($listing_data as $row){
         if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(3)=='anew' || isset($roles) && $roles==1 || $this->uri->segment(2)=='edit_people_administrator' ){
                                 $goto_url= base_url()."people_user_controller/edit_people_administrator/".$row->user_id;
                               }
         if($this->uri->segment(2)=='people_editor' || $this->uri->segment(3)=='enew' || isset($roles) && $roles==2 || $this->uri->segment(2)=='edit_people_editor'){
                                 $goto_url= base_url()."people_user_controller/edit_people_editor/".$row->user_id; 
                                  }
         if($this->uri->segment(2)=='people_member' || $this->uri->segment(3)=='mnew'  || isset($roles) && $roles==3 || $this->uri->segment(2)=='edit_people_member'){
                                 $goto_url= base_url()."people_user_controller/edit_people_member/".$row->user_id;
                                  } 
         if($this->uri->segment(2)=='people_me' || isset($me) && $me=='people_me'){
                                 $goto_url= base_url()."people_user_controller/edit_people_me/".$row->user_id;
                                 } ?>
                                 
                                
                                 
                                  <li <?php if($row->user_id==$this->uri->segment(3) || (isset($updated_id) && $row->user_id==$updated_id)) {?> class="selected" <?php } ?>>
								<div class="pill" <?php if($row->user_profile_image!=''){?>style="background-image: url('<?php echo base_url(); ?>assets/img/people/<?php echo $row->user_profile_image; ?>')"<?php }else{?>style="background-image: url('<?php echo base_url(); ?>assets/img/admin/noimage.jpg')"<?php } ?>>&nbsp;</div>                            <p class="label"><?php echo  $row->user_first_name.' '.$row->user_last_name;?></p>
                             
                                    <p class="options"><span id="setting_id"><?php echo "<a  href=".$goto_url.">Settings</a>
									"; ?>
                                     <?php if($this->uri->segment(2)!='people_me' && $this->uri->segment(2)!='edit_people_me' && (!isset($me))){ ?>
                                    </span><span class="pipe">|</span>
                                  <!--  <p class="options"><span>-->
                                  <?php 
								  $url_manage_user='';
								  if($this->uri->segment(2)=='people_member' || $this->uri->segment(3)=='mnew'  || isset($roles) && $roles==3 || $this->uri->segment(2)=='edit_people_member'){
								      $url_manage_user=base_url()."manage_user_controller/select_account_member/".$row->user_id;
								  }
								  if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(3)=='anew' || isset($roles) && $roles==1 || $this->uri->segment(2)=='edit_people_administrator' ){
								      $url_manage_user=base_url()."manage_user_controller/select_account_administrator/".$row->user_id;
								  }
								  if($this->uri->segment(2)=='people_editor' || $this->uri->segment(3)=='enew' || isset($roles) && $roles==2 || $this->uri->segment(2)=='edit_people_editor'){
								      $url_manage_user=base_url()."manage_user_controller/select_account_editor/".$row->user_id;
								  }
									 ?>
                                    <span><?php  echo "<a  href=".$url_manage_user.">Accounts</a>"; ?></span></p>
                                    <?php } ?>
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
                             <?php if(isset($query[0]->user_first_name) && $this->uri->segment(3)!=''){?>
                            <h2 class="edit" id="edit"><?php echo $query[0]->user_first_name.' '.$query[0]->user_last_name; ?></h2>
                            <input type="hidden" id="people_id" name="people_id" value="<?php echo $query[0]->user_id; ?>" />
                            <?php } ?>
                       <form action="<?php echo base_url(); ?>people_user_controller/people_add" enctype="multipart/form-data" method="post" id="my_form" <?php if(isset($query) && $query!='') { ?>  style="display:block;" <?php }else { ?> style="display:none;" <?php } ?>>
<!-- Status -->                       

							<?php
							$edit_hidden_value='';
							if($this->uri->segment(2)=='edit_people_me' || (isset($me) && $me=='me')){
                            $edit_hidden_value='people_me';
                            }
                            ?>
                           
                            <input type="hidden" name="people_values" value="<?php echo $edit_hidden_value;?>" />
                            <div class="splitPaneRightRow  <?php  if(isset($query[0]->user_status)  && $query[0]->user_status==1) {?> statusGreen <?php } else if(isset($query[0]->user_status)  && $query[0]->user_status==0){ ?>statusRed <?php } ?>">
                                <h3  onclick="showSplitPlaneRow(this);">Status</h3><div class="splitPlaneQuickDetails" id="form_act_id"><?php
								 if(isset($query[0]->user_status)){if($query[0]->user_status==1){ echo 'Active';}else{ echo 'Paused'; }} ?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Status</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="user_status">
                                                  <option <?php if(isset($query[0]->user_status) && $query[0]->user_status==1){echo 'selected=selected';}?> value="1">Active</option>
                                                <option <?php if(isset($query[0]->user_status) && $query[0]->user_status==0){echo 'selected=selected';}?> value="0">Paused</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Role</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="user_role">
                                            <?php if($this->session->userdata('role_id')==1){?>
                                                <option value="1" <?php  if(isset($query[0]->role_id) && $query[0]->role_id==1 || $this->uri->segment(3)=='anew' || $this->uri->segment(2)=='people_administrator'){ echo 'selected=selected';} ?> >Administrator</option>
                                                <option value="2" <?php  if(isset($query[0]->role_id) && $query[0]->role_id==2 || $this->uri->segment(3)=='enew' || $this->uri->segment(2)=='people_editor'){ echo 'selected=selected';} ?> >Editor</option>
                                                <?php }?>
                                                <option value="3" <?php  if(isset($query[0]->role_id) && $query[0]->role_id==3 || $this->uri->segment(3)=='mnew' || $this->uri->segment(2)=='people_member'){ echo 'selected=selected';} ?> >Member</option>
                                                <option value="4">Public</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    
                                    </li>

                                </ul>
                            </div>
<!-- Sign In -->                            
                            <div class="splitPaneRightRow ">
                                <h3   onclick="showSplitPlaneRow(this);">Sign In</h3><div class="splitPlaneQuickDetails" id="form_pro_id"><?php if(isset($query[0]->user_email)){ echo $query[0]->user_email;}?></div>
                                <ul class="splitPaneRightDetails ">
                                  
                                    <li class="row">
                                        <div class="labelInfo col span_4">Username</div>
   <div class="formInfo col span_12"><input type="email" name="username" value="<?php if(isset($query[0]->user_email)){ echo $query[0]->user_email;}else{echo "Email Address";}?>" id="user_email" onkeyup="user_view(this.value)" onblur="if(this.value==''){this.value='Email Address'}" onclick="if(this.value=='Email Address'){this.value=''}"  /><span class="required" id="user_error"></span></div>
                                    </li>
                                  <li class="row">
                                        <div class="labelInfo col span_4">Password</div>
                                        <div class="formInfo col span_12"><input type="password" name="password" value="<?php if(isset($query[0]->user_password)){ echo base64_decode($query[0]->user_password);}?>" id="password_id" onkeyup="password_field(this.value)" /><span class="required" id="password_error"></span></div>
                                    </li>
                                </ul>
                            </div>
<!-- Profile -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails" id="form_cont_id"><?php if(isset($query[0]->user_first_name)){ echo $query[0]->user_first_name.' '.$query[0]->user_last_name;}?></div>
                                <ul class="splitPaneRightDetails">
                                 <?php if(isset($query[0]->user_profile_image) && $query[0]->user_profile_image!=''){?>
                                    <li class="row">
                                    <div style="float:left;padding-left:127px"><img src="<?php echo base_url(); ?>assets/img/people/<?php echo $query[0]->user_profile_image; ?>" height="100" width="100" /></div>
                                    <div id="loader" style="display:none;">
   									<img src="<?php echo base_url()?>assets/img/admin/load.gif" />
  									</div>
                                    <div id="onsuccessmsg"></div>
                                    </li>
                                  <?php }else{ ?>
                                  <li class="row">
                                  <div style="float:left;padding-left:127px"><img src="<?php echo base_url(); ?>assets/img/admin/apple.jpg" height="100" width="100" /></div>
                                  </li>
                                 <?php } ?>
                                  
                                        <li class="row">
                                         <?php if(!isset($query[0]->user_profile_image)){?>
                                        <div id="loader" style="display:none;">
   									<img src="<?php echo base_url()?>assets/img/admin/load.gif" />
  									</div>
                                    <div id="onsuccessmsg"></div>
                                    <?php } ?>
                                    <div class="labelInfo col span_4">Image</div>
                                    <div class="formInfo col span_12"><input type="file"  name="poeple_image" id="userfile" class="halfSize" value="<?php if(isset($query[0]->user_profile_image)) echo $query[0]->user_profile_image; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="upload_img_btn" value="Upload" />
                                    
                                    </div>
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
<!-- Notifications -->                            
                            <div class="splitPaneRightRow ">
                                <h3  onclick="showSplitPlaneRow(this);">Notifications</h3><div class="splitPlaneQuickDetails" id="form_opt_id"><?php if(isset($query[0]->user_notification_recieve_email_at)){ echo $query[0]->user_notification_recieve_email_at;}?></div>
                                <ul class="splitPaneRightDetails">

                                    <li class="row">
                                        <div class="labelInfo col span_4">Receive emails at:</div>
                                        <div class="formInfo col span_12"><input class=""  type="email" name="recieve_email_at" value="<?php if(isset($query[0]->user_notification_recieve_email_at)){ echo $query[0]->user_notification_recieve_email_at;}?>" id="recieve_email" <?php /*?>onkeyup="email1(this.value)"<?php */?>  /></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Receive texts at:</div>
     <div class="formInfo col span_12"><input class=""  type="text" name="recieve_text_at" value="<?php if(isset($query[0]->user_notification_recieve_text_at)){ echo $query[0]->user_notification_recieve_text_at;}?>" id="last_email" <?php /*?>onkeyup="recieve_text(this.value)"<?php */?> /></div>
                                    </li>
                                </ul>
                            </div>
<!-- Audiences -->                            
                            <div class="splitPaneRightRow ">
                                <h3   onclick="showSplitPlaneRow(this);">Audiences</h3><div class="splitPlaneQuickDetails" id="form_aud_id">Expand to view and add details.</div>
                                <ul class="splitPaneRightDetails ">
                          
                                
                                 <li class="row">
                                        <div class="labelInfo col span_4">Audiences</div>
                                        <div class="formInfo col span_12">
                                            <div class="row">
                                            
                                            <p>
                                  			   <select id="s4" multiple="multiple" name="audience_select[]">
                                        		<option>All</option>
                                        			<?php foreach($audience_data as $row) {?>
                                            			<option value="<?php echo $row->audience_id;?>" <?php if(isset($audiencedata) && $audiencedata!='' && isset($postback)) if(in_array($row->audience_id, $postback)){ echo "selected";}?>><?php  echo substr($row->audience_profile_title ,0,17);?></option>
                                              <?php  } ?>
                                    			</select>
    										</p>                                
                                                                                      
                                            </div>
                                        </div>
                                    </li>
                              </ul>
                            </div>
<!-- Tags -->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Tags</h3>
                                 <?php if(isset($query[0]->user_tags_tags)){
								$tag_user = rtrim($query[0]->user_tags_tags,',');
								$tags=explode(',',$tag_user);
								$tags_count=count($tags);
							}
								?>
                                <div class="splitPlaneQuickDetails" id="form_tag_id"><?php if(isset($tags_count)){ echo $tags_count;} ?> tags.</div>
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
                            <?php $id_user=''; if(isset($query[0]->user_id)){ $id_user = $query[0]->user_id;}
							   if(isset($updated_id)){ $id_user = $updated_id;}   
							?>
                            <input type="hidden" name="hiddenid" value="<?php if(isset($query[0]->user_id)){ echo $query[0]->user_id;}?>"  />                            

                        <!-- Desktop Buttons -->                    
                            <div class="splitPaneRightRow rightButtonsRow row gutters">
                            	<div class="col span_4">
	                                 <?php $current_id=$this->uri->segment(3);
						   if(isset($query[0]->user_id)){
							  if($query[0]->is_default!=1){  ?>
                              <button id="remove_btn" class="remove">Remove</button>
                          <?php } } ?>
                                </div>
                                <div class="col span_4">&nbsp;</div>
                                <div class="col span_4">
                       			<a href="<?php echo base_url()?>">
									<button type="button" id="cancel_btn" class="cancel">Cancel</button>
                       			</a>             
                                </div>
                                <div class="col span_4">                                    
                                    <button class="save" id="save_btn">Save</button>
                                </div>
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
	$('#cancel_btn').attr("type", "button");	
	$('#save_btn').click(function(e) {


	var email_val= $('#user_email').val();
	if(email_val=='' || email_val=='Email Address'){
		
		$('#form_pro_id').parent().AddClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0); 
		
		$('#user_email').css({"border-color":"red"});
		$('#user_email').val('');
		$('#user_email').focus();
		$('#user_error').css({"color":"red"});		
		return false;
	}else{
		$('#user_email').css({"border-color":"#63dfff"});
			$('#user_error').css({"color":"#fff"});
	}
	
	if(email_val!='' && email_val!='Email Address'){
	
	 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	  
	  if(!emailReg.test(email_val)) {
		  
		$('#form_pro_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0); 
		
		$('#user_email').val('');
		$('#user_email').focus();
		$('#user_error').css({"color":"red"});		
		return false;
		  
	  }else{
		$('#user_email').css({"border-color":"#63dfff"});
			$('#user_error').css({"color":"#fff"});
	}
	}
	
	var password_val= $('#password_id').val();
	if(password_val==''){
		
		$('#form_pro_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).show(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0); 
		
		$('#password_id').css({"border-color":"red"});
		$('#password_id').focus();
		$('#password_error').css({"color":"red"});		
		return false;
	}else{
	  
		$('#password_id').css({"border-color":"#63dfff"});
		$('#password_error').css({"color":"#fff"});
		
	}
	var name_val= $('#name_id').val();
	if(name_val==''){
		
		$('#form_cont_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_cont_id').parent().children("ul").eq(0).show(300); 
		$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0); 
		
		$('#name_id').css({"border-color":"red"});
		$('#name_id').focus();
		$('#name_error').css({"color":"red"});		
		return false;
	}else{
	  
		$('#name_id').css({"border-color":"#63dfff"});
		$('#name_error').css({"color":"#fff"});
		
	}
	var last_name_val= $('#last_name_id').val();
	if(last_name_val==''){
		
		$('#form_cont_id').parent().addClass('splitPaneRightSelected'); 
		$('#form_cont_id').parent().children("ul").eq(0).show(300); 
		$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).show(0);
		
		$('#last_name_id').css({"border-color":"red"});
		$('#last_name_id').focus();
		$('#last_error').css({"color":"red"});		
		return false;
	}else{
		
		$('#last_name_id').css({"border-color":"#63dfff"});
		$('#last_error').css({"color":"#fff"});
		
	}


	/*var email_val= $('#recieve_email').val();
	if(email_val==''){
		$('#recieve_email').css({"border-color":"red"});
		$('#recieve_email').focus();
		$('#error_message').css({"color":"red"});		
		return false;
	}*/
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
		
		$('#form_pro_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
		
		$('#user_email').css({"border-color":"red"});
		$('#user_email').val('');
		$('#user_email').focus();
		$('#user_error').css({"color":"red"});		
		return false;
	}
	var password_val= $('#password_id').val();
	if(password_val==''){
		
		$('#form_pro_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_pro_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_pro_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
		
		$('#password_id').css({"border-color":"red"});
		$('#password_id').focus();
		$('#password_error').css({"color":"red"});		
		return false;
	}
	var name_val= $('#name_id').val();
	if(name_val==''){
		
		$('#form_cont_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_cont_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
		
		$('#name_id').css({"border-color":"red"});
		$('#name_id').focus();
		$('#name_error').css({"color":"red"});		
		return false;
	}
	var last_name_val= $('#last_name_id').val();
	if(last_name_val==''){
		
		$('#form_cont_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_cont_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_cont_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0);
		
		$('#last_name_id').css({"border-color":"red"});
		$('#last_name_id').focus();
		$('#last_error').css({"color":"red"});		
		return false;
	}


	/*var rec_email_val= $('#recieve_email').val();
	if(rec_email_val==''){
		
		$('#form_opt_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_opt_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_opt_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0);
		
		$('#recieve_email').css({"border-color":"red"});
		$('#recieve_email').focus();
		$('#error_message').css({"color":"red"});		
		return false;
	}*/
	
	
	
	
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
	<?php	
	$edit_form=$this->uri->segment(2); 
	if($edit_form=='edit_people_administrator' || $edit_form=='edit_people_editor' || $edit_form=='edit_people_member')
		{
		}
		if(isset($edit_data) && $edit_data=='edited'){ 
		?>
	  	document.getElementById('my_form').style.display='block';

		<?php 
		}
		else if($edit_form=='edit_people_administrator')
		{}
		else if($edit_form=='edit_people_member')
		{}
		else if($edit_form=='edit_people_me')
		{}
		else if($edit_form=='edit_people_editor')
		{}
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
	
	
 $('.edit').editable('<?php echo base_url()?>ajax/update_ajax_people', {
		 id : 'elementid',
         indicator : 'Saving...',
		 submitdata : {people_id: $('#people_id').val()+'||'+'<?php echo $this->uri->segment(2) ?>'},
         tooltip   : 'Click to edit...',
		 cancel : 'Cancel',
		 submit  : 'Save',
		 onblur : 'ignore',
     });
	
function onsuccess(response,status){
  $("#loader").hide();
  $("#onsuccessmsg").html('<div id="msg" style="margin-left:127px">'+response+'</div>');
 }
 $('#upload_img_btn').click(function(){
	  var f = document.getElementById("userfile").value;
        if(f==''){
		 alert("Please select file to upload");
		 return false;	
		}
	 $('#my_form').attr('action', 'upload_images');
	//alert($('#my_form').attr('action'));
	$("#my_form").submit(); 
 });

$('#my_form').on('submit',function(){
 if($('#my_form').attr('action')=='upload_images'){
 $("#loader").show();
  var options={
   //url     : $(this).attr("action"),
   url     : '<?php echo base_url()?>people_user_controller/upload_images',
   success : onsuccess
  };
  $(this).ajaxSubmit(options);
 return false;
  }
 });

$('#save_btn').click(function(){
	$('#my_form').attr('action', '<?php echo base_url()?>people_user_controller/people_add');
});

$('#save_btn_mobile').click(function(){
	$('#my_form').attr('action', '<?php echo base_url()?>people_user_controller/people_add');
});


$('#remove_btn').click(function(){
	var r = confirm("Are you sure you want to delete");
	if (r == true) {
		var del_id=$('#hiddenid').val();
		window.location.href='<?php echo base_url() ?>people_user_controller/people_administrator_delete/'+del_id;
	} else {
		
	}
});

});


</script>


<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/jquery.jeditable.mini.js"></script>

</body>
</html>