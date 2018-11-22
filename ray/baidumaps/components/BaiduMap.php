<?php namespace Ray\BaiduMaps\Components;

use Cms\Classes\ComponentBase;
use Ray\BaiduMaps\Models\Settings;

class BaiduMap extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'baiduMap Component',
            'description' => 'Component for google map'
        ];
    }

    public function defineProperties()
    {
      return [];
    }

    public function onRun(){
      $marker_image = null;
      if(Settings::instance()->get_marker_image()){
        $marker_image = Settings::instance()->get_marker_image()->path;
      }
      $this->page['map'] = [
        'height' => Settings::get('height') ?: "400px",
        'width' => Settings::get('width') ?: "100%",
        'latitude' => Settings::get('latitude') ?: 116.404,
        'longtitude' => Settings::get('longtitude') ?: 39.915,
        'zoom' => Settings::get('zoom') ?: 11,
        'key'=>Settings::get('api_key'),
        'type' => Settings::get('map_type') ?: "roadmap",
        'show_marker' => Settings::get('show_marker') ?: 1,
        'marker_image' => $marker_image
      ];
      $this->addJs('http://api.map.baidu.com/api?v=2.0&ak=' . Settings::get('api_key') . '');
    }

    public function getHeight(){
      return Settings::get('height');
    }
    public function getWidth(){
      return Settings::get('width');
    }

    public function getDirectionsButtonText(){
      return Settings::instance()->directions_button_text;
    }
}
