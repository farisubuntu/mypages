# Composer

Resources:
1. Course: Wonderful World of Composer
(https://symfonycasts.com/screencast/composer)
2.

### Chapter - 1: Composer
To use just one outside library, you’d need to tackle at least three major issues:

1. First, how do I autoload the PHP classes in the library? *Autoloading is the background machine that makes it possible to reference PHP classes without using `require` or `include` statements*.  When I bring in outside code, I either need to figure out which files to include or how to configure that library’s autoloader.
2. Second, we need to know if this library depends on any other libraries. And if it does, we need to download and configure.
3. How should I store the library in my project? for example, use (SVN externals,Git Submodules).

The answer to these 3 problems is **Composer**.

#### Installation:
this will download composer executble (`composer.phar`) file inside current folder:
```bash
curl -s https://getcomposer.org/installer | php
```
If fine, `$ php composer.phar` will list all avaibl composer commands.

- Composer’s main job is to download third-party libraries into a vendor/ directory in your project. To tell Composer which libraries you need, your project needs to have a composer.json
`$ php composer.phar init`

- Composer is searching against a giant central repository of packages called “Packagist”. for example, enter: `finder` as the package name to search.
- In the language of Composer, a package is just an individual directory that you want to download into your project.
-  If a version ends in -dev, it’s a development branch, which may be stable or unstable based on the library. The dev-master version is special, and it always means the latest, bleeding-edge code. If you use a lesser-known package, dev-master may be your only option. Finally, confirm generation and add vendor/ to your .gitignore file if you’re storing your project with git:
```git
# .gitignore
/vendor/
```
- package name is something like (<vendor>/<name>) such as 'symfony/finder'.
- To actually put Composer to work, run `php composer.phar install`. This is the most important command: it reads the composer.json file and downloads all the needed libraries into the vendor directory.
- To initially install the defined dependencies for your project, you should run the update command: `php composer.phar update`. This will make Composer do two things:
    - It resolves all dependencies listed in your composer.json file and writes all of the packages and their exact versions to the composer.lock file, locking the project to those specific versions. You should commit the composer.lock file to your project repo so that all people working on the project are locked to the same versions of dependencies (more below). This is the main role of the update command.
    - It then implicitly runs the install command. This will download the dependencies' files into the vendor directory in your project. (The vendor directory is the conventional location for all third-party code in a project). In our example from above, you would end up with the Monolog source files in vendor/monolog/monolog/. As Monolog has a dependency on psr/log, that package's files can also be found inside vendor/.
- running install when a composer.lock file is present resolves and installs all dependencies that you listed in composer.json, but Composer uses the exact versions listed in composer.lock to ensure that the package versions are consistent for everyone working on your project
- Packagist.org is the main Composer repository. A Composer repository is basically a package source: a place where you can get packages from.
- For libraries that specify autoload information, Composer generates a vendor/autoload.php file. You can include this file and start using the classes that those libraries provide without any extra work:
```php
require __DIR__ . '/vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
$log->warning('Foo');
```
-  The only difference between your project and a library is that your project is a package without a name. In order to make that package installable you need to give it a name. You do this by adding the name property in composer.json:
```json
{
    "name": "acme/hello-world",
    "require": {
        "monolog/monolog": "1.0.*"
    }
}
```




### Chapter - 2:


