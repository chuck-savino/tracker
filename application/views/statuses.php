<?php defined('BASEPATH') or exit('No direct scripts allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $statuses_revised = array_map(function($status){
     return array(
         'Status'=>$status['status'],
         'Last Updated'=> date('m/d/y h:i:s a',  strtotime($status['updated_at'])),
         '&nbsp' => "<a class=\"btn btn-xs btn-warning\" href=\"../statuses/delete_status/{$status['status']}\">Delete</a>" 
     );
     
 },$statuses);

 $statuses_table = build_table($statuses_revised,'table1');

?>

<div class="container">
    <div class="alert   <?php   if(!empty($message)) { echo  'show'  . ' ' . $msg_type; } else {echo 'hide'; }?>"  id="infoMessage"><?php echo $message;?></div>  
    
    <h2><?php echo $title;?></h2>
        <br>    
        <?php echo $statuses_table;?>  
</div>
    


<script>
$(document).ready(function(){
    $("#table1").DataTable();
});
</script>