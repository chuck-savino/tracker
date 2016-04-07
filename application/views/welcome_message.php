<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<img src="application/resources/bootstrap_auth/images/nz1.jpg" style="height:250px; width:100%;position:relative;top:-10px;">
<div id="container">
        <?php   //disp($this->session->flashdata('message'),true);
            
                if(!is_null($this->session->flashdata('message'))) { ?>    
            <div class="alert alert-danger" id="infoMessage"><?php echo $this->session->flashdata('message');?></div>
        <?php } ?>
            
            <h1>Welcome to <?php echo $this->config->item('site_title','ion_auth'); ?>!</h1>

	<div id="body">
            <?php
                if($this->ion_auth->logged_in())
                {
                    echo "<p>You are currently logged in.</p>";
                }
                else
                {
                    echo "<p style='padding-left:5px'>You are <span style='color:red;font-weight:bold'>not</span> logged in. Please login (above) to continue.</p>";
                }
            
            ?>
	
</div>

