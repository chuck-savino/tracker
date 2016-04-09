<?php defined('BASEPATH') or exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="container">

    <div class="alert   <?php   if(isset($message)) { echo  'show'  . ' ' . $msg_type; } else {echo 'hide'; }?>"  id="infoMessage"><?php echo $message;?></div>  
    <div class="alert   <?php   if(null != validation_errors()) { echo  'show alert-danger';} ?>"  id="infoMessage"><?php echo validation_errors();?></div>
    <h2> <?php echo $title; ?></h2>
    <div class="row">
        <div class="col-md-6" >
        <?php
            echo form_open('issues/issue_update');
            
            echo "<div class='form-group'>";
            echo form_label('Title *','name');
            $data_title = array(
                'name'=> 'name',
                'placeholder' => 'Enter a title',
                'class'=>'form-control'  
            );
            echo form_input($data_title);
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('Status *','status');
            $data_status = array(
                'class' => 'form-control'
            );
            $statuses = array('-1' => 'Select a status') + $statuses;
            echo form_dropdown('status', $statuses,'-1',$data_status);
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('Assigned To *','assigned_to');
            $data_assigned_to = array(
                'class' => 'form-control'
            );
            $users = array('-1' => 'Select a user') + $users;
            echo form_dropdown('assigned_to', $users,'-1',$data_assigned_to);
           
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('OS *','os');
            $data_os = array(
                'name' => 'os',
                'placeholder' => 'Enter the os and revision, if available',
                'class' => 'form-control'
            );
            echo form_input($data_os);
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('URL *','url');
            $data_url = array(
                'name' => 'url',
                'placeholder' => 'Enter the URL',
                'class' => 'form-control'
            );
            echo form_input($data_url);
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('Authenticated? *','authenticated') . '<br>';
            $data_authenticated1 = array(
                'name' => 'authenticated',
                'value' => 'Yes',
                'checked' => FALSE,
                'class' => 'radio-inline'
            );
            echo form_label("Yes &nbsp;",'yes') .form_radio($data_authenticated1);
            
            $data_authenticated2 = array(
                'name' => 'authenticated',
                'value' => 'No',
                'checked' => FALSE,
                'class' => 'radio-inline'
            );
            echo form_label("&nbsp;No&nbsp;",'no') .form_radio($data_authenticated2);
            
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('Error Message *','error_msg');
            $data_error_msg = array(
                'name' => 'error_msg',
                'placeholder' => 'Enter the error message',
                'class' => 'form-control'
            );
            echo form_input($data_error_msg);
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('Expected Output *','expected_output');
            $data_expected_output = array(
                'name' => 'expected_output',
                'rows' => '8',
                'placeholder' => 'Describe the results you expected',
                'class' => 'form-control'
            );
            echo form_textarea($data_expected_output);
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('Notes','notes');
            $data_notes = array(
                'name' => 'notes',
                'rows' => '8',
                'placeholder' => 'Additional Notes',
                'class' => 'form-control'
            );
            echo form_textarea($data_notes);
            echo "</div>";
            ?>    
            <div class="row">
                <div class="col-md-4" style="margin-top:10px">
                <?php
                    echo form_submit('submit','Submit',"class=\"btn btn-primary\"");
                    echo form_close();
                ?> 
                </div>    
            </div>    
        </div>
    </div>

