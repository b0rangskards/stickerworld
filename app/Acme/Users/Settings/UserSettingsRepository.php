<?php  namespace Acme\Users\Settings; 

use Acme\Base\BaseRepositoryInterface;
use GeneralSetting;

class UserSettingsRepository implements BaseRepositoryInterface {

	public function save(GeneralSetting $generalSetting)
	{
		return $generalSetting->save();
	}

	public function getTableData()
	{
		// TODO: Implement getTableData() method.
	}

	public function getTableColumns()
	{
		// TODO: Implement getTableColumns() method.
	}
}