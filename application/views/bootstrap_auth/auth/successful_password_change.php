<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="container">
          
        <div class="alert alert-success" id="infoMessage">Password changed successfully. </div>
        <h1>Welcome to <?php echo $this->config->item('site_title','ion_auth'); ?>!</h1>

	<div id="body">
            <p style='padding-left:5px'>You are <span style='color:red;font-weight:bold'>not</span> logged in. Please login (above) 
                    using your new password to continue.</p>
        </div>    
            
</div>

