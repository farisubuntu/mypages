# Leaf And MVC
[[toc]]

# Leaf

Leaf is a PHP framework that helps you create clean, simple but powerful web apps and APIs quickly and easily. Leaf introduces a cleaner and much simpler structure to the PHP language while maintaining it's flexibility. With a simple structure and a shallow learning curve, it's an excellent way to rapidly build powerful and high performant web apps and APIs.

## Leaf CLI
Leaf CLI is a simple command line tool for creating and interacting with your Leaf applications. It gives you the options to create projects, install dependencies, run scripts, scaffold items and much more. 

> To install Composer (../Symfony/composer.md)


To install cli using composer:

```sh
composer global require leafs/cli
```

## Creating a leaf app after installing leafs/cli:
```sh
$ leaf create <project-name>

```sh
Then,
```sh
$ cd <project-name>
$ leaf serve
```

Another way, `Composer`

```sh
composer init   # interactive
composer global require leafs/cli
leaf serve
```
# create index.php as above and run
This is a "hello world" application created using Leaf. After [installing](#-installation) Leaf, create an _index.php_ file.

```php
<?php

require __DIR__ . '/vendor/autoload.php';

app()->get('/', function () {
  response()->json([
    'message' => 'Welcome!'
  ]);
});

app()->run();
```

You may quickly test this using the Leaf CLI:

```bash
leaf serve
```

Or with the built-in PHP server:

```bash
php -S localhost:8000
```

__Definitions__:

- _Modules_ are pieces of leaf's functionality which are served as installable plugins which mean's that you can have only what you need in your app but can extend on demand.
- 


# Creating our route (get,post,...)[go to site](https://leafphp.dev/docs/introduction/first-app.html#modules)

First, You can easily install Leaf using Composer.

`$ composer require leafs/router`

- creating route (notes):

```bash
$app->get('/notes', function () {
  // fetch all notes from the database
  // output notes as JSON
  echo 'all notes';
});
```
- Fetching notes using the `db` module to access your database:
`$ leaf install db` or `$ composer require leafs/db`

## Conntecting to db. (place it before `routes` so you can use the `$db` everywhere.


### Leaf Codelabs 
Codelabs is a space we created to give interactive tutorials on Leaf, PHP and JS concepts that help you achieve specific results in your apps. Codelabs takes one topic or "how-to" and dives deep into it, giving you all the information you need to successfully complete the tutorial yourself while also explaining useful concepts along the way. see more (https://leafphp.dev/codelabs/)

# What is MVC?

MVC stands for Model-View-Controller. It is a pattern that separates your application into three distinct parts:

- Models: These are the classes that represent your data. They are responsible for interacting with your database, and for validating your data.
- Views: These are the files that are responsible for displaying your data to the user. They are usually written in HTML, but can also be written in other templating languages like BareUI or Blade or frameworks like Vue or React
- Controllers: These are the classes that are responsible for handling the user's request, and for returning the appropriate response.

> guide at: (https://leafphp.dev/docs/leafmvc/)

## Directory Structure:

You can completely change the directory structure to suit your needs, just be sure to update the paths in the `config.php` file.

    The app directory

    The app directory contains the core code of your application. It's divided into a few sub-directories:
        console - Contains the console commands for your application. These are used to perform tasks on the command line.
        controllers - Contains the controllers for your application. These are used to handle HTTP requests.
        database - Contains the database related code for your application. This includes migrations, seeds, factories and schema.
        helpers - Contains the helper functions for your application.
        models - Contains the models for your application. These are used to interact with the database.
        routes - Contains the routes for your application. These are used to map HTTP requests to controllers.
        views - Contains the views for your application. These are used to render HTML responses.

    The config directory

    The config directory contains the configuration files for your application. These are used to configure how Leaf and it's modules interact with your application. You can find more information about the configuration files in the Configuration section.

    The public directory

    The public directory contains the entry point for your application, and it's also used to serve static assets. The index.php file is the entry point for your application. All requests are routed through this file by the web server. This file doesn't contain any application logic, but it does load the Composer autoloader, the application config and all your routes.

    There is also an assets directory found in the public directory. It contains the static assets for your application. These are served by the web server and are accessible to users.

    The storage directory

    The storage directory contains the compiled views, logs and other files generated by your application. It's divided into a few sub-directories:
        app - Contains the files generated by your application. This includes the compiled views and the files uploaded by users.
        framework - Contains the framework generated files for your application.
        logs - Contains the log files generated by your application.

    The vendor directory

    The vendor directory contains all the dependencies installed by Composer. It's automatically generated when you install the dependencies using Composer.


Example for configure routing:
- create html static page (change extension to `.php`) inside app/views/.....
- Edit `app/routs/_app.php` and add your routes:
```php
<?php

// main/index route
app()->get('/', function () {
    /**
     * `render(view, [])` is the same as `echo view(view, [])`
     */
    render('index');
});

// make other routes:

// welcome page
app()->get('/welcome',function(){ //requeste url
 render('welcome'); // points to: /app/views/welcome.php
});
// .....
```

## Tutorial

live interactive tutorial at (https://leafphp.dev/tutorial/#step-1)

## bootstrap

`composer require twbs/bootstrap`

insde `<head>`
` <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">`

and before `</body>`
`  <script type="module" src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>`
---


