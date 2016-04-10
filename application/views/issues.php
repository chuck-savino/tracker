<?php defined('BASEPATH') OR exit('No direct scripts allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$issues_rev = array_map(function($issues){
     
   return array(
       'id'=>$issues['id'],
       'title'=>$issues['name'],
       'status'=>$issues['status'],
       'assigned to'=> $issues['assigned_to'],
       'os'=>$issues['os'],
       'last updated'=>date("m/d/y h:i:s a",strtotime($issues['updated_at'])),
       '&nbsp;'=> "<a class=\"btn btn-xs btn-success\" href=\"" . base_url() . "issues/get_issue/{$issues['id']}\">Browse</a>"
            . "&nbsp;&nbsp;<a class=\"btn btn-xs btn-primary\" href=\"" . base_url() . "issues/update_issue/{$issues['id']}\">Edit</a>"
            . "&nbsp;&nbsp;<a class=\"btn btn-xs btn-warning\" href=\"" . base_url() . "issues/delete_issue/{$issues['id']}\">Delete</a>"         
   );
},$issues);

//swap assigned_to code with the user's name from the $data[users] table
foreach($issues_rev as $key => $value)
{
    $issues_rev[$key]['assigned to'] = $users[$value['assigned to']];
    
}    

$issues_table = build_table($issues_rev, 'table1');
?>

<div class="container">
    
    <div class="alert   <?php   if(!empty($message)) { echo  'show'  . ' ' . $msg_type; } else {echo 'hide'; }?>"  id="infoMessage"><?php echo $message;?></div>  
    <h2><?php echo $title; ?></h2>
    <br>
    <?php echo $issues_table; ?>
    
</div>

<script>
    $(document).ready(function(){
        $('#table1').DataTable();
    });
</script>