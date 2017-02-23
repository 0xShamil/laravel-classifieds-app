<?php 

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AreaComposer
{
	private $area;
	public function compose(View $view)
	{
		//TODO: india in config
		if(!$this->area) {
			$this->area = \App\Area::where('slug', session()->get('area', config()->get('larassifieds.defaults.area')))
									->first();
		}

		return $view->with('area', $this->area);
	}
}