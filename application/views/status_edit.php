<?php defined('BASEPATH') or exit('No direct scripts allowed');

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
        <div class="col-md-4" >
        <?php
            echo form_open('statuses/form_submit');

            echo form_label('status','status');
            $data_status = array(
                'name'=> 'status',
                'value' => set_value('status'),
                'placeholder' => 'Enter a status',
                'class'=>'col-md-2 form-control'  
            );
            echo form_input($data_status);
        ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4" style="margin-top:10px">
        <?php
            echo form_submit('submit','Submit',"class=\"btn btn-primary\"");
            echo form_close();
        ?> 
        </div>    
    </div>    
    
    
    
</div>
