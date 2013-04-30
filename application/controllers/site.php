<?php
class Site_Controller extends Base_Controller
{
	public $layout = 'layouts.site';

	protected $settings = array();

	public function before()
	{
		// JavaScript
		Asset::add('bootstrap', 'js/bootstrap.min.js');
		Asset::add('admin', 'js/admin.js');

		// CSS
		Asset::add('bootstrap', 'css/bootstrap.min.css');
		Asset::add('bootstrap-responsive', 'css/bootstrap-responsive.css');
		Asset::add('font-awesome', 'css/font-awesome.min.css');
		Asset::add('admin', 'css/style.css');

		// Get available languages
		$language = new Language();
		$languages = array();
		$cursor = $language->find();
		if($cursor->hasNext())
		{
			foreach($cursor as $obj)
			{
				$languages[] = $obj;
			}
		}

		// Get all site settings
		$setting = new Setting();
		$settings = $setting->find();

		// If there are no settings, definitely it's a server error
		if(empty($settings))
		{
			return Response::error('500');
		}

		foreach($settings as $item)
		{
			$this->settings[$item['_id']] = $item['value'];
		}

		$this->layout->with('languages', $languages)
			->with('settings', $this->settings);
	}
}