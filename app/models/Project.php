<?php

use Acme\Helpers\InputConverter;
use Acme\Projects\Events\ProjectHasCreated;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Project extends \Eloquent {

	use SoftDeletingTrait, EventGenerator, PresentableTrait;

	protected $fillable = [
		'cl_id', 'br_id', 'estimator_id', 'salesrep_id',
		'name', 'location', 'deadline', 'lead_time_days',
		'remarks', 'projgencost_id'
	];

	protected $dates = ['deleted_at'];

	protected $presenter = 'Acme\Presenters\ProjectPresenter';

	public static function newProject($client, $branch, $salesrep, $estimator, $name, $location, $leadtime, $deadline, $currentDate)
	{
		$project = new static;
		$project->cl_id = $client;
		$project->br_id = $branch;
		$project->salesrep_id = $salesrep;
		$project->estimator_id = $estimator;
		$project->name = $name;
		$project->location = $location;
		$project->project_date = $currentDate;
		$project->deadline = $deadline;
		$project->lead_time_days = $leadtime;

		$project->raise(new ProjectHasCreated($project, Auth::user()));

		return $project;
	}


	public function branch()
	{
		return $this->belongsTo('Branch', 'br_id');
	}

	public function client()
	{
		return $this->belongsTo('Client', 'cl_id');
	}

	public function generatedCost()
	{
		return $this->belongsTo('ProjectGeneratedCost', 'projgencost_id');
	}

	public function salesrep()
	{
		return $this->belongsTo('Employee', 'salesrep_id');
	}

	public function estimator()
	{
		return $this->belongsTo('Employee', 'estimator_id');
	}

	public function standardMaterials()
	{
		return ProjectItem::with('item')
			->whereHas('item', function($q){
				$q->where('is_sm', 1);
			})
			->where('proj_id', $this->id)
			->get();
	}

	public function ordinaryMaterials()
	{
		return ProjectItem::with('item')
			->whereHas('item', function ($q) {
				$q->where('is_sm', 0);
			})
			->where('proj_id', $this->id)
			->get();
	}

	public function materials()
	{
		return $this->hasMany('ProjectItem');
	}


	// make it work
	public function labors()
	{
		return $this->hasMany('ProjectLaborCost');
	}

	public function laborcosts()
	{
		return ProjectLaborCost::with('utility')
			->where('proj_id', $this->id)
			->get();
	}

	public function logisticscosts()
	{
		return ProjectLogisticsCost::with('utility')
			->where('proj_id', $this->id)
			->get();
	}

	// make it work
	public function logistics()
	{
		return $this->hasMany('ProjectLogisticsCost');
	}

	/* Mutators */

	public function setNameAttribute($value)
	{
		$this->attributes['name'] = InputConverter::cleanInput($value);
	}

	public function setLocationAttribute($value)
	{
		$this->attributes['location'] = InputConverter::cleanInput($value);
	}

}