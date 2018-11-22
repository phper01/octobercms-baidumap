<?php namespace Ray\BaiduMaps;

use Backend;
use System\Classes\PluginBase;

/**
 * GoogleMaps Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'BaiduMaps',
            'description' => 'Baidu Maps plugin for OctoberCMS',
            'author'      => 'RAY',
            'icon'        => 'icon-map'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Ray\BaiduMaps\Components\BaiduMap' => 'baiduMap',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'ray.baidumaps.settings' => [
                'tab' => 'BaiduMaps',
                'label' => 'Manage baidu maps settings'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'baidumaps' => [
                'label'       => 'BaiduMaps',
                'url'         => Backend::url('ray/baidumaps/mycontroller'),
                'icon'        => 'icon-map',
                'permissions' => ['ray.baidumaps.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerSettings(){
      return [
          'settings' => [
              'label'       => 'Baidu Maps Settings',
              'description' => 'Settings for baidu maps',
              'category'    => 'Baidu Maps',
              'icon'        => 'icon-map',
              'class'       => 'Ray\BaiduMaps\Models\Settings',
              'order'       => 100,
              'permissions' => ['ray.baidumaps.settings']
          ]
      ];
    }
}
