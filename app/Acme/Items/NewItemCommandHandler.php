<?php  namespace Acme\Items; 

use Acme\Helpers\FileHelper;
use Config;
use Input;
use Item;
use Laracasts\Commander\CommandHandler;
use Log;

class NewItemCommandHandler implements CommandHandler {

	private $repository;

	function __construct(ItemRepository $repository)
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
		$item = Item::newItem(
			$command->supplier_id,
			$command->name,
			$command->type,
			$command->unit_of_measure,
			$command->unit_price,
			$command->details,
			$command->remarks,
			$command->is_sm
		);

		if ( Input::hasFile('image') )
		{
			$file = Input::file('image');

			$fileName = FileHelper::createItemPictureFileName($command->name, $file);

			$file->move(Config::get('constants.ITEM_PICTURE_PATH'), $fileName);

			$item->image = $fileName;
		}

		$this->repository->save( $item);
	}
}