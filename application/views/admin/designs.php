<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Design </title>
<!--/*<link rel="stylesheet" type="text/css" href="css/styles.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
*/-->
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
        });
    </script>
         

</head>
<body>  
<?php  ?>
<?php if(isset($collectiondesign) && $collectiondesign!='')
  {
		$array_length=count($collectiondesign); 
	  		for($i=0;$i<$array_length; $i=$i+1)
			{
				$postback[]=$collectiondesign[$i]->collection_id; 
			}
  }
  else
  {
	$postback='null';	
 }
// print_r($collectiondesign);
?>
    <div class="container">
     <div id="splitPaneLeftContainer"></div>
     <div id="splitPaneRightContainer"></div>
	<!-- Push Wrapper -->
    <div class="mp-pusher" id="mp-pusher">

        <!-- mp-menu -->
   <nav id="mp-menu" class="mp-menu">
            <div class="mp-level">
                <h2 class="icon icon-world"></h2>

                     <form action="<?php echo base_url(); ?>designs/design_search" method="post" enctype="multipart/form-data" name="search_form" id="search_form">
                	<ul class="leftPaneFilters">
                          
                             <li id="searchButtonLI">
                                <input type="text" placeholder="Search" name="txt_search" value="<?php if(isset($search_field_value) && $search_field_value != ''){ echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="button" name="searchButton" onclick="submit_change_submit()" value=""></button>
                                
                              </li>
                                <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter" id="lst_filters">
                                        <option value="2" <?php if(isset($search_var) && $search_var=='2'){echo "selected=selected";}?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                                  <input type="hidden" id="selected_value" name="selected_value" />
                                  <input type="hidden" id="input_value" name="input_value" />

                            </li>
                                <a href="<?php echo base_url(); ?>designs/all_design"><li><button type="button" />View All</button></li></a>
                         </ul>
                      </form>
                    
                    <div class="leftPaneFiltersDetails">
                                <p><?php echo count($listing_data);  ?> Design(s)</p>
                            </div>
                    
                	 <ul class="cardsBox">                                 
								
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>designs/design/new">
							     <li id="new_design" >
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Design</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else
								 { ?>
							     <li id="new_design" onclick="card_expand();">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Design</div>
                                </li>
                                 <?php } ?> 
                                
                                <?php foreach($listing_data as $row){ ?>
                                
                               		<li <?php if($row->design_id==$this->uri->segment(3)) {?> class="selected" <?php } ?>>
                                     
                                    <div class="pill" style="background-image: url('<?php echo base_url(); ?>assets/img/design/<?php echo $row->design_profile_image; ?>');">&nbsp;</div>
                                    <p class="label"><?php echo substr($row->design_title,0,40);?></p>
                                    
                                    <p class="options">
                                    <span id="setting_id"><?php echo "<a  href=".base_url()."designs/design_setting/$row->design_id>Settings</a>";?><span class="pipe">|</span><a href="<?php echo base_url()?>designs/manage_design/<?php echo $row->design_id; ?>">Manage</a></span>
                                    </p>
                                    
                                    <?php if($row->design_status==1) {?>
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
                        

                     <form action="<?php echo base_url(); ?>designs/design_search" method="post" enctype="multipart/form-data" name="search_form" id="search_form">
                    <ul class="leftPaneFilters">
                          
                             <li id="searchButtonLI">
                                <input type="text" placeholder="Search" id="input_id" name="txt_search" value="<?php if(isset($search_field_value) && $search_field_value != ''){ echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="button" name="searchButton" onclick="submit_change_submit()" value=""></button>
                                
                              </li>
                                <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter" id="lst_filters">
                                        <option value="2" <?php if(isset($search_var) && $search_var==2){echo "selected=selected";} ?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                                   <input type="hidden" id="selected_value" name="selected_value" />
                                 <input type="hidden" id="input_value" name="input_value" />

                            </li>
                                <a href="<?php echo base_url(); ?>designs/all_design"><li><button type="button" />View All</button></li></a>
                         </ul>
                       </form>
                            
                            <div class="leftPaneFiltersDetails">
                                <p><?php echo count($listing_data);  ?> Design(s)</p>
                            </div>
                            <ul class="cardsBox">                                 
								
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>designs/design/new">
							     <li id="new_design" >
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Design</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else
								 { ?>
							     <li id="new_design" onclick="card_expand();">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Design</div>
                                </li>
                                 <?php } ?> 
   
                                <?php foreach($listing_data as $row){ ?>
                                 <?php if(!empty($query)) {?><li <?php if($row->design_id==$query[0]->design_id) {?> class="selected" <?php } ?>> <?php } else { ?>
                               		<li <?php if($row->design_id==$this->uri->segment(3)){?> class="selected" <?php }else{ ?> style="border:1px solid #535a60"<?php } ?>>
                                    <?php } ?>
                           <div class="pill" style="background-image: url('<?php echo base_url(); ?>assets/img/design/<?php echo $row->design_profile_image; ?>');">&nbsp;</div>
                               <p class="label"><?php echo substr($row->design_title,0,40);?></p>
                               
                                <p class="options">
                                    <span id="setting_id"><?php echo "<a  href=".base_url()."designs/design_setting/$row->design_id>Settings</a>";?><span class="pipe">|</span><a href="<?php echo base_url()?>designs/manage_design/<?php echo $row->design_id; ?>">Manage</a></span>
                                    </p>
                               
                                    <?php if($row->design_status==1) {?>
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
                        <?php if(isset($query[0]->design_title)){ ?>
                            <h2 class="edit" id="edit"><?php echo $query[0]->design_title;?></h2>
                             <input type="hidden" id="design_id" name="design_id" value="<?php echo $query[0]->design_id; ?>" />
                            <?php } ?>
                            
                            <?php if(isset($query) && $query!='' && $this->uri->segment(3)!='' && $this->uri->segment(2)!='design_delete') {?>
                            <div class="row pageNotes splitPaneRightRow">
                               <div class="col span_9 note"><?php if(isset($web_pages_used_design)){ echo $web_pages_used_design;} ?> web pages use this design.</div>
                                 <div class="col span_7">
                                    <a href="<?php echo base_url()?>designs/manage_design/<?php echo $query[0]->design_id; ?>">
                               		     <button class="editPage">Manage Design</button>
                                    </a>
                                 </div>
                              </div>
                              <?php } ?>
                            
        <form method="post" action="<?php echo base_url();?>designs/add_design" id="my_form" <?php  if(isset($query) && $query!='') { ?>  style="display:block;" <?php }else { ?> style="display:none;" <?php }  ?> enctype="multipart/form-data">
					<?php if(!isset($query)){?>
                        <div style="float:left;margin:5px 0 20px 10px;width:90%">
                        <div class="labelInfo col span_4" style="color:#00A3E8" id="error_title">Design Title</div>
                        <input style="width: 100%; height: 44px;" autocomplete="off" name="txt_design_title" id="design_title_id" onkeyup="design_title(this.value)">
                        </div>
                        <?php } ?>  <!-- Status -->                            
                            <div class="splitPaneRightRow <?php  if(isset($query[0]->design_status)  && $query[0]->design_status==1) {?> statusGreen <?php } else if(isset($query[0]->design_status)  && $query[0]->design_status==0){ ?>statusRed <?php } ?>">
                            <h3  onclick="showSplitPlaneRow(this);">Status</h3><div class="splitPlaneQuickDetails" id="form_act_id"><?php if(isset($query[0]->design_status) && $query[0]->design_status==1){echo 'Active';}else{echo 'Paused';}?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                      <div class="labelInfo col span_4">Status</div>
                                      <div class="formInfo col span_12">
                                       <select name="design_status" class="">
                                        <option value="1" <?php if(isset($query[0]->design_status) && $query[0]->design_status==1){ echo 'selected';} ?>>Active</option>
                                           <option value="0" <?php if(isset($query[0]->design_status) && $query[0]->design_status==0){ echo 'selected';} ?>>Paused</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
                                </ul>
                            </div>
<!-- Placement -->          <div class="splitPaneRightRow">
                               <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails" id="form_detail_id"><?php if(isset($query[0]->	design_profile_title)) echo $query[0]->design_profile_title; ?></div>
                                <ul class="splitPaneRightDetails">
                                                                
                                  <?php if(isset($query[0]->design_profile_image) && $query[0]->design_profile_image!=''){ ?>
                                  <li class="row">
                                  <div style="float:left;padding-left:127px"><img src="<?php echo base_url(); ?>assets/img/design/<?php echo $query[0]->design_profile_image; ?>" height="100" width="100" /></div>
                                  <div id="loader" style="display:none;">
   									<img src="<?php echo base_url()?>assets/img/admin/load.gif" />
  									</div>
                                    <div id="onsuccessmsg"></div>
                                  </li>
                                  
                                 <?php } ?>
                                  <li class="row">
                                  <?php if(!isset($query[0]->design_profile_image)){?>
                                  <div id="loader" style="display:none;">
   									<img src="<?php echo base_url()?>assets/img/admin/load.gif" />
  									</div>
                                    <div id="onsuccessmsg"></div>
                                    <?php } ?>
                                
                                    <div class="labelInfo col span_4">Image</div>
                                    <div class="formInfo col span_12"><input type="file"  name="design_image" class="halfSize" /> </div>
                                    </li>
                                    <li class="row">
                                      <div class="labelInfo col span_4">Search Title</div>
                                      <div class="formInfo col span_12"><input type="text" name="txt_profile_title" value="<?php if(isset($query[0]->design_profile_title)) echo $query[0]->design_profile_title; ?>" /></div>
                                    </li>
                                    <li class="row">
                                      <div class="labelInfo col span_4">Search Summary</div>
                                      <div class="formInfo col span_12"><textarea class="doubleHeight" name="txt_profile_summary"/><?php if(isset($query[0]->design_profile_summary)) echo $query[0]->design_profile_summary; ?></textarea></div>
                                    </li>
                                </ul>
                            </div>                 
                            <div class="splitPaneRightRow ">
                                <h3   onclick="showSplitPlaneRow(this);">Placement</h3><div class="splitPlaneQuickDetails" id="form_placement_id"><?php /*?>Selected<?php */?></div>
                                <ul class="splitPaneRightDetails ">
                                    
                                    <li class="row">
                                    <div class="labelInfo col span_4">Collections</div>

                                       <div class="formInfo col span_12">
                                   		<div class="row"> 
                                         
										<select id="s4" multiple="multiple" name="collection_select[]">
                                        	<option>All</option>
                    						<?php if (isset($allcollection)){ 
                                        	 foreach($allcollection as $row) {?>

                                            <option value="<?php echo $row->collection_id;?>" <?php if(isset($collectiondesign) && $collectiondesign!='' && isset($postback)) if(in_array($row->collection_id, $postback)){ echo "selected";}?>><?php echo $row->collection_title;?></option>
                                              <?php } } ?>
                                    	</select>
                                       </div>
                                      </div>
                                       
                                    </li>
                                    <!-- If "Selected" is true above, then website checkboxes display. -->                                  
                                </ul>
                            </div>

                           <div class="splitPaneRightRow">
                           <h3  onclick="showSplitPlaneRow(this);">Type</h3><div class="splitPlaneQuickDetails" id="form_type_id">Web Page</div>
                             <ul class="splitPaneRightDetails">
                               <li class="row">
                                <div class="labelInfo col span_4">Design Type</div>
                                  <div class="formInfo col span_12">
                               	<select class="" name="lst_page_type">
                                  <option value="">Select Design </option>
                                  <?php foreach($design_type as $row) {?>
                                 <option value="<?php echo $row->design_type_id; ?>"<?php if(isset($query[0]->design_type) && $query[0]->design_type==$row->design_type_id){?> selected="selected" <?php } ?>><?php echo $row->design_type; ?></option>
                                            <?php } ?>
                                    	</select>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                         <div class="splitPaneRightRow" >
                            <?php if(isset($query[0]->design_tag)){
								$tag_design = rtrim($query[0]->design_tag,',');
								$tags=explode(',',$tag_design);
								$tags_count=count($tags);
							}
							
								?>
                                <h3  onclick="showSplitPlaneRow(this);">Tags</h3><div class="splitPlaneQuickDetails" id="form_tag_id"><?php if(isset($query[0]->design_tag) &&$query[0]->design_tag!=''){ echo $tags_count;} else{echo '0';}?> Tags</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Tags</div>
                                        <div class="formInfo col span_12"><textarea name="txt_tag" class="doubleHeight"/><?php if(isset($query[0]->design_tag)) echo $query[0]->design_tag; ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails" id="form_not_id">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                   <li class="row">
                                    <div class="labelInfo col span_4">Notes</div>
                                    <div class="formInfo col span_12"><textarea name="txt_note" class="doubleHeight"/><?php if(isset($query[0]->design_note)) echo $query[0]->design_note; ?></textarea></div>
                                   </li>
                                </ul>
                            </div>
                             <input type="hidden" id="hidden_design_id" value="<?php if(isset($query[0]->design_id)) { echo $query[0]->design_id; } else{ echo $this->uri->segment(3); } ?>" name="hiddenid"/>                           
                            
                            <!-- Desktop Buttons -->                    
                            <div class="splitPaneRightRow rightButtonsRow row gutters">
                            	<div class="col span_4">
	                                 <?php $current_id=$this->uri->segment(3); 
								if(isset($current_id) && $current_id!='' && $current_id!='new')
								{
						 		 ?><button id="remove_btn" class="remove">Remove</button>
                                <?php } ?>
                                </div>
                                <div class="col span_4">&nbsp;</div>
                                <div class="col span_4">
                                <a href="<?php echo base_url(); ?>designs" >
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
	var design_val= $('#design_title_id').val();
	if(design_val==''){
		$('#design_title_id').css({"border-color":"red"});
		$('#error_title').css({"color":"red"});		
		$('#design_title_id').focus();
		return false;
	}
	var design_val= $('#title_id').val();
	if(design_val==''){
		$('#title_id').css({"border-color":"red"});
		$('#title_id').focus();
		return false;
	}
	var design_val= $('#design_title_id').val();
	if(design_val==''){
		$('#design_title_id').css({"border-color":"red"});
		$('#error_title').css({"color":"red"});		
		$('#design_title_id').focus();
		return false;
	}
	});
	$('#save_btn_mobile').click(function(e) {
	var design_val= $('#title_id').val();
	if(design_val==''){
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

	$('#form_type_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_type_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_type_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

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
function design_title(value)
{
	if(value!='')
	$('#design_title_id').css({"border-color":"#63dfff"});
	$('#error_title').css({"color":"#00A3E8"});
}
$(document).ready(function() {
	
	$('#remove_btn').attr("type", "button");
     
	  $('.edit').editable('<?php echo base_url()?>ajax/update_ajax_design', {
		 id : 'elementid',
         indicator : 'Saving...',
		 submitdata : {design_id: $('#design_id').val()},
         tooltip   : 'Click to edit...',
		 cancel : 'Cancel',
		 submit  : 'Save',
		 onblur : 'ignore',
     });
	 
	 	 $('#remove_btn').click(function(){
	var r = confirm("Are you sure you want to delete");
	if (r == true) {
		var del_id=$('#hidden_design_id').val();
		
		window.location.href='<?php echo base_url() ?>designs/design_delete/'+del_id;
	} else {
		
	}

});
	 
});

$('#prifile_id').parent().toggleClass('splitPaneRightSelected'); 
$('#prifile_id').parent().children("ul").eq(0).slideToggle(300); 
$('#prifile_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

$(document).ready(function() {
	$('#open_audience_ic').click(function(){
		document.getElementById('my_form').style.display='block';
	});
});
$(document).ready(function() {
<?php	
$add_form=$this->uri->segment(2); 
if($add_form=='design_setting')
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
	});
	
	
function audience_filter(selectedValue)
 {
	 if(selectedValue)
	 {	
		$.ajax({
			url: '<?php echo base_url(); ?>designs/audience_filter',
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
	if($add_form=='designed')
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

	$('#form_type_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_type_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_type_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

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
	if($add_form=='add_design')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='block';	

    </script>
<?php }
	?>
<?php $add_form=$this->uri->segment(2);
	if($add_form=='design_delete')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='none';	

    </script>
<?php }
	?>

<script type="text/javascript">
/*$(document).ready(function(){
$('#save_btn_mobile').click(function(){
$('#my_form').attr('action', '<?php echo base_url();?>designs/add_design');
});
});*/
</script>

<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/jquery.jeditable.mini.js"></script>

</body>
</html>