<?php   defined('BASEPATH') or exit('Nodirect script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container">
    
<h2><?php echo $title; ?></h2>
<br>
<div class="form-horizontal col-sm-10">
    <div class="form-group ">
        <label class="col-sm-2 control-label">
            Title
        </label>
        <div class="col-sm-8">
            <p class="form-control-static"><?php echo $issue[0]['name'];?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            Status
        </label>
        <div class="col-sm-8">
            <p class='form-control-static'><?php echo $issue[0]['status']; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            Assigned To
        </label>
        <div class="col-sm-8">
            <p class='form-control-static'><?php echo $issue[0]['assigned_to']; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            OS
        </label>
        <div class="col-sm-8">
            <p class='form-control-static'><?php echo $issue[0]['os']; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">
            Authenticated
        </label>
        <div class="col-sm-8">
            <p class='form-control-static'><?php echo $issue[0]['authenticated']; ?></p>
        </div>
    </div>
    <div class='form-group'>
        <label class='col-sm-2 control-label'>
            Error msg
        </label>
        <div class="col-sm-8">
            <p class="form-control-static"><?php echo $issue[0]['error_msg']; ?></p>
        </div>    
    </div>
    <div class='form-group'>
        <label class='col-sm-2 control-label'>
            Expected Output
        </label>
        <div class="col-sm-8">
            <p class="form-control-static"><?php echo $issue[0]['expected_output']; ?></p>
        </div>
    </div>    
    <div class='form-group'>
        <label class='col-sm-2 control-label'>
            Notes
        </label>
        <div class="col-sm-8">
            <p class="form-control-static"><?php echo $issue[0]['notes']; ?></p>
        </div>
    </div>
    <div class='form-group'>
        <label class='col-sm-2 control-label'>
            Updated By
        </label>
        <div class="col-sm-8">
            <p class="form-control-static"><?php echo $issue[0]['updated_by']; ?></p>
        </div>    
    </div>
    <div class='form-group'>
        <label class='col-sm-2 control-label'>
            Last Updated
        </label>
        <div class="col-sm-8">
            <p class="form-control-static"><?php echo $issue[0]['updated_at']; ?></p>
        </div>    
    </div>
</div>
<div class="col-sm-10">
    <p></p>
<a class="btn btn-small btn-primary" href="../issues/show_all_issues">Back</a>
</div>
</div>
