<!doctype html>
<html>
 <body>
   <form method='post' action='<?= base_url(); ?>Crud/login'>

     <table>
       <tr>
         <td>Name</td>
         <td><input type='text' name='txt_name'></td>
       </tr>
       <tr>
         <td>Username</td>
         <td><input type='text' name='txt_uname'></td>
       </tr>
       <tr>
         <td>Email</td>
         <td><input type='text' name='txt_pass'></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td><input type='submit' name='submit' value='Submit'></td>
       </tr>
    </table>
 
   </form>
 </body>
</html>