<?php

if (! function_exists('format_date')) {
    function format_date($date,$format = 'd-m-Y'){
        return \Carbon\Carbon::parse($date)->format($format);
    }
}

if(! function_exists('format_procedure_name')){
    function format_procedure_name($training){
        return ucfirst(config('app.training_types.'.$training->type)[0]).'-'.strtoupper($training->category->abbreviation).'-0'.$training->id.'-V0'.$training->version.'-'.$training->name;
    }
}
?>