<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View, Auth;

class InfoServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        View::composer('admin.info.edit', function ($view) {
            $view->with([
                'tab' => $this->getInfoTab(),
            ]);
        });
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
     * Return info tab num.
     *
     * @return mixed
     */
    private function getInfoTab() {
        return Auth::user()->info->tab;
    }

}
