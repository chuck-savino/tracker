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

