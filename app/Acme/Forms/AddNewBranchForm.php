<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class AddNewBranchForm extends FormValidator {

    /**
     * Validation rules for the add new branch form.
     *
     * @var array
     */
    protected $rules = [

        'name'       => 'required|min:3|unique:branches',
        'address'    => 'required|min:10',
        'contact_no' => 'required|min:3|contact_no',
        'lat'        => 'numeric',
        'lng'        => 'numeric'

    ];

} 