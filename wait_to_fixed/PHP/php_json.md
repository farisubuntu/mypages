from (https://alexwebdevelop.com/php-json-backend/#json)

- There are three basic operations you need to learn:
Create (or encode) a JSON object.
Send a JSON object to a front-end app or to a remote service.
Decode a JSON object received by your PHP script.
- The best way to create a JSON object is to start from a PHP array.

The reason is that PHP arrays are a perfect match for the JSON structure:
each PHP array `key => value` pair becomes a `key => value` pair inside the
 JSON object.
example:

```php
/* The PHP array. */
$array = array("Product" => "Coffee", "Price" => 1.5);
/* The JSON string created from the array. */
$json = json_encode($array, JSON_PRETTY_PRINT);
echo "<pre>";
echo $json;
echo "</pre>";
```
You can create nested JSON objects and arrays using PHP multi-dimensional arrays.
For example, this is how you can create the first example:

```php
$array = array();
$array['Name'] = 'Alex';
$array['Age'] = 37;
$array['Admin'] = TRUE;
$array['Contact'] = array
(
  'Site' => "alexwebdevelop.com",
  'Phone' => 123456789,
  'Address' => NULL
);
$array['Tags'] = array('php', 'web', 'dev');
$json = json_encode($array, JSON_PRETTY_PRINT);
echo '<pre>';
echo $json;
echo '</pre>';
```
- Recap:
PHP associative arrays become JSON objects.
(The key => values of the PHP array become the key => values of the JSON object.)
PHP numeric arrays becomes JSON arrays.
PHP multi-dimensional arrays become nested JSON objects or arrays.

