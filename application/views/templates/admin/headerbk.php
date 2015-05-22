<?php

	//echo $postback;

if($this->session->userdata('login_success')!='success')
{			

    redirect(base_url());
	 exit;	
}

$section = "account";

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					
if($actual_link==base_url()){
$subSection='accounts';
}

if($this->uri->segment(1)=='agency'){
if(!isset($_GET['section'])) $section = "account";
else $section = $_GET['section'];
if(isset($_GET['subSection']))
$subSection = $_GET['subSection'];
$subSection = 'accounts';
if(isset($_GET['view']))
$view=$_GET['view'];
}

if($this->uri->segment(1)=='audience'){

if(!isset($_GET['section'])) $section = "people";
else $section = $_GET['section'];	
	
}


if($this->uri->segment(1)=='account_setting'){
if(!isset($_GET['section'])) $section = "account";
else $section = $_GET['section'];
if($this->uri->segment(1)=='account_setting'){
$subSection = 'profile';
}
if(isset($_GET['view']))
$view=$_GET['view'];

//echo $subSection;

}

if($this->uri->segment(1)=='people_user_controller'){

if(!isset($_GET['section'])) $section = "people";
else $section = $_GET['section'];	

}


$breadcrum_page='';
if($this->uri->segment(2)=='audience' || $this->uri->segment(3)=='new' || $this->uri->segment(2)=='audience_setting' ||$this->uri->segment(2)=='audience_search'){$audience_class_selected='class=selected';
$breadcrum_page='Audience';
}else{$audience_class_selected='';}
					$people_me_class_selected='';
					$people_administrator_class_selected='';
					$people_eitors_class_selected='';
					$people_members_class_selected='';
					
					if($this->uri->segment(2)=='people_administrator' || $this->uri->segment(2)=='people_administrator_add' || $this->uri->segment(2)=='edit_people_administrator' || $this->uri->segment(3)=='anew'){
						$people_administrator_class_selected='class=selected';
						$breadcrum_page='Administrator';
					}
					if(isset($roles) && $roles==1){
					    $people_administrator_class_selected='class=selected';
						$breadcrum_page='Administrator';	
					}
					
					if($this->uri->segment(2)=='people_editor' || $this->uri->segment(2)=='edit_people_editor' || $this->uri->segment(3)=='enew'){
						$people_eitors_class_selected='class=selected';
						$breadcrum_page='Editor';
					}
					
					if(isset($roles) && $roles==2){
					    $people_eitors_class_selected='class=selected';
						$breadcrum_page='Editor';
					}
					
					if($this->uri->segment(2)=='people_member' || $this->uri->segment(2)=='edit_people_member' || $this->uri->segment(3)=='mnew'){
						$people_members_class_selected='class=selected';
						$breadcrum_page='Member';
					}
					
					if(isset($roles) && $roles==3){
					    $people_members_class_selected='class=selected';
						$breadcrum_page='Member';
					}
					
					if($this->uri->segment(2)=='people_me' || $this->uri->segment(2)=='edit_people_me'){
						$people_me_class_selected='class=selected';
						$breadcrum_page='Me';
					}


?>

<header id="headerContainer">
         <?php if($this->session->userdata('login_success')=='success'){?>
        
            <div id="sectionContainer">
                
                <nav id="sectionMenu">
            
        <?php
		$prof_id=$this->uri->segment(3);
		if($prof_id==''){
						$prof_id=$this->session->userdata('account_id');
					}?>
            
                    <ul id="navButtonContainer">
                        <li>                           
                            <a class="navButton account <?php if($section == "account") echo "active"; else echo "";?>" onclick="return false;" href="#"></a>
                            <ul>
                                <li class="first"><a href="<?php echo base_url();?>agency">Accounts</a></li>
                                <?php if($this->session->userdata('role_id')==1){ ?>
                                <li><a href="<?php echo base_url();?>account_setting/profile/<?php echo $prof_id; ?>">Settings</a></li>
                                <li><a href="/account/designs">Designs</a></li>
                                <?php } ?>
                                <li><a href="/account/connections">Connections</a></li>
                            </ul>
                        </li>
                   
                        <li><a class="navButton people <?php if($section == "people") echo "active"; else echo "";?>" href="<?php echo base_url();?>audience/audience"></a></li>
                        
                        <li>
                            <a class="navButton content <?php if($section == "content") echo "active"; else echo "";?>" onclick="return false;" href="#"></a>
                            <ul id="contentMenuDropdown">
                                <li class="first"><a href="/content/websites">Websites</a></li>
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
							

                        if(isset($connections) && is_array($connections)) {
							$tempConnections = $connections;
                            echo '
							<li class="next">></li>
                            <li>'.array_shift($tempConnections).'</li>
							';
							// If there are any sub connections
							if(count($tempConnections) > 0)
								echo '
								<li class="clickable">(Change)
									<ul>';

								foreach($tempConnections AS $connection)
									echo '
									<li><a href="#">'.$connection.'</a></li>';
								
								echo '
									</ul>
								</li>';
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
                    
                    <div id="accountContainer">
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
                    </div>
                    
                    <div id="userContainer">
                        <li>
                            Editing as Jason
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
					if($this->uri->segment(2)=='profile' || $this->uri->segment(2)=='profile_save'){
						$profile_class_selected='class=selected';
					}
					
					if($this->uri->segment(2)=='owner' || $this->uri->segment(2)=='owner_save'){
						$owner_class_selected='class=selected';
					}
					
					if($this->uri->segment(2)=='options' || $this->uri->segment(2)=='options_add'){
						$option_class_selected='class=selected';
					}
					$class_account_selected='';
					
					
					if($this->uri->segment(1)=='agency' || $actual_link==base_url()){
						$class_account_selected='class=selected';
					}
					
					
					if($this->session->userdata('role_id')==1){
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
								"editors" => "<a ".$people_eitors_class_selected." href='".base_url()."people_user_controller/people_editor'>Editors</a>",
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
										"activity" => "<a href='#'>Activity</a>",
										"accounts" => "<a ".$class_account_selected." href='#'>Accounts</a>"
									);
                                    break;

                                case "profile": 
									if(isset($postback))
									{
                                    $subNavArray = 
									array(
										"activity" => "<a href='#'>Activity</a>",
										"owner" => "<a ".$owner_class_selected." href='".base_url()."account_setting/owner/".$postback."'>Owner</a>", 
										"profile" => "<a ".$profile_class_selected." href='".base_url()."account_setting/profile/".$postback."'>Profile</a>", 
										"options" => "<a ".$option_class_selected." href='".base_url()."account_setting/options/".$postback."'>Options</a>"
									);
									}
									else
									{
									$subNavArray = 
									array(
										"activity" => "<a href='#'>Activity</a>",
										"owner" => "<a ".$owner_class_selected." href='".base_url()."account_setting/owner/".$prof_id."'>Owner</a>", 
										"profile" => "<a ".$profile_class_selected." href='".base_url()."account_setting/profile/".$prof_id."'>Profile</a>", 
										"options" => "<a ".$option_class_selected." href='".base_url()."account_setting/options/".$prof_id."'>Options</a>"
									);
									}
                                    break;
									
        
                                case "designs":  
                                    $subNavArray = 
									array(
										"activity" => "<a href='/account/designs/activity'>Activity</a>", 
										"collections" => "<a href='/account/designs/collections'>Collections</a>", 
										"designs" => "<a href='/account/designs/designs'>Designs</a>", 
										"layouts" => "<a href='/account/designs/layouts'>Layouts</a>", 
										"files" => "<a href='/account/designs/files'>Files</a>"
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
									$subNavArray = 
									array(
										"activity" => "<a href='/content/websites/activity'>Activity</a>", 
										"menu" => "<a href='/content/websites/menu'>Menu</a>", 
										"pages" => "<a href='/content/websites/pages'>Pages</a>", 
										"repeats" => "<a href='/content/websites/repeats'>Repeats</a>", 
										"files" => "<a href='/content/websites/files'>Files</a>"
									);
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
						$subNavArray[$view] = str_replace(  "href", "class='selected' href", $subNavArray[$view]);
						
					else if(isset($subSection))
						$subNavArray[$subSection] = str_replace(  "href", " href", $subNavArray[$subSection]);
                    ?>
                    <ul id="subSectionNavButtonContainer">
                        <?php
                        foreach($subNavArray AS $key => $val) {
                            echo '<li '.(strcmp($key, "selected")==0 ? 'class="selected"' : '').'><a class="subNavButton" href="#">'.$val.'</a></li>
                            ';
						}
                        ?>
                    </ul>
        
                    <ul id="subSectionNavButtonContainerMobile">
                        
                        <?php
                        if(count($subNavArray) > 0) {
                            echo '<select id="subSectionNavButtonMobile">';
                            foreach($subNavArray AS $val)
                                echo '<option value="'.$val.'">'.$val.'</option>
                                ';
                            echo '</select>';
                        }
                        ?>
                        
                        <select id="subSectionNavOptionMobile">
                            <option>Options</option>
                        </select>
                        
                    </ul>       
                      
                
                </nav>
                
            </div>
        
        
        
        
<?php } ?>        
      
</header>
