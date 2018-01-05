<?php

namespace NightFury\ExtensionKit;

use Illuminate\Support\ServiceProvider;
use NightFury\Option\Abstracts\Input;
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
            $this->registerOptionPage(); // it require nf/theme-option package in template
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

    public function registerOptionPage()
    {
        \NightFury\Option\Facades\ThemeOptionManager::add([
            'name'   => 'Exetension Kit',
            'fields' => [
                [
                    'label'    => 'Text',
                    'name'     => 'theme_option_text',
                    'type'     => Input::TEXT,
                    'required' => true,
                ],
                [
                    'label'    => 'Textarea',
                    'name'     => 'theme_option_textarea',
                    'type'     => Input::TEXTAREA,
                    'required' => true,
                ],
                [
                    'label'    => 'Email',
                    'name'     => 'theme_option_email',
                    'type'     => Input::EMAIL,
                    'required' => true,
                ],
                [
                    'label'       => 'Gallery',
                    'name'        => 'theme_option_gallery',
                    'type'        => Input::GALLERY,
                    'description' => 'We can select multi file. Drag and Drop to re-order content',
                ],
                [
                    'label'       => 'Gallery With Meta Field',
                    'name'        => 'theme_option_gallery_with_meta',
                    'type'        => Input::GALLERY,
                    'description' => 'Gallery with meta field, for now we support text and textarea on meta field.',
                    'meta'        => [
                        [
                            'label' => 'Text',
                            'name'  => 'meta_text',
                            'type'  => Input::TEXT,
                        ],
                        [
                            'label' => 'Textarea',
                            'name'  => 'meta_textarea',
                            'type'  => Input::TEXTAREA,
                        ],
                    ],
                ], [
                    'label'       => 'Image',
                    'name'        => 'theme_option_image',
                    'type'        => Input::IMAGE,
                    'description' => 'Choose your image by clicking the button bellow',
                ],
                [
                    'label'   => 'Select',
                    'name'    => 'theme_option_select',
                    'type'    => Input::SELECT,
                    'options' => [
                        [
                            'value'    => 'first',
                            'label'    => 'First Value',
                            'selected' => true,
                        ],
                        [
                            'value'    => 'second',
                            'label'    => 'Second Value',
                            'selected' => false,
                        ],
                    ],
                ],
            ],
        ]);
    }
}
