<?php  namespace Acme\Items; 

use Acme\Helpers\FileHelper;
use Config;
use File;
use Input;
use Item;
use Laracasts\Commander\CommandHandler;
use Log;

class UpdateItemCommandHandler implements CommandHandler {

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
		$item = Item::updateItem(
			$command->id,
			$command->name,
			$command->type,
			$command->unit_of_measure,
			$command->unit_price,
			$command->details,
			$command->remarks
		);

		if( Input::has('supplier_id') && !empty(Input::get('supplier_id')))
		{
			$item->supplier_id = Input::get('supplier_id');
		}

		if ( Input::hasFile('image') )
		{
			if( !empty($item->image))
			{
				$currentItemImage = Config::get('constants.ITEM_PICTURE_PATH') . $item->image;
				File::delete($currentItemImage);
			}

			$file = Input::file('image');

			$fileName = FileHelper::createItemPictureFileName($command->name, $file);

			$file->move(Config::get('constants.ITEM_PICTURE_PATH'), $fileName);

			$item->image = $fileName;
		}

		$this->repository->save($item);
	}
}