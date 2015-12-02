<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Http\Request;

class SidebarServiceProvider extends ServiceProvider {

    /**
     * The adminPath array.
     *
     * @array Guard
     */
    private $adminPath;

    /**
     * The menuItem array.
     *
     * @array Guard
     */
    private $menuItems;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        $this->adminPath = $this->getRequestPath($request);
        $this->composeSidebar();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Get paths behind 'admin'.
     *
     * Compose sidebar variable.
     */
    private function composeSidebar() {
        View::composer('admin.public.sidebar', function ($view) {
            $view->with([
                'adminPath' => $this->getAdminPath(),
                'menuItems' => $this->getMenuItems(),
            ]);
        });
    }

    /**
     * Get paths behind 'admin'.
     *
     * @param $request
     */
    private function getRequestPath($request) {
        $uri = $request->server()['REQUEST_URI'];
        $paths = explode('/', $uri);
        if (in_array('admin', $paths)) {
            $requestPath = array_slice($paths, 2);
            return $requestPath;
        }
    }

    /**
     * Return adminPath;
     *
     * @return mixed
     */
    public function getAdminPath() {
        return $this->adminPath;
    }

    /**
     * @return mixed
     */
    public function getMenuItems() {
        $this->menuItems = [
            ['path' => '', 'text' => '首页', 'icon' => 'signal'],
            ['path' => 'article', 'text' => '文章管理', 'icon' => 'signal'],
            ['path' => '', 'text' => '评论管理', 'icon' => 'signal'],
            ['path' => '', 'text' => '目录管理', 'icon' => 'signal'],
            ['path' => 'tag', 'text' => '标签管理', 'icon' => 'signal'],
            [
                'path' => 'media',
                'text' => '媒体管理',
                'icon' => 'th-list',
                'children' => [
                    ['path' => 'pic', 'text' => '图片', 'icon' => 'signal'],
                    ['path' => '', 'text' => '视频', 'icon' => 'signal'],
                    ['path' => '', 'text' => '音频', 'icon' => 'signal'],
                    ['path' => '', 'text' => '文本', 'icon' => 'signal'],
                ]
            ],
            ['path' => '', 'text' => '人员管理', 'icon' => 'signal'],
            ['path' => '', 'text' => '图文管理', 'icon' => 'signal'],
            ['path' => '', 'text' => '菜单管理', 'icon' => 'signal'],
            ['path' => '', 'text' => '个人详情', 'icon' => 'signal'],
            ['path' => '', 'text' => '我的发布', 'icon' => 'signal'],
            ['path' => '', 'text' => '我的关注', 'icon' => 'signal'],
            ['path' => '', 'text' => '我的收藏', 'icon' => 'signal'],
            ['path' => '', 'text' => '站点信息', 'icon' => 'signal'],
            ['path' => '', 'text' => '缓存管理', 'icon' => 'signal'],
            ['path' => '', 'text' => '数据备份', 'icon' => 'signal'],

        ];
        return $this->menuItems;
    }


}
