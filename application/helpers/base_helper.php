<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function disp($val, $continue = FALSE)
{
    echo "<PRE>";
    var_dump ($val);
    echo "<?PRE>";
    if($continue ==FALSE)
    {
        die();
    }    
}        

/**
 * 
 * used in data tables to format an array as an HTML table so it can be
 * used as input to a jQuery Datatables call.
 * 
 * @param type $array
 * @param type $css_id
 * @return string
 */
function build_table($array,$css_id = NULL){
    // start table
    
    if (is_null($css_id))
    {
        $html = "<table class='display'>";
    }
    else 
    {
        $html = "<table id='{$css_id}' class='table table-striped table-bordered no-footer'>";    
    }    
    // header row
    $html .= '<thead><tr>';
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . $key . '</th>';
        }
    $html .= '</tr></thead>';

    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . $value2 . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}  

/**
 * the following are used to reduce the code required to create form fields 
 */

/**
 * 
 * if $rows is null, creates a form_input field, if $rows has a value, creates
 * a form_textarea field
 * 
 * @param type $fld_name
 * @param type $array_name
 * @param type $placeholder
 * @param type $fld_label
 * @param type $rows
 */
function add_form_input($fld_name, $array_name,$placeholder = NULL,$fld_label = NULL, $rows = NULL) 
{
    echo "<div class='form-group'>";
    $fld_label = $fld_label;
    if ($fld_label === NULL)
    {
        $fld_label = $fld_name;
    }    
    echo form_label($fld_label,$fld_name);
    $data_status = array(
        'name'=> $fld_name,
        'value' => isset($array_name) ? set_value('name', $array_name[0][$fld_name]) : set_value($fld_name),
        'placeholder' => $placeholder,
        'class'=>'form-control'  
    );
    if ($rows === NULL)
    {    
        echo form_input($data_status);
    }
    else 
    {
        $data_status['rows'] = $rows;
        echo form_textarea($data_status);
    }
    echo "</div>";
}

function add_form_select($fld_type, $fld_name, $array_name,$options = NULL, $default_value = NULL,$fld_label = NULL)
{
    echo "<div class='form-group'>";
    echo form_label($fld_label,$fld_name);
    $data_status = array(
      'class' => 'form-control'
    );
    $set_fld_def = "";
    if (isset($array_name)) 
    {
        $set_fld_def = set_value($fld_name, $array_name[0][$fld_name]) ;
    }
    else 
    {
        $set_fld_def = set_value($fld_name); 
    }
    $options = array('0' => $default_value) + $options;
    if ($fld_type == 'dropdown')
    {    
        echo form_dropdown($fld_name, $options,$set_fld_def,$data_status);
    }
    else 
    {
        echo form_multiselect($fld_name, $options,$set_fld_def,$data_status);
    }
    echo "</div>";
}



function add_form_checkbox_or_radio($fld_type, $fld_name, $array_name, $options = NULL, $default_value = NULL,$fld_label = NULL)
{
    echo "<div class='form-group'>";
    echo form_label($fld_label,$fld_name) . '<br>';
    
    foreach($options as $save_value => $display_value)
    {
        
        $set_default  = "";
        if(!empty(set_value($fld_name)))
        {
            $set_default = set_value($fld_name) == $save_value ? TRUE : FALSE;
        } 
        elseif (isset($array_name)) 
        {
            $set_default = $array_name[0][$fld_name] == $save_value ? TRUE : FALSE;
        }
        else 
        {
            $set_default = FALSE; 
        }
        $data_display = array(
            'name' => $fld_name,
            'value' => $save_value,
            'checked' => $set_default,
            'class' => 'radio-inline'
        );
        
        if($fld_type == 'checkbox')
        {    
            echo form_label("$display_value &nbsp;","$display_value") . form_checkbox($data_display);
        }
        else
        {
            echo form_label("$display_value &nbsp;","$display_value") . form_radio($data_display);
        }    
    }    
    
    echo "</div>";
}