<?php

namespace NightFury\ExtensionKit;

use Illuminate\Support\ServiceProvider;
// use NightFury\Option\Console\PublishCommand;
use NightFury\Option\Facades\ThemeOptionManager;

class ExtensionKitServiceProvider extends ServiceProvider
{
    public function register()
    {
        // All your actions that registered here will be bootstrapped

        // For example
        //
        // $this->app->singleton('ThemeOption', function ($app) {
        //     return new Manager;
        // });

        if (is_admin()) {
            $this->registerAdminPostAction();
        }
    }

    public function registerCommand()
    {
        // Register your command here, they will be bootstrapped at console
        //
        // return [
        //     PublishCommand::class,
        // ];
    }

    public function registerAdminPostAction()
    {
        add_action('admin_enqueue_scripts', function () {
            wp_enqueue_media();
        });

        add_action('admin_enqueue_scripts', function () {
            wp_enqueue_style(
                'extension-kit-style',
                wp_slash(get_stylesheet_directory_uri() . '/vendor/nf/extension-kit/assets/dist/app.css'),
                false
            );
            wp_enqueue_script(
                'extension-kit-scripts',
                wp_slash(get_stylesheet_directory_uri() . '/vendor/nf/extension-kit/assets/dist/app.js'),
                'jquery',
                '1.0',
                true
            );
        });
    }
}
