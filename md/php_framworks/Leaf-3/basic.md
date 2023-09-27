<style>
h1{
 color:blue;
}
code{
color:green;
}
</style>
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














