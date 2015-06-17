<?php

namespace Acme\Base;


use Eloquent;

abstract class BaseRepository {


    public abstract function save($param);

    /**
     * @return mixed
     */
    public abstract function getTableData();


} 