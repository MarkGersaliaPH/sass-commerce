<?php
if (! function_exists('show_route')) {
    function front_end_asset($model, $resource = null)
    { 
        return route("{$resource}.show", $model);
    }
}