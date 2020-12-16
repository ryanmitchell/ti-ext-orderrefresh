<?php 

namespace Thoughtco\OrderRefresh;

use AdminAuth;
use Admin\Controllers\Orders;
use Event;
use System\Classes\BaseExtension;

/**
 * OrderRefresh Extension Information File
 */
class Extension extends BaseExtension
{
    public function boot()
    {
        Event::listen('admin.controller.beforeResponse', function ($controller, $params){

			// only show if logged in and location selected
			if (!AdminAuth::isLogged() OR !$controller->getLocationId()) return;
            
            // orders model
	        if ($controller instanceof Orders){
                $controller->addJs('extensions/thoughtco/orderrefresh/assets/js/refresh.js', 'thoughtco-orderrefresh-js');
            }
            
        });
    }
    
}
