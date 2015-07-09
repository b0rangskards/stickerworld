<?php

Validator::extend('alpha_spaces', function ($attribute, $value) {
    return preg_match('/^[\pL\s]+$/u', $value);
});

Validator::extend('gender', function ($attribute, $value) {
   return in_array(strtolower($value), ['male', 'female']);
});

Validator::extend('contact_no', function($attribute, $value) {
    return preg_match('/^([0-9\s\-\+\(\)]*)$/', $value);
});