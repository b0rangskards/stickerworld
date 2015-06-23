<?php  namespace Acme\Forms; 

use Laracasts\Validation\FormValidator;

class CloseBranchForm extends FormValidator {

    /**
     * Validation rules for the closing branch.
     *
     * @var array
     */
    protected $rules = [

        'id' => 'required|numeric|exists:branches',

    ];
} 