<?php

Form::macro('role', function($roleId, $roleName)
{
    $class = 'badge ';
    switch ( $roleId ) {
        case 1:
            $class .= 'bg-inverse';
            break;
        case 2:
            $class .= 'bg-success';
            break;
        case 3:
            $class .= 'bg-primary';
            break;
        case 4:
            $class .= 'bg-important';
            break;
        case 5:
            $class .= 'bg-info';
    }
    return "<span class='{$class}'>{$roleName}</span>";
});

Form::macro('recstat',  function($recstat)
{
    return ucfirst($recstat) === 'A'
        ? "<span class='badge bg-success'>Yes</span>"
        : "<span class='badge bg-danger'>No</span>";
});