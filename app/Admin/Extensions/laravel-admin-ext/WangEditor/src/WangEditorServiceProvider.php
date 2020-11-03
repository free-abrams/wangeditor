<?php

namespace FreeAbrams\WangEditor;

use Illuminate\Support\ServiceProvider;

class WangEditorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(WangEditor $extension)
    {
        if (! WangEditor::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'WangEditor');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/WangEditor')],
                'WangEditor'
            );
        }

        $this->app->booted(function () {
            WangEditor::routes(__DIR__.'/../routes/web.php');
        });
    }
}
