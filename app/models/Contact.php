<?php

use Acme\Helpers\InputConverter;
use Laracasts\Presenter\PresentableTrait;

class Contact extends \Eloquent {

    use PresentableTrait;

    /**
     * Path to the presenter for contact.
     *
     * @var string
     */
    protected $presenter = 'Acme\Presenters\ContactPresenter';

	protected $fillable = ['number', 'type'];

    public $timestamps = false;


    public function contactable()
    {
        return $this->morphTo();
    }

    /* Mutators */

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = InputConverter::cleanInput($value);
    }
}