<?php 

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Models\Area;

class AreaComposer
{
	private $area;

	public function compose(View $view)
	{
		//TODO: india in config
		if(!$this->area) {
			$this->area = Area::where('slug', session()
								->get('area', config()->get('larassifieds.defaults.area')))
								->first();
		}

		return $view->with('area', $this->area);
	}
}