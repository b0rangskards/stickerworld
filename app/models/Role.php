<?php

class Role extends \Eloquent {

	protected $fillable = ['id', 'name'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';
    /**
     * The disable timestamps.
     *
     * @var string
     */
    public $timestamps = false;



}