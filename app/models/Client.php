<?php

use Acme\Helpers\InputConverter;
use Laracasts\Presenter\PresentableTrait;

class Client extends \Eloquent {

	use PresentableTrait;

	protected $fillable = ['br_id', 'name', 'address', 'contact_no'];

	/**
	 * Path to the presenter for a client.
	 *
	 * @var string
	 */
	protected $presenter = 'Acme\Presenters\ClientPresenter';

	public static function newClient($br_id, $name, $address, $contact_no)
	{
		return new static(compact('br_id', 'name', 'address', 'contact_no'));
	}

	public static function updateClient($id, $name, $address, $contact_no)
	{
		$client = static::findOrFail($id);

		$client->name = $name;
		$client->address = $address;
		$client->contact_no = $contact_no;

		return $client;
	}

	/* Mutators */

	public function setNameAttribute($value)
	{
		$this->attributes['name'] = InputConverter::cleanInput($value);
	}

	public function setAddressAttribute($value)
	{
		$this->attributes['address'] = InputConverter::cleanInput($value);
	}
}