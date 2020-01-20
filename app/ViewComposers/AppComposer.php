<?php
namespace App\ViewComposers;

use App\Models\Category;


Class AppComposer {
	public $items = [];

	public function __construct()
	{
		$data = [
			'categories' => Category::all();
			
		];

		$this->items[] = $data;
	}

	public function compose(View $view)
	{
		$view->with('items', end($this->items))
	}
}

