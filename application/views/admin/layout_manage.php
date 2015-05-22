<?php /* include('code-demo.php');

if(!isset($_GET['page'])) $page = "account";
else $page = $_GET['page'];

$subPage = $_GET['subPage'];
*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Manage Layout</title>
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
 ?>
<div class="container">
    <div id="splitPaneLeftContainer"></div>
    <div id="splitPaneRightContainer"></div>

<?php if(isset($version_data)){ $data_lenght= count($version_data); }?>
	<!-- Push Wrapper -->
    <div class="mp-pusher" id="mp-pusher">

        <!-- mp-menu -->
        <nav id="mp-menu" class="mp-menu" >
            <div class="mp-level">
                <h2 class="icon icon-world">Layout</h2>
                

                	<ul class="leftPaneFilters">
                    	
                    	<li id="searchButtonLI">
                        <form>
                        <input type="text" placeholder="Search"/>
                        <button id="searchButton" type="submit" name="searchButton" value=""></button>
                        </form>
                        </li>
                        <li><select>
                        		<option>New Version</option>
                                <option>Same Version</option>
                        	</select>
                        </li>
                        <li><button type="button" />Save</button></li>
                    </ul>
                    
                    <div class="leftPaneFiltersDetails">
                    	<p class="version_text"></p>
                    </div>
                    
                	<div class="codeBox">
                    	<form>
                        	<textarea><?=$codeText?></textarea>
                        </form>
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
                    <div class="row">
                        <div id="splitPaneLeft" class="col span_8">
                        
                            <ul class="leftPaneFilters">
                                
                                <li id="searchButtonLI">
                                <form action="<?php echo base_url()?>layout_controller/edit_source" method="post">
                                <input type="text" placeholder="Search"/>
                                <button id="searchButton" type="submit" name="searchButton" value=""></button>
                                </li>
		                        <li><select name="lst_action">
		                                <option value="new">New Version</option>
		                                <option selected="selected" value="same">Same Version</option>
		                        	</select>
		                        </li>
		                        <li><button type="submit" />Save</button></li>
		                    </ul>
                            
                            <div class="leftPaneFiltersDetails">
                                <p id="version_text"></p>
                            </div>
                            
		                	<div class="codeBox">
		                        	<textarea id="source_area" cols="15" rows="25" name="text_source"></textarea>
									<input type="hidden" value="" id="return_id" name="source_id" />
									<input type="hidden" value="" id="type_id" name="source_type" />
									<input type="hidden"  name="texthidden"  value="<?php if(isset($query)) { echo $query[0]->layout_id; } else { echo $this->uri->segment(3); } ?>" />
		                        </form>
							</div>
        
                        </div>
                        <!-- END OF splitPaneLeft -->
        
        
                        <div class="col span_8" id="splitPaneRight">
                        
                            <?php if(isset($title_row[0]->layout_title)){ ?>
                            <h2 class="edit" id="edit"><?php echo $title_row[0]->layout_title;?></h2>
                             <input type="hidden" id="layout_id" name="layout_id" value="<?php echo $title_row[0]->layout_id; ?>" />
                            <?php } ?>
                                    
       						<form method="post" action="<?php echo base_url(); ?>layout_controller/save_layout" id="my_form" enctype="multipart/form-data">
<!-- Source -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Source</h3><div class="splitPlaneQuickDetails">Expand to view and edit HTML.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Version</div>
                                        <div class="formInfo col span_6">
                                            <select class="html_select" id="html_id" name="lst_html_version">
                                            <?php if(isset($data_lenght)){ 
											for($i=0; $i<$data_lenght; $i++)
											{?>
                                            
                                            <?php  if($version_data[$i]->content_type=='html') { ?>
                                             <option <?php if(isset($version_data[$i]->set_default) && $version_data[$i]->set_default==1){ echo 'selected=selected';} ?> value="<?php echo $version_data[$i]->layout_data_id;?>_html"><?php echo $version_data[$i]->version; ?></option>
                                           <?php } } } ?>     
                                            </select>    
                                        </div>
                                        <div class="formInfo col span_6"><button id="edit_source" />Edit Source</button></div>
                                    </li>
                                </ul>
                            </div>
<!-- Styles -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Styles</h3><div class="splitPlaneQuickDetails" id="form_html_id">Expand to view and edit CSS.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Version</div>
                                        <div class="formInfo col span_6">
                                            <select class="css_html" id="css_id" name="lst_css_version">
                                            <?php if(isset($data_lenght)){ for($i=0; $i<$data_lenght; $i++)
											{?>
                                             <?php  if($version_data[$i]->content_type=='css') { ?>
                                             <option <?php if(isset($version_data[$i]->set_default) && $version_data[$i]->set_default==1){ echo 'selected=selected';} ?> value="<?php echo $version_data[$i]->layout_data_id; ?>_css"><?php echo $version_data[$i]->version; ?></option>
                                           <?php } } } ?>     
                                            </select>                                
                                        </div>
                                        <div class="formInfo col span_6"><button id="edit_styles" />Edit Styles</button></div>
                                    </li>
                                </ul>
                            </div>
<!-- Scripts -->                            
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Script</h3><div class="splitPlaneQuickDetails" id="form_css_id">Expand to view and edit scripts.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Version</div>
                                        <div class="formInfo col span_6">
                                            <select class="script_html" id="script_id" name="lst_script_version">
                                            
                                            <?php if(isset($data_lenght)){ for($i=0; $i<$data_lenght; $i++)
											{?>
                                        	<?php  if($version_data[$i]->content_type=='javascript') { ?>

                                             <option <?php if(isset($version_data[$i]->set_default) && $version_data[$i]->set_default==1){ echo 'selected=selected';} ?> value="<?php echo $version_data[$i]->layout_data_id; ?>_javascript"><?php echo $version_data[$i]->version; ?></option>
                                           <?php } } } ?>     
                                            </select>                                
                                        </div>
                                        <div class="formInfo col span_6"><button id="edit_scripts" />Edit Scripts</button></div>
                                    </li>
                                </ul>
                            </div>
<!-- Containers -->
                            <div class="splitPaneRightRow">
                                <h3  onclick="showSplitPlaneRow(this);">Containers</h3><div class="splitPlaneQuickDetails">Expand to view application tags.</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_6">[OrgName]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_label)){ echo $data_account[0]->agency_profile_label;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[OrgLogoColor]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_logo_color)){ echo $data_account[0]->agency_profile_logo_color;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[OrgLogoReverse]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_logo_reverse)){ echo $data_account[0]->agency_profile_logo_reverse;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[Address]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_address_address)){ echo $data_account[0]->agency_profile_address_address;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[City]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_address_city)){ echo $data_account[0]->agency_profile_address_city;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[State]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_address_state)){ echo $data_account[0]->agency_profile_address_state;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[Zip]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_address_zip)){ echo $data_account[0]->agency_profile_address_zip;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[Country]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_address_country)){ echo $data_account[0]->agency_profile_address_country;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[Timezone]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_timezone_timezone)){ echo $data_account[0]->agency_profile_timezone_timezone;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[Phone]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_phone_phone)){ echo $data_account[0]->agency_profile_phone_phone;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[SecPhone]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_phone_alternate_phone)){ echo $data_account[0]->agency_profile_phone_alternate_phone;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[Email]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_email_email)){ echo $data_account[0]->agency_profile_email_email;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[SecEmail]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_email_alternate_email)){ echo $data_account[0]->agency_profile_email_alternate_email;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[WebAddress]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_domains_domain)){ echo $data_account[0]->agency_profile_domains_domain;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[SecWebAddress]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_domains_blog_domain)){ echo $data_account[0]->agency_profile_domains_blog_domain;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[TerWebAddress]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_domains_alternate_domain)){ echo $data_account[0]->agency_profile_domains_alternate_domain;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[FacebookAddress]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_social_facebook)){ echo $data_account[0]->agency_profile_social_facebook;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[TwitterAddress]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_social_twitter)){ echo $data_account[0]->agency_profile_social_twitter;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[GooglePlusAddress]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_social_googleplus)){ echo $data_account[0]->agency_profile_social_googleplus;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[SocialOther01]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_social_other1)){ echo $data_account[0]->agency_profile_social_other1;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[SocialOther02]</div>
                                        <div title="http://www.linkedin.com/company/children%27s-harbor" class="valueInfo col span_10">
                                        	<?php if(isset($data_account[0]->agency_profile_social_other2)){ echo $data_account[0]->agency_profile_social_other2;  } ?>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[SocialOther03]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_account[0]->agency_profile_social_other3)){ echo $data_account[0]->agency_profile_social_other3;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[LicenseNumber]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_option_credentials_licence_number)){ echo $data_owner[0]->agency_option_credentials_licence_number;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[Awards]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_option_credentials_awards)){ echo $data_owner[0]->agency_option_credentials_awards;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[HoursOfOperation]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_option_servicedetail_hour_operation)){ echo $data_owner[0]->agency_option_servicedetail_hour_operation;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[ServiceArea]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_option_servicedetail_service_area)){ echo $data_owner[0]->agency_option_servicedetail_service_area;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[ServicesOffered]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_option_servicedetail_services_offered)){ echo $data_owner[0]->agency_option_servicedetail_services_offered;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[BrandsOffered]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_option_servicedetail_brands_offered)){ echo $data_owner[0]->agency_option_servicedetail_brands_offered;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField01]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option1)){ echo $data_owner[0]->agency_custom_option1;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField02]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option2)){ echo $data_owner[0]->agency_custom_option2;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField03]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option3)){ echo $data_owner[0]->agency_custom_option3;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField04]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option4)){ echo $data_owner[0]->agency_custom_option4;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField05]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option5)){ echo $data_owner[0]->agency_custom_option5;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField06]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option6)){ echo $data_owner[0]->agency_custom_option6;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField07]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option7)){ echo $data_owner[0]->agency_custom_option7;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField08]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option8)){ echo $data_owner[0]->agency_custom_option8;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField09]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option9)){ echo $data_owner[0]->agency_custom_option9;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField10]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option10)){ echo $data_owner[0]->agency_custom_option10;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField11]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option11)){ echo $data_owner[0]->agency_custom_option11;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField12]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option12)){ echo $data_owner[0]->agency_custom_option12;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField13]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option13)){ echo $data_owner[0]->agency_custom_option13;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField14]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option14)){ echo $data_owner[0]->agency_custom_option14;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField15]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option15)){ echo $data_owner[0]->agency_custom_option15;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField16]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option16)){ echo $data_owner[0]->agency_custom_option16;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField17]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option17)){ echo $data_owner[0]->agency_custom_option17;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField18]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option18)){ echo $data_owner[0]->agency_custom_option18;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField19]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option19)){ echo $data_owner[0]->agency_custom_option19;  } ?></div>
                                    </li>
                                    <li class="row">
                                        <div class="labelInfo col span_6">[CustomField20]</div>
                                        <div class="valueInfo col span_10"><?php if(isset($data_owner[0]->agency_custom_option20)){ echo $data_owner[0]->agency_custom_option20;  } ?></div>
                                    </li>

                                </ul>
                            </div>
<!-- Tags -->                            
                            <div class="splitPaneRightRow" >
                            <?php if(isset($query[0]->layout_manage_tag)){
								$tag_layout = rtrim($query[0]->layout_manage_tag,',');
								$tags=explode(',',$tag_layout);
								$tags_count=count($tags);
							}
								?>
                                <h3  onclick="showSplitPlaneRow(this);">Tags</h3><div class="splitPlaneQuickDetails" id="form_tag_id"><?php if(isset($query[0]->layout_manage_tag) &&$query[0]->layout_manage_tag!=''){ echo $tags_count;} else{echo '0';}?> Tags</div>
                                <ul class="splitPaneRightDetails">
                                    <li class="row">
                                        <div class="labelInfo col span_4">Tags</div>
                                        <div class="formInfo col span_12"><textarea name="txt_tag" class="doubleHeight"/><?php if(isset($query[0]->layout_manage_tag)) echo $query[0]->layout_manage_tag; ?></textarea></div>
                                    </li>
                                </ul>
                            </div>
<!-- Notes-->                            
                            <div class="splitPaneRightRow" >
                                <h3  onclick="showSplitPlaneRow(this);">Notes</h3><div class="splitPlaneQuickDetails" id="form_not_id">Expand to view and add notes.</div>
                                <ul class="splitPaneRightDetails">
                                   <li class="row">
                                    <div class="labelInfo col span_4">Notes</div>
                                    <div class="formInfo col span_12"><textarea name="txt_note" class="doubleHeight"/><?php if(isset($query[0]->layout_manage_note)) echo $query[0]->layout_manage_note; ?></textarea></div>
                                   </li>
                                </ul>
                            </div>
                             <input type="hidden" value="<?php if(isset($query)) { echo $query; } else { echo $this->uri->segment(3); } ?>" name="hiddenid"/>        
                            <div class="splitPaneRightRow rightButtonsRow row gutters">
                            	<div class="col span_4">
	                                 <?php $current_id=$this->uri->segment(3); 
								if(isset($current_id) && $current_id!='' && $current_id!='new')
								{
						 		echo "<a  href=".base_url()."layout_controller/layout_manage_delete/$current_id>"; ?><button id="remove_btn" class="remove">Remove</button> </a>                                <?php } ?>
                                </div>
                                <div class="col span_4">&nbsp;</div>
                                <div class="col span_4">
									<button type="button" id="cancel_btn" onclick="history.back();" class="cancel">Cancel</button>
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
function submit_change_val(){

$('#search_form').submit();
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
     
	  $('.edit').editable('<?php echo base_url()?>ajax/update_ajax_layout_manage', {
		 id : 'elementid',
         indicator : 'Saving...',
		 submitdata : {layout_id: $('#layout_id').val()},
         tooltip   : 'Click to edit...',
		 cancel : 'Cancel',
		 submit  : 'Save',
		 onblur : 'ignore',
     });
});



$(document).ready(function() {
	$('#open_audience_ic').click(function(){
		document.getElementById('my_form').style.display='block';
	});
});
	
function audience_filter(selectedValue)
 {
	 if(selectedValue)
	 {	
		$.ajax({
			url: '<?php echo base_url(); ?>layout_controller/audience_filter',
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
	if($add_form=='layout_controllerss')
	{
	?>
	<script>    
	document.getElementById('my_form').style.display='block';

	$('#form_html_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_html_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_html_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
	$('#form_css_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_css_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_css_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 

	$('#form_javasc_id').parent().toggleClass('splitPaneRightSelected'); 
	$('#form_javasc_id').parent().children("ul").eq(0).slideToggle(300); 
	$('#form_javasc_id').parent().children(".splitPlaneQuickDetails").eq(0).toggle(0); 
	
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
	if($add_form=='add_layout')
	{
	?>
	<script>
        document.getElementById('my_form').style.display='none';	

    </script>
<?php }
	?>
<?php $add_form=$this->uri->segment(2);
	if($add_form=='layout_delete')
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
  $("#onsuccessmsg").html('<div id="msg" style="margin-left:127px">'+response+'</div>');
 }
 $('#edit_source').attr("type","button");
 $('#edit_styles').attr("type","button");
 $('#edit_scripts').attr("type","button");
  
 $('#edit_source').click(function(){
	var html_value=$('#html_id').val();
	var html_text=$('.html_select option:selected').text();
	 $('#version_text').text(html_text);
	 $('.version_text').text(html_text);
		
	$.ajax({
			url: '<?php echo base_url(); ?>layout_controller/select_source',
			type: 'POST',
			data: {option :html_value},
			success: function(data) {
  			var return_array=data.split("|"); 
			$('#source_area').val(return_array[0]);
			//alert(return_array[0].length);
			$('#return_id').val(return_array[1]);
			$('#type_id').val(return_array[2]);
	       
			}
		});
 });
  $('#edit_styles').click(function(){
	var css_value=$('#css_id').val();
	
	var html_text=$('.css_html option:selected').text();
	 $('#version_text').text(html_text);
	 $('.version_text').text(html_text);
	
	$.ajax({
			url: '<?php echo base_url(); ?>layout_controller/select_source',
			type: 'POST',
			data: {option :css_value},
			success: function(data) {
  			var return_array=data.split("|"); 
			$('#source_area').val(return_array[0]);
			$('#return_id').val(return_array[1]);
			$('#type_id').val(return_array[2]);
			}
		});
 });
 $('#edit_scripts').click(function(){
	var script_value=$('#script_id').val();
	
	var html_text=$('.script_html option:selected').text();
	 $('#version_text').text(html_text);
	 $('.version_text').text(html_text);
	
	$.ajax({
			url: '<?php echo base_url(); ?>layout_controller/select_source',
			type: 'POST',
			data: {option :script_value},
			success: function(data) {
  			var return_array=data.split("|"); 
			$('#source_area').val(return_array[0]);
			$('#return_id').val(return_array[1]);
			$('#type_id').val(return_array[2]);
			}
		});
 });
$('#save_btn').click(function(){
	$('#my_form').attr('action', '<?php echo base_url();?>layout_controller/save_layout');
});

$('#save_btn_mobile').click(function(){
$('#my_form').attr('action', '<?php echo base_url();?>layout_controller/save_layout');
});
});
</script>

<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/classie.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/mlpushmenu.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/mlpmenu/splitPlane.js"></script>
<script src="<?php echo base_url() ?>assets/js/admin/jquery.jeditable.mini.js"></script>

</body>
</html>