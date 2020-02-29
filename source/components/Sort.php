<?php
    function createRadio($array, $nameRadio){
    if ($array[0]['sort'] == $nameRadio)
        echo '<input name="sort" id="' . $nameRadio .'" type="radio" value="' . $nameRadio . '" checked>';
    else
        echo '<input name="sort" id="' . $nameRadio .'" type="radio" value="' . $nameRadio . '">';
    }
?>