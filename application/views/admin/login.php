<link href="<?php echo base_url(); ?>assets/css/admin/styles.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/admin/login.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/admin/responsive.css" rel="stylesheet" type="text/css" />


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>

<main id="contentContainer" class="whiteFont">

<div id="loginContainer">
            <div id="top">
            
            	<?php if(isset($showError)) echo $showError;?>

                <form action="agency/user_login" method="post">
                    <div class="row">
                        <div class="col span_5"><label class="loginForm">Username</label></div>
                        <div class="col span_11"><input name="txt_agencyname" type="text" /></div>
                    </div>
                    <div class="row">
                        <div class="col span_5"><label class="loginForm">Password</label></div>
                        <div class="col span_11">
                        	<input name="txt_agencypass" type="password" />
                            <button type="submit" name="submitButton"></button>
                        </div>
                    </div>
                    <div class="row keepSignedInRow">
                    
						<div class="keepSignedIn yes"><a href="#" onclick="$('#myonoffswitch').prop('checked', true); return false;">Yes</a></div>
                        <div class="onoffswitchContainer">
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" value="Yes" checked>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                        </div>
                        <div class="keepSignedIn no"><a href="#" onclick="$('#myonoffswitch').prop('checked', false); return false;">No</a></div>
                    	<div class="keepSignedIn label">Keep Me Signed In?</div>

                        
                                                
                    </div>
                </form>


            </div>
            
            <div id="bottomLeft">
            <?php echo anchor('admin/signup', '<span>Create Account</span>', array('title' => 'Create Account')); ?>
            </div>
            
            <div id="bottomRight">
            	<a href="#">Forgot Password?</a>
            </div>
    
		</div>    
</main>
		<!--

    	<div id="loginContainer">
            <div class="row">
                <div class="col span_16" id="top">
                	<form>
	                    <div class="row">
                        	<div class="col span_4">Username</div>
                            <div class="col span_12"><input type="text" /></div>
                        </div>
	                    <div class="row">
                        	<div class="col span_4">Password</div>
                            <div class="col span_12"><input type="text" /></div>
                        </div>
                    
                    </form>
                </div>
            </div>
            
            <div class="row">
                <div class="col span_8" id="bottomLeft">
                    <a href="#">Create Account</a>
                </div>
                <div class="col span_8" id="bottomRight">
                    <a href="#">Forgot Password?</a>
                </div>
    		</div>
    
		</div>   