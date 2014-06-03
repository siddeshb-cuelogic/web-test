<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter</title>
   
 </head>
 <body>
   <h1>Login</h1>
      <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
   <table>
   
   <tr>
   <td>
     <label class="tb" for="username">Username:</label> </td>
     <td>
     <input type="text" size="20" id="username" name="username"/></td>
     </tr>
     <tr>
     <td>
    
     <label class="tb" for="password">Password:</label></td>
     <td>
     <input type="password" size="20" id="passowrd" name="password"/></td>
     </tr>


</table>
  
     <input type="submit" value="Login"/>
   </form>
   <a class="li" href="<?php echo base_url();?>index.php/register/index">Register</a>
 </body>
</html>