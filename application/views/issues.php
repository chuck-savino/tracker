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
           'last updated'=>date("m/d/Y h:i:s a",strtotime($issues['updated_at'])),
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

<style type="text/css">
    .dataTables_wrapper .dataTables_paginate .paginate_button
    {
        padding: 0;
    }
</style>

<div class="container">
    
    <div class="alert   <?php   if(!empty($message)) { echo  'show'  . ' ' . $msg_type; } else {echo 'hide'; }?>"  id="infoMessage"><?php echo $message;?></div>  
    <h3><?php echo $title; ?></h3>
    <br>
    <?php echo $issues_table; ?>
    
</div>

<script>
    $(document).ready(function(){
        $('#table1').DataTable({
            dom:'Blfrtip', 
            processing:true,
            buttons: [ 'copy', 'csv','excel', 'pdf'],
            "columnDefs":[
                {"width":"140px","targets":5},
                {"width":"140px","targets":6}
            ]
            });
        $('#table1_wrapper a').addClass('btn-primary').removeClass('btn-default');   
        $('#table1_wrapper a.btn').css('margin-right','2px');
        $('.dt-buttons.btn-group').css({'float':'left','margin-right':'20px'});
        $('#table1_length').css('float','left');
        $('#table1_info').css('float','left');
        $('#table1_paginate').css('float','right');
    });
</script>