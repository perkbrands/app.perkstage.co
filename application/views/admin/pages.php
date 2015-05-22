<?php
/*
if(!isset($_GET['page'])) $page = "account";
else $page = $_GET['page'];
$subPage = $_GET['subPage'];
*/

// Hard coded for testing, replace with real data later
//$connections = array("childrensharbor.com", "childrensharbor.net", "childrensharbor.org");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Perk CMS</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/mlpmenu/component.css" />
<!-- Editabel Css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/mlpmenu/ui.dropdownchecklist.css" />

<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="/css/ie8lte.css"/>
<![endif]-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/admin/jquery.js"></script> 
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/modernizr.custom.js"></script>
			<!-- DropDown  Jq -->

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/admin/ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/admin/ui.dropdownchecklist_other.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#s4").dropdownchecklist({ firstItemChecksAll: true,maxDropHeight: 120,width:320 });
            $("#s5").dropdownchecklist({ firstItemChecksAll: true,maxDropHeight: 120,width:320 });
        });
		
		function page_name(value)
		{
			if(value!='')
			$('#page_name_id').css({"border-color":"#63dfff"});
			$('#error_name').css({"color":"#00A3E8"});
		}
		
    </script>
</head>
<body>
 <?php if(isset($pageaccount) && $pageaccount!='')
  {
  		$array_length=count($pageaccount); 
	  		for($i=0;$i<$array_length; $i=$i+1)
			{
				$postback[]=$pageaccount[$i]->account_id; 
			}
			
  }
?>
  <?php if(isset($pagewebsite) && $pagewebsite!='')
  {
  		$array_web=count($pagewebsite); 
	  		for($i=0;$i<$array_web; $i=$i+1)
			{
				$postbackweb[]=$pagewebsite[$i]->website_id; 
			}
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
                <h2 class="icon icon-world">Pages</h2>
                

                	 <form action="<?php echo base_url(); ?>pages_controller/page_search" method="post" enctype="multipart/form-data" name="search_form" id="search_form">                        
                    <ul class="leftPaneFilters">

                          
                             <li id="searchButtonLI">
                                <input type="text" placeholder="Search" name="txt_search" id="input_id" value="<?php if(isset($search_field_value) && $search_field_value != ''){ echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                
                              </li>
                                <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter">
                                        <option value="2" <?php if(isset($search_var) && $search_var=='2'){echo "selected=selected";}?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                                    <input type="hidden" id="selected_value" name="selected_value" />
                            </li>
                                
                                <a href="<?php echo base_url(); ?>pages_controller/all_pages"><li><button type="button" />View All</button></li></a>
                         </ul>
                            </form>
                            <div class="leftPaneFiltersDetails">
                                <p><?php echo count($listing_data);  ?>  Page(s)</p>
                            </div>
                            <ul class="cardsBox">                              
								
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>pages_controller/pages_conroller/new">
							     <li id="new_page">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Page</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else
								 { ?>
							     <li id="new_page" onclick="card_expand();">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Page</div>
                                </li>
                                 <?php } ?> 
   
                                <?php foreach($listing_data as $row){ ?>
                               		<li <?php if($row->page_id==$this->uri->segment(3) || (isset($updated_id) && $updated_id==$row->page_id)) {?> class="selected" <?php } ?>>
                                     
                                    <div class="pill" <?php if($row->page_profile_image!=''){ ?>style="background-image: url('<?php echo base_url(); ?>assets/img/pages_img/<?php echo $row->page_profile_image; ?>');"<?php }else{?>style="background-image: url('<?php echo base_url(); ?>assets/img/admin/apple.jpg');"<?php } ?>>&nbsp;</div>
                                   <?php
									$data_page_length = strlen($row->page_name);
									if($data_page_length > 40){
										$page_data = substr($row->page_name,0,40).'...';
									}else{
										$page_data = substr($row->page_name,0,40);
									}
									?>
                                    <p class="label"><?php echo $page_data;?></p>
                                    <?php if($row->page_status==1) {?>
                                     <p class="options">
                                    <span id="setting_id"><?php echo "<a  href=".base_url()."pages_controller/page_setting/$row->page_id>Settings</a>";?><span class="pipe">|</span><a href="<?php echo base_url()?>pages_controller/manage_page/<?php echo $row->page_id; ?>">Manage</a></span></span>
                                    </p>
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
                        
                           <form action="<?php echo base_url(); ?>pages_controller/page_search" method="post" enctype="multipart/form-data" name="search_form" id="search_form">                        
                    <ul class="leftPaneFilters">

                          
                             <li id="searchButtonLI">
                                <input type="text" placeholder="Search" name="txt_search" id="input_id" value="<?php if(isset($search_field_value) && $search_field_value != ''){ echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                
                              </li>
                                <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter">
                                        <option value="2" <?php if(isset($search_var) && $search_var=='2'){echo "selected=selected";}?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                                    <input type="hidden" id="selected_value" name="selected_value" />
                            </li>
                                
                                <a href="<?php echo base_url(); ?>pages_controller/all_pages"><li><button type="button" />View All</button></li></a>
                         </ul>
                            </form>
                            <div class="leftPaneFiltersDetails">
                                <p><?php echo count($listing_data);  ?>  Page(s)</p>
                            </div>
                            <ul class="cardsBox">                                 
								
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>pages_controller/pages_conroller/new">
							     <li id="new_page" >
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Page</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else
								 { ?>
							     <li id="new_page" onclick="card_expand();">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Page</div>
                                </li>
                                 <?php } ?> 
   
                                <?php foreach($listing_data as $row){ ?>
                                 
                               		<li <?php if($row->page_id==$this->uri->segment(3) || (isset($updated_id) && $updated_id==$row->page_id)) {?> class="selected" <?php } ?>>
                                     
                                    <div class="pill" <?php if($row->page_profile_image!=''){ ?>style="background-image: url('<?php echo base_url(); ?>assets/img/pages_img/<?php echo $row->page_profile_image; ?>');"<?php }else{?>style="background-image: url('<?php echo base_url(); ?>assets/img/admin/apple.jpg');"<?php } ?>>&nbsp;</div>
                                    <?php
									$data_page_length = strlen($row->page_name);
									if($data_page_length > 40){
										$page_data = substr($row->page_name,0,40).'...';
									}else{
										$page_data = substr($row->page_name,0,40);
									}
									?>
                                    <p class="label"><?php echo $page_data;?></p>
                                    <p class="options">
                                    <span id="setting_id"><?php echo "<a  href=".base_url()."pages_controller/page_setting/$row->page_id>Settings</a>";?><span class="pipe">|</span><a href="<?php echo base_url()?>pages_controller/manage_page/<?php echo $row->page_id; ?>">Manage</a></span>
                                    </p>
									<?php if($row->page_status==1) {?>
                                   <div class="status statusGreen"></div>
                                   <?php } else
								   { ?>
                                   <div class="status statusRed"></div>
                                  <?php } ?>
										
                                </li>
                                 
                                
                                <?php } ?>
                                <li class="spacer"></li>
                                <li class="spacer"></li>
                                <li class="spacer"></li>                                
                            </ul>
        
                        </div>
                        <!-- END OF splitPaneLeft -->
        
        
                        <div class="col span_8" id="splitPaneRight">
                        <?php
							 if(isset($error) && $error!=''){
							 
							 echo '<div style="color:red;margin:10px 0 0 10px;font-weight:bold;font-size:20px">'.$error.'</div>';
							 }
							 ?>
                        <?php if(isset($query[0]->page_name)){ ?>
                            <h2 class="edit" id="edit"><?php echo $query[0]->page_name;?></h2>
                             <input type="hidden" id="page_id" name="page_id" value="<?php echo $query[0]->page_id; ?>" />
                            <?php } ?>
                            
                            <?php if(isset($query) && $query!='' && $this->uri->segment(3)!='' && $this->uri->segment(2)!='page_delete') {?>    
                               <div class="row pageNotes splitPaneRightRow">
                                <div class="col span_9 note">Involved in 0 Campaigns</div>
                                <div class="col span_7">
	                               <a href="<?php echo base_url()?>pages_controller/manage_page/<?php echo $query[0]->page_id; ?>">
                                   <button class="editPage">Manage Page</button>
                                   </a>
                                </div>
                            </div>
                              
                              <?php } ?>
                            
        <form action="<?php echo base_url();?>pages_controller/page_add" method="post" id="my_form" <?php  if(isset($query) && $query!='') { ?>  style="display:block;" <?php }else { ?> style="display:none;" <?php }  ?> enctype="multipart/form-data">
        <?php if(!isset($query)){?>
                        <div style="float:left;margin:5px 0 20px 10px;width:90%">
                        <div class="labelInfo col span_4" style="color:#00A3E8" id="error_name">Page Name</div>
                        <input style="width: 100%; height: 44px;" autocomplete="off" name="txt_page_name" id="page_name_id" onkeyup="page_name(this.value)">
                        </div>
                        <?php } ?>
<!-- Status -->                            
                            <div class="splitPaneRightRow <?php  if(isset($query[0]->page_status)  && $query[0]->page_status==1) {?> statusGreen <?php } else if(isset($query[0]->page_status)  && $query[0]->page_status==0){ ?>statusRed <?php } ?>">
                            <h3  onclick="showSplitPlaneRow(this);">Status</h3><div class="splitPlaneQuickDetails" id="form_act_id"><?php if(isset($query[0]->page_status) && $query[0]->page_status==1){echo 'Active';}if(isset($query[0]->page_status) && $query[0]->page_status==0){echo 'Paused';}?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Status</div>
                                        <div class="formInfo col span_12">
                                           <select name="page_status" class="">
                                           <option value="1" <?php if(isset($query[0]->page_status) && $query[0]->page_status==1){ echo 'selected';} ?>>Active</option>
                                           <option value="0" <?php if(isset($query[0]->page_status) && $query[0]->page_status==0){ echo 'selected';} ?>>Paused</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- Profile -->                            
                            <div class="splitPaneRightRow">
                               <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails" id="form_detail_id"><?php if(isset($query[0]->page_profile_title)) echo $query[0]->page_profile_title; ?></div>
                                <ul class="splitPaneRightDetails">
                                
                                  
                                  <?php if(isset($query[0]->page_profile_image) && $query[0]->page_profile_image!=''){ ?>
                                  <li class="row">
                                  <div style="float:left;padding-left:127px"><img src="<?php echo base_url(); ?>assets/img/pages_img/<?php echo $query[0]->page_profile_image; ?>" height="100" width="100" /></div>
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
                                
                                    <div class="labelInfo col span_4">Image</div>
                                    <div class="formInfo col span_12"><input type="file"  name="page_image" class="halfSize" /></div>
                                  
                                    </li>
                                    <li class="row">
                                      <div class="labelInfo col span_4">Search Title</div>
                                      <div class="formInfo col span_12"><input type="text" id="title_id" onkeyup="titletext(this.value)" name="txt_profile_title" value="<?php if(isset($query[0]->page_profile_title)) echo $query[0]->page_profile_title; ?>" /></div>
                                    </li>
                                    <li class="row">
                                      <div class="labelInfo col span_4">Search Summary</div>
                                      <div class="formInfo col span_12"><textarea class="doubleHeight" name="txt_profile_summary"/><?php if(isset($query[0]->page_profile_summary)) echo $query[0]->page_profile_summary; ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- Type -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Type</h3><div class="splitPlaneQuickDetails" id="form_type_id">Web Page</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Page Type</div>
                                        <div class="formInfo col span_12">
                                        	<!-- User selects one -->
                                            <select class="" name="page_type">
                                                <option <?php if(isset($query[0]->page_type) && $query[0]->page_type=='web_page') echo 'selected'; ?> value="web_page">Web Page</option><!-- Default Selection -->
                                                <option <?php if(isset($query[0]->page_type) && $query[0]->page_type=='web_post') echo 'selected'; ?> value="web_post">Web Post</option>
                                                <option <?php if(isset($query[0]->page_type) && $query[0]->page_type=='web_calendar') echo 'selected'; ?> value="web_calendar">Web Calendar</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
                                </ul>
                            </div>               

<!-- Design -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Design</h3><?php /*?><div class="splitPlaneQuickDetails" id="form_design_id">Default Design</div><?php */?>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Design</div>
                                        <div class="formInfo col span_12">
                                        	<!-- User selects one -->
                                            <select class="" name="design_selected">
                                            
                                               <?php 
											   
											   foreach($listing_design as $design) {?>
                                               
                                             
                                               
                                            <option value="<?php echo $design->design_id;?>" <?php if(isset($one_design) && !empty($one_design)) if($one_design[0]->design_id==$design->design_id){ echo "selected=selected";}?>><?php echo $design->design_title;?></option>
                                              <?php   } ?>
                                            </select>
                                            <?php /*?><span class="required"></span>   <?php */?>                             
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                  

<!-- Placement -->                           
                            <div class="splitPaneRightRow ">
                                <h3   onclick="showSplitPlaneRow(this);">Placement</h3><div class="splitPlaneQuickDetails" id="form_placement_id"></div>
                                <ul class="splitPaneRightDetails ">
                    	<?php if($this->session->userdata('isdefault')==1 || ($this->session->userdata('role_id')==1 && $this->session->userdata('assigned_roles')=='multiple'))
						{ ?>                            <!-- Placement -->         
                                    <?php if(isset($allaccount) && $allaccount!='false') { ?>

                                    <li class="row">
                                    <div class="labelInfo col span_4">Accounts</div>

                                        <div class="formInfo col span_12">
                                     <p>
                                     
                                      <?php
									 
									 $ac_id=$this->session->userdata('current_account_id');
									if($ac_id!='')
									{
										$current_account_id=$this->session->userdata('current_account_id');
									}
									else
									{
										$current_account_id=$this->session->userdata('account_id');
									}
									 
									 ?>
                                        
                                    <select id="s4" multiple="multiple" name="accounts_select[]">
                                        	<option>All</option>
                                        	<?php foreach($allaccount as $row) {?>
                                            <?Php if($row->account_id !=$current_account_id){?>
                                            <option value="<?php echo $row->account_id;?>" <?php if(isset($pageaccount) && $pageaccount!='' && isset($postback)) if(in_array($row->account_id, $postback)){ echo "selected";}?>><?php echo $row->account_title;?></option>
                                              <?php   } ?>
                                              <?php } ?>
                                    </select>
    								</p>                                
                                        </div>
                                       
                                    </li>
                                    <?php } } ?>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Websites</div>
                                        <div class="formInfo col span_12">
                                        <p>
                                    <select id="s5" multiple="multiple" name="website_select[]">
                                        	<option>All</option>
                                            <?php  foreach($allwebsites as $row) {?>
                <option value="<?php echo $row->id;?>"<?php if(isset($pagewebsite) && $pagewebsite!=''  && isset($postbackweb)) if(in_array($row->id, $postbackweb)){ echo "selected";}?>><?php echo $row->website_title;?></option>
                                            <?php } ?>
                                            </select>
                                            </p>
										</div>
                                    </li>
									<!-- If "Selected" is true above, then website checkboxes display. -->
                                  

                                </ul>
                            </div>
								<?php //}  ?>
<!-- Tags -->                            
                            <div class="splitPaneRightRow" >
                            <?php if(isset($query[0]->page_tag)){
								$tag_audience = rtrim($query[0]->page_tag,',');
								$tags=explode(',',$tag_audience);
								$tags_count=count($tags);
							}
							
								?>
                                <h3  onclick="showSplitPlaneRow(this);">Tags</h3><div class="splitPlaneQuickDetails" id="form_tag_id"><?php if(isset($query[0]->page_tag) &&$query[0]->page_tag!=''){ echo $tags_count;} else{echo '0';}?> Tags</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Tags</div>
                                        <div class="formInfo col span_12"><textarea name="txt_tag" class="doubleHeight"/><?php if(isset($query[0]->page_tag)) echo $query[0]->page_tag; ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails" id="form_not_id">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                   <li class="row">
                                    <div class="labelInfo col span_4">Notes</div>
                                    <div class="formInfo col span_12"><textarea name="txt_note" class="doubleHeight"/><?php if(isset($query[0]->page_note)) echo $query[0]->page_note; ?></textarea></div>
                                   </li>
                                </ul>
                            </div>
                            <?php $page_edit_id = $this->uri->segment(3);
								  if(isset($updated_id)){
									  $page_edit_id=$updated_id;
								  }
							 ?>
                             <input type="hidden" value="<?php echo $page_edit_id; ?>" name="hiddenid" id="hiddenid"/>
                             
                             <input type="hidden" name="website_selected" id="website_selected" />
                            
                            <!-- Desktop Buttons -->                    
                            <div class="splitPaneRightRow rightButtonsRow row gutters">
                            	<div class="col span_4">
	                                <?php $current_id=$this->uri->segment(3); 
								if(isset($current_id) && $current_id!='' && $current_id!='new')
								{
						 		?>
                                <button id="remove_btn" class="remove">Remove</button> 
                                <?php } ?>
                                </div>
                                <div class="col span_4">&nbsp;</div>
                                <div class="col span_4">
									<button type="button" id="cancel_btn" onclick="history.back()" class="cancel">Cancel</button>
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

<script type="text/javascript">
function submit_change_val(select_value){
$('#selected_value').val(select_value);
var	inputValue=$('#input_id').val();
$('#input_value').val(inputValue);
$('#search_form').submit();
}


$(document).ready(function() {

var website_select=$('#page_website_id').val();
$('#website_selected').val(website_select);

	$('#cancel_btn').attr("type", "reset");
	$('#save_btn').click(function(e) {
	var audience_val= $('#title_id').val();
	if(audience_val==''){
		$('#title_id').css({"border-color":"red"});
		$('#title_id').focus();
		return false;
	}
	});
	$('#save_btn_mobile').click(function(e) {
	var audience_val= $('#title_id').val();
	if(audience_val==''){
		$('#title_id').css({"border-color":"red"});
		$('#title_id').focus();
		return false;
	}
	});
});	

function card_expand()
{
	document.getElementById('my_form').style.display='block';
	$('#form_act_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_act_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_act_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
	$('#form_placement_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_placement_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_placement_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0);
	
	$('#form_type_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_type_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_type_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0);
	
	$('#form_design_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_design_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_design_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_detail_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_detail_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_detail_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_enrol_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_enrol_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_enrol_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_tag_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_tag_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_tag_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_not_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_not_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_not_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
}

</script>
<script>
function select_website(webid){
window.location.href='<?php echo base_url()?>pages_controller/selected_website/'+webid;	
}
function titletext(value)
{
	if(value!='')
	$('#title_id').css({"border-color":"#63dfff"});
}
$(document).ready(function() {
	
	$('#remove_btn').attr("type", "button");
     
	  $('.edit').editable('<?php echo base_url()?>ajax/update_ajax_page', {
		 id : 'elementid',
         indicator : 'Saving...',
		 submitdata : {page_id: $('#page_id').val()},
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
	<?php if(isset($edit_data) && $edit_data=='edited'){ ?>
	document.getElementById('my_form').style.display='block';
	
	<?php } ?>
	$('#open_audience_ic').click(function(){
		document.getElementById('my_form').style.display='block';
	});
});
$(document).ready(function() {
<?php	
$add_form=$this->uri->segment(2); 
?>
	
	
	$('#remove_btn').click(function(){
	var r = confirm("Are you sure you want to delete");
	if (r == true) {
		var del_id=$('#hiddenid').val();
		window.location.href='<?php echo base_url() ?>pages_controller/page_delete/'+del_id;
	} else {
		
	}
});
	
	
	});
	
	
function audience_filter(selectedValue)
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
	    card_expand();
    </script>
<?php  }
else
{
	} 

	?>

</script> 
<?php $add_form=$this->uri->segment(2);
	if($add_form=='audience11')
	{
	?>
	<script>    
	document.getElementById('my_form').style.display='block';

	$('#form_act_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_act_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_act_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
	$('#form_placement_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_placement_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_placement_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0);
	
	$('#form_type_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_type_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_type_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0);
	
	$('#form_design_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_design_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_design_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0);
	

	$('#form_detail_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_detail_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_detail_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_enrol_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_enrol_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_enrol_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_tag_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_tag_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_tag_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_not_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_not_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_not_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

    </script>
<?php }
	?>   
<?php $add_form=$this->uri->segment(2);
	if($add_form=='audience_add')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='none';	

    </script>
<?php }
	?>
<?php $add_form=$this->uri->segment(2);
	if($add_form=='audience_delete')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='none';	

    </script>
<?php }
	?>
	
</script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/jquery.jeditable.mini.js"></script>
</body>
</html>
