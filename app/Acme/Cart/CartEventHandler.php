<?php  namespace Acme\Cart; 

use Acme\Projects\Events\ProjectHasCreated;
use Acme\Services\CartMaterialsService;
use Acme\Services\ProjectSessionService;
use Laracasts\Commander\Events\EventListener;

class CartEventHandler extends EventListener {

	private $cartMaterialsService;
	private $projectSessionService;

	function __construct(CartMaterialsService $cartMaterialsService, ProjectSessionService $projectSessionService)
	{
		$this->cartMaterialsService = $cartMaterialsService;
		$this->projectSessionService = $projectSessionService;
	}

	public function whenProjectHasCreated(ProjectHasCreated $event)
	{
		// clear Session
		$this->cartMaterialsService->clearCart();
		$this->projectSessionService->clearProjectSession();
	}



} 