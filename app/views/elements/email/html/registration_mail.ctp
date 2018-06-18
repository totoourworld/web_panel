<div style="font-family:Arial, Helvetica, sans-serif">
Dear <?php echo $data['User']['name']; ?>,<br/><br/>
Following is your login details:<br/>
Username:&nbsp; <?php echo $data['User']['username']; ?><br/>
Password:&nbsp; <?php echo $data['User']['password']; ?><br/><br/>
<p>Please verify your account via clicking on this url <a href="http://aploads.com/development/InsuranceMonitor/users/verification/<?php echo $data['User']['verification_code']; ?>" target="_blank">verify your account</a></p><br/><br/><br/>
Kind Regards,<br/><br/>
Insurance Monitor <br/> 
</div>