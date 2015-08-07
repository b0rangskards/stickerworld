<?php

class GeneralSetting extends \Eloquent {

	protected $fillable = ['company_name', 'vat_rate', 'tin_no'];

	public $timestamps = false;

	public static function updateSettings($company_name, $vat_rate, $tin_no)
	{
		if(static::all()->count())
		{
			$settings = static::all()->first();

			$settings->company_name = $company_name;
			$settings->vat_rate = $vat_rate;
			$settings->tin_no = $tin_no;

			return $settings;
		}
		return new static(compact('company_name', 'vat_rate', 'tin_no'));
	}

}