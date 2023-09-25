PHP - Keep The Values in The Form: https://www.w3schools.com/php/php_form_complete.asp
PHP namespaces: https://www.w3schools.com/php/php_namespaces.asp


> Note: Namespace names are case-insensitive. 

> The Namespace name PHP, and compound names starting with this name (like PHP\Classes) are reserved for internal language use and should not be used in the userspace code. 

> Note: Fully qualified names (i.e. names starting with a backslash) are not allowed in namespace declarations, because such constructs are interpreted as relative namespace expressions. 

- namespace statement  is defined at first of the php files. But before namespace declaration only three elements allowed:
  1. declare statement
  2. spaces
  3. comments


```php
// defining namespace
<?php
namespace MyProject
?>
// declaring namespace with hierarchy:
<?php
namespace MyProjec\Sub\level;
?>
// Multiple namespaces may also be declared in the same file. There are two allowed syntaxes
// 1.simple combination syntax- not recommended
<?php
namespace MyProject;
// .... code ...
namespace AnotherProject;
// .....
?>
// 2. bracket syntax: recomended for combining namespaces into a single file.
<php
namespace MyProject{
// .... code ...
// ...
}

namespace AnotherProject{
 // ..... code ....
}
?>
<?php
//  Declaring multiple namespaces and unnamespaced code
namespace MyProject {

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */  }
}

namespace { // global code
session_start();
$a = MyProject\connect();
echo MyProject\Connection::start();
}
?>

```
> A simple analogy can be made between PHP namespaces and a filesystem.

Example:

file1.php
```php
namespace Foo\Bar\subnamespace;

const FOO = 1;
function foo() {}
class foo
{
    static function staticmethod() {}
}
```
file2.php

```php
namespace Foo\Bar;
include 'file1.php';

const FOO = 2;
function foo() {}
class foo
{
    static function staticmethod() {}
}

/* Unqualified name */
foo(); // resolves to function Foo\Bar\foo
foo::staticmethod(); // resolves to class Foo\Bar\foo, method staticmethod
echo FOO; // resolves to constant Foo\Bar\FOO

/* Qualified name */
subnamespace\foo(); // resolves to function Foo\Bar\subnamespace\foo
subnamespace\foo::staticmethod(); // resolves to class Foo\Bar\subnamespace\foo,
                                  // method staticmethod
echo subnamespace\FOO; // resolves to constant Foo\Bar\subnamespace\FOO
                                  
/* Fully qualified name */
\Foo\Bar\foo(); // resolves to function Foo\Bar\foo
\Foo\Bar\foo::staticmethod(); // resolves to class Foo\Bar\foo, method staticmethod
echo \Foo\Bar\FOO; // resolves to constant Foo\Bar\FOO
```
Note that to access any global class, function or constant, a fully qualified name can be used:
```php
//Accessing global classes, functions and constants from within a namespace
<?php
namespace Foo;

function strlen() {}
const INI_ALL = 3;
class Exception {}

$a = \strlen('hi'); // calls global function strlen
$b = \INI_ALL; // accesses global constant INI_ALL
$c = new \Exception('error'); // instantiates global class Exception
?>

```

- PHP supports two ways of abstractly accessing elements within the current namespace, the `__NAMESPACE__` magic constant, and the `namespace` keyword. 

- The value of `__NAMESPACE__` is a string that contains the current namespace name. In global, un-namespaced code, it contains an empty string. 

Aliasing is accomplished with the use operator. Here is an example showing all 5 kinds of importing: 
```php
namespace foo;
use My\Full\Classname as Another;

// this is the same as use My\Full\NSname as NSname
use My\Full\NSname;

// importing a global class
use ArrayObject;

// importing a function
use function My\Full\functionName;

// aliasing a function
use function My\Full\functionName as func;

// importing a constant
use const My\Full\CONSTANT;

$obj = new namespace\Another; // instantiates object of class foo\Another
$obj = new Another; // instantiates object of class My\Full\Classname
NSname\subns\func(); // calls function My\Full\NSname\subns\func
$a = new ArrayObject(array(1)); // instantiates object of class ArrayObject
// without the "use ArrayObject" we would instantiate an object of class foo\ArrayObject
func(); // calls function My\Full\functionName
echo CONSTANT; // echoes the value of My\Full\CONSTANT
```

- The `use` keyword must be declared in the outermost scope of a file (the `global` scope) or inside `namespace` declarations. This is because the importing is done at **compile time** and not **runtime**, so it cannot be block scoped. The following example will show an illegal use of the `use` keyword: 

```php
 // Illegal importing rule
<?php
namespace Languages;

function toGreenlandic()
{
    use Languages\Danish;
    // ...
}
?>
```
> Importing rules are per file basis, meaning included files will NOT inherit the parent file's importing rules. 

#### Group use declarations
Classes, functions and constants being imported from the same namespace can be grouped together in a single use statement.
```php
<?php

use some\namespace\ClassA;
use some\namespace\ClassB;
use some\namespace\ClassC as C;

use function some\namespace\fn_a;
use function some\namespace\fn_b;
use function some\namespace\fn_c;

use const some\namespace\ConstA;
use const some\namespace\ConstB;
use const some\namespace\ConstC;

// is equivalent to the following groupped use declaration
use some\namespace\{ClassA, ClassB, ClassC as C};
use function some\namespace\{fn_a, fn_b, fn_c};
use const some\namespace\{ConstA, ConstB, ConstC};
?>
```
#### Global space

Without any namespace definition, all class and function definitions are placed into the global space - as it was in PHP before namespaces were supported. Prefixing a name with \ will specify that the name is required from the global space even in the context of the namespace. 
```php

<?php
namespace A\B\C;

/* This function is A\B\C\fopen */
function fopen() { 
     /* ... */
     $f = \fopen(...); // call global fopen
     return $f;
} 
?>

```


