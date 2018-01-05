# Extension Kit
 > It's an extension kit for our theme https://github.com/hieu-pv/nf-theme 
 
- [Installation](#installation)
- [Configuration](#configuration)
- [Compile asset file](#compiler)
- [Service](#service)

 
<a name="installation"></a>
## Installation

### Step 1: Clone repository
```
git clone https://github.com/hieu-pv/nf-extension-kit.git 
```

<a name="configuration"></a>

### Step 2: Update your information

If you want provide some function that is bootstrapped when wordpress start, we will register them in `src/ExtensionKitServiceProvider.php`

> For example: register css/js file


then in `config/app` of the theme we have to register service provider

```php
  'providers'  => [
        // .... Others providers 
        \NightFury\ExtensionKit\ExtensionKitServiceProvider::class,
    ],
```

<a name="compiler"></a>

### Step 3: Compile asset file

> {tip} You can write your own javascript in `assets/scripts/app.js`
> and css in `assets/styles/app.scss`

All compiled file will be located in `assets/dist`

##### Install node module

```
npm install
```

##### Run asset compiler

```
npm run build
```

##### Run asset compiler on production mode

```
npm run prod
```

##### Watch file change and compile

```
npm run watch
```

> {tip} You can write your own config in `webpack.config.js`

<a name="service"></a>
### Service

Blade is the simple, yet powerful templating engine provided with this kit. You can use it via NightFury\ExtensionKit\Facades\View 

> {tip} Blade file are located in `resources/views`

For example we have a file `resources/views/example.blade.php` then we can use this file by following code

```
echo NightFury\ExtensionKit\Facades\View::render('example', ['data' => 'some test data here']);
```

For more information about blade engine [https://laravel.com/docs/5.5/blade](https://laravel.com/docs/5.5/blade)