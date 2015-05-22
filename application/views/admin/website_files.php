<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Files</title>
<!--/*<link rel="stylesheet" type="text/css" href="css/styles.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
*/-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/admin/mlpmenu/component.css" />
<!-- Editabel Css-->

<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="/css/ie8lte.css"/>
<![endif]-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php  echo base_url() ?>assets/js/admin/jquery.form.js"></script>
			<!-- DropDown  Jq -->
</head>
<body>  
<div class="container">
    <div id="splitPaneLeftContainer"></div>
    <div id="splitPaneRightContainer"></div>


	<!-- Push Wrapper -->
    <div class="mp-pusher" id="mp-pusher">

        <!-- mp-menu -->
        <nav id="mp-menu" class="mp-menu" >
            <div class="mp-level">
                <h2 class="icon icon-world">Files</h2>
                

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
                                <option>Images</option>
                                <option>Media</option>
                                <option>Document</option>
                        	</select>
                        </li>
                        <li><button type="button" />View All</button></li>
                    </ul>
                    
                    <div class="leftPaneFiltersDetails">
                    	<p>7 Files, Displaying 1-7</p>
                    </div>
                    
                	<ul class="cardsBox">
                        <li>
                        	<div class="plusSign">+</div>
                        	<div class="plusSignText">Upload File</div>
                        </li>
                    	<li class="selected">
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">CH Logo Color</p>
                            <p class="options"><span>Settings</span><span>|</span><span>Open</span></p>
                            <div class="status statusGreen"></div>
                        </li>
                        <li>
                            <div class="pill" style="background-image: url('http://perkapp.offunit.com/img/page-image-sample.png');"></div>
                            <p class="label">Label</p>
                            <div class="status statusYellow"></div>
                        </li>
                    	<li>
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Label</p>
                            <div class="status statusGreen"></div>
                        </li>
                        <li>
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Very Long Label</p>
                            <div class="status statusGreen"></div>
                        </li>
                        <li>
                            <div class="pill" style="background-image: url('http://perkapp.offunit.com/img/page-image-sample.png');"></div>
                            <p class="label">Label</p>
                            <div class="status statusYellow"></div>
                        </li>
                    	<li>
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Label</p>
                            <div class="status statusGreen"></div>
                        </li>
                        <li>
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Very Long Label</p>
                            <div class="status statusGreen"></div>
                        </li>
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
                        <form action="<?php echo base_url(); ?>website_file_controller/file_search" method="post" enctype="multipart/form-data" name="search_form" id="search_form">
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
                                        <option value="image" <?php if(isset($search_var) && $search_var=='image'){echo "selected=selected";} ?>>Images</option>
                                        <option value="media" <?php if(isset($search_var) && $search_var=='media'){echo "selected=selected";} ?>>Media</option>
                                        <option value="document" <?php if(isset($search_var) && $search_var=='document'){echo "selected=selected";} ?>>Document</option>
                                    </select>
                            	</li>
                            
                                   <a href="<?php echo base_url(); ?>website_file_controller/all_file"><li><button type="button" />View All</button></li></a>
                         </ul>
                         </form>
                            <div class="leftPaneFiltersDetails">
                                <p><?php echo count($listing_data);  ?>  Files(s)</p>
                            </div>
                            <ul class="cardsBox">                                 
                               <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>website_file_controller/website_file/new">
							     <li id="new_file" >
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">Upload File</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else
								 { ?>
							     <li id="new_file" onclick="card_expand();">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">Upload File</div>
                                </li>
                                 <?php } ?> 
                                <?php foreach($listing_data as $row){ ?>
                                 <?php echo "<a  href=".base_url()."website_file_controller/website_file_setting/$row->website_file_id>"; ?>
 								<?php if(!empty($query)) {?> <li<?php if($row->website_file_id==$query[0]->website_file_id ) { ?> class="selected" <?php } ?>><?php } 								
								else {?> <li<?php if($row->website_file_id==$this->uri->segment(3)) { ?> class="selected" <?php } ?>><?php } ?>            
                                    <?php if( $row->file_type=='') {?>
                                    <div class="pill" style="background-image: url('<?php echo $row->file_profile_path; ?>');">&nbsp;</div>
                                   		<?php }
										else  if( $row->file_type=='document') {?>
                                    <div class="pill" style="background-image: url('<?php echo base_url(); ?>assets/img/admin/document.png');">&nbsp;</div>
									<?php } else {?>
                                    <div class="pill" style="background-image: url('<?php echo $row->file_profile_path; ?>');">&nbsp;</div>
									<?php } ?>
                                    <p class="label"><?php echo $row->file_profile_title;?></p>
                                    <?php if($row->	file_status==1) {?>
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
                        <?php if(isset($query[0]->file_profile_title)){ ?>
                            <h2 class="edit" id="edit"><?php echo $query[0]->file_profile_title;?></h2>
                             <input type="hidden" id="file_id" name="file_id" value="<?php echo $query[0]->website_file_id; ?>" />
                            <?php } ?>
                            
                            <?php /*if(isset($query) && $query!='' && $this->uri->segment(3)!='') {?>
                            <div class="row pageNotes">
                               <div class="col span_9 note"><?php if(isset($webpages) && $webpages!='') echo count($webpages); else echo '0'; ?>web pages use this file.</div>
                                 
                              </div>
                              <?php } */?>
                                                          
                            <form action="" method="post" id="my_form" <?php  if(isset($query) && $query!='') { ?>  style="display:block;" <?php }else { ?> style="display:none;" <?php }  ?> enctype="multipart/form-data">
<!-- Status -->                            
                            <div class="splitPaneRightRow <?php  if(isset($query[0]->file_status)  && $query[0]->file_status==1) {?> statusGreen <?php } else if(isset($query[0]->file_status)  && $query[0]->file_status==0){ ?>statusRed <?php } ?>">
                            <h3  onclick="showSplitPlaneRow(this);">Status</h3><div class="splitPlaneQuickDetails" id="form_act_id"><?php if(isset($query[0]->file_status) && $query[0]->file_status==1){echo 'Active';}if(isset($query[0]->file_status) && $query[0]->file_status==0){echo 'Paused';}?></div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                      <div class="labelInfo col span_4">Status</div>
                                      <div class="formInfo col span_12">
                                       <select name="file_status" class="">
                                        <option value="1" <?php if(isset($query[0]->file_status) && $query[0]->file_status==1){ echo 'selected';} ?>>Active</option>
                                           <option value="0" <?php if(isset($query[0]->file_status) && $query[0]->file_status==0){ echo 'selected';} ?>>Paused</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
                                </ul>
                            </div>               
<!-- Profile -->                            
                                 <div class="splitPaneRightRow">
                                    <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails" id="form_profile_id">Expand to view and add details.
                               
                                 </div>
                        
                                <ul class="splitPaneRightDetails">
                                 <?php if(isset($query[0]->file_profile_name)){?>
                                    <li class="row">
                                    
                                    <?php if( $row->file_type=='document') {?>
                                    <div style="float:left;padding-left:127px"><img src="<?php echo base_url(); ?>assets/img/admin/document.png" 																							height="100" width="100" /></div>

									<?php }else if($query[0]->file_type=='media'){ ?>
                                    <div style="float:left;padding-left:127px"><img src="<?php echo base_url(); ?>assets/img/admin/media.png" 																							height="100" width="100" /></div>
									<?php } else {?>
                                    <div style="float:left;padding-left:127px"><img src="<?php echo $row->file_profile_path; ?>" 																							height="100" width="100" /></div>
                                    
                                    <div id="loader" style="display:none;">
   									<img src="<?php echo base_url()?>assets/img/admin/load.gif" />
  									</div>
                                    <div id="onsuccessmsg"></div>
                                    </li>
                                   <?php } } ?> 
                                    <li class="row">
                                    <div id="loader" style="display:none;margin-left:130px">
   									<img src="<?php echo base_url()?>assets/img/admin/load.gif" />
  									</div>
                                         <div id="onsuccessmsg"></div>
                                        <div class="labelInfo col span_4">File</div>
                                        <div class="formInfo col span_12"><input type="file"  class="halfSize" name="file_name" id="file_name" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input type="button" id="upload_img_btn" value="Upload" /></div>                         

                                    </li>
                                    <!-- Poster Frame displays if video file is detected -->
                                    <li class="row">
                                        <div class="labelInfo col span_4">Poster Frame</div>
                                        <div class="formInfo col span_12"><input type="text" class="halfSize" name="txt_poster_frame" value="<?php if(isset($query[0]->	file_profile_poster_frame)) echo $query[0]->file_profile_poster_frame; ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Title</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_profile_title" value="<?php if(isset($query[0]->file_profile_title)) echo $query[0]->file_profile_title; ?>" /></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Search Summary</div>
                                        <div class="formInfo col span_12"><input type="text" name="txt_profile_summary" value="<?php if(isset($query[0]->file_profile_summary)) echo $query[0]->file_profile_summary; ?>"/></div>
                                    </li>
                                    <li class="row">
                                    <div class="labelInfo col span_4">File Path</div>
                                     <div class="formInfo col span_12" id="file_path"><?php if(isset($query[0]->file_profile_path)) echo $query[0]->file_profile_path; ?> </div>
                                    </li>
                                    <li class="row">
                                    <div class="labelInfo col span_4">File Size (byte)</div>
                                     <div class="formInfo col span_12" id="file_size"><?php if(isset($query[0]->file_profile_size)) echo $query[0]->file_profile_size; ?></div>
                                    </li>
                                    <li class="row">
                                   <div class="labelInfo col span_4">Dimensions (px)</div>
                                  <div class="formInfo col span_12" id="file_dimention"><?php if(isset($query[0]->file_profile_dimension)) echo $query[0]->file_profile_dimension; ?></div>
                                    </li>
                                </ul>
                            </div>
<!-- Tags -->                            
                            <div class="splitPaneRightRow" >
                            <?php if(isset($query[0]->file_tags)){
								$tag_file = rtrim($query[0]->file_tags,',');
								$tags=explode(',',$tag_file);
								$tags_count=count($tags);
							}
								?>
                                <h3  onclick="showSplitPlaneRow(this);">Tags</h3><div class="splitPlaneQuickDetails" id="form_tag_id"><?php if(isset($query[0]->file_tags) &&$query[0]->file_tags!=''){ echo $tags_count;} else{echo '0';}?> Tags</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Tags</div>
                                        <div class="formInfo col span_12"><textarea name="txt_tag" class="doubleHeight"/><?php if(isset($query[0]->file_tags)) echo $query[0]->file_tags; ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails" id="form_not_id">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                   <li class="row">
                                    <div class="labelInfo col span_4">Notes</div>
                                    <div class="formInfo col span_12"><textarea name="txt_note" class="doubleHeight"/><?php if(isset($query[0]->file_notes)) echo $query[0]->file_notes; ?></textarea></div>
                                   </li>
                                </ul>
                            </div>
                             <input type="hidden" id="hidden_website_file_id" value="<?php if(isset($query[0]->website_file_id)) { echo $query[0]->website_file_id; } else{ echo $this->uri->segment(3); } ?>" name="hiddenid"/>   
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
									<button type="button" id="cancel_btn" onclick="history.back()" class="cancel">Cancel</button>
                                </div>
                                <div class="col span_4">                                    
                                    <button class="save" id="save_btn">Save</button>
                                </div>
                            </div>
<!-- Notes-->                            
                            
                            
                                                
                            
                            
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
function submit_change_val(){

$('#search_form').submit();
}

$(document).ready(function() {

	$('#cancel_btn').attr("type", "reset");
	$('#save_btn').click(function(e) {
	var file_val= $('#title_id').val();
	if(file_val==''){
		$('#title_id').css({"border-color":"red"});
		$('#title_id').focus();
		return false;
	}
	});
	$('#save_btn_mobile').click(function(e) {
	var file_val= $('#title_id').val();
	if(file_val==''){
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
	
	$('#form_profile_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_profile_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_profile_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

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
     
	  $('.edit').editable('<?php echo base_url()?>ajax/update_ajax_file_website', {
		 id : 'elementid',
         indicator : 'Saving...',
		 submitdata : {file_id: $('#file_id').val()},
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
	$('#open_audience_ic').click(function(){
		document.getElementById('my_form').style.display='block';
	});
});
$(document).ready(function() {
<?php	
$add_form=$this->uri->segment(2); 
if($add_form=='website_file_controller')
	{
	}
	else
	 {  } ?>
	});
	
	
function audience_filter(selectedValue)
 {
	 if(selectedValue)
	 {	
		$.ajax({
			url: '<?php echo base_url(); ?>website_file_controller/file_filter',
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
	if($add_form=='filess')
	{
	?>
	<script>    
	document.getElementById('my_form').style.display='block';

	$('#form_act_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_act_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_act_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
	$('#form_profile_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_profile_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_profile_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

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
	if($add_form=='add_file')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='block';	

    </script>
<?php }
	?>
<?php $add_form=$this->uri->segment(2);
	if($add_form=='file_delete')
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
  var return_array=response.split("|"); 
  $('#onsuccessmsg').html('<div id="msg" style="margin-left:127px">'+return_array[0]+'</div>');
 	$('#file_path').html(return_array[1]);
 	$('#file_size').html(return_array[2]);
 	$('#file_dimention').html(return_array[4]);
	$('#file_path_id').val(return_array[1]);
	//var convert=parseInt(return_array[2]);
	//var finalsize=parseFloat(convert/1000);
	$('#file_size_id').val(return_array[2]);
	$('#demension_id').val(return_array[4]);
	
  }
 $('#upload_img_btn').click(function(){
	 var f = document.getElementById("file_name").value;
        if(f==''){
		 alert("Please select file to upload");
		 return false;	
		}
	 $('#my_form').attr('action', 'upload_images');
	//alert($('#my_form').attr('action'));
	$("#my_form").submit(); 
 });	
$("#my_form").on('submit',function(){
if($('#my_form').attr('action')=='upload_images'){
$("#loader").show();
  var options={
   //url     : $(this).attr("action"),
   url     : '<?php echo base_url()?>files/upload_images',
   success : onsuccess
  };
$(this).ajaxSubmit(options);
 return false;
  }
 });

$('#save_btn').click(function(){
	$('#my_form').attr('action', '<?php echo base_url();?>website_file_controller/add_file');
});

$('#save_btn_mobile').click(function(){
$('#my_form').attr('action', '<?php echo base_url();?>website_file_controller/add_file');
});

$('#remove_btn').click(function(){
	var r = confirm("Are you sure you want to delete");
	if (r == true) {
		var del_id=$('#hidden_website_file_id').val();
		window.location.href='<?php echo base_url() ?>website_file_controller/file_delete/'+del_id;
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