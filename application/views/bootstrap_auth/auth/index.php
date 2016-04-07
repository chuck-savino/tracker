<div id="container">
<h1><?php echo lang('index_heading');?></h1>
<p><?php echo lang('index_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<table class="table table-striped">
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("base_auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("base_auth/deactivate/".$user->id, lang('index_active_link')) : anchor("base_auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("base_auth/edit_user/".$user->id, "<span class='glyphicon glyphicon-edit'></span>&nbsp;Edit",array('class'=>'btn btn-primary btn-sm')) ;?></td>
     	</tr>
	<?php endforeach;?>
</table>

<p><?php echo anchor("base_auth/create_user/".$user->id, "<span class='glyphicon glyphicon-user'></span>&nbsp;".lang('index_create_user_link'),array('class'=>'btn btn-primary btn-sm')) ;?>
    &nbsp;
   <?php echo anchor("base_auth/create_group/", "<span class='glyphicon glyphicon-duplicate'></span>&nbsp;".lang('index_create_group_link'),array('class'=>'btn btn-primary btn-sm')) ;?>
</p>
</div>
