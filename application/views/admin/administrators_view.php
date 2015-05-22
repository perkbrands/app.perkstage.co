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
                                <?php  if(isset($query) && $query!='') { ?>                               	
                                 <a href="<?php echo base_url(); ?>audience/audiences/new">
							     <li id="new_person" onclick="document.getElementById('my_form').style.display='block';">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Person</div>
                                   
                                </li>
                                </a>
                                 <?php }
								 else
								 { ?>
							     <li id="new_person" onclick="document.getElementById('my_form').style.display='block';">
                                  <div class="plusSign">+</div>
                                    <div class="plusSignText">New Person</div>
                                </li>
                                 <?php } ?> 
                                
		                    	
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
                        <!-- END OF splitPaneLeft -->
        
        
                        <div class="col span_8" id="splitPaneRight">
                        
                            <h2>Ann Artso</h2>
        
                       <form action="<?php echo base_url();?>people_user_controller/people_administrator_add" method="post" id="my_form" <?php if(isset($query) && $query!='') { ?>  style="display:block;" <?php }else { ?> style="display:none;" <?php } ?>>
<!-- Status -->                            
                            <div class="splitPaneRightRow statusGreen">
                                <h3  onclick="showSplitPlaneRow(this);">Status</h3><div class="splitPlaneQuickDetails" id="form_act_id">Active</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Status</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="user_status">
                                                <option value="1">Active</option>
                                                <option value="0">Pause</option>
                                            </select>
                                            <span class="required"></span>                                
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Role</div>
                                        <div class="formInfo col span_12">
                                            <select class="" name="user_role">
                                                <option value="1">Administrator</option>
                                                <option value="2">Editor</option>
                                                <option value="3">Member</option>
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
                                        <div class="labelInfo col span_4">Username</div>
                                        <div class="formInfo col span_12"><input type="text" name="username" /><span class="required"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Password</div>
                                        <div class="formInfo col span_12"><input type="text" name="password" /><span class="required"></span></div>
                                    </li>
                                </ul>
                            </div>
<!-- Profile -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Profile</h3><div class="splitPlaneQuickDetails" id="form_cont_id">Expand to view and add details.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Profile Image</div>
                                        <div class="formInfo col span_12"><input type="text" class="halfSize" /></div>
                                    
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">First Name</div>
                                        <div class="formInfo col span_12"><input type="text" name="first_name" /><span class="required"></span></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_4">Last Name</div>
                                        <div class="formInfo col span_12"><input type="text" name="last_name "/><span class="required"></span></div>
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
                                        <div class="formInfo col span_12"><input class=""  type="text" name="recieve_email_at" /></div>
                                    </li>
                                    
                                    <li class="row">
                                        <div class="labelInfo col span_4">Receive texts at:</div>
                                        <div class="formInfo col span_12"><input class=""  type="text" name="recieve_text_at" /></div>
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
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="user_tags" /></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails" id="form_note_id">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Notes</div>
                                        <div class="formInfo col span_12"><textarea class="doubleHeight" name="user_notes" /></textarea></div>
                                    </li>
                                </ul>
                            </div>
                                                        
                            <div class="splitPaneRightRow rightButtonsRow">
                                <button class="remove">Remove</button><span class="floatRight"><button class="cancel">Cancel</button><button class="save">Save</button></span>
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
 $(document).ready(function() {
	//$('#new_account').click(function(){
		
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



	});

$(document).ready(function() {
	$('#edit #elementid').click(function(){
	alert('fffffffffffffff');
	//var abc=$('#edit.button').text();
	//$('#edit').text(abc);
//$('.edit').val('fffffffffff');
});
     
 /* $('.edit').editable('audience/ajax/audiences-editAccountLabel.php', {
		 id   : 'elementid',
         indicator : 'Saving...',
         tooltip   : 'Click to edit...',
		 cancel : 'Cancel',
		 submit  : 'Save',
		 onblur : 'ignore',
     });*/
});
 

$(document).ready(function() {
	$('#open_audience_ic').click(function(){
		document.getElementById('my_form').style.display='block';
	});
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
<?php }
	?>

</script>
<?php $add_form=$this->uri->segment(2);
	if($add_form=='people_member_setting')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='block';	

    </script>
<?php }
	?>
<?php $add_form=$this->uri->segment(2);
	if($add_form=='people_administrator_add')
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

</body>
</html>