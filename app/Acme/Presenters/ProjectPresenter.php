<?php  namespace Acme\Presenters; 

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class ProjectPresenter extends Presenter {

	public function prettyName()
	{
		return ucwords($this->name);
	}

	public function prettyLocation()
	{
		return ucwords($this->location);
	}

	public function prettyProjectDate()
	{
		return Carbon::parse($this->project_date)->format('j F Y');
	}

	public function prettyDeadline()
	{
		return Carbon::parse($this->deadline)->format('j F Y');
	}

	public function prettyLeadTime()
	{
		return $this->lead_time_days . ' days';
	}

} 