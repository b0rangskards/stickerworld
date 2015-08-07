<?php

use Acme\Helpers\InputConverter;
use Laracasts\Presenter\PresentableTrait;

class Supplier extends \Eloquent {

    use PresentableTrait;

    protected $fillable = ['br_id', 'name', 'type', 'address', 'email', 'recstat'];

    /**
     * Path to the presenter for a supplier.
     *
     * @var string
     */
    protected $presenter = 'Acme\Presenters\SupplierPresenter';


    public static function newSupplier($brId, $name, $type, $address, $email)
    {
        $supplier = new static();

        $supplier->br_id = $brId;
        $supplier->name = $name;
        $supplier->type = $type;
        $supplier->address = $address;
        $supplier->email = $email;

        return $supplier;
    }

    public static function updateInformation($id, $name, $type, $address, $email)
    {
        $supplier = static::find($id);

        $supplier->name = $name;
        $supplier->type = $type;
        $supplier->address = $address;
        $supplier->email = $email;

        return $supplier;
    }

    public static function cancel($id)
    {
        $supplier = static::find($id);

        $supplier->recstat = 'I';

        return $supplier;
    }


    public function contacts()
    {
        return $this->morphMany('Contact', 'contactable');
    }

    /* Mutators */

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = InputConverter::cleanInput($value);
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = InputConverter::cleanInput($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = InputConverter::cleanInput($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = InputConverter::cleanInput($value);
    }

    /* Scope Queries */

    public function scopeActive($query)
    {
        return $query->whereRecstat('A');
    }

    public function scopeCheckNameAndType($query, $name, $type)
    {
        return $query
            ->whereName($name)
            ->whereType($type);
    }
}