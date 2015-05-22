<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Connections</title>
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
            $("#s5").dropdownchecklist({ firstItemChecksAll: true,maxDropHeight: 120,width:320 });
        });
    </script>
</head>
<body>
<!--
<?php 
/*
if(isset($collectionaccount) && $collectionaccount!='')
  {
  		$array_length=count($collectionaccount); 
	  		for($i=0;$i<$array_length; $i=$i+1)
			{
				$postback[]=$collectionaccount[$i]->account_id; 
			}
  }
  else
  {
	$postback='null';	
 }
?>
<?php if(isset($collectionwebsite) && $collectionwebsite!='')
  {
  		$array_length=count($collectionwebsite); 
	  		for($i=0;$i<$array_length; $i=$i+1)
			{
				$postbackweb[]=$collectionwebsite[$i]->website_id; 
			}
  }
  else
  {
	$postback='null';	
 }
 */
?>--->
    <div class="container">
     <div id="splitPaneLeftContainer"></div>
     <div id="splitPaneRightContainer"></div>
	<!-- Push Wrapper -->
    <div class="mp-pusher" id="mp-pusher">

        <!-- mp-menu -->
  <nav id="mp-menu" class="mp-menu" >
            <div class="mp-level">
                <h2 class="icon icon-world">Connections</h2>
                
<form action="<?php echo base_url(); ?>connection_controller/connection_search" method="post" enctype="multipart/form-data" name="search_form" id="search_form1">
                	<ul class="leftPaneFilters">
                          
                             <li id="searchButtonLI">
                                <input type="text" placeholder="Search" name="txt_search" value="<?php if(isset($search_field_value) && $search_field_value != ''){ echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                
                              </li>
                                <li>
                                    <select onchange="submit_change_val()" name="lst_filter">
                                        <option value="2" <?php if(isset($search_var) && $search_var=='2'){echo "selected=selected";}?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                            </li>
                                
                                <li><a href="<?php echo base_url(); ?>connection_controller/all_collection"><button type="button" />View All</button></a></li>
                         </ul>
                    </form>
                    <div class="leftPaneFiltersDetails">
                                <p><?php echo count($listing_data);  ?>  Connections(s)</p>
                            </div>
                    
                	<ul class="cardsBox">                                 
								
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>connection_controller/add_connection">
							     <li id="new_collection" >
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Connection</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else
								 { ?>
							     <!--<li id="new_collection" onclick="card_expand();">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Connection</div>
                                </li>--->
								 <a href="<?php echo base_url(); ?>connection_controller/add_connection">
							     <li id="new_collection" >
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Connection</div>
                                   
                                </li>
                                </a> 
                                 <?php } ?> 
   
                                <?php foreach($listing_data as $row){ 
								
								?>
                               
                               
                                <?php if(!empty($query)) {?> 
                                <li<?php if($row->connection_id==$query[0]->connection_id ) { ?>class="selected" <?php } ?>>
								<?php } 
								
								else {?> <li<?php if($row->connection_id==$this->uri->segment(3)) { ?> class="selected" <?php } ?>><?php } ?>
                             
                               	<div class="pill" style="background-image: url('<?php echo base_url(); ?>assets/img/connections/<?php echo $row->connection_profile_image; ?>');">&nbsp;</div>
                                    <p class="label"><?php echo $row->account_name;?></p>
                                    <p class="options">
                                    <span id="setting_id"><?php echo "<a  href=".base_url()."connection_controller/connection_setting/$row->connection_id>Settings</a>";?></span>
                                    </p>
                                    <?php if($row->connection_status==1) {?>
                                   <!--<div class="status statusGreen"></div>-->
                                   <?php } else
								   { ?>
                                  <!-- <div class="status statusRed"></div>-->
                                  <?php } 
								 
								  ?>
										
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
                    <form action="<?php echo base_url(); ?>connection_controller/connection_search" method="post" enctype="multipart/form-data" name="search_form" id="search_form">
                    <ul class="leftPaneFilters">
      
                             <li id="searchButtonLI">
                                <input type="text" placeholder="Search" id="input_id" name="txt_search" value="<?php if(isset($search_field_value) && $search_field_value != ''){ echo $search_field_value;} ?>"/>
                                <button id="searchButton" type="button" name="searchButton" onclick="submit_change_submit()" value=""></button>
                                
                              </li>
                                <li>
                                    <select onchange="submit_change_val(this.value)" name="lst_filter" id="lst_filters">
                                        <option value="" <?php if(isset($search_var) && $search_var==''){echo "selected=selected";}?>>All</option>
                                        <option value="1" <?php if(isset($search_var) && $search_var==1){echo "selected=selected";} ?>>Active</option>
                                        <option value="0" <?php if(isset($search_var) && $search_var==0){echo "selected=selected";} ?>>Paused</option>
                                    </select>
                    	           <input type="hidden" id="selected_value" name="selected_value" />
                                 <input type="hidden" id="input_value" name="input_value" />

                            </li>
                                
                        <li><a href="<?php echo base_url(); ?>connection_controller/all_connection"><button type="button" />View All</button></a></li>
                         </ul>
                            </form>
                            <div class="leftPaneFiltersDetails">
                                <p><?php echo count($listing_data);  ?>  Connection(s)</p>
                            </div>
                            <ul class="cardsBox">                                 
								
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                  <a href="<?php echo base_url(); ?>connection_controller/add_connection">
							     <li id="new_collection" >
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Connection</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else
								 { ?>
							     <li id="new_collection" onclick="card_expand();">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Connection</div>
                                </li>
                                 <?php } ?> 
   
                               
								   <?php foreach($listing_data as $row){ 
								
								?>
                               
                               
                                <?php  if(!empty($query)) {?> 
                                <li <?php if($row->connection_id==$query[0]->connection_id ) { ?>class="selected" <?php } ?>>
								<?php } 
								
								 else { ?> <li <?php if($row->connection_id==$this->uri->segment(3)) { ?> class="selected" <?php } ?>><?php } ?>
                             
                               	<div class="pill" style="background-image: url('<?php echo base_url(); ?>assets/img/connections/<?php echo $row->connection_profile_image; ?>');">&nbsp;</div>
                                    <p class="label"><?php echo $row->account_name;?></p>
                                    <p class="options">
                                    <span id="setting_id"><?php echo "<a  href=".base_url()."connection_controller/connection_setting/$row->connection_id>Settings</a>";?></span>
                                    </p>
                                    <?php if($row->connection_status==1) {?>
                                   <div class="status statusGreen"></div>
                                   <?php } else
								   { ?>
                                    <div class="status statusRed"></div>
                                  <?php } 
								 
								  ?>
										
                               </li> 
                               
                                
                                <?php } ?>   
								
                                <li class="spacer"></li>
                                <li class="spacer"></li>
                                <li class="spacer"></li>                                
                            </ul>
        
                        </div>
                        <!-- END OF splitPaneLeft -->
         
        
                        <div class="col span_8" id="splitPaneRight">
                        <?php if(isset($query[0]->connection_title)){ ?>
                          <!-- <h2 class="edit" id="edit"><?php echo $query[0]->connection_title;?></h2>
                             <input type="hidden" id="connection_id" name="connection_id" value="<?php echo $query[0]->connection_id; ?>" />-->
                            <?php } ?>
                            
                            <?php if(isset($query) && $query!='' && $this->uri->segment(3)!='' && $this->uri->segment(2)!='collection_delete') {?>
                           <!--- <div class="row pageNotes splitPaneRightRow">
                               <div class="col span_9 note "><?php if(isset($count_designs) && $count_designs!=''){ echo $count_designs;}else{echo '0';} ?> Designs in this Collection</div>
                                 <div class="col span_7">
                                    <a href="<?php echo base_url()?>collections/collection_manage/<?php echo $query[0]->collection_id; ?>">
                               		     <button class="editPage">Manage Connections</button>
                                    </a>
                                 </div>
                              </div>--->
                              <?php } ?>
                            
        <form action="<?php echo base_url();?>connection_controller/add_connection" method="post" id="my_form" <?php  if(isset($query) && $query!='') { ?>  style="display:block;" <?php }else { ?> style="display:none;" <?php }  ?> enctype="multipart/form-data">
        		<?php //if(isset($error) && $error=='Title Must Not Empty'){?>
                <div style="color:red;font-weight:bold"><?php echo $error; ?></div>
                <?php //}?>
				
				<?php if(!isset($query)){?>
                        <div style="float:left;margin:5px 0 20px 10px;width:90%">
                        <div class="labelInfo col span_4" style="color:#00A3E8" id="error_title">Status</div>
                       <div class="splitPlaneQuickDetails" id="form_act_id"><?php if(isset($query[0]->	connection_status) && $query[0]->connection_status==1){echo 'Active';}else{echo 'Paused';}?></div>
                        </div>
                        <?php } ?>  
<!-- Status -->                            
						
                            <div class="splitPaneRightRow <?php  if(isset($query[0]->connection_status)  && $query[0]->connection_status==1) {?> statusGreen <?php } else if(isset($query[0]->connection_status)  && $query[0]->	connection_status==0){ ?>statusRed <?php } ?>">
                            <h3  onclick="showSplitPlaneRow(this);">Status</h3>
							<div class="splitPlaneQuickDetails" id="form_act_id"><?php if(isset($query[0]->	connection_status) && $query[0]->connection_status==1){echo 'Active';}else{echo 'Paused';}?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                      <div class="labelInfo col span_4">Status</div>
                                      <div class="formInfo col span_12">
                                       <select name="connection_status" >
                                        <option value="1" <?php if(isset($query[0]->connection_status) && $query[0]->connection_status==1){ echo 'selected';} ?>>Active</option>
                                           <option value="0" <?php if(isset($query[0]->connection_status) && $query[0]->connection_status==0){ echo 'selected';} ?>>Paused</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
                                </ul>
                            </div>
<!-- Placement -->          <div class="splitPaneRightRow">
                               <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails" id="form_detail_id"><?php if(isset($query[0]->connection_profile_image)) echo $query[0]->connection_profile_image; ?></div>
                                <ul class="splitPaneRightDetails">
                                
                                  
                                  <?php if(isset($query[0]->connection_profile_image)){ ?>
                                  <li class="row">
                                  <div style="float:left;padding-left:127px"><img src="<?php echo base_url(); ?>assets/img/collections/<?php echo $query[0]->connection_profile_image; ?>" height="100" width="100" /></div>
                                  <div id="loader" style="display:none;">
   									<img src="<?php echo base_url()?>assets/img/connection/<?php echo $query[0]->connection_profile_image ?>" />
  									</div>
                                    <div id="onsuccessmsg"></div>
                                  </li>
                                  
                                 <?php } ?>
                                  <li class="row">
                                  <?php if(!isset($query[0]->connection_profile_image)){?>
                                  <div id="loader" style="display:none;">
   									<img src="<?php echo base_url()?>assets/img/admin/load.gif" />
  									</div>
                                    <div id="onsuccessmsg"></div>
                                    <?php } ?>
                                  
                                
                                    <div class="labelInfo col span_4">Image</div>
                                    <div class="formInfo col span_12"><input type="file"  name="connection_profile_image" class="halfSize" /></div>
                                    </li>
                                    
                                    <!--
                                    <li class="row">
                                      <div class="labelInfo col span_4">Search Title</div>
                                      <div class="formInfo col span_12"><input type="text" name="txt_profile_title" value="<?php if(isset($query[0]->collection_profile_title)) echo $query[0]->collection_profile_title; ?>" /></div>
                                    </li>
                                    <li class="row">
                                      <div class="labelInfo col span_4">Search Summary</div>
                                      <div class="formInfo col span_12"><textarea class="doubleHeight" name="txt_profile_summary"/><?php if(isset($query[0]->collection_profile_summary)) echo $query[0]->collection_profile_summary; ?></textarea></div>
                                    </li>-->
                                </ul>
                            </div>  
						<div class="splitPaneRightRow">
                               <h3  onclick="showSplitPlaneRow(this);">Connection Details</h3><div class="splitPlaneQuickDetails" id="form_detail_id"><?php if(isset($query[0]->connection_connect_to)) echo $query[0]->connection_connect_to; ?></div>
                                <ul class="splitPaneRightDetails">
                                  <div class="labelInfo col span_4">Connect to</div>
                                    <div class="formInfo col span_12">
										
									 <select name="connection_connect_to" class="">
                                        <option value="Google Calendar" <?php if(isset($query[0]->connection_connect_to) && $query[0]->connection_connect_to=="Google Calendar"){ echo 'selected';} ?>>Google Calendar</option>
                                        <option value="Facebook" <?php if(isset($query[0]->connection_connect_to) && $query[0]->connection_connect_to=="Facebook"){ echo 'selected';} ?>>Facebook</option>
                                        <option value="Twitter" <?php if(isset($query[0]->connection_connect_to) && $query[0]->connection_connect_to=="Twitter"){ echo 'selected';} ?>>Twitter</option>
                                        <option value="Google+" <?php if(isset($query[0]->connection_connect_to) && $query[0]->connection_connect_to=="Google+"){ echo 'selected';} ?>>Google+</option>
                                        <option value="Domain" <?php if(isset($query[0]->connection_connect_to) && $query[0]->connection_connect_to=="Domain"){ echo 'selected';} ?>>Domain</option>

									 </select>	
									</div>
                                    </li>
                                    
                                  
                                    <li class="row">
                                      <div class="labelInfo col span_4">Domain</div>
                                      <div class="formInfo col span_12"><input type="text" name="connection_domain" value="<?php if(isset($query[0]->connection_domain)) echo $query[0]->connection_domain; ?>" /></div>
                                    </li>
                                    <li class="row">
                                      <div class="labelInfo col span_4">API Key</div>
                                      <div class="formInfo col span_12"><input type="text" name="connection_api_key" value="<?php if(isset($query[0]->connection_api_key)) echo $query[0]->connection_api_key; ?>" /></div>
                                    </li>
                                </ul>
                            </div>  							

                          
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails" id="form_not_id">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                   <li class="row">
                                    <div class="labelInfo col span_4">Notes</div>
                                    <div class="formInfo col span_12"><textarea name="connection_note" class="doubleHeight"/><?php if(isset($query[0]->connection_note)) echo $query[0]->connection_note; ?></textarea></div>
                                   </li>
                                </ul>
                            </div>
                             <input type="hidden" id="hidden_collection_id" value="<?php if(isset($query[0]->connection_id)) { echo $query[0]->connection_id; } else{ echo $this->uri->segment(3); } ?>" name="hiddenid"/>   
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
                                <a href="<?php echo base_url()?>connection_controller">
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
 /*
$('#save_btn').click(function(e) {
<?php // if(isset($allaccount) && $allaccount=='false' ) {
?>
	alert('This is not added');

<?php // }?>
});
*/
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
	var collection_val= $('#title_id').val();
	if(collection_val==''){
		$('#title_id').css({"border-color":"red"});
		$('#error_title').css({"color":"red"});		
		$('#title_id').focus();
		return false;
	}else{
		
	}
	});
	$('#save_btn_mobile').click(function(e) {
	var collection_val= $('#title_id').val();
	if(collection_val==''){
		$('#title_id').css({"border-color":"red"});
		$('#error_title').css({"color":"red"});		
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
	$('#error_title').css({"color":"#00A3E8"});
}
function collectiontitile(value)
{
	if(value!='')
	$('#collection_title_id').css({"border-color":"#535a60"});
	$('#collection_title_id').css({"outline":"medium none"});
	$('#error_title').css({"color":"#00A3E8"});
}
$(document).ready(function() {
	
	$('#remove_btn').attr("type", "button");
     
	  $('.edit').editable('<?php echo base_url()?>ajax/update_ajax_collection', {
		 id : 'elementid',
         indicator : 'Saving...',
		 submitdata : {collection_id: $('#collection_id').val()},
         tooltip   : 'Click to edit...',
		 cancel : 'Cancel',
		 submit  : 'Save',
		 onblur : 'ignore',
     });
	 
	
	$('#remove_btn').click(function(){
	var r = confirm("Are you sure you want to delete");
	if (r == true) {
		var del_id=$('#hidden_collection_id').val();
		
		window.location.href='<?php echo base_url() ?>connection_controller/connection_delete/'+del_id;
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
if($add_form=='connection_setting')
	{
	}
	else
	 {} ?>
	});
function audience_filter(selectedValue)
 {
	 if(selectedValue)
	 {	
		$.ajax({
			url: '<?php echo base_url(); ?>collections/audience_filter',
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
	if($add_form=='add_collection')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='block';	

    </script>
<?php }
	?>
<?php $add_form=$this->uri->segment(2);
	if($add_form=='collection_delete')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='none';	

    </script>
<?php }
	?>
	<script type="text/javascript">
$(document).ready(function(){
function onsuccess(response,status){
  $("#loader").hide();
  $("#onsuccessmsg").html('<div id="msg" style="margin-left:127px">'+response+'</div>');
 }
 $('#upload_img_btn').click(function(){
	 $('#my_form').attr('action', 'upload_images');
	//alert($('#my_form').attr('action'));
	$("#my_form").submit(); 
 });	
	
	
/*$("#my_form").on('submit',function(){
if($('#my_form').attr('action')=='upload_images'){
$("#loader").show();
$(this).ajaxSubmit(options);
 return false;
  }
 });
$('#save_btn').click(function(){
	$('#my_form').attr('action', '<?php echo base_url();?>collections/add_collection');
});

$('#save_btn_mobile').click(function(){
$('#my_form').attr('action', '<?php echo base_url();?>collections/add_collection');
});*/
});
</script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/jquery.jeditable.mini.js"></script>

</body>
</html>