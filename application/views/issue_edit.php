<?php defined('BASEPATH') or exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="container">
    
    <div class="alert   <?php   if(isset($message)) { echo  'show'  . ' ' . $msg_type; } else {echo 'hide'; }?>"  id="infoMessage"><?php echo $message;?></div>  
    <h2> <?php echo $title; ?></h2>
    <div class="row col-md-6" >
        <?php
            $issue = isset($issue) ? $issue : NULL;
            $id_seg = isset($issue) ? "{$issue[0]['id']}/": '';
            echo form_open("issues/update_issue/" . $id_seg);
            //these custom helper functions in helpers/base_helpers
            add_form_input('name', $issue, 'Add a Title', 'Title *');
            add_form_select('dropdown','status', $issue,$statuses, 'Select a status','Status *');
            add_form_select('dropdown', 'assigned_to', $issue,$users, 'Select a user','Assigned To *');
            add_form_input('os', $issue, 'Add an OS', 'OS *');
            add_form_input('url', $issue, 'Add a URL', 'URL *');
            add_form_checkbox_or_radio('radio', 'authenticated', $issue,array('1'=>'yes', '0'=>'no'), $default_value = NULL,'Authenticated? *');
            add_form_input('error_msg', $issue, 'Enter the error message', 'Error Message *');
            add_form_input('expected_output', $issue, 'Describe the results you expected', 'Expected Output * ',8);
            add_form_input('notes', $issue, 'Additional Notes', 'Notes',8);
            ?>    
        <div class="row col-md-6">
            <?php
                echo form_submit('submit','Submit',"class=\"btn btn-primary\"");
                echo form_close();
            ?> 
        </div>    
    </div>
</div>

