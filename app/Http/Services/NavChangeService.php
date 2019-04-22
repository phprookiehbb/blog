<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/29
 * Time: 11:20
 */

namespace App\Http\Services;
use App\Models\Nav;

class NavChangeService
{
    public static function change()
    {
        $navs = Nav::get()->toFlatTree();
        $route = "<?php\r\n";
        foreach($navs as $nav)
        {
            if($nav->template == '_template_achive')
            {
                $route.= "Route::get('".$nav->url."','\App\Http\Controllers\Home\IndexController@index')->name('nav.".$nav->url."');\r\n";
            }elseif($nav->template == '_template_category'){
                $route.= "Route::get('category/".$nav->url."','\App\Http\Controllers\Home\CategoryController@index')->name('nav.".$nav->url."');\r\n";
            }elseif($nav->template == '_template_weiyu'){
                $route.= "Route::get('".$nav->url."','\App\Http\Controllers\Home\WeiyuController@index')->name('nav.".$nav->url."');\r\n";
            }elseif($nav->template == '_template_single'){
                $route.= "Route::get('".$nav->url."','\App\Http\Controllers\Home\SingleController@index')->name('nav.".$nav->url."');\r\n";
            }elseif($nav->template == '_template_readwall'){
                $route.= "Route::get('".$nav->url."','\App\Http\Controllers\Home\ReadwallController@index')->name('nav.".$nav->url."');\r\n";
            }
        }
        file_put_contents(str_replace('\\','/',base_path('routes')).'/home.php',$route);
    }

}