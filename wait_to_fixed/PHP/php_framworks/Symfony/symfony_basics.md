# Symfony

## Installation:

`wget https://get.symfony.com/cli/installer -O - | bash`
Or:
`curl -sS https://get.symfony.com/cli/installer | bash`
Then:
Use it as a local file:
  `/home/faris/.symfony5/bin/symfony`

Or add the following line to your shell configuration file:
  `export PATH="$HOME/.symfony5/bin:$PATH"`

Or install it globally on your system:
  `mv /home/faris/.symfony5/bin/symfony /usr/local/bin/symfony`

Then start a new shell and run 'symfony'
---
To check if your computer meets all requirements. Open your console terminal and run this command:
`$ symfony check:requirements`

> Before going on, take a basic information about Symfony and HTTP fundamentals (symfony_and_http_fundamentals.md)

## Creating Symfony Applications

-  run any of these commands to create a new Symfony application:
```bash
# run this if you building a traditional web application
$ symfony new my_project_directory --version="6.3.*" --webapp
```

- If you're not using the Symfony binary, run these commands to create the new Symfony application using Composer:
```bash
$ composer create-project symfony/skeleton:"6.3.*" my_project_directory
$ cd my_project_directory
$ composer require webapp
```

## Setting up an Existing Symfony Project

```bash
# Clone the project
$ cd projects/
$ git clone ...
# make Composer install the dependencies into vender/
$ cd my-project/
$ composer install
# It may be useful to run this command which displays information about the project: 
$ php bin/console about

```
## Packages in Symfony

- In symfony, **packages** called **bundles**
- Packages usually require some setup before using them (editing some file to enable the bundle, creating some file to add some initial config,etc).
- Symfony Flex is a Composer plugin that is installed by default when creating a new Symfony application and which automates the most common tasks of Symfony applications.
- Symfony Flex uses Composer commands (require,update,remove) but provide advanced features.
- Lots of Symfony packages/bundles define "recipes", which are a set of automated instructions to install and enable packages into Symfony applications.
- Symfony **packs** are Composer metapackages that include packages or/and bundles.
- A good security practice is to execute this command regularly to be able to update or replace compromised dependencies as soon as possible:
`$ symfony check:security`
- By default, the command that creates new Symfony applications uses the latest stable version. If you want to use an LTS version (published every 2 years), add the --version option:
```shell
symfony new my_project_directory --version=lts # recent LTS version
symfony new my_project_directory --version=next # use the next symfony version to be released(still in dev)
symfony new my_project_directory --version="5.4.*" # select an exact specific Symfony version
```

## Symfony local web server:
- It's a part of the symfony binary
- The Symfony server is started once per project, so you may end up with several instances (each of them listening to a different port). This is the common workflow to serve a Symfony project:
```bash
$ cd my-project/
# start the server in the background
$ symfony server:start -d

# continue working and running other commands

# show the latest log messages
$ symfony server:log
```

## Setting up the Local Proxy
- Local domains are possible thanks to a local proxy provided by the Symfony server. To configure:
 1. Open the proxy settings of your operating system and set the following URL as the value of the Automatic Proxy Configuration: http://127.0.0.1:7080/proxy.pac.
 2. Now run this command to start the proxy:
  `$ symfony proxy:start`

## Defining the Local Domain

By default, Symfony proposes .wip (for Work in Progress) for the local domains. You can define a local domain for your project as follows:
```bash
$ cd my-project/
$ symfony proxy:domain:attach my-domain
```
Now, you can now browse https://my-domain.wip to access your local project with the new custom domain. Browse the http://127.0.0.1:7080 URL to get the full list of local project directories, their custom domains, and port numbers.
---

## Create your First Page in Symfony

> Do you prefer video tutorials? [Check out the Harmonious Development](https://symfonycasts.com/screencast/symfony/setup) with Symfony screencast series.

Creating a new page - whether it's an HTML page or a JSON endpoint - is a two steps:
- Create a controller and a method: This is a function where you build the page and ultimately return a Response object. You'll learn more about controllers in their own section, including how to return JSON responses;
- Create a route: In config/routes.yaml, the route defines the URL to your page (path) and what controller to call. You'll learn more about routing in its own section, including how to make variable URLs.

#### Example: Create a '/lucky/number' page:

```php
<?php
// src/Controller/LuckyController.php

namespace App\Controller;
// use it to create a Symfony Response object
use Symfony\Component\HttpFoundation\Response;
// use it to create a create a route (public url /lucky/number)
use Symfony\Component\Routing\Annotation\Route;


class LuckyController{
 // associate this controller function with a public url
 #[Route('/lucky/number')] // note 1
 public function number(): Response{
  $number = random_int(0,100);

  return new Response(
   '<html><body><h1>Lucky number: '. $number . '</h1></body></html>'
  );
 }

/* Note 1
- php attributes is a metadata for code
- no ';' at the end
*/
/* Note: try it out by goiong to => lucky/number
*/
}
```
## The bin/console Command
- A debugging tool inside: the bin/console command. Try this to see a list of commands that can give you debugging info,help generate code, generate database migrations and a lot more. Remeber: as you install more packages, you'll see more commands.
`$ php bin/console`
- To get a list of all of the routes in your system, use the debug:router command:
`$ php bin/console debug:router`

## Rendering a template:
If you're returning HTML from your controller, you'll probably want to render a template. Fortunately, Symfony comes with `Twig`: a templating language that's minimal, powerful and actually quite fun.

Install the `twig` package with:
`$ composer require twig`

1. add code to import `AbstractController`:

```php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
```

2. Make sure the controller class (LuckyController) extends `AbstractController` class.
3. Use the handy `render()` method to render a template. Pass it a number variable so you can use it in `Twig`:
```php
class LuckyController extends AbstractController{
 #[Route('/lucky/number')]
    public function number(): Response
    {
        $number = random_int(0, 100);
        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}
```
4. create templates/luck directory with a new number.html.twig file inside:
```twig
{# templates/lucky/number.html.twig #}
<h1>Your lucky number is {{ number }}</h1>
```

#### The Symfony Demo Application

- fully-functional app
- great learing tool for newcomers and its code contains tons of comments and helpful notes.
- Run this command to create a new project based on the Symfony Demo application:
`$ symfony new --demo my_project`
If dosn't work, update symfony
`$ symfony self-update`
- If you use `composer`:

```bash
# you can create a new project based on the Symfony Demo project...
$ composer create-project symfony/symfony-demo my_project

# ...or you can clone the code repository and install its dependencies
$ git clone https://github.com/symfony/demo.git my_project
$ cd my_project/
$ composer install
```
- Use the built-in web server to run it:
`$ cd my_project`
`$ php app/console server:run`



- Read the Symfon Official Book at: (https://symfony.com/doc/6.2/the-fast-track/en/2-project.html)
