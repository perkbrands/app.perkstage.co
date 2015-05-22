<?php
function upOneLevel($url = "") {
	if($url == "") { $url = $_SERVER['REQUEST_URI']; }
	
	if($url[strlen($url)-1] == "/") {
		$url = substr($url, 0, strlen($url)-1);
	}
	
	$url= substr($url, 0, strrpos($url, "/"));
	
	return($url);
}
	//echo $postback;

if($this->session->userdata('login_success')!='success')
{			

    redirect(base_url());
	 exit;	
}

$section = "account";

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if($this->uri->segment(1)=='manage_user_controller'){
$section = "people";
//$subSection='people';				
}
if($actual_link==base_url()){
$subSection='accounts';
}
$subNavFirst = false;
if($this->uri->segment(1)=='agency'){
if(!isset($_GET['section'])){ 
$section = "account";
$view='accounts';
}else{ $section = $_GET['section'];}
if(isset($_GET['subSection']))
$subSection = $_GET['subSection'];
$subSection = 'accounts';
}
$manage=false;
if(isset($_GET['manage']) && $_GET['manage'] == "true")
	$manage = true;
$option='';
if(isset($_GET['option1']))
	$option = $_GET['option1'] . " " . $_GET['option2'];


if($this->uri->segment(1)=='audience'){
$view='audiences';
if(!isset($_GET['section'])) $section = "people";
else $section = $_GET['section'];	
	
}


if(isset($_GET['view']))
$view=$_GET['view'];
if($this->uri->segment(1)=='account_setting'){
if(!isset($_GET['section'])) $section = "account";
else $section = $_GET['section'];
if($this->uri->segment(1)=='account_setting'){
$subSection = 'settings';
}

//echo $subSection;

}

if($this->session->userdata('role_id')==2 && $this->session->userdata('assigned_roles')=='single' && $this->uri->segment(2)=='activity' || isset($editor_role)){
	$section = "account";
	$subSection = 'settings';
}

if(($this->session->userdata('role_id')==1 && $this->session->userdata('assigned_roles')=='single') && $this->uri->segment(2)=='activity' || isset($admin_role)){

	$section = "account";
	$subSection = 'settings';
	?>
    <script type="text/javascript">
	$(document).ready(function(){
	$('#profile_select').attr('class', '');
	});
	</script>
    <?php
}

if($this->session->userdata('role_id')==2 && $this->session->userdata('assigned_roles')=='multiple' && $this->uri->segment(2)=='activity'){
	$section = "account";
	$subSection = 'accounts';
}


if($this->uri->segment(1)=='people_user_controller'){

if(!isset($_GET['section'])) $section = "people";
else $section = $_GET['section'];	

}

if($this->uri->segment(1)=='designs'){
	$subSection = "designs";
	$view="designs";
}
if($this->uri->segment(1)=='layout_controller'){
	$subSection = "designs";
	$view="layouts";
}
if($this->uri->segment(1)=='collections'){
	$subSection = "designs";
	$view="collections";
}

if($this->uri->segment(1)=='files'){
	$subSection = "designs";
	$view="files";
}
//////////////////for contents websites///////////////////////////
$pages_class_selected='';
$website_file_class_selected='';
$website_repeat_class_selected='';
if($this->uri->segment(1)=='pages_controller'){

$section = "content";
$subSection="websites";
$pages_class_selected='class=selected';
$view='pages';
if($this->uri->segment(2)=='manage_page' || isset($id_edit)){
$manage=true;
}

}


/////////////////////website files///////////////////
if($this->uri->segment(1)=='website_file_controller'){

$section = "content";
$subSection="websites";
$website_file_class_selected='class=selected';
$view="files";

}


///////////////////ends contents websites////////////////////////

/////////////////////website repeats///////////////////
if($this->uri->segment(1)=='repeat_controller'){

$section = "content";
$subSection="websites";
$website_repeat_class_selected='class=selected';
$view="repeats";

if($this->uri->segment(2)=='manage_repeat' || isset($id_edit)){
$manage=true;
}

}


///////////////////ends  website repeates////////////////////////


$breadcrum_page='';
$audience_class_selected='';

//////////////////////////for acudience/////////////////////////

if($this->uri->segment(2)=='audience' || $this->uri->segment(3)=='new' || $this->uri->segment(2)=='audience_setting' ||$this->uri->segment(2)=='audience_search' ||$this->uri->segment(2)=='audience_add'){$audience_class_selected='class=selected';
$breadcrum_page='Audience';
}
/////////////////////audience ends//////////////////////////////
					$people_me_class_selected='';
					$people_administrator_class_selected='';
					$people_eitors_class_selected='';
					$people_members_class_selected='';
/////////////////////for administrator//////////////////////////					
					if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(2)=='people_administrator_add' || $this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(3)=='anew' || $this->uri->segment(2)=='select_account_administrator'){
						$people_administrator_class_selected='class=selected';
						$breadcrum_page='Administrator';
						$view='administrators';	
					}
					if(isset($roles) && $roles==1){
					    $people_administrator_class_selected='class=selected';
						$breadcrum_page='Administrator';
						$view='administrators';		
					}
//////////////////administrator ends////////////////////////////

//////////////////for editors//////////////////////////////////					
					if($this->uri->segment(2)=='people_editor' || $this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(3)=='enew' || $this->uri->segment(2)=='select_account_editor'){
						$people_eitors_class_selected='class=selected';
						$breadcrum_page='Editor';
						$view='editors';
					}
					
					if(isset($roles) && $roles==2){
					    $people_eitors_class_selected='class=selected';
						$breadcrum_page='Editor';
						$view='editors';
					}
////////////////editor ends//////////////////////////////////

////////////////for memeber///////////////////////////////					
					if($this->uri->segment(2)=='people_member' || $this->uri->segment(2)=='edit_people_member' || $this->uri->segment(3)=='mnew' || $this->uri->segment(2)=='select_account_member'){
						$people_members_class_selected='class=selected';
						$breadcrum_page='Member';
						$view='members';
					}
					
					if(isset($roles) && $roles==3){
					    $people_members_class_selected='class=selected';
						$breadcrum_page='Member';
						$view='members';
					}
//////////////////member ends//////////////////////////////

/////////////////for me////////////////////////////////					
					if($this->uri->segment(2)=='people_me' || $this->uri->segment(2)=='edit_people_me' || (isset($me) && $me=='people_me')){
						$people_administrator_class_selected='';
						$people_me_class_selected='class=selected';
						$breadcrum_page='Me';
						$view='me';
					}
////////////////me ends////////////////////////////////////

?>

<header id="headerContainer" class="headerContainer">
         <?php if($this->session->userdata('login_success')=='success'){?>
        
            <div id="sectionContainer">
                
                <nav id="sectionMenu">
            
        <?php
		$prof_id=$this->session->userdata('current_account_id');
		if($prof_id==''){
						$prof_id=$this->session->userdata('account_id');
					}?>
                    <ul id="navButtonContainer">               
                        <li>                           
                            <a class="navButton account <?php if($section == "account") echo "active"; else echo "";?>" href="<?php echo base_url() ?>agency"></a>
                            <?php if($this->session->userdata('role_id')==1){  ?>
                            <ul>
                                <?php if(($this->session->userdata('role_id')==1 && $this->session->userdata('assigned_roles')=='multiple')  || $this->session->userdata('isdefault')==1){ ?>
                                <li class="first"><a href="<?php echo base_url();?>agency">Accounts</a></li>
                                <?php } ?>
                             <?php if($this->session->userdata('status_both')=='' || ($this->session->userdata('role_id')!=2 && $this->session->userdata('assigned_roles')!='multiple')){ ?>
                                <li><a href="<?php echo base_url();?>account_setting/profile/<?php echo $prof_id; ?>">Settings</a></li>
                              <?php } ?>  
                                <?php if($this->session->userdata('editor_page')==''){ ?>
                                <li><a href="<?php echo base_url();?>designs">Designs</a></li>
                                <li><a href="<?php echo base_url();?>collections/">Connections</a></li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                            
                             <?php if($this->session->userdata('role_id')==2 && $this->session->userdata('assigned_roles')=='multiple'){ ?>
                            <ul>
                            
                                <?php if($this->session->userdata('role_id')==2 && $this->session->userdata('assigned_roles')=='multiple'){ ?>
                                <li class="first"><a href="<?php echo base_url();?>agency">Accounts</a></li>
                                <?php } ?>
                                
                            </ul>
                            <?php } ?>
                            
                            
                        </li>
                   
                        <li><a class="navButton people <?php if($section == "people") echo "active"; else echo "";?>" href="<?php echo base_url();?>audience/audience"></a></li>
                        
                        <li>
                            <a class="navButton content <?php if($section == "content") echo "active"; else echo "";?>" onclick="return false;" href="#"></a>
                            <ul id="contentMenuDropdown">
                                <li class="first"><a href="<?php echo base_url();?>pages_controller">Websites</a></li>
                                <li><a href="/content/social">Social</a></li>
                                <li><a href="/content/post">Posts</a></li>
                                <li><a href="/content/emails">Emails</a></li>
                                <li><a href="/content/events">Events</a></li>
                                <li><a href="/content/displays">Displays</a></li>
                                <li><a href="/content/other">Other</a></li>
                                <li><a href="/content/files">Files</a></li>
                            </ul>
                        </li>
                        
                        <li><a class="navButton campaign <?php if($section == "compaign") echo "active"; else echo "";?>" href="/campaign"></a></li>
                        <li><a class="navButton conversation <?php if($section == "conversation") echo "active"; else echo "";?>" href="/conversation"></a></li>
                        <li class="last"><a class="navButton search"></a></li>
                    </ul>
                        
        
        
        
                   <ul id="breadCrumbContainer">
                        <li>
                            <?php echo $this->session->userdata('account_title');?>
                        </li>
                        <?php
						if(isset($subSection)  && strlen($subSection) > 0){
							echo '
							<li class="next">></li>
	                        <li>'.ucfirst($subSection).'</li>
							';}else{
								
							echo '
							<li class="next">></li>
	                        <li>'.ucfirst($breadcrum_page).'</li>
							';	
							}
							
							
						if($this->uri->segment(1)=='pages_controller' || $this->uri->segment(2)=='manage_page' || isset($id_edit)){
							$connections=array();
							if(isset($active_site) && $active_site!=''){
								
								foreach($active_site as $site){
									$connections[]=$site->website_address.'_'.$site->website_id.',';
								}
						
                        if(isset($connections) && is_array($connections)) {
							$tempConnections = $connections;
							if(!empty($tempConnections)){
							if($this->uri->segment(2)=='selected_website' && $this->uri->segment(3)==2){
								$tempConnections = array_reverse($connections,true);
								$newtemp=explode('_',$tempConnections[1]);
								echo '<input type="hidden" id="page_website_id" value="'.rtrim($newtemp[1],',').'" />';
								 echo '
							<li class="next">></li>
                            <li>'.rtrim($newtemp[0],',').'</li>
							';
							}else{
								$newtemp=explode('_',$tempConnections[0]);
								echo '<input type="hidden" id="page_website_id" value="'.rtrim($newtemp[1],',').'" />';
							echo '
							<li class="next">></li>
                            <li>'.rtrim($newtemp[0],',').'</li>
							';	
								
                            /*echo '
							<li class="next">></li>
                            <li>'.array_shift($tempConnections).'</li>
							';*/
							}
							// If there are any sub connections
							if(count($tempConnections) > 0)
								echo '
								<li class="clickable">(Change)
									<ul>';
								
								foreach($tempConnections AS $connection)
								$exp_conn=explode('_',$connection);
								$web_id=rtrim($exp_conn[1],',');
								$web_address=$exp_conn[0];
									echo '
									<li><a onclick="select_website('.$web_id.')" href="javascript:void(0)">'.$web_address.'</a></li>';
								
								echo '
									</ul>
								</li>';
                        }
							}
							}
						}
						?>
                    </ul>
            
                    <?php /*?><ul id="breadCrumbContainer">
                        <li onclick="toggleAccount(this)" >
                            <a href="#" onclick="return false;">Children's Harbor</a>
                        </li>
                        <li class="next">></li>
                        <li><?=ucfirst($section)?></li>
                        <?php
						if(isset($subSection)  && strlen($subSection) > 0) 
							echo '
							<li class="next">></li>
	                        <li>'.ucfirst($subSection).'</li>
							';
							
						if(isset($view) && strlen($view) > 0) 
							echo '
							<li class="next">></li>
	                        <li>'.ucfirst($view).'</li>
							';
						?>
                    </ul><?php */?>
                    
                    <!--<div id="accountContainer">
                        <div>
                            <ul>
                                <li>Activity</li>
                                <li>Accounts</li>
                            </ul>
                            
                            <div>
                                Other Stuff Here<br />
                                
                                <form>
                                    <input type="text" />
                                </form>
                            </div>
                        
                        </div>
                    </div>-->
                    
                    <div id="userContainer">
                        <li>
                            <?php echo $this->session->userdata('user_title'); ?>
                            <ul>
                                <li><a href="<?php echo base_url() ?>agency/logout">Logout</a></li>
                            </ul>
                        </li>
                        
                        
                    </div>
                    <div id="userContainerMobile">Logged In</div>
                
                </nav>
                
        
            </div>
        
        
            <div id="subSectionContainer">
                
                <nav id="subSectionMenu">
                    
                    
                    <?php
				    
					$profile_class_selected='';
					$owner_class_selected='';
					$option_class_selected='';
					$activity_class_selected='';
					if($this->uri->segment(2)=='profile' || $this->uri->segment(2)=='profile_save'){
						$profile_class_selected='class=selected';
						$view='profile';
					}
					
					if($this->uri->segment(2)=='owner' || $this->uri->segment(2)=='owner_save'){
						$owner_class_selected='class=selected';
						$view='owner';
					}
					
					if($this->uri->segment(2)=='options' || $this->uri->segment(2)=='options_add'){
						$option_class_selected='class=selected';
						$view='options';
					}
					$class_account_selected='';
					
					
					if($this->uri->segment(1)=='agency' || $actual_link==base_url()){
						$class_account_selected='class=selected';
					}
					
					if($this->uri->segment(2)=='activity' || ($this->uri->segment(1)=='account_setting' && $this->uri->segment(2)=='activity') || $this->uri->segment(2)=='activity_account'){
				
						$activity_class_selected='class=selected';
						?>
    <script type="text/javascript">
	$(document).ready(function(){
	$('#account_agency_select').attr('class', '');
	});
	</script>
    <?php
					}
					
					
					
					if(isset($admin_role) && $admin_role=='administrator'){
					    $activity_class_selected='class=selected';
					}
					if($this->session->userdata('role_id')==1 && $this->session->userdata('editor_page')==''){
					$subNavArray = 
							array(
								"activity" => "<a href='/people/activity'>Activity</a>",
								"me" => "<a ".$people_me_class_selected." href='".base_url()."people_user_controller/people_me'>Me</a>",
								"administrators" => "<a ".$people_administrator_class_selected." href='".base_url()."people_user_controller/people_administrator'>Administrators</a>",
								"editors" => "<a ".$people_eitors_class_selected." href='".base_url()."people_user_controller/people_editor'>Editors</a>",
								"members" => "<a ".$people_members_class_selected." href='".base_url()."people_user_controller/people_member'>Members</a>",
								"audiences" => "<a ".$audience_class_selected."  href='".base_url()."audience/audience'>Audiences</a>"
							);	
					}else{
					
					$subNavArray = 
							array(
								"activity" => "<a href='/people/activity'>Activity</a>",
								"me" => "<a ".$people_me_class_selected." href='".base_url()."people_user_controller/people_me'>Me</a>",
								"members" => "<a ".$people_members_class_selected." href='".base_url()."people_user_controller/people_member'>Members</a>",
								"audiences" => "<a ".$audience_class_selected."  href='".base_url()."audience/audience'>Audiences</a>"
							);	
						
					}
					
					
					if(isset($section)){
                    switch($section) {
                        
                        case "account": 
                            // Sub Page
                            switch($subSection) {
                                case "accounts":
                                    $subNavArray = 
									array(
										"activity" => "<a ".$activity_class_selected." href=".base_url()."account_setting/activity/".$prof_id.">Activity</a>",
										"accounts" => "<a ".$class_account_selected." id='account_agency_select' href=".base_url()."agency>Accounts</a>"
									);
                                    break;

								
                                case "settings": 
									
									$subNavArray = 
									array(
										"activity" => "<a ".$activity_class_selected." href=".base_url()."account_setting/activity/".$prof_id.">Activity</a>",
										"owner" => "<a ".$owner_class_selected." href='".base_url()."account_setting/owner/".$prof_id."'>Owner</a>", 
										"profile" => "<a ".$profile_class_selected." id='profile_select' href='".base_url()."account_setting/profile/".$prof_id."'>Profile</a>", 
										"options" => "<a ".$option_class_selected." href='".base_url()."account_setting/options/".$prof_id."'>Options</a>"
									);
									
									if($this->session->userdata('role_id')==2){
										 $subNavArray = 
									array(
										"activity" => "<a ".$activity_class_selected." href='".base_url()."account_setting/activity/".$prof_id."'>Activity</a>"
									);
									}
									
									
                                    break;
									
        						
								
                                case "designs":
								
								if($manage)
										$subNavArrayMobile = "Manage " .ucwords($view); 
                                    
									$subNavArray = 
									array(
										"activity" => "<a href='/account/designs/activity'>Activity</a>", 
										"collections" => "<a href='".base_url()."collections/'>Collections</a>", 
										"designs" => "<a href='".base_url()."designs/'>Designs</a>", 
										"layouts" => "<a href='".base_url()."layout_controller/'>Layouts</a>", 
										"files" => "<a href='".base_url()."files/'>Files</a>"
									);
                                    break;
        
                                case "connections":
                                    $subNavArray = 
									array(
										"activity" => "<a href='/account/connections/activity'>Activity</a>", 
										"connections" => "<a href='/account/connections/connections'>Connections</a>", 
									);										
                                    break;
        
                            }
                        break;

                        case "people":
						  $subNavArray;
                        break;
        
                        case "content":
                            // Sub Page
                            switch($subSection) {
                                
                               case "websites":
										if($manage) {
											
											if($option)
												$subNavArray = 
												array(
													"option" => "<a class='selected' onclick='return false'>".ucwords ($option)."</a>"
												);
											
											else 
											switch($view) {
												
												case "pages":
													$subNavArray = 
													array(
														"format" => "<a href='#' onclick='return false'>Format</a>
														<ul>
														<li><a style='cursor:pointer;' onclick='CKEDITOR.tools.callFunction(6, this); return false;' onfocus='return CKEDITOR.tools.callFunction(5, event);' onkeydown='return CKEDITOR.tools.callFunction(4, event);' onblur='this.style.cssText = this.style.cssText;' aria-labelledby='cke_8_label' role='button' hidefocus='true' tabindex='-1' title='Bold' class='cke_off cke_button_bold' id='cke_8'>Bold</a></li>
														<li><a style='cursor:pointer;' onclick='CKEDITOR.tools.callFunction(9, this); return false;' onfocus='return CKEDITOR.tools.callFunction(8, event);' onkeydown='return CKEDITOR.tools.callFunction(7, event);' onblur='this.style.cssText = this.style.cssText;' aria-labelledby='cke_9_label' role='button' hidefocus='true' tabindex='-1' title='Italic' class='cke_off cke_button_italic' id='cke_9'>Italic</a></li>
														<li><a id='option_link' href='javascript:void(0)' onclick='showSubSubSection(\"#websites-pages-manage--format_options\"); return false;'>Options</a></li>
														</ul>												
														", 
														"insert" => "<a href='#' onclick='return false;'>Insert</a>
														<ul>
														<li><a href='#' id='page_link_id' onclick='showSubSubSection(\"#websites-pages-manage--insert_link\"); return false;'>Link</a></li>
														<li><a href='#' id='image_link_id' onclick='showSubSubSection(\"#websites-pages-manage--insert_image\"); return false;'>Image</a></li>
														<li><a href='#' id='video_link_id' onclick='showSubSubSection(\"#websites-pages-manage--insert_video\"); return false;'>Video</a></li>
														<li><a href='#' id='pages_layout_id' onclick='showSubSubSection(\"#websites-pages-manage--insert_layout\"); return false;'>Layout</a></li>
														<li><a href='#' id='repeat_link_id' onclick='showSubSubSection(\"#websites-pages-manage--insert_repeat\"); return false;'>Repeat</a></li>
														<li><a href='#' onclick='showSubSubSection(\"#websites-pages-manage--insert_character\"); return false;'>Character</a></li>
														</ul>													
														", 
														"view" => "<a href='javascript:void(0)' id='view_html' onclick='showSubSubSection(\"#websites-pages-manage--view\"); return false;'>View</a>", 
														"undo" => "<a style='cursor:pointer;' onclick='CKEDITOR.tools.callFunction(51, this); return false;' onfocus='return CKEDITOR.tools.callFunction(50, event);' onkeydown='return CKEDITOR.tools.callFunction(49, event);' onblur='this.style.cssText = this.style.cssText;' aria-labelledby='cke_23_label' role='button' hidefocus='true' tabindex='-1' title='Undo' class='cke_button_undo cke_disabled' id='cke_23' aria-disabled='true'>Undo</a>",
														"Save" => "<a href='javascript:void(0)' id='save_editor'>Save</a>",
														"Cancel" => "<a href='javascript:void(0)' id='cancel_editor'>Cancel</a>"
													);
											
												break;
												
												case "repeats":
													$subNavArray = 
													array(
														"format" => "<a href='#' onclick='return false'>Format</a>
														<ul>
														<li><a style='cursor:pointer;' onclick='CKEDITOR.tools.callFunction(6, this); return false;' onfocus='return CKEDITOR.tools.callFunction(5, event);' onkeydown='return CKEDITOR.tools.callFunction(4, event);' onblur='this.style.cssText = this.style.cssText;' aria-labelledby='cke_8_label' role='button' hidefocus='true' tabindex='-1' title='Bold' class='cke_off cke_button_bold' id='cke_8'>Bold</a></li>
														<li><a style='cursor:pointer;' onclick='CKEDITOR.tools.callFunction(9, this); return false;' onfocus='return CKEDITOR.tools.callFunction(8, event);' onkeydown='return CKEDITOR.tools.callFunction(7, event);' onblur='this.style.cssText = this.style.cssText;' aria-labelledby='cke_9_label' role='button' hidefocus='true' tabindex='-1' title='Italic' class='cke_off cke_button_italic' id='cke_9'>Italic</a></li>
														<li><a id='option_link' href='javascript:void(0)' onclick='showSubSubSection(\"#websites-pages-manage--format_options\"); return false;'>Options</a></li>
													
														</ul>												
														", 
														"insert" => "<a href='#' onclick='return false;'>Insert</a>
														<ul>
														<li><a href='#' id='repeat_link_id' onclick='showSubSubSection(\"#websites-pages-manage--insert_link\"); return false;'>Link</a></li>
														<li><a href='#' id='repeat_image_id' onclick='showSubSubSection(\"#websites-pages-manage--insert_image\"); return false;'>Image</a></li>
														<li><a href='#' id='repeat_video_id' onclick='showSubSubSection(\"#websites-pages-manage--insert_video\"); return false;'>Video</a></li>
														<li><a href='#' id='repeat_layout_id' onclick='showSubSubSection(\"#websites-pages-manage--insert_layout\"); return false;'>Layout</a></li>
														<li><a href='#' id='repeat_character_id' onclick='showSubSubSection(\"#websites-pages-manage--insert_character\"); return false;'>Character</a></li>
														</ul>													
														", 
														"view" => "<a id='view_repeat' href='javascript:void(0)' onclick='showSubSubSection(\"#websites-pages-manage--view\"); return false;'>View</a>", 
														"undo" => "<a style='cursor:pointer;' onclick='CKEDITOR.tools.callFunction(51, this); return false;' onfocus='return CKEDITOR.tools.callFunction(50, event);' onkeydown='return CKEDITOR.tools.callFunction(49, event);' onblur='this.style.cssText = this.style.cssText;' aria-labelledby='cke_23_label' role='button' hidefocus='true' tabindex='-1' title='Undo' class='cke_button_undo cke_disabled' id='cke_23' aria-disabled='true'>Undo</a>",
														"Save" => "<a href='javascript:void(0)' id='save_repeat_editor'>Save</a>",
														"Cancel" => "<a href='javascript:void(0)' id='cancel_repeat_editor'>Cancel</a>"
													);
													
												break;
											}
											
										} else {
											$subNavArray = 
											array(
												"activity" => "<a href='/content/websites/activity'>Activity</a>", 
												"menu" => "<a href='/content/websites/menu'>Menu</a>", 
												"pages" => "<a ".$pages_class_selected." href='".base_url()."pages_controller/'>Pages</a>", 
												"repeats" => "<a ".$website_repeat_class_selected." href='".base_url()."repeat_controller/'>Repeats</a>", 
												"files" => "<a ".$website_file_class_selected." href='".base_url()."website_file_controller/'>Files</a>"
											);
										}
									break;
        
                                case "social":  
                                    $subNavArray = 
									array(
										"activity" => "<a href='/content/social/activity'>Activity</a>", 
										"facebook" => "<a href='/content/social/facebook'>Facebook</a>", 
										"twitter" => "<a href='/content/social/twitter'>Twitter</a>", 
										"files" => "<a href='/content/social/files'>Files</a>"
									);
                                    break;
        
                                case "post":
                                    $subNavArray = 
									array(
										"activity" => "<a href='/content/post/activity'>Activity</a>",
										"blogs" => "<a href='/content/post/blogs'>Blogs</a>",
										"podcast" => "<a href='/content/post/podcast'>Podcast</a>",
										"files" => "<a href='/content/post/files'>Files</a>"
									);
                                    break;
                                    
                                case "emails":
                                    $subNavArray = 
									array(
										"activity" => "<a href='/content/emails/activity'>Activity</a>", 
										"emails" => "<a href='/content/emails/emails'>Emails</a>",
										"files" => "<a href='/content/emails/files'>Files</a>"
									);
                                    break;
                                    
                                case "events":
                                    $subNavArray = 
									array(
										"activity" => "<a href='/content/events/activity'>Activity</a>",
										"events" => "<a href='/content/events/events'>Events</a>",
										"locations" => "<a href='/content/events/locations'>Locations</a>",
										"files" => "<a href='/content/events/files'>Files</a>"
									);
                                    break;
        
                                case "displays":
                                    $subNavArray = 
									array(
										"activity" => "<a href='/content/displays/activity'>Activity</a>",
										"episodes" => "<a href='/content/displays/episodes'>Episodes</a>",
										"files" => "<a href='/content/displays/files'>Files</a>"
									);
                                    break;
        
                                case "other":
                                    $subNavArray = 
									array(
										"activity" => "<a href='/content/other/activity'>Activity</a>",
										"resources" => "<a href='/content/other/resources'>Resources</a>",
										"files" => "<a href='/content/other/files'>Files</a>"									
									);
                                    break;
                                    
                                case "files":
                                    $subNavArray = array(
										"activity" => "<a href='/content/files/activity'>Activity</a>",
										"files" => "<a href='/content/files/files'>Files</a>",						
										"upload" => "<a href='/content/files/upload'>Upload</a>"
									);
                                    break;
        
                                //default:
                                //   $subNavArray = array("Activity", "Websites", "Social", "Posts", "Emails", "Events", "Displays", "Other", "Files");
                            }
                        break;
                        
                        case "campaign":
                            $subNavArray = 
							array(
								"activity" => "Activity",
								"campaigns" => "Campaigns",
								"files" => "Files"
							);
                        break;
        
                        case "conversation":
                            $subNavArray = 
							array(
								"activity" => "Activity",
								"forms" => "Forms",
								"comments" => "Comments"
							);
                        break;
                        
                    }
					}
					// Add Selected Value
						if(isset($view))
						if(array_key_exists($view, $subNavArray)) $subNavArray[$view] = str_replace(  "href", "class='selected' onclick='return false' href", $subNavArray[$view]);
					else if(isset($subSection))
						if(array_key_exists($subSection, $subNavArray)) $subNavArray[$subSection] = str_replace(  "href", "class='selected' onclick='return false' href", $subNavArray[$subSection]);
					?>
					<ul class="subSectionNavButtonContainerClass" id="subSectionNavButtonContainer">
						<?php
						foreach($subNavArray AS $key => $val) {
							echo '<li>'.$val.'</li>
							';
						}
						?>
					</ul>
	
					<ul class="subSectionNavButtonContainerClass" id="subSectionNavButtonContainerMobile">
						
						<?php
						if(count($subNavArray) > 0) {
							
							if($manage) {
								if(isset($subNavArrayMobile))
									echo '<li>'.$subNavArrayMobile.'</li>';
								else
									foreach($subNavArray AS $val) {
										echo '<li>'.$val.'</li>
										';
									}
							}
							else {
								echo '
								<li>
								'.$subNavArray[$view].'
								<ul>
								';
                               
								

								
								if(isset($connections) && is_array($connections)) {
									
									$tempConnections = $connections;
									$subNavFirst = true;
									echo '
									<li id="connectionsMobile">'.array_shift($tempConnections).'</li>';
									
									// If there are any sub connections
									if(count($tempConnections) > 0) {
										echo '		
										<li id="changeWebsitesMobileOpenTrigger" onclick="$(\'.changeWebsitesMobile\').slideDown(\'slow\'); $(this).slideUp();">Change Websites</li>';
									
										foreach($tempConnections AS $connection)
											echo '
											<li class="changeWebsitesMobile"><a href="#">'.$connection.'</a></li>';
										
										echo '
										<li id="changeWebsitesMobileCloseTrigger" class="changeWebsitesMobile" 
										onclick="$(\'.changeWebsitesMobile\').slideUp(\'slow\'); $(\'#changeWebsitesMobileOpenTrigger\').slideDown();">
										</li>';
									}
								}
							
								
								foreach($subNavArray AS $val) {
									if($subNavFirst) {
										echo '<li class="first">'.$val.'</li>';
										$subNavFirst=false;
									}
									else {
										echo '<li>'.$val.'</li>';
									}
								}
								
								echo '
								</ul>
								</li>
								';
							}
							
						}
						?>
						<!--						
						<select id="subSectionNavOptionMobile">
							<option>Options</option>
						</select>
						-->
					</ul>  

					<?php
						if($manage) {
							echo '
								<div class="manageButtonsHeader">
								<a href="'.upOneLevel().'"><button type="button" class="cancel">Back</button></a>
								<button type="button" class="save" id="save_btn_mobile">Save</button>
								</div>
							';
						}
						else {
							echo '
							<span class="manageButtonsHeader">
									<a href="'.upOneLevel().'"><button type="button" class="cancel">Cancel</button></a>
									<button type="button" class="save" id="save_btn_mobile">Save</button>
							</span>						   
							';
						}
						
					
					?>
                      
                
                </nav>
                
            </div>
        
        
        
        
<?php } ?>        
      
</header>
