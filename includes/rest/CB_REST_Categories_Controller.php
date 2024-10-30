<?php

require_once 'CB_REST_Abstract_Controller.php';

class CB_REST_Categories_Controller extends CB_REST_Abstract_Controller
{
	protected $resource_name = 'categories';

	public function register_routes()
	{
		register_rest_route($this->namespace, '/' . $this->resource_name, [
			// Here we register the readable endpoint for collections.
			[
				'methods'             => 'GET',
				'callback'            => [$this, 'get_items'],
				'permission_callback' => [$this, 'get_items_permissions_check'],
			],
		]);
	}

	public function get_items($request)
	{
		$categories = get_categories();

		return rest_ensure_response($categories);
	}
}