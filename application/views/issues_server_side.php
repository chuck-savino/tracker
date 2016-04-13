<?php defined('BASEPATH') OR exit('No direct scripts allowed');?>

<style type="text/css">
    .dataTables_wrapper .dataTables_paginate .paginate_button
    {
        padding: 0;
    }
</style>

<div class="container">
    <div class="alert   <?php   if(!empty($message)) { echo  'show'  . ' ' . $msg_type; } else {echo 'hide'; }?>"  id="infoMessage"><?php echo $message;?></div>  
    <h2><?php echo $title; ?></h2>
    <br>
    <table id="table1" class="table table-striped table-bordered no-footer dataTable">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>status</th>
                <th>assigned_to</th>
                <th>os</th>
                <th>updated at</th>
                <th>&nbsp</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $(document).ready(function(){
        $('#table1')
            .on('xhr.dt',function(e,settings,json,xhr){
                var base_url = "<?php echo base_url();?>";
                for (var i=0, ien=json.data.length; i < ien; i++)
                {
                    var id = json.data[i][0];
                    var btns = "<a class=\"btn btn-xs btn-success\" href=\"" + 
                        base_url +  "issues/get_issue/" + id + "\">Browse</a>"
                    + "&nbsp;&nbsp;<a class=\"btn btn-xs btn-primary\" href=\"" 
                    + base_url + "issues/update_issue/" + id + "\">Edit</a>"
                    + "&nbsp;&nbsp;<a class=\"btn btn-xs btn-warning\" href=\""
                    + base_url + "issues/delete_issue/" + id + "\">Delete</a>";
                json.data[i][6] =  btns;    
                }
            })
            .DataTable({
                processing:true,
                serverSide:true,
                ajax: "http://www.csavino.com/tracker/issues/get_all_issues_json"
            });
        $('#table1_paginate').css('float','right');
    });
</script>