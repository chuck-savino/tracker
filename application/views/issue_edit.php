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
    <div class="row">
        <div class="col-md-6" >
        <?php
            $id_seg = isset($issue) ? "{$issue[0]['id']}/": '';
            echo form_open("issues/update_issue/" . $id_seg);
            
            echo "<div class='form-group'>";
            echo form_label('Title *','name');
            $data_title = array(
                'name'=> 'name',
                'placeholder' => 'Enter a title',
                'value' => isset($issue) ? set_value('name', $issue[0]['name']) : set_value('name'),
                'class'=>'form-control'  
            );
            echo form_input($data_title);
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('Status *','status');
            $data_status = array(
                
                'class' => 'form-control'
            );
            $set_stat_def = "";
            if(!empty(set_value('status')))
            {
                
                $set_stat_def = set_value('status');
            } 
            elseif (isset($issue)) 
            {
                $set_stat_def = $issue[0]['status'];
            }
            else 
            {
                $set_stat_def = '0'; 
            }
            $statuses = array('0' => 'Select a status') + $statuses;
            echo form_dropdown('status', $statuses,$set_stat_def,$data_status);
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('Assigned To *','assigned_to');
            $data_assigned_to = array(
                'class' => 'form-control'
            );
            $users = array('0' => 'Select a user') + $users;
            
            $set_assigned_to_def = "";
            if(!empty(set_value('assigned_to')))
            {
                
                $set_assigned_to_def = set_value('assigned_to');
            } 
            elseif (isset($issue)) 
            {
                $set_assigned_to_def = $issue[0]['assigned_to'];
            }
            else 
            {
                $set_assigned_to_def = '0'; 
            }
            
            echo form_dropdown('assigned_to', $users,$set_assigned_to_def,$data_assigned_to);
           
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('OS *','os');
            $data_os = array(
                'name' => 'os',
                'value' =>  isset($issue) ? set_value('os', $issue[0]['os']) : set_value('os'),
                'placeholder' => 'Enter the os and revision, if available',
                'class' => 'form-control'
            );
            echo form_input($data_os);
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('URL *','url');
            $data_url = array(
                'name' => 'url',
                'value' => isset($issue) ? set_value('url', $issue[0]['url']) : set_value('url'),
                'placeholder' => 'Enter the URL',
                'class' => 'form-control'
            );
            echo form_input($data_url);
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('Authenticated? *','authenticated') . '<br>';
            
            $set_authenticated1_def = "";
            if(!empty(set_value('authenticated')))
            {
                
                $set_authenticated1_def = set_value('authenticated') === '1' ? TRUE : FALSE;
            } 
            elseif (isset($issue)) 
            {
                $set_authenticated1_def = $issue[0]['authenticated'] === '1' ? TRUE : FALSE;
            }
            else 
            {
                $set_authenticated1_def = FALSE; 
            }
            
            $data_authenticated1 = array(
                'name' => 'authenticated',
                'value' => '1',
                'checked' => $set_authenticated1_def,
                'class' => 'radio-inline'
            );
            echo form_label("Yes &nbsp;",'yes') .form_radio($data_authenticated1);
            
            $set_authenticated2_def = "";
            if(!empty(set_value('authenticated')))
            {
                $set_authenticated2_def = set_value('authenticated') === '1' ? FALSE : TRUE;
            } 
            elseif (isset($issue)) 
            {
                $set_authenticated2_def = $issue[0]['authenticated'] === '1' ? FALSE : TRUE;
            }
            else 
            {
                $set_authenticated2_def = FALSE; 
            }
            
            $data_authenticated2 = array(
                'name' => 'authenticated',
                'value' => '0',
                'checked' => $set_authenticated2_def,
                'class' => 'radio-inline'
            );
            
            echo form_label("&nbsp;No&nbsp;",'no') .form_radio($data_authenticated2);
            
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('Error Message *','error_msg');
            $data_error_msg = array(
                'name' => 'error_msg',
                'value' => isset($issue) ? set_value('error_msg', $issue[0]['error_msg']) : set_value('error_msg') ,
                'placeholder' => 'Enter the error message',
                'class' => 'form-control'
            );
            echo form_input($data_error_msg);
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label('Expected Output *','expected_output');
            $data_expected_output = array(
                'name' => 'expected_output',
                'value' =>  isset($issue) ? set_value('expected_output', $issue[0]['expected_output']) : set_value('expected_output'),
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
                'value' =>  isset($issue) ? set_value('notes', $issue[0]['notes']) : set_value('notes'),
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

