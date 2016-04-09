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
       'assigned to'=>$issues['assigned_to'],
       'os'=>$issues['os'],
       'last updated'=>date("m/d/y h:i:s a",strtotime($issues['updated_at'])),
       '&nbsp;'=> "<a class=\"btn btn-xs btn-success\" href=\"../issues/get_issue/{$issues['id']}\">Browse</a>"
                    . "&nbsp;<a class=\"btn btn-xs btn-warning\" href=\"../issues/delete_issue/{$issues['id']}\">Delete</a>"         
   );
},$issues);
$issues_table = build_table($issues_rev, 'table1');
?>

<div id="xcontainer" class="container">
    
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