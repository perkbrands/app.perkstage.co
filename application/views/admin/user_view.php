<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Log In</title><style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
   <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" />
	<script type="text/javascript" src="../js/jqueryui-1.10.3.min.js"></script>
--><script>
/*$("#createaccount").click(function(){
  alert("ssssssssssss");
});*/
</script>
</head>
<body>
<?php 
	?>
<div id="container">
	<h1>User Log In </h1>

	<div id="body">
    <form action="user_login" method="post">
	<table>
    	<tr>
        	<td>
            	Enter User Name
            </td>
            <td>
            	<input type="email" name="txt_username" required />
            </td>
        </tr>
        <tr>
        	<td>
            	Enter User Password
            </td>
            <td>
            	<input type="password" name="txt_userpass" required />
            </td>
        </tr>
        <tr>
        	<td>
            </td>
        	<td>
 				<input type="submit" value="Create Account" id="createaccount"/>	
 				<input type="submit" value="Log In" id="login"/>	
 	        </td>
        </tr>
    
    </table>
    </form>	
    </div>    
    </div>
  <div id="container">
	<h1>User Sign Up </h1>   
	<div id="body">
  <form action="user_add" method="post">
    <table>
    	<tr>
        	<td>
            	Enter User First Name
            </td>
            <td>
            	<input type="text" name="txt_user_fname" value="<?php if(isset($edit[0]->user_fname)) echo $edit[0]->user_fname; ?>" required/>
            </td>
        </tr>
		
        <tr>
        	<td>
            	Enter User Last Name
            </td>
            <td>
            	<input type="text" name="txt_user_lname" value="<?php if(isset($edit[0]->user_lname)) echo $edit[0]->user_lname; ?>" required/>
            </td>
        </tr>        
        <tr>
        	<td>
            	Enter User Email
            </td>
            <td>
            	<input type="email" name="txt_useremail" value="<?php if(isset($edit[0]->user_email)) echo $edit[0]->user_email; ?>" required/>
            </td>
        </tr>       
        <tr>
        	<td>
            	User Role
            </td>
            <td>
            	<select name="list_role" style="width:148px;">
              <option value="">Select Role</option>   
				<?php
				foreach($allrole as $row)
				{
                ?>
             		<option value="<?php echo $row->role_name; ?>" <?php  if(isset($edit[0]->user_role)&&$edit[0]->user_role==$row->role_name){ echo 'selected';} ?>><?php echo $row->role_name; ?></option>    				   

                <?php
				}
				?>              
				</select>
            </td>
        </tr>
        
        <tr>
        	<td>
            	Enter User Password
            </td>
            <td>
            	<input type="password" name="txt_userpass1" value="" required/>
            </td>
        </tr>
        <tr>
        	<td>
            	Confirm Password
            </td>
            <td>
            	<input type="password" name="txt_userpass2" value="" required/>
            </td>
        </tr>
        <tr>
        	<td>
            	Status
            </td>
            <td>
            	<select name="list_status" style="width:148px;">
             	   <option value="1" <?php if(isset($edit[0]->user_status) && $edit[0]->user_status==1){ echo 'selected';} ?>>Active</option>                
             	   <option value="0" <?php if(isset($edit[0]->user_status) && $edit[0]->user_status==0){ echo 'selected';} ?>>InActive</option> 
				</select>
            </td>
        </tr>
            	<input type="hidden" value="<?php if(isset($edit[0]->user_id)) echo $edit[0]->user_id?>" name="hidden_id"/>

        <tr>
        	<td>
            </td>
        	<td>
 				<input type="submit" value="Submit"/>	
 	        </td>
        </tr>
    </table>
    </form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>