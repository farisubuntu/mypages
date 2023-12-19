# Symfony and HTTP Fundamentals

**HTTP fundamentals and find out how these are applied throughout Symfony.**

## Requests and Responses in HTTP

- HTTP is the term used to describe this text-based language. The goal of your server is always to understand text requests and return text responses.

#### Step 1
- The Client Sends a Request:(The request is a text message created by a client (e.g. a browser, a smartphone app, etc) in a special format known as HTTP. The client sends that request to a server, and then waits for the response). In HTTP, it looks like this:

**GET / HTTP/1.1** => the most important, because it contains two important things: 1. the HTTP method/verb (e.g GET) which  defines what the client wants to do with the resource.  and 2. the URI (/)

**Host: xkcd.com**                         --
**Accept: text/html**                        | => request header
**User-Agent: Mozilla/5.0 (Macintosh)**      |
**Content-Lenght: 9**                      --

**a=12&b=10**  => request message body

**HTTP have 9 methods but the most common HTTP methods are:**
GET: Retrieve the resource from the server (e.g. when visiting a page)
POST: Create a resource on the server (e.g. when submitting a form)
PUT/PATCH: Update the resource on the server (used by APIs)
DELETE: Delete the resource from the server (used by APIs).

- In addition to the first line, an HTTP request invariably contains other lines of information called **request headers**. The headers can supply a wide range of information such as the host of the resource being requested (Host), the response formats the client accepts (Accept) and the application the client is using to make the request (User-Agent). Many other headers exist and can be found on Wikipedia's [List of HTTP header fields](https://en.wikipedia.org/wiki/List_of_HTTP_header_fields) article.

#### Step 2
-  The Server Returns a Response: The server prepares the resource and returns it in an HTTP response.

**Translated into HTTP, the response sent back to the browser will look something like this:**
```http
HTTP/1.1 200 OK
Date: Sat, 02 Apr 2011 21:05:05 GMT
Server: lighttpd/1.4.19
Content-Type: text/html

<html>
    <!-- ... HTML for the xkcd comic -->
</html>
```
- first line, the HTTP response status code (200 in this case). Different status codes exist that indicate success, an error or that the client needs to do something (e.g. redirect to another page). Check out the list of [HTTP status codes](https://en.wikipedia.org/wiki/List_of_HTTP_status_codes)

- Like the request, an HTTP response contains additional pieces of information known as HTTP headers. The body of the same resource could be returned in multiple different formats like HTML, XML or JSON and the Content-Type header uses Internet Media Types like text/html to tell the client which format is being returned. You can see a [List of common media](https://www.iana.org/assignments/media-types/media-types.xhtml) types from IANA.

---

## Requests, Responses and Web Development
This request-response conversation is the fundamental process that drives all communication on the web.

#### Requests and Responses in PHP

Example of how PHP interact with the "request" and create a "response"
```php
# Instead of parsing the raw HTTP request message, PHP prepares superglobal variables that contain all the information from the request.
$uri = $_SERVER['REQUEST_URI'];
$foo = $_GET['foo'];
# instead of returning the HTTP-formatted text response, you can use the PHP header function to create response headers and print out the actual content that will be the content portion of the response message.
header('Content-Type: text/html');
echo 'The URI requested is: '.$uri;
echo 'The value of the "foo" parameter is: '.$foo;
```
PHP will create a true HTTP response and return it to the client:
```http
HTTP/1.1 200 OK
Date: Sat, 03 Apr 2011 02:14:33 GMT
Server: Apache/2.2.17 (Unix)
Content-Type: text/html

The URI requested is: /testing?foo=symfony
The value of the "foo" parameter is: symfony
```
#### Requests and Responses in Symfony

- Symfony provides an alternative to the raw PHP approach via two **classes** that allow you to interact with the HTTP request and response in an easier way.

1. The `Request` (https://github.com/symfony/symfony/blob/6.3/src/Symfony/Component/HttpFoundation/Request.php) class is an object-oriented representation of the HTTP request message. With it, you have all the request information at your fingertips:
```php
use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals();

// the URI being requested (e.g. /about) minus any query parameters
$request->getPathInfo();

// retrieves $_GET and $_POST variables respectively
$request->query->get('id');
$request->request->get('category', 'default category');

// retrieves $_SERVER variables
$request->server->get('HTTP_HOST');

// retrieves an instance of UploadedFile identified by "attachment"
$request->files->get('attachment');

// retrieves a $_COOKIE value
$request->cookies->get('PHPSESSID');

// retrieves an HTTP request header, with normalized, lowercase keys
$request->headers->get('host');
$request->headers->get('content-type');

$request->getMethod();    // e.g. GET, POST, PUT, DELETE or HEAD
$request->getLanguages(); // an array of languages the client accepts
```

2. The `Response` (https://github.com/symfony/symfony/blob/6.3/src/Symfony/Component/HttpFoundation/Response.php) class which is a PHP representation of an HTTP response message to be returned to the client:
```php
use Symfony\Component\HttpFoundation\Response;

$response = new Response();

$response->setContent('<html><body><h1>Hello world!</h1></body></html>');
$response->setStatusCode(Response::HTTP_OK);

// sets a HTTP response header
$response->headers->set('Content-Type', 'text/html');

// prints the HTTP headers followed by the content
$response->send();
```

> The Request and Response classes are part of a standalone component called **symfony/http-foundation** (https://symfony.com/doc/current/components/http_foundation.html) that you can use in any PHP project. This also contains classes for handling sessions, file uploads and more.

## The Journey from the Request to the Response

The real work comes in writing the code that interprets the request information and creates the response and your application probably does many things, like sending emails, handling form submissions, saving things to a database, rendering HTML pages and protecting content with security. Symfony was created to help you with these problems.

### The Front Controller

What if you wanted to change `blog.php` to `news.php` without breaking all of your links?
A much better solution is to use a **front controller**: a single PHP file that handles every request coming into your application. For example:

/index.php	        executes index.php
/index.php/contact	executes index.php
/index.php/blog	    executes index.php

> By using rewrite rules in your web server configuration, the index.php won't be needed and you will have beautiful, clean URLs (e.g. /show).

Now, every request is handled exactly the same way. Instead of individual URLs executing different PHP files, the front controller is always executed, and the routing of different URLs to different parts of your application is done internally.

A small front controller might look like this:

```php
// index.php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$path = $request->getPathInfo(); // the URI path being requested

if (in_array($path, ['', '/'])) {
    $response = new Response('Welcome to the homepage.');
} elseif ('/contact' === $path) {
    $response = new Response('Contact us');
} else {
    $response = new Response('Page not found.', Response::HTTP_NOT_FOUND);
}
$response->send();

```

But this is still a lot of repeated work, Symfony can help once again.

## The Symfony Application Flow

A Symfony framework application also uses a front-controller file. But inside, Symfony is responsible for handling each incoming request and figuring out what to do:

<img src="https://symfony.com/doc/current/introduction/http_fundamentals.html#step-2-the-server-returns-a-response" />

- Incoming requests are interpreted by the [Routing component](https://symfony.com/doc/current/routing.html) and passed to PHP functions that return Response objects.

## Summary: The Request-Response Flow
Here's what we've learned so far:

- A client (e.g. a browser) sends an HTTP request;
- Each request executes the same, single file (called a "front controller");
- The front controller boots Symfony and passes the request information;
- Internally, Symfony uses routes and controllers to create the Response for the page (we'll learn about these soon!);
- Symfony turns your Response object into the text headers and content (i.e. the HTTP response), which are sent back to the client.
