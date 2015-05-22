<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Manage Collections</title>
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
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/admin/jquery.js"></script> 
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/modernizr.custom.js"></script>
			<!-- DropDown  Jq -->
</head>
<body>
<?php

//echo "<br>";/
 $postback=array();
 if (!empty($all_design_data))
 {
 	$all_design=$all_design_data;
 }
 if(isset($listing_data) && $listing_data!='')
  {
	  if(!empty($listing_data)){
		$array_length=count($listing_data); 
	  		for($i=0;$i<$array_length; $i=$i+1)
			{
				$postback[]=$listing_data[$i]->design_id; 
			}
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
                <h2 class="icon icon-world">Designs</h2>
                

                	<ul class="leftPaneFilters">
                    	
                    	<li id="searchButtonLI">
                        <form>
                        <input type="text" placeholder="Search"/>
                        <button id="searchButton" type="submit" name="searchButton" value=""></button>
                        </form>
                        </li>
                        <li><select>
                        		<option>Web - Page Designs</option>
                                <option>Active</option>
                                <option>Paused</option>
                        	</select>
                        </li>
                        <li><button type="button" />View All</button></li>
                    </ul>
                    
                    <div class="leftPaneFiltersDetails">
                    	<p>Displaying 1-5 Filtered Designs</p>
                    </div>
                    
                	<ul class="cardsBox">
                    	<li>
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Internal Page Design</p>
                            <div class="status statusGreen"></div>
                        </li>
                        <li class="selected">
                            <div class="pill" style="background-image: url('http://perkapp.offunit.com/img/page-image-sample.png');"></div>
                            <p class="label">Home Design</p>
                            <p class="options"><span>Add this Design</span></p>
                            <div class="status statusGreen"></div>
                        </li>
                    	<li>
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Forms Design</p>
                            <div class="status statusGreen"></div>
                        </li>
                        <li>
                        	<div class="pill" style="background-image: url('http://childrensharbor.com/img/story-graycen-bond.jpg');">&nbsp;</div>
                            <p class="label">Stories Design</p>
                            <div class="status statusGreen"></div>
                        </li>
                        <li>
                            <div class="pill" style="background-image: url('http://perkapp.offunit.com/img/page-image-sample.png');"></div>
                            <p class="label">Services Design</p>
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
                        
        						 <form action="<?php echo base_url(); ?>collections/design_search" method="post" enctype="multipart/form-data" name="search_form" id="search_form">
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
                    	           <input type="hidden" id="selectes_type" name="selectes_type" />
                    	           <input type="hidden" id="selected_value" name="selected_value" />
                                 <input type="hidden" id="input_value" name="input_value" />
                                </li>
                                <li>
                                	<button type="button" />View All</button>
                                </li>
                            </ul>
                           </form> 
                             <div class="leftPaneFiltersDetails">
                                <p id='all_design_id'></p>
                            </div>
		                	<ul class="cardsBox" id="show_design_id">
                                <input type="hidden" name="design_type" value="" id="hidden_type"  />
							</ul>
                          
                        </div>
                        <!-- END OF splitPaneLeft -->
        
        
                        <div class="col span_8" id="splitPaneRight">
                            <div style="text-align:center">
     			              <div class="message" style="display:none; padding-left:0px; color:#00a6e8; margin-top:38px;">This Design is not belong to current Collection</div>
     			              <div class="second_message" style="display:none; color:#00a6e8; margin-top:14px;">This Design is Add to current Collection</div>
          		        </div>
                           <form action="<?php echo base_url();?>collections/update_design" method="post" id="my_form" enctype="multipart/form-data">
<!-- Fonts -->                        
                            <h2 class="edit"><?php echo $collection_title[0]->collection_title ?></h2>
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Fonts</h3><div class="splitPlaneQuickDetails" id="form_css_id">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                   <li class="row">
                                   <div class="labelInfo col span_4">CSS</div>
                                    <div class="formInfo col span_12">
                                   	 <textarea name="txt_css" class="doubleHeight"><?php if(isset($query[0]->design_collection_css)) echo $query[0]->design_collection_css; ?></textarea>
                   <input type="hidden" value="<?php if(isset($return_id) && $return_id!='') { echo $return_id;} else { echo $this->uri->segment(3); } ?>" name="hidden_id" />
                                      </div>
                                   </li>
                                </ul>
                            </div>                 
<!-- Placement -->          <div class="splitPaneRightRow">
							                        
                               <h3 onclick="show_design('1')">Page</h3><div class="splitPlaneQuickDetails" id="form_page_id"><?php $total=(count($page_design)+1); echo $total; ?> Web Page Designs</div>
                                <ul class="splitPaneRightDetails" id="ulist_id">
                                    <li class="row">
                                        <div class="smallText">Default Web Page Design</div>
                                    </li>
                                   <?php if (!empty($default_page_design)){ ?>
                                    <li class="row" id="<?php echo $default_page_design[0]->design_id;?>">
                                        <div class="formInfo col span_16">
											<input value="<?php echo $default_page_design[0]->design_title;?>" type="text" />
                                           	<span class="removeLink">
                               					 <a onclick="deleteList(<?php echo $default_page_design[0]->design_id;?>)">Remove</a>
                               				</span>
                                        </div>
                                    </li>
                                      <?php } ?>
                                    <li class="row">
                             	       <div class="smallText">Additional Web Page Design</div>
                                    </li>
                                    <?php if (!empty($page_design)){
                                     foreach($page_design as $row) {?>
                                  <li class="row" id="<?php echo $row->design_id;?>" >                                    
                                      <div class="removeLink formInfo col span_16"><input value="<?php echo $row->design_title ?>" type="text" />
                                        <span class="removeLink" style="margin-left:-100px !important">
                       <a onclick="deleteList(<?php echo $row->design_id;?>)">Remove</a> | <a onclick="default_list(<?php echo $row->design_id;?>,'1')">Set Default</a>
                               			</span>
                                     </div>
                                  </li>
                                   <?php } } ?>
                                   <?php /*?><li class="row">                                    
                                     <div class="formInfo col span_16"><input value="+" type="text" /></div>
                                   </li><?php */?>
                               </ul>
                            </div>  
                            <div class="splitPaneRightRow" id="post_main">
                                <h3 onclick="show_design('2')">Post</h3><div class="splitPlaneQuickDetails" id="form_post_id"><?php $total=(count($post_design)+1); echo $total; ?> Web Post Design</div>
                                <ul class="splitPaneRightDetails" id="post_slide">
                                	 <li class="row">
                                        <div class="smallText">Default Web Post Design
</div>
                                    </li>
                                   <?php if (!empty($default_post_design)){ ?>
                                    <li class="row" id="<?php echo $default_post_design[0]->design_id;?>">
                                        <div class="formInfo col span_16" >                                       
											<input value="<?php echo $default_post_design[0]->design_title;?>" type="text" />

                                           	<span class="removeLink">
                               					<a onclick="deleteList(<?php echo $default_post_design[0]->design_id;?>)" onclick="deleteList()">Remove</a>
                               				</span> 
                                        </div>
                                    </li>
                                    <?php } ?>
                                    <li class="row">
                             	       <div class="smallText">Additional Web Post Design</div>
                                    </li>
                                    <?php if (!empty($post_design)){
									 foreach($post_design as $row); { ?>
                                    <li class="row" id="<?php echo $row->design_id;?>">                                    
                                        <div class="removeLink formInfo col span_16"><input value="<?php echo $row->design_title ?>" type="text" />
                                           	<span class="removeLink" style="margin-left:-100px !important">
                    <a onclick="deleteList(<?php echo $row->design_id;?>)">Remove</a> | <a onclick="default_list(<?php echo $row->design_id;?>,'2')">Set Default</a>
                               				</span>
                                        </div>    
                                    </li>
                                    <?php } } ?>
                                    <?php /*?><li class="row">
                                        <div class="formInfo col span_16"><input value="+" type="text" /></div>
                                    </li><?php */?>
                                </ul>
                            </div>
                                                     
    						<div class="splitPaneRightRow">
                                <h3 onclick="show_design('4')">Calendar</h3><div class="splitPlaneQuickDetails" id="form_cal_id"><?php $total=(count($calendar_design)+1); echo $total; ?> Web Calendar Design</div>
                                <ul class="splitPaneRightDetails" id="calender_slide">
                                
                                	 <li class="row">
                                        <div class="smallText">Default Web Calendar Design</div>
                                    </li>
                                   <?php if (!empty($default_calendar_design)){ ?>
                                    <li class="row" id="<?php echo $default_calendar_design[0]->design_id;?>">
                                        <div class="formInfo col span_16">
										<input value="<?php echo $default_calendar_design[0]->design_title;?>" type="text" />

                                        	<span class="removeLink">
                               					 <a onclick="deleteList(<?php echo $default_calendar_design[0]->design_id;?>)">Remove</a>
                               				</span>
                                        </div>
                                    </li>
                                      <?php } ?>
                                    
                                     <li class="row">
                             	       <div class="smallText">Additional Web Calendar Design</div>
                                    </li>
                                    <?php if (!empty($calendar_design)){
										 foreach($calendar_design as $row) {?>
                                    <li class="row" id="<?php echo $row->design_id;?>">                                    

                                        <div class="removeLink formInfo col span_16"><input value="<?php echo $row->design_title ?>" type="text" />
                                          <span class="removeLink" style="margin-left:-100px !important">
                              <a onclick="deleteList(<?php echo $row->design_id;?>)">Remove</a> | <a onclick="default_list(<?php echo $row->design_id;?>,'4')">Set Default</a>
                               				</span>

                                        </div>
                                    </li>
                                    <?php } }?>
                                    <?php /*?><li class="row">
                                        <div class="formInfo col span_16"><input value="+" type="text" /></div>
                                    </li><?php */?>
                                </ul>
                            </div>                        
                             <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="hiddenid"/>                           

                            <div class="splitPaneRightRow rightButtonsRow row gutters">
                                   <div class="col span_8"> </div>
                                        <div class="col span_4 floatRight" >
                                        <button class="save" id="save_btn">Save</button>
                                       </div>
                                        <div class="col span_4 floatRight">
                                        	<a href="<?php echo base_url()?>collections">
                                    	    	<button class="cancel" id="back_btn" type="button">Back</button>
                                        	</a>
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
 function deleteList(id){
	document.getElementById(id).remove(id);	
		$.ajax({
		url: '<?php echo base_url(); ?>collections/update_collection_design',
		type: 'POST',
		data: {option :id},
		success: function(data) {
		window.location.href='';
			
		}
	});
}
 function default_list(id,type){
	document.getElementById(id).remove(id);	
 		var send_data = id +" "+type;
		$.ajax({
		url: '<?php echo base_url(); ?>collections/update_default_design',
		type: 'POST',

		data: {option :send_data},
		success: function(data) {
		window.location.href='';
			
		}
	});
}

function show_design(type)
{
	$('#selectes_type').val(type);
	if(type=='1')
	{
		$('#form_page_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_page_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_page_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
		
		$('#form_post_id').parent().removeClass('splitPaneRightSelected'); 
		$('#form_post_id').parent().children("ul").eq(0).hide(300); 
		$('#form_post_id').parent().children(".splitPlaneQuickDetails").eq(0).hide(0);
		
		$('#form_cal_id').parent().removeClass('splitPaneRightSelected'); 
		$('#form_cal_id').parent().children("ul").eq(0).hide(300); 
		$('#form_cal_id').parent().children(".splitPlaneQuickDetails").eq(0).hide(0); 
		
		var design_type='Page';
		
	}
	 else if(type=='2'){
		$('#form_post_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_post_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_post_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
		
		$('#form_page_id').parent().removeClass('splitPaneRightSelected'); 
		$('#form_page_id').parent().children("ul").eq(0).hide(300); 
		$('#form_page_id').parent().children(".splitPlaneQuickDetails").eq(0).hide(0);
		
		$('#form_cal_id').parent().removeClass('splitPaneRightSelected'); 
		$('#form_cal_id').parent().children("ul").eq(0).hide(300); 
		$('#form_cal_id').parent().children(".splitPlaneQuickDetails").eq(0).hide(0); 
		
		
		var design_type='Post';
		
		
	}
	 else if(type=='4'){
		$('#form_cal_id').parent().toggleClass('splitPaneRightSelected'); 
		$('#form_cal_id').parent().children("ul").eq(0).slideToggle(300); 
		$('#form_cal_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0);
		
		$('#form_post_id').parent().removeClass('splitPaneRightSelected'); 
		$('#form_post_id').parent().children("ul").eq(0).hide(300); 
		$('#form_post_id').parent().children(".splitPlaneQuickDetails").eq(0).hide(0); 
		
		$('#form_page_id').parent().removeClass('splitPaneRightSelected'); 
		$('#form_page_id').parent().children("ul").eq(0).hide(300); 
		$('#form_page_id').parent().children(".splitPlaneQuickDetails").eq(0).hide(0);
		 
		var design_type='Calendar';
		
	}

	$.ajax({
		url: '<?php echo base_url(); ?>collections/select_design',
		type: 'POST',
		data: {option :type},
		success: function(data) {
		$('#show_design_id').html(data);
		var number_design=$(".add_design").size();
		var filter= "Filtered";
		var design="design";
 		var result ='Displaying '+  number_design +" "+filter +" "+design_type+" "+design;
		$('#all_design_id').html(result);
		}
	});
}
function add_design_list() {
		$(".message").show();

}

function message_add(designid) {
	var resposedata;
	$('#hidden_type').val(designid);
		
		
		
		
		var send_data='<?php  echo $this->uri->segment(3); ?>';	
		if(send_data!=''){
		send_data+=','+designid;
		$.ajax({
			url: '<?php echo base_url(); ?>collections/add_design',
			type: 'POST',
			data: {option :send_data},
			success: function(data) {
			resposedata = data.split(',')	
				if(resposedata)
				{
					window.location.href=resposedata[1];
				}
			}				
    });
		}
}

// For inline editor
$(document).ready(function() {
     $('.edit').editable('/ajax/accounts-editAccountLabel.php', {
         indicator : 'Saving...',
         tooltip   : 'Click to edit...',
		 cancel : 'Cancel',
		 submit  : 'Save',
		 onblur : 'ignore',
     });

 });
</script>
</body>
</html>
<script type="text/javascript">
function submit_change_val(select_value){
$('#selected_value').val(select_value);
var	inputValue=$('#input_id').val();
var	design_type=$('#selectes_type').val();
	if(inputValue=='')
	{
		inputValue='noinput';
	}
	else 
	{
	}
	var send_data=select_value +" "+ inputValue +" "+ design_type;
	$.ajax({
		url: '<?php echo base_url(); ?>collections/design_search',
		type: 'POST',
		data: {option :send_data},
		success: function(data) {
		$('#show_design_id').html(data);
		var number_design=$(".add_design").size();
		var filter= "Filtered Designs";
 		var result = number_design +" "+design_type +" "+filter;
		$('#all_design_id').html(result);
		var number_design=$(".add_design").size();
		var filter= "Filtered Designs";
		if(design_type=1)
		{
			web_type='Page';
		}
		else if(design_type=2)
		{
			web_type='Post';
		}
		else if(design_type=4)
		{
			web_type='Calendar';
		}


		
 		var result ='Displaying '+ number_design +" "+web_type +" "+filter;
		$('#all_design_id').html(result);
		}
	});
}

function submit_change_submit(){
var	select_value=$('#lst_filters').val();
$('#selected_value').val(select_value);
var	inputValue=$('#input_id').val();
var	design_type=$('#selectes_type').val();
	if(select_value=='all')
	{
		select_value='noselect';
	}
	else 
	{
	}
	var send_data=select_value +" "+ inputValue +" "+ design_type;
	$.ajax({
		url: '<?php echo base_url(); ?>collections/design_search',
		type: 'POST',
		data: {option :send_data},
		success: function(data) {
		$('#show_design_id').html(data);
		var number_design=$(".add_design").size();
		var filter= "Filtered Designs";
				if(design_type=1)
		{
			web_type='Page';
		}
		else if(design_type=2)
		{
			web_type='Post';
		}
		else if(design_type=4)
		{
			web_type='Calendar';
		}

 		var result ='Displaying '+ number_design +" "+web_type +" "+filter;
		$('#all_design_id').html(result);
		}
	});
}

$(document).ready(function() {

	$('#back_btn').attr("type", "button");
	$('#save_btn').click(function(e) {
	var collection_val= $('#title_id').val();
	if(collection_val==''){
		$('#title_id').css({"border-color":"red"});
		$('#title_id').focus();
		return false;
	}
	});
});	

function card_expand()
{
	document.getElementById('my_form').style.display='block';
	$('#form_css_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_css_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_css_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
	$('#form_page_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_page_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_page_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_post_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_post_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_post_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_cal_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_cal_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_cal_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

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
		 submitdata : {collection_id: $('#collection_id').val()},
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
if($add_form=='collection_setting')
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
<?php $add_form=$this->uri->segment(2);
	if($add_form=='design_manage')
	{
	?>
	<script>    
	document.getElementById('my_form').style.display='block';
	<?php } else { ?>
	
    </script>
<?php }
	?>   
<?php $add_form=$this->uri->segment(2);
	if($add_form=='add_collection')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='none';	

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
<?php $add_form=$this->uri->segment(2);
	if($add_form=='update_design')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='block';	

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