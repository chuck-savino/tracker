<div id="container">
<h1><?php echo lang('deactivate_heading');?></h1>
                   
<p><?php echo sprintf(lang('deactivate_subheading'), $user->first_name . ' '  . $user->last_name . ', ' .$user->email);?></p>

<?php echo form_open("base_auth/deactivate/".$user->id);?>

  <p>
    <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden(array('id'=>$user->id)); ?>

  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'),array('class'=>'btn btn-primary btn-sm'));?></p>

<?php echo form_close();?>
</div>