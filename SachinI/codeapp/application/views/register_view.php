<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter</title>
   
 </head>
 <body>
   <h1>Registration Form</h1>
     
   <?php echo form_open('register/registration'); ?>
   <table>
     <tr>
   <td>
     <label class="tb" for="firstname">Firstname:</label> </td>
     <td>
     <input type="text" size="20" id="firstname" name="firstname"/></td><td height="13" align="left"><?php echo form_error('firstname', '<span class="error">', '</span>'); ?></td>
     </tr>
     <tr>
       <tr>
   <td>
     <label class="tb" for="lastname">Lastname:</label> </td>
     <td>
     <input type="text" size="20" id="lastname" name="lastname"/></td><td height="13" align="left"><?php echo form_error('lastname', '<span class="error">', '</span>'); ?></td>
     </tr>
     <tr>
   <tr>
   <td>
     <label class="tb" for="username">Username:</label> </td>
     <td>
     <input type="text" size="20" id="username" name="username"/></td>  <td height="13" align="left"><?php echo form_error('username', '<span class="error">', '</span>'); ?></td>

     </tr>
       

     <tr>
     <td>
    
     <label class="tb" for="password">Password:</label></td>
     <td>
     <input type="password" size="20" id="passowrd" name="password"/></td><td height="13" align="left"><?php echo form_error('password', '<span class="error">', '</span>'); ?></td>
     </tr>
      <tr>
     <td>
    
     <label class="tb" for="cpassword">Confirm Password:</label></td>
     <td>
     <input type="password" size="20" id="cpassowrd" name="cpassword"/></td><td height="13" align="left"><?php echo form_error('cpassword', '<span class="error">', '</span>'); ?></td>
     </tr>
<tr>
    <td>
     <label class="tb" for="email">Email:</label></td>
     <td>
  <input type="text" id="email" name="email" value="" /></td><td height="13" align="left"><?php echo form_error('email', '<span class="error">', '</span>'); ?></td>
  </tr>
   <tr>
  <td>
  
   <label for="gender">Gender:</label></td>
   <td>
  <select id="gender" name="gender">
  <option value="male">Male</option>
  <option value="female">Female</option>
  </select></td>
  </tr>
  <tr>
  <td>
  
   <label for="phone">Phone Number:</label></td>
   <td>
  <input type="text" id="phone" name="phone" value="" /></td><td height="13" align="left"><?php echo form_error('phone', '<span class="error">', '</span>'); ?></td>
  </tr>
  <tr>
  <td>
  
   <label for="city">City:</label></td>
   <td>
  <select id="city" name="city">
  <option value="pune">Pune</option>
  <option value="mumbai">Mumbai</option>
  </select></td>
  </tr>

</table>
  
     <input type="submit" value="Register"/>
   </form>
 </body>
</html>