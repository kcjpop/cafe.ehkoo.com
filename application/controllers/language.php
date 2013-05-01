<?php
class Language_Controller extends Base_Controller {
	public function action_change($language)
	{
		$referrer = Request::referrer();
		if(!empty($language))
		{
			Cookie::forever('site_language', $language);
		}

		return Redirect::to($referrer);
	}
}