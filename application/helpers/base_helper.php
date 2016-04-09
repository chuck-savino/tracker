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