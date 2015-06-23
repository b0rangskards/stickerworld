<?php

namespace Acme\Base;


use Eloquent;

interface BaseRepositoryInterface {

    public function getTableData();

    public function getTableColumns();

} 