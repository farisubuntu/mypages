# SymfonyCasts
[[toc]]

[from - https://symfonycasts.com/screencast/symfony/flex#play](https://symfonycasts.com/screencast/symfony/flex#play)

## Symfony Flex: Aliases, Packs & Recipes

- **symfony/flex** is `composer` plugin that add more features to composer.
- head to https://flex.symfony.com to see a gian page full of packages
- Whenever you install a package, that package may have a recipe. If it does, in addition to downloading the package into the vendor/ directory, Flex will also execute its recipe. Recipes can do things like add new files or even modify a few existing files.
- bundles are Symfony plugins, which add more features to our app.
- use `extends` and surround all content with `{% block body %}`.
- You can also add more blocks. Every block you add is just another potential override point.

> Note: Block name must be unique inside twig file else error.

- As soon as you extend another template, you must surround all of your content in one or more blocks. Otherwise, an error will occur.
---

### Profiler: Your Debugging Best Friend

- run `composer require debug` to display the debug bar at the bottom of output page.
- use `dd`(dump and die) or
- `dump`(dump and live).
- The difference between require and require-dev isn't too important: all of these packages were downloaded into our app, But as a best practice, if you install a library that's only meant for local development, you should put it into require-dev. The pack did that for us! Thanks pack!
- You can also use this dump() in Twig.
- Calling dump() without arguments will print all the available variables only when you call it from inside of a Twig template! If you call this function in a PHP file, it will throw an error:

### Assets, CSS, Images, etc

- Symfony have a cool features to help work with CSS and Javascript **Webpack Encore and Stimulus** => `$ composer require symfony/asset`.
- put css styles files inside '/public' folder anywhere.
- you can use `{{asset('styles/app.css')}} (_note no need to use '/'_)

### Generate Urls & bin/console

- To generate a URL inside of twig, use `{{ path('route name')}}`, where route name is the name you associate it using `#[Route('/',name='route_name')]`
- all following are the same:
`php bin/console`
`./bin/console`
`symfony console`
- for ` #[Route('/browse/{slug}', name: 'app_browse')]`, this is an example:
```html
  <li class="d-inline">
            <a class="btn btn-primary btn-sm" href="{{ path('app_browse', {
                slug: 'pop'
            }) }}">Pop</a>
        </li>
        <li class="d-inline">
            <a class="btn btn-primary btn-sm" href="{{ path('app_browse', {
                slug: 'rock'
            }) }}">Rock</a>
        </li>
        <li class="d-inline">
            <a class="btn btn-primary btn-sm" href="{{ path('app_browse', {
                slug: 'heavy-metal'
            }) }}">Heavy Metal</a>
        </li>

```
### JSON API Endpoint
- `return new JsonRespose($songs);`

### Smart Routes: GET-only & Validate {Wildcards}

- Restricting Routes to GET or POST Only,use `methods: ['GET']`. Such as:
` #[Route('/api/songs/{id}', methods: ['GET'])]`

### Restricting Route Wildcards by Regex

- example:  `#[Route('/api/songs/{id<\d+>}', methods: ['GET'])]`

### Service Objects:

- When you hear service, just think: that's an object that does work!
- `php bin/console debug:autowiring` => This lists all of the services that exist in our app
- Is there a service for logging? => `php bin/console debug:autowiring log`
-  if you want a service, you ask for it by using the type-hint shown in this command. It's called autowiring.


### Setting up Webpack Encore

- Webpack is the industry standard tool for packaging, minifying and parsing your frontend CSS, JavaScript, and other files.
- first check you have node and npm/yarn installed:
`node -v`
`yarn --version`
or
`npm -v`

Then, install **Encore**:
`composer require encore:1.14.0` =>this will make 'asset' folder

> If you're using version 2 or higher of symfony/webpack-encore-bundle, be sure to also run: `composer require symfony/stimulus-bundle`

Then `npm install` to install debendencies

- to use "ago" formats for dates, see github repo: knptimebundle repo.
- Always use: `php bin/console debug:autowiring 'package/service name'`
- To know which configuration keys you can use in package configuration file: `php bin/console debug:config 'package-name'`. and for default values: `... config:dump 'package-name'`

- Container: an array of services ids associated with name.
    - There are actually many more services in the container, and each service has a unique id in the container.
    - `php bin/console debug:container`
    - For a full list, you can run (https://symfony.com/doc/current/service_container.html).

> Creating/Configuring Services in the Container: see (https://symfony.com/doc/current/service_container.html#:~:text=Creating/Configuring%20Services%20in%20the%20Container)
    keywords:
    - autowiring
    - src/services
    - config/services.yml
    - getMessage()
    - array_rand($messeges)
    - get a list of autowireable type-hints by running: `$ php bin/console debug:autowiring`

-


