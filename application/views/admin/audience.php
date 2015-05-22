<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Audience</title>
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
            $("#s5").dropdownchecklist({ firstItemChecksAll: true,maxDropHeight: 120,width:320 });
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
<?php // echo count($audienceaccount);?>
<?php  // print_r($allaccount); ?>
  <?php if(isset($audienceaccount) && $audienceaccount!='')
  {
  		$array_length=count($audienceaccount); 
	  		for($i=0;$i<$array_length; $i=$i+1)
			{
				$postback[]=$audienceaccount[$i]->account_id; 
			}
  }
?>
  <?php if(isset($audiencewebsite) && $audiencewebsite!='')
  {
  		$array_web=count($audiencewebsite); 
	  		for($i=0;$i<$array_web; $i=$i+1)
			{
				$postbackweb[]=$audiencewebsite[$i]->website_id; 
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
                <h2 class="icon icon-world">Audiences</h2>
                
<form action="<?php echo base_url(); ?>audience/audience_search" method="post" enctype="multipart/form-data" name="search_form" id="search_formfirst" >
                	<ul class="leftPaneFilters">

                          
                             <li id="searchButtonLI">
                                <input type="text" placeholder="Search" name="txt_search" value="<?php if(isset($search_field_value) && $search_field_value != ''){ echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                
                              </li>
                                <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter">
                                        <option value="2" <?php if(isset($search_var) && $search_var=='2'){echo "selected=selected";}?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                                    <input type="hidden" id="selected_valuea" name="selected_valuea" />
                            </li>
                               
                                <a href="<?php echo base_url(); ?>audience/all_audience"><li><button type="button" />View All</button></li></a>
                         </ul>
                     </form>
                    <div class="leftPaneFiltersDetails">
                                <p><?php echo count($listing_data);  ?>  Audience(s)</p>
                            </div>
                    
                	<ul class="cardsBox">                                 
								
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>audience/audience/new">
							     <li id="new_audience" >
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Audience</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else
								 { ?>
							     <li id="new_audience" onclick="card_expand();">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Audience</div>
                                </li>
                                 <?php } ?> 
   
                                <?php foreach($listing_data as $row){ ?>
                                 <?php echo "<a  href=".base_url()."audience/audience_setting/$row->audience_id>"; ?>
                               		<li <?php if($row->audience_id==$this->uri->segment(3) || (isset($updated_id) && $updated_id==$row->audience_id)) {?> class="selected" <?php } ?>>
                                     
                                    <div class="pill" <?php if($row->audience_profile_image!=''){ ?>style="background-image: url('<?php echo base_url(); ?>assets/img/audience/<?php echo $row->audience_profile_image; ?>');"<?php }else{?>style="background-image: url('<?php echo base_url(); ?>assets/img/admin/noimage.jpg');"<?php } ?>>&nbsp;</div>
                                    <p class="label"><?php echo $row->audience_profile_title;?></p>
                                    <?php if($row->audience_status==1) {?>
                                   <div class="status statusGreen"></div>
                                   <?php } else
								   { ?>
                                   <div class="status statusRed"></div>
                                  <?php } ?>
										
                                </li>
                                 </a>
                                
                                <?php } ?>                              
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
                    <div class="row">
                    <div id="splitPaneLeft" class="col span_8">
					<form action="<?php echo base_url(); ?>audience/audience_search" method="post" enctype="multipart/form-data" name="search_form" id="search_form">                        
                    <ul class="leftPaneFilters">

                          
                             <li id="searchButtonLI">
                                <input type="text" placeholder="Search" id="input_id" name="txt_search" value="<?php if(isset($search_field_value) && $search_field_value != ''){ echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="button" name="searchButton" onclick="submit_change_submit()" value=""></button>
                                
                              </li>
                                <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter" id="lst_filters">
                                        <option value="2" <?php if(isset($search_var) && $search_var=='2'){echo "selected=selected";}?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                                  <input type="hidden" id="selected_value" name="selected_value" />
                                  <input type="hidden" id="input_value" name="input_value"/>
                            </li>
                                
                                <a href="<?php echo base_url(); ?>audience/all_audience"><li><button type="button" />View All</button></li></a>
                         </ul>
                            </form>
                            <div class="leftPaneFiltersDetails">
                                <p><?php echo count($listing_data);  ?>  Audience(s)</p>
                            </div>
                            <ul class="cardsBox">                                 
								
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>audience/audience/new">
							     <li id="new_audience" >
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Audience</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else
								 { ?>
							     <li id="new_audience" onclick="card_expand();">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Audience</div>
                                </li>
                                 <?php } ?> 
   
                                <?php foreach($listing_data as $row){ ?>
                                 <?php echo "<a  href=".base_url()."audience/audience_setting/$row->audience_id>"; ?>
                               		<li <?php if($row->audience_id==$this->uri->segment(3) || (isset($updated_id) && $updated_id==$row->audience_id)) {?> class="selected" <?php } ?>>
                                     
                                    <div class="pill" <?php if($row->audience_profile_image!=''){ ?>style="background-image: url('<?php echo base_url(); ?>assets/img/audience/<?php echo $row->audience_profile_image; ?>');"<?php }else{?>style="background-image: url('<?php echo base_url(); ?>assets/img/admin/noimage.jpg');"<?php } ?>>&nbsp;</div>
                                    <p class="label"><?php echo $row->audience_title;?></p>
                                    <?php if($row->audience_status==1) {?>
                                   <div class="status statusGreen"></div>
                                   <?php } else
								   { ?>
                                   <div class="status statusRed"></div>
                                  <?php } ?>
										
                                </li>
                                 </a>
                                
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
                        <?php if(isset($query[0]->audience_title)){ ?>
                            <h2 class="edit" id="edit"><?php echo $query[0]->audience_title;?></h2>
                             <input type="hidden" id="audience_id" name="audience_id" value="<?php echo $query[0]->audience_id; ?>" />
                            <?php } ?>
        <form action="<?php echo base_url();?>audience/audience_add" method="post" id="my_form" <?php  if(isset($query) && $query!='') { ?>  style="display:block;" <?php }else { ?> style="display:none;" <?php }  ?> enctype="multipart/form-data">
<!-- Status -->         <?php if(!isset($query)){?>
                        <div style="float:left;margin:5px 0 20px 10px;width:90%">
                        <div class="labelInfo col span_4" style="color:#00A3E8" id="error_title">Audience Title</div>
                        <input style="width: 100%; height: 44px;" autocomplete="off" name="txt_title" id="title_id" onkeyup="titletext(this.value)">
                        </div>
                        <?php } ?>         

                            <div class="splitPaneRightRow <?php  if(isset($query[0]->audience_status)  && $query[0]->audience_status==1) {?> statusGreen <?php } else if(isset($query[0]->audience_status)  && $query[0]->audience_status==0){ ?>statusRed <?php } ?>">
                            <h3  onclick="showSplitPlaneRow(this);">Status</h3><div class="splitPlaneQuickDetails" id="form_act_id"><?php if(isset($query[0]->audience_status) && $query[0]->audience_status==1){echo 'Active';}else{echo 'Paused';}?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Status</div>
                                        <div class="formInfo col span_12">
                                           <select name="audience_status" class="">
                                           <option value="1" <?php if(isset($query[0]->audience_status) && $query[0]->audience_status==1){ echo 'selected';} ?>>Active</option>
                                           <option value="0" <?php if(isset($query[0]->audience_status) && $query[0]->audience_status==0){ echo 'selected';} ?>>Paused</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- Profile -->                            
                            <div class="splitPaneRightRow">
                               <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails" id="form_detail_id"><?php if(isset($query[0]->audience_profile_title)) echo $query[0]->audience_profile_title; ?></div>
                                <ul class="splitPaneRightDetails">
                                
                                  
                                  <?php if(isset($query[0]->audience_profile_image) && $query[0]->audience_profile_image!=''){ ?>
                                  <li class="row">
                                  <div style="float:left;padding-left:127px"><img src="<?php echo base_url(); ?>assets/img/audience/<?php echo $query[0]->audience_profile_image; ?>" height="100" width="100" /></div>
                                  <div id="loader" style="display:none;">
   									<img src="<?php echo base_url()?>assets/img/admin/load.gif" />
  									</div>
                                    <div id="onsuccessmsg"></div>
                                                               </li>
                                  
                                 <?php }else{ ?>
                                  <li class="row">
                                  <div style="float:left;padding-left:127px"><img src="<?php echo base_url(); ?>assets/img/admin/noimage.jpg" height="100" width="100" /></div>
                                  </li>
                                 <?php } ?>
                                  <li class="row">
                                
                                    <div class="labelInfo col span_4">Image</div>
                                    <div class="formInfo col span_12"><input type="file"  name="audience_image" class="halfSize" value="<?php if(isset($query[0]->audience_profile_image)) echo $query[0]->audience_profile_image; ?>" /></div>
                                  
                                    </li>
                                    
                                      <li class="row">
                                      <div class="labelInfo col span_4">Search Title</div>
                                      <div class="formInfo col span_12"><input type="text" onkeyup="titletext(this.value)" name="txt_profile_title" value="<?php if(isset($query[0]->audience_profile_title)) echo $query[0]->audience_profile_title; ?>" /></div>
                                    </li>
                                    <li class="row">
                                      <div class="labelInfo col span_4">Search Summary</div>
                                      <div class="formInfo col span_12"><textarea class="doubleHeight" name="txt_profile_summary"/><?php if(isset($query[0]->audience_profile_summary)) echo $query[0]->audience_profile_summary; ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
                            
                            
                            
                                                 <!-- Placement -->                           

                            <div class="splitPaneRightRow ">
                                <h3   onclick="showSplitPlaneRow(this);">Placement</h3><div class="splitPlaneQuickDetails" id="form_placement_id">Selected</div>
                                <ul class="splitPaneRightDetails ">
                                 <?php if($this->session->userdata('isdefault')==1 || ($this->session->userdata('role_id')==1 && $this->session->userdata('assigned_roles')=='multiple')) { ?>
                                   <?php if(isset($allaccount) && $allaccount!='false') { ?>

                                    <li class="row">
                                    <div class="labelInfo col span_4">Accounts</div>

                                        <div class="formInfo col span_12">
                                     <p>
                                    <select id="s4" multiple="multiple" name="accounts_select[]">
                                        	<option>All</option>
                                        	<?php foreach($allaccount as $row) {?>
                                            <option value="<?php echo $row->account_id;?>" <?php if(isset($audienceaccount) && $audienceaccount!='' && isset($postback)) if(in_array($row->account_id, $postback)){ echo "selected";}?>><?php echo $row->account_title;?></option>
                                              <?php } ?>
                                    	</select>
    									</p>                                
                                  	 </div>
                                   </li>
                                   <?php }}else{?><input type="hidden" name="hidden_accounts" value="no account" /><?php } ?>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Websites</div>
                                        <div class="formInfo col span_12">
                                        <p>
                                    <select id="s5" multiple="multiple" name="website_select[]">
                                        	<option>All</option>
                                            <?php  foreach($allwebsites as $row) {?>
                <option value="<?php echo $row->id;?>"<?php if(isset($audiencewebsite) && $audiencewebsite!=''  && isset($postbackweb)) if(in_array($row->id, $postbackweb)){ echo "selected";}?>><?php echo $row->website_title;?></option>
                                            <?php } ?>
                                            </select>
                                            </p>
										</div>
                                    </li>
									<!-- If "Selected" is true above, then website checkboxes display. -->
                                  

                                </ul>
                            </div>
							
<!-- Enrollment --> 
                           
                            <div class="splitPaneRightRow ">
                                <h3 onclick="showSplitPlaneRow(this);">Enrollment</h3><div class="splitPlaneQuickDetails" id="form_enrol_id">Members can join automtically</div>
                                <ul class="splitPaneRightDetails">
                                   <li class="row">
                                     <div class="labelInfo col span_4">Enrollment</div>
                                     <div class="formInfo col span_12">
                                        <select class="" name="lst_enrollment">
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
                            <?php if(isset($query[0]->audience_tag)){
								$tag_audience = rtrim($query[0]->audience_tag,',');
								$tags=explode(',',$tag_audience);
								$tags_count=count($tags);
							}
							
								?>
                                <h3  onclick="showSplitPlaneRow(this);">Tags</h3><div class="splitPlaneQuickDetails" id="form_tag_id"><?php if(isset($query[0]->audience_tag) &&$query[0]->audience_tag!=''){ echo $tags_count;} else{echo '0';}?> Tags</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Tags</div>
                                        <div class="formInfo col span_12"><textarea name="txt_tag" class="doubleHeight"/><?php if(isset($query[0]->audience_tag)) echo $query[0]->audience_tag; ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails" id="form_not_id">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                   <li class="row">
                                    <div class="labelInfo col span_4">Notes</div>
                                    <div class="formInfo col span_12"><textarea name="txt_note" class="doubleHeight"/><?php if(isset($query[0]->audience_note)) echo $query[0]->audience_note; ?></textarea></div>
                                   </li>
                                </ul>
                            </div>
                            <?php $audience_edit_id = $this->uri->segment(3);
								  if(isset($updated_id)){
									  $audience_edit_id=$updated_id;
								  }
							 ?>
                             <input type="hidden" value="<?php echo $audience_edit_id; ?>" name="hiddenid"/>
                            
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
                                	<a href="<?php echo base_url()?>audience">
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

<script type="text/javascript">
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
$(document).ready(function() {

	$('#cancel_btn').attr("type", "button");
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
function titletext(value)
{
	if(value!='')
	$('#title_id').css({"border-color":"#63dfff"});
}
$(document).ready(function() {
	
	$('#remove_btn').attr("type", "button");
     
	  $('.edit').editable('<?php echo base_url()?>ajax/update_ajax_audience', {
		 id : 'elementid',
         indicator : 'Saving...',
		 submitdata : {audience_id: $('#audience_id').val()},
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
	/*$('#form_act_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_act_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_act_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
	$('#form_placement_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_placement_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_placement_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

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
	$('#form_not_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); */
	<?php } ?>
	$('#open_audience_ic').click(function(){
		document.getElementById('my_form').style.display='block';
	});
});
$(document).ready(function() {
<?php	
$add_form=$this->uri->segment(2); 
if($add_form=='audience_setting')
	{
	}
	else
	 { /* ?>
	$('#form_act_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_act_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_act_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
	$('#form_placement_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_placement_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_placement_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

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
	<?php */ } ?>
	
	
	$('#remove_btn').click(function(){
	var r = confirm("Are you sure you want to delete");
	if (r == true) {
		var del_id=$('#hiddenid').val();
		window.location.href='<?php echo base_url() ?>audience/audience_delete/'+del_id;
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