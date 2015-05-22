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
<script src="<?php echo base_url(); ?>assets/js/admin/main.js"></script> 
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/modernizr.custom.js"></script>
<script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
<style>
#cke_top_editor1{display:none}
#cke_top_editor2{display:none}
.cke_bottom{display:none}
span.cke_skin_kama{padding:0px !important;border:none !important;}
.cke_skin_kama .cke_resizer{ background-image:none !important;cursor:none !important}
#cke_contents_editor1{height:620px !important;}
#cke_contents_editor2{height:430px !important;}
#contentContainer{max-width:none}
div.codeBox{margin:0px !important;padding:0px !important}

</style>

</head>
<body>
<div class="container">

				<?php $this->load->view('templates/admin/header'); ?>
                
                <!-- START FORMAT OPTIONS BOX -->
                <div class="headerSubSubSection" id="websites-pages-manage--format_options">
                	
                    <div class="headerSubSubSectionBox">
                	
                        <div class="row">
                            <div class="subSubSectionTitle col span_7">Format Options</div>
                            <div class="boxButtons col span_9">
                            	<a href="javascript:void(0)"><button type="button" id="cancel_option" class="cancel">Cancel</button></a>
                                <button type="button" id="save_btn_option" class="save">Save</button>
                                <input type="hidden" id="heading_hidden_id" value="" />
                                <input type="hidden" id="alignment_hidden_id" value="" />
                                <input type="hidden" id="list_hidden_id" value="" />
                                <input type="hidden" id="style_hidden_id" value=""  />
                                
                            </div>
                        </div>
						
						
                        <div class="row">
                            <div class="left format-options col span_5">
                                    <div class="smallText">Headings</div>
                                    <style>
									/*.cke_rcombo{float:left:width:100%}
								 	#cke_11{height:35px;width:182px;border: 1px solid #535a60;float:left;margin-bottom:1em;font-size: 1em;font-weight: 300;}
									#cke_11_text{padding:5px 0 0 14px;float:left;color:#535a60}
									.cke_icon{background:url("<?php echo base_url() ?>assets/img/admin/filterSelectArrow.png") no-repeat scroll right center rgba(0, 0, 0, 0);
									float: right;
									height: 33px;
									width: 33px;
									border-left:1px solid #535a60;
									}*/
								    .cke_skin_kama .cke_panel{display:none !important}
									
									
									
									</style>
                                  
                                   <?php /*?><span role="presentation" class="cke_rcombo"><span role="presentation" class="cke_format cke_off" id="cke_11"><span class="cke_label" id="cke_11_label"></span><a onclick="CKEDITOR.tools.callFunction(10, this); return false;" onfocus="return CKEDITOR.tools.callFunction(12, event);" onkeydown="CKEDITOR.tools.callFunction( 11, event, this );" onblur="this.style.cssText = this.style.cssText;" aria-haspopup="true" aria-describedby="cke_11_text" aria-labelledby="cke_11_label" role="button" tabindex="-1" title="" hidefocus="true"><span><span class="cke_text" id="cke_11_text">Heading 2</span></span><span class="cke_openbutton"><span class="cke_icon"></span></span></a></span></span><?php */?>
                                    
                        
                          
                                  <a id="option_link_href" onclick="CKEDITOR.tools.callFunction(16, this);">
                                  <select class="custom" id="heading_option_id" onchange="update_editor(this.value)">
                                        <option id="p" value="p" >Normal</option>
                                        <option id="h1" value="h1">Heading One</option>
                                        <option id="h2" value="h2">Heading Two</option>
                                        <option id="h3" value="h3">Heading Three</option>
                                        <option id="h4" value="h4">Heading Four</option>
                                        <option id="h5" value="h5">Heading Five</option>
                                        <option id="h6" value="h6">Heading Six</option>
                                    </select></a>
                                   
                                 

                                    <div class="smallText">Styles</div>
                                    
                                    <select>
                                        <option value="0">None</option>
                                        <option value="1">Custom Style 1</option>
                                        <option value="2">Custom Style 2</option>
                                        <option value="3">Custom Style 3</option>
                                    </select>
                                    <br />
                                    <div class="smallText">Alignment</div>
                                    
                                    <select id="allignment" onchange="update_editor(this.value)">
                                        <option id="left" value="left">Align Left</option>
                                        <option id="center" value="center">Align Center</option>
                                        <option id="right" value="right">Align Right</option>
                                        <option id="justify" value="justify">Justify</option>
                                        <option id="indent" value="indent">Indent</option>
                                        <option id="clear" value="clear">Clear Alignment</option>
                                    </select>
                                    <br />
                                    <div class="smallText">List</div>
                                    
                                    <select id="listing" onchange="update_editor(this.value)">
                                        <option value="0">None</option>
                                        <option id="bullet" value="bullet">Bullet List</option>
                                        <option id="number" value="number">Numbered List </option>
                                    </select>
                                    <br />
                                    <div class="smallText">More</div>
                                    
                                    <select id="styles" onchange="update_editor(this.value)">
                                         <option value="0">None</option>
                                        <option id="underline" value="underline">Underline</option>
                                        <option id="strikethrough" value="strikethrough">Strikethrough</option>
                                        <option id="superscript" value="superscript">Superscript</option>
                                        <option id="subscript" value="subscript">Subscript</option>
                                        <option id="clearformat" value="clearformat">Clear Format</option>
                                    </select>
                                    <br />
                                    

                            </div>
                            <div class="right col span_1">&nbsp;</div>
                            <script type="text/javascript">
                            function update_editor(value){
							var text='Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent blandit purus justo, sed ultricies sapien egestas et. Donec faucibus arcu ut tincidunt aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut tincidunt felis vel auctor cursus. ';
							var updated_text=text;
						
							if($('#heading_option_id').val()=='p')
							{
								updated_text = '<p>'+updated_text+'</p>';
						
							}
							
							if($('#heading_option_id').val()=='h1')
							{
								updated_text = '<h1>'+updated_text+'</h1>';
						
							}
							
							if($('#heading_option_id').val()=='h2')
							{
								updated_text = '<h2>'+updated_text+'</h2>';
						
							}
							
							if($('#heading_option_id').val()=='h3')
							{
								updated_text = '<h3>'+updated_text+'</h3>';
						
							}
							
							if($('#heading_option_id').val()=='h4')
							{
								updated_text = '<h4>'+updated_text+'</h4>';
						
							}
							
							if($('#heading_option_id').val()=='h5')
							{
								updated_text = '<h5>'+updated_text+'</h5>';
						
							}
							
							if($('#heading_option_id').val()=='h6')
							{
								updated_text = '<h6>'+updated_text+'</h6>';
						
							}
							
							if($('#allignment').val()=='left')
							{
								updated_text = '<span style="text-align:left;">'+updated_text+'</span>';
								
							}
							if($('#allignment').val()=='center')
							{
								
								updated_text = '<span style="text-align:center;">'+updated_text+'</span>';
								
							}
							
							if($('#allignment').val()=='right')
							{
								updated_text = '<span style="text-align:right;">'+updated_text+'</span>';
								
							}
							
							if($('#allignment').val()=='justify')
							{
								updated_text = '<span style="text-align:justify;">'+updated_text+'</span>';
								
							}
							
							if($('#allignment').val()=='indent')
							{
								updated_text = '<span style="float:left;text-align:justify;padding-left:30px">'+updated_text+'</span>';
								
							}
							if($('#listing').val()=='bullet')
							{
								updated_text = '<ul><li style="list-style:disc;">'+updated_text+'</li></ul>';
								
							}
							if($('#listing').val()=='number')
							{
								updated_text = '<ol><li style="list-style:number;">'+updated_text+'</li></ol>';
								
							}
							
							if($('#styles').val()=='underline')
							{
								updated_text = '<u>'+updated_text+'</u>';
								
							}
							if($('#styles').val()=='strikethrough')
							{
								updated_text = '<s>'+updated_text+'</s>';
								
							}
							if($('#styles').val()=='superscript')
							{
								updated_text = '<sup>'+updated_text+'</sup>';
								
							}
							if($('#styles').val()=='subscript')
							{
								updated_text = '<sub>'+updated_text+'<sub>';
								
							}
							if($('#styles').val()=='clearformat')
							{
								updated_text = '<p>'+updated_text+'</p>';
								
							}
							
							$('#my_editor').html(updated_text); 
						 }
                            </script>
                            
                            <div class="right col span_10">
                                <div class="smallText">Example</div>
                                
                                <div class="exampleBox" id="example_box">
                                
                                <div id="my_editor">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent blandit purus justo, sed ultricies sapien egestas et. Donec faucibus arcu ut tincidunt aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut tincidunt felis vel auctor cursus. 
                                </div>
                                
                               
                             
                                
                                	
                                </div>

    
                            </div> <!-- Right -->
                        </div> <!-- Row -->
                            
                        
					</div> <!-- headerSubSubSectionBox -->
                </div> <!-- headerSubSubSection -->
                <!-- END FORMAT OPTIONS BOX -->
                
                
                
                <!-- START INSERT LINK BOX -->
                <div class="headerSubSubSection" id="websites-pages-manage--insert_link">
                	
                    <div class="headerSubSubSectionBox">
                	
                        <div class="row">
                            <div class="subSubSectionTitle col span_7">Insert Link</div>
                            <div class="boxButtons col span_9">
                            	<a href="javascript:void(0)"><button type="button" class="cancel" id="cancel_btn_page">Cancel</button></a>
                                <button type="button" class="save" id="save_btn_page">Save</button>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="left col span_5">
                                    <div class="smallText">Link Options</div>
                                    
                                    <select id="link_select_id">
                                        <option value="1">Page Link</option>
                                        <option value="2">EmailLink</option>
                                        <option value="3">Anchor Link</option>
                                        <option value="4">File Link</option>
                                    </select>
                                    <br />
    
                                    <input type="text" id="link_text_id" placeholder="Link Text">
                                    <br />
    
                                    <select id="link_select_window_id">
                                        <option value="same">Open in Same Window</option>
                                        <option value="new">Open in New Window</option>
                                    </select>
                                    <br />
    
                                    <select id="link_select_style_id">
                                        <option value="1">Custom Style 1</option>
                                        <option value="2">Custom Style 2</option>
                                        <option value="3">Custom Style 3</option>
                                    </select>
                                    <br />
    
                                    <div class="smallText">Link Destination</div>
    
                                    <input type="text" id="link_destination_id" placeholder="Type URL/Path">
                                    <br />
    
                                    <div class="orButton"><div class="smallText">Or</div>
                                    <button type="button" id="select_page_btn_id">Select a Page</button>
                                    </div> 
                                   
                            </div>
                            <div class="right col span_1">&nbsp;</div>
                            <div class="right col span_10" id="search_pages" style="display:none">
                                <div class="smallText">Pages</div>
    						<form method="post" enctype="multipart/form-data" name="search_form" id="search_form">
                                <ul class="filters">
                                    <li id="searchButtonLI">
                                    
                                    <input type="text" placeholder="Search" name="txt_search" id="input_id">
                                    <button id="searchButton" class="searchButton_pages" type="button" name="searchButton" value=""></button>
                                    
                                    </li>
                                    <li><select id="lst_filter" onchange="submit_change_val(this.value)" name="lst_filter">
                                        <option value="2">All</option>
                                        <option value="1">Active</option>
                                        <option value="0">Paused</option>
                                        </select>
                                    </li>
                                    <li><button id="all_pages" type="button">All</button></li>
                                </ul>                                
                                </form>
                                <ul class="cardsBox" id="websites_pages">
                                   
                                    
                                </ul>      
                            </div> <!-- Right -->
                        </div> <!-- Row -->
                        <div class="row">
                            <div class="left col span_6">&nbsp;</div>
                            <div class="right col span_10">
                            	<div class="pages">
	                            	<?php /*?>< 1 2 3 <span class="selected">4</span> 5 6 ><?php */?>
                                </div>
                            </div>
                        </div>
                            
                        
					</div> <!-- headerSubSubSectionBox -->
                </div> <!-- headerSubSubSection -->
                <!-- END INSERT LINK BOX -->


                
				<!-- START INSERT IMAGE BOX -->
                <div class="headerSubSubSection" id="websites-pages-manage--insert_image">
                	
                    <div class="headerSubSubSectionBox">
                	
                        <div class="row">
                            <div class="subSubSectionTitle col span_7">Insert Image</div>
                            <div class="boxButtons col span_9">
                            	<a href="javascript:void(0)"><button type="button" id="cancel_image" class="cancel">Cancel</button></a>
                                <button type="button" id="save_btn_image" class="save">Save</button>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="left col span_5">
                                    <div class="smallText">Image Source</div>

                                    <input type="text" id="path_image" placeholder="Type URL/Path">
                                    <br />
                                    
                                    <div class="orButton"><div class="smallText">Or</div>
                                    <button type="button" id="select_image_btn_id">Select an Image</button>
                                    </div> 
                                    <br />

                                    <div class="smallText">Image Details</div>

                                    <input type="text" id="title_image" placeholder="Title">
                                    <br />
                                    <input type="text" id="height_image" placeholder="Height">
                                    <br />
                                    <input type="text" id="width_image" placeholder="Width">
                                    <br />
                                    <select id="images_custom_style">
                                        <option value="1">Custom Style 1</option>
                                        <option value="2">Custom Style 2</option>
                                        <option value="3">Custom Style 3</option>
                                    </select>
                                    <br />
    
                                   
                            </div>
                            <div class="right col span_1">&nbsp;</div>
                            <div class="right col span_10" id="search_images" style="display:none">
                                <div class="smallText">Files</div>
    
                              <form method="post" enctype="multipart/form-data" name="search_form" id="search_form">
                                <ul class="filters">
                                    <li id="searchButtonLI">
                                    
                                    <input type="text" placeholder="Search" name="txt_search" id="input_image_id">
                                    <button id="searchButton" class="searchButton_images" type="button" name="searchButton" value=""></button>
                                    
                                    </li>
                                    <li><select id="lst_filter_img" onchange="submit_change_image_val(this.value)" name="lst_filter">
                                        <option value="2">All</option>
                                        <option value="1">Active</option>
                                        <option value="0">Paused</option>
                                        </select>
                                    </li>
                                    <li><button id="all_images" type="button">All</button></li>
                                </ul>                                
                                </form>                                
                                
                                <ul class="cardsBox" id="websites_images">
    
                                </ul>      
                            </div> <!-- Right -->
                        </div> <!-- Row -->
                        <div class="row">
                            <div class="left col span_6">&nbsp;</div>
                            <div class="right col span_10">
                            	<div class="pages">
	                            	<?php /*?>< 1 2 3 <span class="selected">4</span> 5 6 ><?php */?>
                                </div>
                            </div>
                        </div>
                            
                        
					</div> <!-- headerSubSubSectionBox -->
                </div> <!-- headerSubSubSection -->
                <!-- END INSERT IMAGE BOX -->
                
  
  
				<!-- START INSERT VIDEO BOX -->
                <div class="headerSubSubSection" id="websites-pages-manage--insert_video">
                	
                    <div class="headerSubSubSectionBox">
                	
                        <div class="row">
                            <div class="subSubSectionTitle col span_7">Insert Video</div>
                            <div class="boxButtons col span_9">
                            	<a href="javascript:void(0)"><button type="button" id="video_cancel" class="cancel">Cancel</button></a>
                                <button type="button" id="video_save_btn" class="save">Save</button>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="left col span_5">
                                    <div class="smallText">Video Source</div>
                                    

                                    <input type="text" id="video_source" placeholder="Type URL/Path">
                                    <br />
                                    
                                    <div class="orButton"><div class="smallText">Or</div>
                                    <button type="button" id="embed_video_btn">Embed a Video</button>
                                    </div> 
                                    <br />
                                    
                                    <div class="orButton"><div class="smallText">Or</div>
                                    <button type="button" id="select_video_btn">Select a Video</button>
                                    </div> 
                                    <br />

                                    <div class="smallText">Video Details</div>

                                    <input type="text" id="video_title" placeholder="Title">
                                    <br />
                                    <input class="halfSize" id="video_height" type="text" placeholder="Height"> <input id="video_width" class="halfSize" type="text" placeholder="Width">
                                    <br />
                                    <select id="custom_style">
                                        <option value="1">Custom Style 1</option>
                                        <option value="2">Custom Style 2</option>
                                        <option value="3">Custom Style 3</option>
                                    </select>
                                    <br />
    
                                   
                            </div>
                            <div class="right col span_1">&nbsp;</div>
                            <div class="right col span_10">
                                <div class="smallText" id="vidoe_embed_text">Paste Embed Code</div>
                                
                                <div class="codeBox" id="video_code_embed">
                                    <form>
                                        <textarea id="video_embed_code"></textarea>
                                    </form>
                                </div>
                                
                                 <ul class="cardsBox" id="websites_videos">
    
                                </ul>  

    
                            </div> <!-- Right -->
                        </div> <!-- Row -->
                        <div class="row">
                            <div class="left col span_6">&nbsp;</div>
                            <div class="right col span_10">
                            	<div class="pages">
	                            	<?php /*?>< 1 2 3 <span class="selected">4</span> 5 6 ><?php */?>
                                </div>
                            </div>
                        </div>
                            
                        
					</div> <!-- headerSubSubSectionBox -->
                </div> <!-- headerSubSubSection -->
                <!-- END INSERT VIDEO BOX -->
                

				<!-- START INSERT LAYOUT BOX -->
                <div class="headerSubSubSection" id="websites-pages-manage--insert_layout">
                	
                    <div class="headerSubSubSectionBox">
                	
                        <div class="row">
                            <div class="subSubSectionTitle col span_7">Insert Layout</div>
                            <div class="boxButtons col span_9">
                            	<a href="javascript:void(0)"><button id="cancel_layout" type="button" class="cancel">Cancel</button></a>
                                <button id="save_layout" type="button" class="save">Save</button>
                            </div>
                        </div>

<script>
function updateColumns(sel) {
	$('.cardsBoxInsertLayout').hide();
	$(sel.value).show();
}


function updateTextVisual(sel, column) {
	switch(sel.value) {
		case "visual": 
			$(column).css('background-image','url(http://childrensharbor.com/img/story-graycen-bond.jpg)');
			break;
		
		case "text": 
			$(column).css('background-image','url(/img/text-lines.png)');
			break;
	}
}
</script>
                        
                      
                         <?php /*?> ///////////////////////////////for 1 columns div//////////////////////////////////////<?php */?>
                        <div id="one_column_id" style="display:none">
                        <div style="width: 960px;background: #FFF;margin: 0 auto;">
                          <div style="padding: 10px 0;">
                            <h1 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Instructions</h1>
                            <p>Be aware that the CSS for these layouts is heavily commented. If you do most of your work in Design view, have a peek at the code to get tips on working with the CSS for the fixed layouts. You can remove these comments before you launch your site. To learn more about the techniques used in these CSS Layouts.</p>
                            <h2 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Layout</h2>
                            <p>Since this is a one-column layout, the .content is not floated. If you add a .footer within the .container, it will simply follow the .content div. </p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                            <!-- end .content --></div>
                          <!-- end .container --></div>
                          </div>
                        <?php /*?> ///////////////////////////////for 1 columns div ends here//////////////////////////////////////<?php */?>
                     
                         <?php /*?> ///////////////////////////////for 2 columns even div//////////////////////////////////////<?php */?>
                      <div id="two_column_even" style="display:none">
                      <div id="2_even_column_hidden" class="full col span_16" style="color:#535060;text-align:center;background-color:#2c3339;float:left;width:100%">
                       <ul class="row gutters cardsBoxInsertLayout default" style="float:left;list-style-type:none;margin:0;display:block;box-sizing:border-box;width:100%" id="2-col-even">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_6" style="border: 1px solid #535a60;cursor: pointer;display: inline-block;height: 140px;margin-bottom: 1em;position: relative;text-align: center;width:36.25%;margin-left:2%">
                                        <div id="2-col-even_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        Lorem Ipsum is a dummy text.
                                        </p>
                                    </li>
                                    <li class="col span_6" style="border: 1px solid #535a60;cursor: pointer;display: inline-block;height: 140px;margin-bottom: 1em;position: relative;text-align: center;width:36.25%;margin-left:2%">
                                        <div id="2-col-even_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        Lorem Ipsum is a dummy text.
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>
                                </div>
                        </div>
                        
                        
                        <?php /*?>///////////////////////////////for 2 columns even div ends/////////////////////////////////<?php */?>
                        
                        
                        <?php /*?> ///////////////////////////////for 2 columns wide left div//////////////////////////////////////<?php */?>
                      <div id="two_column_wideleft" style="display:none">
                      <div id="2_colum_width_left" class="full col span_16" style="color:#535060;text-align:center;background-color:#2c3339;float:left;width:100%">
                      <ul class="row gutters cardsBoxInsertLayout" style="float:left;list-style-type:none;margin:0;box-sizing:border-box;width:100%">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                     <li class="col span_8" style="border: 1px solid #535a60;cursor: pointer;display: inline-block;height: 140px;margin-bottom: 1em;position: relative;text-align: center;width:49%;margin-left:2%">
                                        <div id="2-col-wideleft_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        Lorem Ipsum is the dummy text
                                        </p>
                                    </li>
                                    <li class="col span_4" style="border: 1px solid #535a60;cursor: pointer;display: inline-block;height: 140px;margin-bottom: 1em;position: relative;text-align: center;width:23.5%;margin-left:2%">
                                        <div id="2-col-wideleft_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        Lorem Ipsum is the dummy text
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>
                        </div>        
                        </div>
                        
                        
                        <?php /*?>///////////////////////////////for 2 columns wideleft div ends/////////////////////////////////<?php */?>
                        
                        
                         <?php /*?> ///////////////////////////////for 2 columns wide right div//////////////////////////////////////<?php */?>
                      <div id="two_column_wideright" style="display:none">
                       <div id="2_colum_width_right" class="full col span_16" style="color:#535060;text-align:center;background-color:#2c3339;float:left;width:100%">
                      
                      <ul class="row gutters cardsBoxInsertLayout" style="float:left;list-style-type:none;margin:0;box-sizing:border-box;width:100%">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_8" style="border: 1px solid #535a60;cursor: pointer;display: inline-block;height: 140px;margin-bottom: 1em;position: relative;text-align: center;width:23.5%;margin-left:2%">
                                        <div id="2-col-wideleft_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        Loerm Ipsum is a dummy text.
                                        </p>
                                    </li>
                                    <li class="col span_4" style="border: 1px solid #535a60;cursor: pointer;display: inline-block;height: 140px;margin-bottom: 1em;position: relative;text-align: center;width:49%;margin-left:2%">
                                        <div id="2-col-wideleft_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        Loerm Ipsum is a dummy text.
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul> 
                                </div>
                        </div>
                        
                        
                        <?php /*?>///////////////////////////////for 2 columns wide right div ends/////////////////////////////////<?php */?>
                        
                        
                       <?php /*?> ///////////////////////////////for 3 columns even div//////////////////////////////////////<?php */?>
                      <div id="three_column_even" style="display:none">
                      <div id="2_colum_width_right" class="full col span_16" style="color:#535060;text-align:center;background-color:#2c3339;float:left;width:100%">
                      <ul class="row gutters cardsBoxInsertLayout" style="float:left;list-style-type:none;margin:0;box-sizing:border-box;width:100%">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_4" style="border: 1px solid #535a60;cursor: pointer;display: inline-block;height: 140px;margin-bottom: 1em;position: relative;text-align: center;width:23.5%;margin-left:2%">
                                        <div id="3-col-even_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        Lorem Ipsum is a dummy text
                                        </p>
                                    </li>
                                   <li class="col span_4" style="border: 1px solid #535a60;cursor: pointer;display: inline-block;height: 140px;margin-bottom: 1em;position: relative;text-align: center;width:23.5%;margin-left:2%">
                                        <div id="3-col-even_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        Lorem Ipsum is a dummy text
                                        </p>
                                    </li>
                                   <li class="col span_4" style="border: 1px solid #535a60;cursor: pointer;display: inline-block;height: 140px;margin-bottom: 1em;position: relative;text-align: center;width:23.5%;margin-left:2%">
                                        <div id="3-col-even_column3Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        Lorem Ipsum is a dummy text
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>
                                </div>
                        </div>
                        
                        
                        <?php /*?>///////////////////////////////for 3 columns even div ends/////////////////////////////////<?php */?>
                        
                        
                         <?php /*?> ///////////////////////////////for 3 columns wide left//////////////////////////////////////<?php */?>
                      <div id="three_column_wideleft" style="display:none">
                       <div id="container_html" style="width: 960px;background: #FFF;margin: 0 auto; overflow: hidden;">
                        
                          <div style="float: left;width: 500px;padding-bottom: 10px;">
                             <h1 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Instructions</h1>
                            <p>Be aware that the CSS for these layouts is heavily commented. If you do most of your work in Design view, have a peek at the code to get tips on working with the CSS for the fixed layouts. You can remove these comments before you launch your site. To learn more about the techniques used in these CSS Layouts, read this article at Adobe's Developer Center - <a href="http://www.adobe.com/go/adc_css_layouts">http://www.adobe.com/go/adc_css_layouts</a>.</p>
                            <h2 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Clearing</h2>
                            <p>Because all the columns are floated, this layout uses overflow:hidden on the .container. This clearing technique forces the .container to understand where the columns end in order to show any borders or background colors you place on the .container. If you have a large element that protrudes outside the .container, it will appear to be cut off. You also won't be able to use negative margins or absolute positioning with negative values to pull elements outside the .container or they will also won't display outside the .container.</p>
                            <p>If you need to use these properties, you'll need to use a different clearing method. The most reliable will be to add a &lt;br class=&quot;clearfloat&quot; /&gt; or &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; after your final floated column (but before the .container closes). This will have the same clearing effect.</p>
                            <h3 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Footer</h3>
                            <p>Adding a footer following the columns, yet still inside the .container, will cause this overflow:hidden clearing method to fail. You can place a .footer into a second .container outside the first one with no detrimental effects. The simplest choice may be to start with a layout containing headers and footers and remove the header to utilize the clearing methods in that layout type.</p>
                            
                            
                            <!-- end .sidebar1 --></div>
                          <div style="padding: 10px 0;background: #EADCAE;width: 225px;float: left; padding-left:5px;padding-right:5px">
                           
                             <h4 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Backgrounds</h4>
                            <p>By nature, the background color on any div will only show for the length of the content. If you'd like a dividing line instead of a color, place a border on the side of the .content div (but only if it will always contain more content).</p>
                            <!-- end .content --></div>
                          <div style="float: left;width: 225px;background: #00CCFF;padding: 10px 0;">
                           <ul class="nav" style="list-style: none;border-top: 1px solid #666; margin-bottom: 15px;">
                              <li><a href="#">Link one</a></li>
                              <li><a href="#">Link two</a></li>
                              <li><a href="#">Link three</a></li>
                              <li><a href="#">Link four</a></li>
                            </ul>
                            <p> The above links demonstrate a basic navigational structure using an unordered list styled with CSS. Use this as a starting point and modify the properties to produce your own unique look. If you require flyout menus, create your own using a Spry menu, a menu widget from Adobe's Exchange or a variety of other javascript or CSS solutions.</p>
                            <p>If you would like the navigation along the top, simply move the ul.nav to the top of the page and recreate the styling.</p>
                            <!-- end .sidebar2 --></div>
                            
                          <!-- end .container --></div>
                        </div>
                        
                        
                        <?php /*?>///////////////////////////////for 3 columns wide left ends/////////////////////////////////<?php */?>
                        
                        
                         <?php /*?> ///////////////////////////////for 3 columns wide middle//////////////////////////////////////<?php */?>
                      <div id="three_column_widemiddle" style="display:none">
                       <div style="width: 960px;background: #FFF;margin: 0 auto;overflow: hidden;">
                              <div style="float: left;width: 180px;background: #EADCAE;padding-bottom: 10px;">
                                <ul class="nav">
                                  <li><a href="#">Link one</a></li>
                                  <li><a href="#">Link two</a></li>
                                  <li><a href="#">Link three</a></li>
                                  <li><a href="#">Link four</a></li>
                                </ul>
                                <p> The above links demonstrate a basic navigational structure using an unordered list styled with CSS. Use this as a starting point and modify the properties to produce your own unique look. If you require flyout menus, create your own using a Spry menu, a menu widget from Adobe's Exchange or a variety of other javascript or CSS solutions.</p>
                                <p>If you would like the navigation along the top, simply move the ul.nav to the top of the page and recreate the styling.</p>
                                <!-- end .sidebar1 --></div>
                              <div style="padding: 10px 0;width: 600px;float: left;">
                                <h1 style="margin-top: 0;padding-right: 15px;padding-left: 15px;">Instructions</h1>
                                <p>Be aware that the CSS for these layouts is heavily commented. If you do most of your work in Design view, have a peek at the code to get tips on working with the CSS for the fixed layouts. You can remove these comments before you launch your site. To learn more about the techniques used in these CSS Layouts, read this article at Adobe's.</p>
                                <h2 style="margin-top: 0;padding-right: 15px;padding-left: 15px;">Clearing</h2>
                                <p>Because all the columns are floated, this layout uses overflow:hidden on the .container. This clearing technique forces the .container to understand where the columns end in order to show any borders or background colors you place on the .container. If you have a large element that protrudes outside the .container, it will appear to be cut off. You also won't be able to use negative margins or absolute positioning with negative values to pull elements outside the .container or they will also won't display outside the .container.</p>
                                <p>If you need to use these properties, you'll need to use a different clearing method. The most reliable will be to add a &lt;br class=&quot;clearfloat&quot; /&gt; or &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; after your final floated column (but before the .container closes). This will have the same clearing effect.</p>
                                <h3 style="margin-top: 0;padding-right: 15px;padding-left: 15px;">Footer</h3>
                                <p>Adding a footer following the columns, yet still inside the .container, will cause this overflow:hidden clearing method to fail. You can place a .footer into a second .container outside the first one with no detrimental effects. The simplest choice may be to start with a layout containing headers and footers and remove the header to utilize the clearing methods in that layout type.</p>
                                <!-- end .content --></div>
                              <div style="float: left;width: 180px;background: #EADCAE;padding: 10px 0;">
                                <h4 style="margin-top: 0;padding-right: 15px;padding-left: 15px;">Backgrounds</h4>
                                <p>By nature, the background color on any div will only show for the length of the content. If you'd like a dividing line instead of a color, place a border on the side of the .content div (but only if it will always contain more content).</p>
    <!-- end .sidebar2 --></div>
  <!-- end .container --></div>
                        </div>
                        
                        
                        <?php /*?>///////////////////////////////for 3 columns wide middel ends/////////////////////////////////<?php */?>
                        
                        <?php /*?> ///////////////////////////////for 3 columns wide right//////////////////////////////////////<?php */?>
                      <div id="three_column_wideright" style="display:none">
                       <div id="container_html" style="width: 960px;background: #FFF;margin: 0 auto; overflow: hidden;">
                        
                          <div style="float: left;width: 225px;padding-bottom: 10px; background-color:#00CCFF">
                            
                              <ul class="nav" style="list-style: none;border-top: 1px solid #666; margin-bottom: 15px;">
                              <li><a href="#">Link one</a></li>
                              <li><a href="#">Link two</a></li>
                              <li><a href="#">Link three</a></li>
                              <li><a href="#">Link four</a></li>
                            </ul>
                            <p> The above links demonstrate a basic navigational structure using an unordered list styled with CSS. Use this as a starting point and modify the properties to produce your own unique look. If you require flyout menus, create your own using a Spry menu, a menu widget from Adobe's Exchange or a variety of other javascript or CSS solutions.</p>
                            <p>If you would like the navigation along the top, simply move the ul.nav to the top of the page and recreate the styling.</p>
                            
                            
                            <!-- end .sidebar1 --></div>
                          <div style="padding: 10px 0;background: #EADCAE;width: 225px;float: left; padding-left:5px;padding-right:5px">
                           
                             <h4 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Backgrounds</h4>
                            <p>By nature, the background color on any div will only show for the length of the content. If you'd like a dividing line instead of a color, place a border on the side of the .content div (but only if it will always contain more content).</p>
                            <!-- end .content --></div>
                          <div style="float: left;width: 500px;background: #ffffff;padding: 10px 0;">
                          
                           <h1 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Instructions</h1>
                            <p>Be aware that the CSS for these layouts is heavily commented. If you do most of your work in Design view, have a peek at the code to get tips on working with the CSS for the fixed layouts. You can remove these comments before you launch your site. To learn more about the techniques used in these CSS Layouts, read this article at Adobe's Developer Center - <a href="http://www.adobe.com/go/adc_css_layouts">http://www.adobe.com/go/adc_css_layouts</a>.</p>
                            <h2 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Clearing</h2>
                            <p>Because all the columns are floated, this layout uses overflow:hidden on the .container. This clearing technique forces the .container to understand where the columns end in order to show any borders or background colors you place on the .container. If you have a large element that protrudes outside the .container, it will appear to be cut off. You also won't be able to use negative margins or absolute positioning with negative values to pull elements outside the .container or they will also won't display outside the .container.</p>
                            <p>If you need to use these properties, you'll need to use a different clearing method. The most reliable will be to add a &lt;br class=&quot;clearfloat&quot; /&gt; or &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; after your final floated column (but before the .container closes). This will have the same clearing effect.</p>
                            <h3 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Footer</h3>
                            <p>Adding a footer following the columns, yet still inside the .container, will cause this overflow:hidden clearing method to fail. You can place a .footer into a second .container outside the first one with no detrimental effects. The simplest choice may be to start with a layout containing headers and footers and remove the header to utilize the clearing methods in that layout type.</p>
                          
                         
                            <!-- end .sidebar2 --></div>
                            
                          <!-- end .container --></div>
                        </div>
                        
                        
                        <?php /*?>///////////////////////////////for 3 columns wide right ends/////////////////////////////////<?php */?>
                        
                        
                         <?php /*?> ///////////////////////////////for 4 columns event div//////////////////////////////////////<?php */?>
                      <div id="four_column_even" style="display:none">
                       <div id="container_html" style="width: 960px;background: #FFF;margin: 0 auto; overflow: hidden;">
                        
                          <div style="float: left;width: 235px;background: #EADCAE;padding-bottom: 10px;">
                            <ul class="nav" style="list-style: none;border-top: 1px solid #666; margin-bottom: 15px;">
                              <li><a href="#">Link one</a></li>
                              <li><a href="#">Link two</a></li>
                              <li><a href="#">Link three</a></li>
                              <li><a href="#">Link four</a></li>
                            </ul>
                            <p> The above links demonstrate a basic navigational structure using an unordered list styled with CSS. Use this as a starting point and modify the properties to produce your own unique look. If you require flyout menus, create your own using a Spry menu, a menu widget from Adobe's Exchange or a variety of other javascript or CSS solutions.</p>
                            <p>If you would like the navigation along the top, simply move the ul.nav to the top of the page and recreate the styling.</p>
                            <!-- end .sidebar1 --></div>
                          <div style="padding: 10px 0;width: 235px;float: left; padding-left:5px;padding-right:5px">
                            <h1 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Instructions</h1>
                            <p>Be aware that the CSS for these layouts is heavily commented. If you do most of your work in Design view, have a peek at the code to get tips on working with the CSS for the fixed layouts. You can remove these comments before you launch your site. To learn more about the techniques used in these CSS Layouts, read this article at Adobe's Developer Center - <a href="http://www.adobe.com/go/adc_css_layouts">http://www.adobe.com/go/adc_css_layouts</a>.</p>
                            <h2 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Clearing</h2>
                            <p>Because all the columns are floated, this layout uses overflow:hidden on the .container. This clearing technique forces the .container to understand where the columns end in order to show any borders or background colors you place on the .container. If you have a large element that protrudes outside the .container, it will appear to be cut off. You also won't be able to use negative margins or absolute positioning with negative values to pull elements outside the .container or they will also won't display outside the .container.</p>
                            <p>If you need to use these properties, you'll need to use a different clearing method. The most reliable will be to add a &lt;br class=&quot;clearfloat&quot; /&gt; or &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; after your final floated column (but before the .container closes). This will have the same clearing effect.</p>
                            <h3 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Footer</h3>
                            <p>Adding a footer following the columns, yet still inside the .container, will cause this overflow:hidden clearing method to fail. You can place a .footer into a second .container outside the first one with no detrimental effects. The simplest choice may be to start with a layout containing headers and footers and remove the header to utilize the clearing methods in that layout type.</p>
                            <!-- end .content --></div>
                          <div style="float: left;width: 235px;background: #EADCAE;padding: 10px 0;;margin-right:5px">
                            <h4 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Backgrounds</h4>
                            <p>By nature, the background color on any div will only show for the length of the content. If you'd like a dividing line instead of a color, place a border on the side of the .content div (but only if it will always contain more content).</p>
                            </div>
                            
                            <div style="float: left;width: 235px;background: #00CCFF;padding: 10px 0;">
                            <h4 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Social Icons</h4>
                            <p>By nature, the background color on any div will only show for the length of the content. If you'd like a dividing line instead of a color, place a border on the side of the .content div (but only if it will always contain more content).</p>
                            </div>
                            
                          <!-- end .container --></div>
                        </div>
                        
                        
                        <?php /*?>///////////////////////////////for 4 columns even div ends/////////////////////////////////<?php */?>
                        
                        <?php /*?> ///////////////////////////////for 4 columns wide left//////////////////////////////////////<?php */?>
                      <div id="four_column_wideleft" style="display:none">
                       <div id="container_html" style="width: 960px;background: #FFF;margin: 0 auto; overflow: hidden;">
                        
                          <div style="float: left;width: 400px;background: #EADCAE;padding-bottom: 10px;">
                          
                          <h1 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Instructions</h1>
                            <p>Be aware that the CSS for these layouts is heavily commented. If you do most of your work in Design view, have a peek at the code to get tips on working with the CSS for the fixed layouts. You can remove these comments before you launch your site. To learn more about the techniques used in these CSS Layouts, read this article at Adobe's Developer Center - <a href="http://www.adobe.com/go/adc_css_layouts">http://www.adobe.com/go/adc_css_layouts</a>.</p>
                            <h2 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Clearing</h2>
                            <p>Because all the columns are floated, this layout uses overflow:hidden on the .container. This clearing technique forces the .container to understand where the columns end in order to show any borders or background colors you place on the .container. If you have a large element that protrudes outside the .container, it will appear to be cut off. You also won't be able to use negative margins or absolute positioning with negative values to pull elements outside the .container or they will also won't display outside the .container.</p>
                            <p>If you need to use these properties, you'll need to use a different clearing method. The most reliable will be to add a &lt;br class=&quot;clearfloat&quot; /&gt; or &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; after your final floated column (but before the .container closes). This will have the same clearing effect.</p>
                            <h3 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Footer</h3>
                            <p>Adding a footer following the columns, yet still inside the .container, will cause this overflow:hidden clearing method to fail. You can place a .footer into a second .container outside the first one with no detrimental effects. The simplest choice may be to start with a layout containing headers and footers and remove the header to utilize the clearing methods in that layout type.</p>
                          
                            <!-- end .sidebar1 --></div>
                          <div style="padding: 10px 0;width: 180px;float: left; padding-left:5px;padding-right:5px">
                             <h4 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Backgrounds</h4>
                            <p>By nature, the background color on any div will only show for the length of the content. If you'd like a dividing line instead of a color, place a border on the side of the .content div (but only if it will always contain more content).</p>
                            <!-- end .content --></div>
                          <div style="float: left;width: 180px;background: #EADCAE;padding: 10px 0;;margin-right:5px">
                            <h4 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Social Icons</h4>
                            <p>By nature, the background color on any div will only show for the length of the content. If you'd like a dividing line instead of a color, place a border on the side of the .content div (but only if it will always contain more content).</p>
                            </div>
                            
                            <div style="float: left;width: 180px;background: #00CCFF;padding: 10px 0;">
                            <ul class="nav" style="list-style: none;border-top: 1px solid #666; margin-bottom: 15px;">
                              <li><a href="#">Link one</a></li>
                              <li><a href="#">Link two</a></li>
                              <li><a href="#">Link three</a></li>
                              <li><a href="#">Link four</a></li>
                            </ul>
                            <p> The above links demonstrate a basic navigational structure using an unordered list styled with CSS. Use this as a starting point and modify the properties to produce your own unique look. If you require flyout menus, create your own using a Spry menu, a menu widget from Adobe's Exchange or a variety of other javascript or CSS solutions.</p>
                            <p>If you would like the navigation along the top, simply move the ul.nav to the top of the page and recreate the styling.</p>
                            </div>
                            
                          <!-- end .container --></div>
                        </div>
                        
                        
                        <?php /*?>///////////////////////////////for 4 columns wide left ends/////////////////////////////////<?php */?>
                        
                        
                         <?php /*?> ///////////////////////////////for 4 columns wide right//////////////////////////////////////<?php */?>
                      <div id="four_column_wideright" style="display:none">
                       <div id="container_html" style="width: 960px;background: #FFF;margin: 0 auto; overflow: hidden;">
                        
                          <div style="float: left;width: 180px;background: #EADCAE;padding-bottom: 10px;">
                           <ul class="nav" style="list-style: none;border-top: 1px solid #666; margin-bottom: 15px;">

                              <li><a href="#">Link one</a></li>
                              <li><a href="#">Link two</a></li>
                              <li><a href="#">Link three</a></li>
                              <li><a href="#">Link four</a></li>
                            </ul>
                        <p> The above links demonstrate a basic navigational structure using an unordered list styled with CSS. Use this as a starting point and modify the properties to produce your own unique look. If you require flyout menus, create your own using a Spry menu, a menu widget from Adobe's Exchange or a variety of other javascript or CSS solutions.</p>
                            <p>If you would like the navigation along the top, simply move the ul.nav to the top of the page and recreate the styling.</p>
                          
                          
                            <!-- end .sidebar1 --></div>
                          <div style="padding: 10px 0;width: 180px;float: left; padding-left:5px;padding-right:5px">
                             <h4 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Backgrounds</h4>
                            <p>By nature, the background color on any div will only show for the length of the content. If you'd like a dividing line instead of a color, place a border on the side of the .content div (but only if it will always contain more content).</p>
                            <!-- end .content --></div>
                          <div style="float: left;width: 180px;background: #EADCAE;padding: 10px 0;;margin-right:5px">
                            <h4 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Social Icons</h4>
                            <p>By nature, the background color on any div will only show for the length of the content. If you'd like a dividing line instead of a color, place a border on the side of the .content div (but only if it will always contain more content).</p>
                            </div>
                            
                            <div style="float: left;width: 400px;background: #00CCFF;padding: 10px 0;">
                             <h1 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Instructions</h1>
                             
                            
                                <p> The above links demonstrate a basic navigational structure using an unordered list styled with CSS. Use this as a starting point and modify the properties to produce your own unique look. If you require flyout menus, create your own using a Spry menu, a menu widget from Adobe's Exchange or a variety of other javascript or CSS solutions.</p>
                            <p>If you would like the navigation along the top, simply move the ul.nav to the top of the page and recreate the styling.</p>
                            <h2 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Clearing</h2>
                            <p>Because all the columns are floated, this layout uses overflow:hidden on the .container. This clearing technique forces the .container to understand where the columns end in order to show any borders or background colors you place on the .container. If you have a large element that protrudes outside the .container, it will appear to be cut off. You also won't be able to use negative margins or absolute positioning with negative values to pull elements outside the .container or they will also won't display outside the .container.</p>
                            <p>If you need to use these properties, you'll need to use a different clearing method. The most reliable will be to add a &lt;br class=&quot;clearfloat&quot; /&gt; or &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; after your final floated column (but before the .container closes). This will have the same clearing effect.</p>
                            <h3 style="margin-top: 0;padding-right: 15px;padding-left: 15px; ">Footer</h3>
                            <p>Adding a footer following the columns, yet still inside the .container, will cause this overflow:hidden clearing method to fail. You can place a .footer into a second .container outside the first one with no detrimental effects. The simplest choice may be to start with a layout containing headers and footers and remove the header to utilize the clearing methods in that layout type.</p>
                            </div>
                            
                          <!-- end .container --></div>
                        </div>
                        
                        
                        <?php /*?>///////////////////////////////for 4 columns wide right ends/////////////////////////////////<?php */?>
                        
                        <div class="row">
                            <div class="full col span_16">
                                <select id="select_columns_id" class="large" onchange="updateColumns(this)">
                                    <option value="#1-col">1 Columns</option>
                                    <option value="#2-col-even" selected="selected">2 Columns Even</option>
                                    <option value="#2-col-wideleft">2 Columns Wide Left</option>
                                    <option value="#2-col-wideright">2 Columns Wide Right</option>
                                    <option value="#3-col-even">3 Columns Even</option>
                                    <option value="#3-col-wideleft">3 Columns Wide Left</option>
                                    <option value="#3-col-widemiddle">3 Columns Wide Middle</option>
                                    <option value="#3-col-wideright">3 Columns Wide Right</option>
                                    <option value="#4-col-even">4 Columns Even</option>
                                    <option value="#4-col-wideleft">4 Columns Wide Left</option>
                                    <option value="#4-col-wideright">4 Columns Wide Right</option>
                                </select>
                                
                                <br />

                                <ul class="row gutters cardsBoxInsertLayout" id="1-col">
                                	<li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_12">
                                        <div id="column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#1-col #column1Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>      
                                    
    
                                <ul class="row gutters cardsBoxInsertLayout default" id="2-col-even">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_6">
                                        <div id="2-col-even_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#2-col-even_column1Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_6">
                                        <div id="2-col-even_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#2-col-even_column2Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>      
								

                                <ul class="row gutters cardsBoxInsertLayout" id="2-col-wideleft">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_8">
                                        <div id="2-col-wideleft_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#2-col-wideleft_column1Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_4">
                                        <div id="2-col-wideleft_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#2-col-wideleft_column2Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>      

                                <ul class="row gutters cardsBoxInsertLayout" id="2-col-wideright">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_4">
                                        <div id="2-col-wideright_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#2-col-wideright_column1Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_8">
                                        <div id="2-col-wideright_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#2-col-wideright_column2Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>      
                                
                                <ul class="row gutters cardsBoxInsertLayout" id="3-col-even">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_4">
                                        <div id="3-col-even_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-even_column1Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_4">
                                        <div id="3-col-even_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-even_column2Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_4">
                                        <div id="3-col-even_column3Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-even_column3Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>      


                                <ul class="row gutters cardsBoxInsertLayout" id="3-col-wideleft">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_6">
                                        <div id="3-col-wideleft_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-wideleft_column1Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_3">
                                        <div id="3-col-wideleft_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-wideleft_column2Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_3">
                                        <div id="3-col-wideleft_column3Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-wideleft_column3Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>      

                                <ul class="row gutters cardsBoxInsertLayout" id="3-col-widemiddle">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_3">
                                        <div id="3-col-widemiddle_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-widemiddle_column1Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_6">
                                        <div id="3-col-widemiddle_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-widemiddle_column2Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_3">
                                        <div id="3-col-widemiddle_column3Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-widemiddle_column3Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>      

                                <ul class="row gutters cardsBoxInsertLayout" id="3-col-wideright">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_3">
                                        <div id="3-col-wideright_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-wideright_column1Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_3">
                                        <div id="3-col-wideright_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-wideright_column2Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_6">
                                        <div id="3-col-wideright_column3Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#3-col-wideright_column3Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>      


                                <ul class="row gutters cardsBoxInsertLayout" id="4-col-even">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_3">
                                        <div id="4-col-even_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-even_column1Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_3">
                                        <div id="4-col-even_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-even_column2Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_3">
                                        <div id="4-col-even_column3Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-even_column3Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_3">
                                        <div id="4-col-even_column4Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-even_column4Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>      

 
                                <ul class="row gutters cardsBoxInsertLayout" id="4-col-wideleft">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_6">
                                        <div id="4-col-wideleft_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-wideleft_column1Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2">
                                        <div id="4-col-wideleft_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-wideleft_column2Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2">
                                        <div id="4-col-wideleft_column3Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-wideleft_column3Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2">
                                        <div id="4-col-wideleft_column4Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-wideleft_column4Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>      
   
                                <ul class="row gutters cardsBoxInsertLayout" id="4-col-wideright">
	                                <li class="col span_2 hidden">&nbsp;</li>
                                    <li class="col span_2">
                                        <div id="4-col-wideright_column1Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-wideright_column1Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2">
                                        <div id="4-col-wideright_column2Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-wideright_column2Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2">
                                        <div id="4-col-wideright_column3Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-wideright_column3Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_6">
                                        <div id="4-col-wideright_column4Img" class="pill" style="background-image: url('/img/text-lines.png');">&nbsp;</div>
                                        <p class="label">
                                        <select onchange="updateTextVisual(this, '#4-col-wideright_column4Img')">
                                            <option value="text">Text</option>
                                        	<option value="visual">Visual</option>
                                        </select>
                                        </p>
                                    </li>
                                    <li class="col span_2 hidden">&nbsp;</li>
                                </ul>      
                                
                            </div>
                        </div> <!-- Row -->
                        <div class="row">
                            <div class="full col span_16">
                            <div class="smallText">Layout Background</div>
                            	<div>
                                    <select class="large">
                                        <option value="text">Match Browser Width</option>
                                        <option value="visual">Match Page Width</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                            
                        
					</div> <!-- headerSubSubSectionBox -->
                </div> <!-- headerSubSubSection -->
                <!-- END INSERT LAYOUT BOX -->
                


				<!-- START INSERT REPEAT BOX -->
                <div class="headerSubSubSection" id="websites-pages-manage--insert_repeat">
                	
                    <div class="headerSubSubSectionBox">
                	
                        <div class="row">
                            <div class="subSubSectionTitle col span_7">Insert Repeat</div>
                            <div class="boxButtons col span_9">
                            	<a href="javascript:void(0)"><button type="button" id="cancel_repeat_btn" class="cancel">Cancel</button></a>
                                <button type="button" id="save_btn_repeat" class="save">Save</button>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="full col span_16">
    <form method="post" enctype="multipart/form-data" name="search_form" id="search_form">
                                <ul class="filters">
                                    <li id="searchButtonLI">
                                    <input  id="input_repeat_id" type="text" name="txt_search" type="text" placeholder="Search">
                                    <button id="searchButton" class="searchButton_repeat" type="button" name="searchButton" value=""></button>
                                    </li>
                                    <li><select id="lst_filter_repeat" name="lst_filter" onchange="submit_change_repeat_val(this.value)" >
                                        <option value="2">All</option>
                                        <option value="1">Active</option>
                                        <option value="0">Paused</option>
                                        </select>
                                    </li>
                                    <li><button id="all_repeats" type="button">All</button></li>
                                </ul>                                
                                </form>


								<input type="hidden" id="hidden_content" value="" />
                                <ul class="cardsBox" id="websites_repeats">
                           
                                </ul>      
                                    
    
                                   
                            </div>
                        </div> <!-- Row -->
                        <div class="row">
                            <div class="full col span_16">
                            	<div class="pages">
	                            	<?php /*?>< 1 2 3 <span class="selected">4</span> 5 6 ><?php */?>
                                </div>
                            </div>
                        </div>
                            
                        
					</div> <!-- headerSubSubSectionBox -->
                </div> <!-- headerSubSubSection -->
                <!-- END INSERT REPEAT BOX -->
                


				<!-- START INSERT CHARACTER BOX -->
                <div class="headerSubSubSection" id="websites-pages-manage--insert_character">
                	
                    <div class="headerSubSubSectionBox">
                	
                        <div class="row">
                            <div class="subSubSectionTitle col span_7">Insert Character</div>
                            <div class="boxButtons col span_9">
                            	<a href="javascript:void(0)"><button type="button" id="cancel_character_btn" class="cancel">Cancel</button></a>
                                <button type="button" id="save_character_btn" class="save">Save</button>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="full col span_16">
    
                                <?php /*?><ul class="filters">
                                    <li><select>
                                        <option>Filter</option>
                                        <option>Active</option>
                                        <option>Paused</option>
                                        </select>
                                    </li>
                                    <li><button type="button">All</button></li>
                                </ul>           <?php */?>                     
                                
								<input type="hidden" id="hidden_character_id" value="" />


                                <ul class="cardsBox" id="character_id">
                                    <li class="selected">
                                        <p class="character"><samp id="#">#</samp><br />
                                        <span class="description">Anchor</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="character"><samp id="&copy;">&copy;</samp></p>
                                    </li>
                                    <li>
                                        <p class="character"><samp id="&reg;">&reg;</samp><br />
                                        <span class="description">Registered Mark</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="character"><samp id="&trade;">&trade;</samp><br />
                                        <span class="description">Trade Mark</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="character"><samp id="&bull;">&bull;</samp><br />
                                        <span class="description">Bullet</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="character"><samp id="&hellip;">&hellip;</samp><br />
                                        <span class="description">Ellipse</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="character"><samp id="&ndash;">&ndash;</samp><br />
                                        <span class="description">En Dash</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="character"><samp id="&mdash;">&mdash;</samp><br />
                                        <span class="description">Em Dash</span>
                                        </p>
                                    </li>
                                    <!--
                                    <li>
                                        <p class="character">&divide;<br />
                                        <span class="description">Divide Sign</span>
                                        </p>
                                    </li>
                                    -->
                                    
                                    
                                </ul>      

                                   
                            </div>
                        </div> <!-- Row -->
                        <div class="row">
                            <div class="full col span_16">
                            	<div class="pages">
	                            	<?php /*?>< <span class="selected">1</span> 2 ><?php */?>
                                </div>
                            </div>
                        </div>
                            
                        
					</div> <!-- headerSubSubSectionBox -->
                </div> <!-- headerSubSubSection -->
                <!-- END INSERT CHARACTER BOX -->
                



				<!-- START VIEW BOX -->
                <div class="headerSubSubSection" id="websites-pages-manage--view">
                	
                    <div class="headerSubSubSectionBox">
                	
                        <div class="row">
                            <div class="subSubSectionTitle col span_7">View</div>
                            <div class="boxButtons col span_9">
                            	<a href="javascript:void(0)"><button type="button" id="cancel_view" class="cancel">Cancel</button></a>
                                <button type="button" id="save_view" class="save">Save</button>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="full col span_16">
                                <div class="smallText" style="text-align:left;">Page Code</div>
                                
                                <div class="codeBox">
                                    <form>
<textarea id="view_text"></textarea>
                                    </form>
                                </div>

    
                            </div> <!-- Right -->
                        </div> <!-- Row -->
                            
                        
					</div> <!-- headerSubSubSectionBox -->
                </div> <!-- headerSubSubSection -->
                <!-- END VIEW BOX -->


                
        
                <?php 
//$data_editor=$content_data;
$data_editor='';
if(isset($query) && $query!=''){
$data_editor=stripslashes($query);	
}
$edit_id=$this->uri->segment(3);
if($edit_id==''){
$edit_id=$id_edit;
}
?>
                
                <!--- CH WEBSITE HOME -->
                <div class="codeBox">
                <form id="form_editor" action="<?php echo base_url() ?>pages_controller/update" method="post">
                <input type="hidden" name="page_id" id="page_id" value="<?php echo $edit_id; ?>" />
                <?php echo $this->ckeditor->editor("editor1",$data_editor); ?>
               
                </form>
                </div>
                <!-- CH WEBSITE HOME END -->
                



        
                </main><!-- END OF contentContainer -->
                
                
                
                
                
</div>
<style>
.bold{font-weight:bold;}
</style>
<script type="text/javascript">
/*function heading_change(heading_style){
							
							var text = "";
								if (window.getSelection) {
									text = window.getSelection().toString();
								} else if (document.selection && document.selection.type != "Control") {
									text = document.selection.createRange().text;
								}

    									alert(text);  
						}*/
						
function submit_change_val(select_value){
var selected_value = $('#selected_value').val(select_value);
var	inputValue = $('#input_id').val();

$('#input_value').val(inputValue);
$.ajax({
			url: '<?php echo base_url(); ?>pages_controller/page_ajax_search',
			type: 'POST',
			data: 'selected_value='+select_value+'&txt_search='+inputValue,
			success: function(data) {
				$('#websites_pages').html(data);
			}
		});
//$('#search_form').submit();
}

////////////////for images function search////////////////

function submit_change_image_val(select_value){
var selected_value = $('#selected_value').val(select_value);
var	inputValue = $('#input_image_id').val();

$('#input_image_id').val(inputValue);
$.ajax({
			url: '<?php echo base_url(); ?>website_file_controller/file_search_ajax',
			type: 'POST',
			data: 'lst_filter='+select_value+'&txt_search='+inputValue,
			success: function(data) {
				$('#websites_images').html(data);
			}
		});
//$('#search_form').submit();
}


//////////////for repeats function search//////////////////////

function submit_change_repeat_val(select_value){

var	inputValue = $('#input_repeat_id').val();

$('#input_image_id').val(inputValue);
$.ajax({
			url: '<?php echo base_url(); ?>repeat_controller/repeat_search_ajax',
			type: 'POST',
			data: 'lst_filter='+select_value+'&txt_search='+inputValue,
			success: function(data) {
				$('#websites_repeats').html(data);
			}
		});
//$('#search_form').submit();
}

////////////////////////////////////////////////////////////

///////////////function ends///////////////////////////////

$(document).ready(function(){
	
/*	$('#video_title').hide();
	$('#video_height').hide();
	$('#video_width').hide();*/
	
	                                      ///////////////////pages //////////////////////starts//////////////////////////////
////////////for all pages////////////////////////

$('#all_pages').click(function(){
	$.ajax({
				url: '<?php echo base_url(); ?>pages_controller/all_pages_ajax',
				type: 'POST',
				data: '',
				success: function(data) {
					$('#websites_pages').html(data);
					$('#lst_filter').val('2');
					$('#input_id').val('');
				}
			});
});

/////////////////////////////////////////////////	
	
/////////////for page search button//////////////////	
$('.searchButton_pages').click(function(){
	var	inputValue = $('#input_id').val();
	var	select_value = $('#lst_filter').val();
	$.ajax({
				url: '<?php echo base_url(); ?>pages_controller/page_ajax_search',
				type: 'POST',
				data: 'selected_value='+select_value+'&txt_search='+inputValue,
				success: function(data) {
					$('#websites_pages').html(data);
					
				}
			});
});
////////////////////////////////////	
$('#websites_pages').css('display','none');
$('#page_link_id').click(function(){
	




	
	$.ajax({
			url: '<?php echo base_url(); ?>pages_controller/get_pages',
			type: 'GET',
			success: function(data) {
				$('#websites_pages').html(data);
			}
	});
});

$('#cancel_btn_page').click(function(){
	$('#websites-pages-manage--insert_link').hide();
});

$('#select_page_btn_id').click(function(){
	$('#search_pages').css('display','block');
	$('#websites_pages').css('display','block');
});

                           //////////////////////////pages//////////////////////ends/////////////////////////////////////////////////////
////////////////////images starts//////////////////////////
$('#select_image_btn_id').click(function(){
	$('#search_images').css('display','block');
	$('#websites_images').css('display','block');
});

$('#websites_images').css('display','none');
$('#image_link_id').click(function(){
	$.ajax({
			url: '<?php echo base_url(); ?>website_file_controller/get_images',
			type: 'GET',
			success: function(data) {
				$('#websites_images').html(data);
			}
	});
});

$('#all_images').click(function(){
	$.ajax({
				url: '<?php echo base_url(); ?>website_file_controller/get_images',
				type: 'POST',
				data: '',
				success: function(data) {
					$('#websites_images').html(data);
					$('#lst_filter_img').val('2');
					$('#input_image_id').val('');
				}
			});
});




/////////////for images search button//////////////////	
$('.searchButton_images').click(function(){
	var	inputValue = $('#input_image_id').val();
	var	select_value = $('#lst_filter_img').val();
	$.ajax({
				url: '<?php echo base_url(); ?>website_file_controller/file_search_ajax',
				type: 'POST',
				data: 'lst_filter='+select_value+'&txt_search='+inputValue,
				success: function(data) {
					$('#websites_images').html(data);
					
				}
			});
});
////////////////////////////////////	

//////////////////cancel images//////////////////////

$('#cancel_image').click(function(){
	$('#websites-pages-manage--insert_image').hide();
});

/////////////////////////////////////////////////////

////////////save images/////////////////////////

$('#save_btn_image').click(function(){
	var image_source=$('#path_image').val();
	var image_title=$('#title_image').val();
	var image_height=$('#height_image').val();
	var image_width=$('#width_image').val();
	
	var text = CKEDITOR.instances.editor1.getData();
	
	CKEDITOR.instances['editor1'].insertHtml('<img src="'+image_source+'" title="'+image_title+'" width="'+image_width+'" height="'+image_height+'" />');
		//CKEDITOR.instances.editor1.setData(text+'<img src="'+image_source+'" title="'+image_title+'" width="'+image_width+'" height="'+image_height+'" />');
		$('#websites-pages-manage--insert_image').css('display','none');
});

//////////////////////////////////////////

//////////////////images ends////////////////////////////

						/////////////////////////repeats//////////////////////////starts////////////////////////////////



$('#repeat_link_id').click(function(){
	//var repeat_id='';
	var repeat_id='<?php echo $this->uri->segment(3); ?>';
	if(repeat_id==''){
		repeat_id=$('#page_id').val();
	}
	$.ajax({
			url: '<?php echo base_url(); ?>repeat_controller/get_repeats',
			type: 'GET',
			success: function(data) {
				$('#websites_repeats').html(data);
			}
	});
	
	
	
});


$('#all_repeats').click(function(){
	$.ajax({
				url: '<?php echo base_url(); ?>repeat_controller/get_repeats',
				type: 'POST',
				data: '',
				success: function(data) {
					$('#websites_repeats').html(data);
					$('#lst_filter_repeat').val('2');
					$('#input_repeat_id').val('');
				}
			});
});




/////////////for repeat search button//////////////////	
$('.searchButton_repeat').click(function(){
	var	inputValue = $('#input_repeat_id').val();
	var	select_value = $('#lst_filter_repeat').val();
	$.ajax({
				url: '<?php echo base_url(); ?>repeat_controller/repeat_search_ajax',
				type: 'POST',
				data: 'lst_filter='+select_value+'&txt_search='+inputValue,
				success: function(data) {
					$('#websites_repeats').html(data);
					
				}
			});
});
////////////////////////////////////	

//////////////cancel repeat///////////////////

$('#cancel_repeat_btn').click(function(){
	$('#websites-pages-manage--insert_repeat').hide();
});

/////////////////////////////////////////////

////////////save repeats/////////////////////////

$('#save_btn_repeat').click(function(){

	var insert_repeat_text=$('#hidden_content').val();
	
	CKEDITOR.instances['editor1'].insertHtml(insert_repeat_text);
	$('#websites-pages-manage--insert_repeat').hide();
	/*var image_source=$('#path_image').val();
	var image_title=$('#title_image').val();
	var image_height=$('#height_image').val();
	var image_width=$('#width_image').val();
	
	var text = CKEDITOR.instances.editor1.getData();
	
	
	
	CKEDITOR.instances.editor1.setData(text+'<img src="'+image_source+'" title="'+image_title+'" width="'+image_width+'" height="'+image_height+'" />');
		$('#websites-pages-manage--insert_image').css('display','none');*/
});

//////////////////////////////////////////						
						
						//////////////////////repeats/////////////////////////////ends////////////////////////////////

$('#save_editor').click(function(){
$('#form_editor').submit();
});
$('#cancel_editor').click(function(){
	CKEDITOR.instances.editor1.setData('');
});

$('#bold_pages').click(function(){

var text = CKEDITOR.instances.editor1.getData();
CKEDITOR.instances.editor1.setData('<span style="font-weight:bold">'+text+'</span>');

		
});

$('#italic_pages').click(function(){
var text = CKEDITOR.instances.editor1.getData();
CKEDITOR.instances.editor1.setData('<span style="font-style:italic">'+text+'</span>');	
});

$('#save_btn_page').click(function(){
	var select_link_id=$('#link_select_id').val();
	var select_link_window_id=$('#link_select_window_id').val();
	var select_link_styple_id=$('#link_select_style_id').val();
	var text_link_destination_id=$('#link_destination_id').val();
	var link_text_id=$('#link_text_id').val();
	var text = CKEDITOR.instances.editor1.getData();
	
	
	var link_to='';
	if(select_link_id==2){
		link_to='mailto:';
	}
	
	if(select_link_window_id=='same'){
	open_window='_parent';
	}else{
	open_window='_blank';	
	}
	if(CKEDITOR.instances['editor1'].getSelection().getNative()!=''){
	CKEDITOR.instances['editor1'].insertHtml('<a target="'+open_window+'" href="'+link_to+text_link_destination_id+'">' + CKEDITOR.instances['editor1'].getSelection().getNative() + '</a>');
	}else{
	CKEDITOR.instances['editor1'].insertHtml('<a target="'+open_window+'" href="'+link_to+text_link_destination_id+'">'+link_text_id+'</a>');
	}
		$('#websites-pages-manage--insert_link').css('display','none');
});

									/////////////////////////////for videos///////////////////////////////////////
				
				//////////////////////for cancel video///////////////////////
				
				$('#video_cancel').click(function(){
					$('#websites-pages-manage--insert_video').css('display','none');
				});
				
				///////////////////////////cancel videos ends//////////////////


$('#video_link_id').click(function(){
	
	$('#video_source').val('');
	$('#video_title').val('');
	$('#video_height').val('');
	$('#video_width').val('');
	$('#video_embed_code').val('');
	$('#video_code_embed').css('display','block');
	$('#websites_videos').css('display','none');
	$('#vidoe_embed_text').show();
	
});		
									
$('#embed_video_btn').click(function(){
	$('#video_code_embed').css('display','block');
	$('#video_embed_code').val('');
	$('#websites_videos').css('display','none');
	$('#vidoe_embed_text').show();
	$('#video_title').hide();
	$('#video_height').hide();
	$('#video_width').hide();
	$('#video_source').val('');
	
});		

$('#video_source').keypress(function(){
	$('#select_video_btn').hide();
	$('#embed_video_btn').hide();
	$('.orButton').hide();
	$('#video_embed_code').val('');
	$('#video_embed_code').hide();
});

$('#video_source').blur(function(){
	var text=$('#video_source').val();
	if(text==''){
	$('#select_video_btn').show();
	$('#embed_video_btn').show();
	$('.orButton').show();
	$('#video_embed_code').show();
	}
});

$('#video_embed_code').keypress(function(){
	
	$('#video_source').val('');
});

$('#select_video_btn').click(function(){
	
	$('#video_code_embed').css('display','none');
	$('#websites_videos').css('display','block');
	
	$.ajax({
			url: '<?php echo base_url(); ?>website_file_controller/get_videos',
			type: 'GET',
			success: function(data) {
				$('#websites_videos').html(data);
			}
	});
	$('#vidoe_embed_text').hide();
	$('#video_embed_code').val('');
	$('#video_source').val('');
	$('#video_title').val('');
	$('#video_height').val('');
	$('#video_width').val('');
	$('#video_title').show();
	$('#video_height').show();
	$('#video_width').show();
});

$('#video_save_btn').click(function(){
	var source_video=$('#video_source').val();
	var title_video=$('#video_title').val();
	var height_video=$('#video_height').val();
	var width_video=$('#video_width').val();
	var custom_style_video=$('#custom_style').val();
	
	if(height_video==''){height_video=360;}
	if(width_video==''){width_video=640;}
	
	var source_video_set='';
	
	source_video_set='<iframe src="'+source_video+'" title="'+title_video+'" height="'+height_video+'" width="'+width_video+'"></iframe>';
	
	var source_embed_video='';

	source_embed_video=$('#video_embed_code').val();
	if(source_embed_video!=''){
	CKEDITOR.instances['editor1'].insertHtml(source_embed_video);	
	}
	
	var text = CKEDITOR.instances.editor1.getData();
	
	CKEDITOR.instances['editor1'].insertHtml(source_video_set);
    $('#websites-pages-manage--insert_video').css('display','none');
});
						
									//////////////////////////////videos end here///////////////////////////////////

									/////////////////////////character starts here////////////////////////////////


$('#character_id li').click(function(){
	$('#character_id li').removeClass('selected');
	$(this).addClass('selected');
});

$('#save_character_btn').click(function(){
	
	var anchor_sign=$('#anchor').text();
	var copy_sign=$('#copy').text();
	var registered_sign=$('#reg_mark').text();
	var trademark_sign=$('#trade_mark').text();
	var bullet_sign=$('#bullet').text();
	var ellipse_sig=$('#ellipse').text();
	var en_sign=$('#en_dash').text();
	var em_sign=$('#em_dash').text();
	
	var value='';
	$('#character_id li').each(function(){
		if($(this).hasClass('selected')){
			
			var value=$(this).find("samp").attr('id');
			$('#hidden_character_id').val(value);
			
		}
	});
	
    var character_value=$('#hidden_character_id').val();
	var text = CKEDITOR.instances.editor1.getData();
	
		//CKEDITOR.instances.editor1.setData(text+character_value);
		CKEDITOR.instances['editor1'].insertText(character_value);
		$('#websites-pages-manage--insert_character').css('display','none');
	

	
});	

$('#cancel_character_btn').click(function(){
	$('#websites-pages-manage--insert_character').hide();
});

									///////////////////////character ends here//////////////////////////////////
});
///////////////for pages//////////////////
function set_url_page(page_id){
	$('#link_destination_id').val('<?php echo base_url()?>pages_controller/page_setting/'+page_id);
	$('#websites_pages li').removeClass('selected');
	$('#pages_id_'+page_id).addClass('selected');
//alert(page_id);	
}

////////////for images/////////////////

function set_url_image(image_id,image_source){
	$('#path_image').val(image_source);
	$('#websites_images li').removeClass('selected');
	$('#images_id_'+image_id).addClass('selected');
//alert(page_id);	
}

/////////////////end////////////////

////////////for repeats////////////////////

function set_url_repeat(repeat_id){

	$('#websites_repeats li').removeClass('selected');
	$('#repeat_id_'+repeat_id).addClass('selected');
	
	$.ajax({
			url: '<?php echo base_url(); ?>pages_controller/select_repeat_content',
			type: 'POST',
			data: 'id_repeat='+repeat_id,
			success: function(data) {
				$('#hidden_content').val(data);
				
				//$('#websites_videos').html(data);
			}
	});
//alert(page_id);	
}

//////////////repeats end///////////////////

////////////for videos//////////////////

function set_url_video(video_id,video_source){
	$('#video_source').val(video_source);
	$('#websites_videos li').removeClass('selected');
	$('#videos_id_'+video_id).addClass('selected');
//alert(page_id);	
}

/////////////videos ends//////////////////
/////////////////for options//////////////////
$('#option_link_href').click(function(){
	//$('#heading_option_id').show();
	  //Get the dropdownlist total item count

});

$('#option_link').click(function(){
	
	$('#heading_hidden_id').val('');
	$('#alignment_hidden_id').val('');
	$('#list_hidden_id').val('');
	$('#style_hidden_id').val('');


    $('#heading_option_id').val('');
	$('#allignment').val('');
	$('#listing').val('');
	$('#styles').val('');

      
	
});
$('#cancel_option').click(function(){
	$('#websites-pages-manage--format_options').css('display','none');
});
$('#save_btn_option').click(function(){

	value_select = $('#heading_option_id').val();
    
	value_alignment=$('#allignment').val();
	value_bullet=$('#listing').val();
	value_style=$('#styles').val();
	$('#websites-pages-manage--format_options').css('display','none');
	/////////////////////for alignment/////////////////////
	
									   
										if(value_alignment=='left'){
											CKEDITOR.tools.callFunction(24, this);
											
										}
										if(value_alignment=='center'){
											CKEDITOR.tools.callFunction(27, this);
										}
										if(value_alignment=='right'){
											
											CKEDITOR.tools.callFunction(30, this);
											
										}
										if(value_alignment=='justify'){
											CKEDITOR.tools.callFunction(21, this);
										}
										if(value_alignment=='indent'){
											CKEDITOR.tools.callFunction(33, this);
										}
										if(value_alignment=='clear'){
											CKEDITOR.tools.callFunction(42, this);
										}		
									
	///////////////////alignment ends here////////////////////
	
	///////////////bullet starts here////////////////////////
	
	if(value_bullet=='bullet'){
		  CKEDITOR.tools.callFunction(39, this);
	  }
	  if(value_bullet=='number'){
		  CKEDITOR.tools.callFunction(36, this);
	  }
	
	
	///////////////bullet ends herer//////////////////////////
	
	//////////for more style starts here/////////////////////
	
	if(value_style=='underline'){
		CKEDITOR.tools.callFunction(12, this);
	}
	if(value_style=='strikethrough'){
		CKEDITOR.tools.callFunction(15, this);
	}
	if(value_style=='superscript'){
		CKEDITOR.tools.callFunction(48, this);
	}
	if(value_style=='subscript'){
		CKEDITOR.tools.callFunction(45, this);
	}
	if(value_style=='clearformat'){
		CKEDITOR.tools.callFunction(42, this);
	}
	
	///////////style ends herer////////////////////
	
	if(value_select=='p'){
		CKEDITOR.tools.callFunction(55, 'p');								
		}
	if(value_select=='h1'){
		
		CKEDITOR.tools.callFunction(55, 'h1');
	}
	if(value_select=='h2'){
		CKEDITOR.tools.callFunction(55, 'h2');
	}
	if(value_select=='h3'){
		CKEDITOR.tools.callFunction(55, 'h3'); 
		
	}
	if(value_select=='h4'){
		CKEDITOR.tools.callFunction(55, 'h4'); 
		
	}
	if(value_select=='h5'){
		CKEDITOR.tools.callFunction(55, 'h5');
		
	}
	if(value_select=='h6'){
		CKEDITOR.tools.callFunction(55, 'h6');
		
	}
	

});

///////////////options ends here//////////////////
/////////////for view section/////////////
$('#view_html').click(function(){
	var text = CKEDITOR.instances.editor1.getData();
	$('#view_text').val(text);
	
});

$('#save_view').click(function(){
	text=$('#view_text').val();
	CKEDITOR.instances.editor1.setData(text);
	$('#websites-pages-manage--view').css('display','none');
});

$('#cancel_view').click(function(){
	$('#websites-pages-manage--view').css('display','none');
});
////////////////view ends////////////////
///////////for layout starts here/////////////////////
/*$('#pages_layout_id').click(function(){
	
});*/

$('#save_layout').click(function(){
	
	var current_value=$('#select_columns_id').val();
	
	if(current_value=='#1-col'){
	var text=$('#one_column_id').html();
	CKEDITOR.instances['editor1'].insertHtml(text);	
	}
	if(current_value=='#2-col-even'){
		var text=$('#two_column_even').html();
		
		
		CKEDITOR.instances['editor1'].insertHtml(text);	
	}
	if(current_value=='#2-col-wideleft'){
		var text=$('#two_column_wideleft').html();
		CKEDITOR.instances['editor1'].insertHtml(text);	
	}
	if(current_value=='#2-col-wideright'){
		var text=$('#two_column_wideright').html();
		CKEDITOR.instances['editor1'].insertHtml(text);	
	}
	if(current_value=='#3-col-even'){
		var text=$('#three_column_even').html();
		CKEDITOR.instances['editor1'].insertHtml(text);	
	}
	if(current_value=='#3-col-wideleft'){
		var text=$('#three_column_wideleft').html();
		CKEDITOR.instances['editor1'].insertHtml(text);	
	}
	if(current_value=='#3-col-widemiddle'){
		var text=$('#three_column_widemiddle').html();
		CKEDITOR.instances['editor1'].insertHtml(text);	
		
	}
	if(current_value=='#3-col-wideright'){
		var text=$('#three_column_wideright').html();
		CKEDITOR.instances['editor1'].insertHtml(text);	
	}
	if(current_value=='#4-col-even'){
		var text=$('#four_column_even').html();
		CKEDITOR.instances['editor1'].insertHtml(text);	
	}
	if(current_value=='#4-col-wideleft'){
		var text=$('#four_column_wideleft').html();
		CKEDITOR.instances['editor1'].insertHtml(text);	
	}
	if(current_value=='#4-col-wideright'){
		var text=$('#four_column_wideright').html();
		CKEDITOR.instances['editor1'].insertHtml(text);	
	}
	$('#websites-pages-manage--insert_layout').css('display','none');
});

$('#cancel_layout').click(function(){
	$('#websites-pages-manage--insert_layout').css('display','none');
});

//////////////layout ends here/////////////////////////


</script>
</body>
</html>