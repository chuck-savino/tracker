<div id='container'>
    
<?php if(!empty($message)) { ?>    
    <div class="alert alert-danger" id="infoMessage"><?php echo $message;?></div>
<?php } ?>
    
<h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("base_auth/create_group");?>

      <p>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            <?php echo lang('create_group_desc_label', 'description');?> <br />
            <?php echo form_input($description);?>
      </p>

      <p><?php 
        $btn = array(
            'class' => "btn btn-primary btn-sm",
            'name' => 'create_group',
            'onclick'=> 'this.form.submit()'
        ); 
        echo form_button($btn, '<span class="glyphicon glyphicon-duplicate">&nbsp;<span style="font-family:sans-serif">Create Group</span></span>');
        ?>
      </p>

<?php echo form_close();?>
</div>