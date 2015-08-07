<?php  namespace Acme\Helpers; 

class ProjectHelper {

	public static function computeLineTotal($unitPrice, $qty)
	{
		return bcmul($unitPrice, $qty, 2);
	}

} 