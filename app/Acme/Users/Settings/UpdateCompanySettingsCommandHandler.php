<?php  namespace Acme\Users\Settings; 

use GeneralSetting;
use Laracasts\Commander\CommandHandler;
use Log;

class UpdateCompanySettingsCommandHandler implements CommandHandler {

	private $repository;

	function __construct(UserSettingsRepository $repository)
	{
		$this->repository = $repository;
	}


	/**
	 * Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$settings = GeneralSetting::updateSettings(
			$command->company_name,
			$command->vat_rate,
			$command->tin_no
		);

		if($settings instanceof GeneralSetting) $this->repository->save($settings);
	}
}