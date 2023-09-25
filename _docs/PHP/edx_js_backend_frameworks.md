
> from edx course - week 4.

  
  

### Node.js - Fuetures:

- Asynchronous, event-driven JavaScript runtime

environment for building web applications

- Treats HTTP requests as events that invoke

callback functions/handlers that construct the HTTP

response

- includes a package manager to simplify the

deployment of JavaScript apps

  

### Installing Nodejs:

- You can install Node.js by downloading, running,

and finishing the package installer available here:

`https://nodejs.org/en/download/`

- Check that installation is correct using: `node –v`

- Update modules using: `npm install npm –g`

  

### Setting up a new project

- Create a new folder for your project

- Use Terminal, Command Prompt, etc. to navigate to

that folder

- Set up a new project by running: npm init

- You will be prompted to enter some information about your project.

- Specify “index.js” as your entry point.

- Your project folder should now have a `package.json` configuration file:

  

```json

{

"name": "helloworld",
"version": "1.0.0",
"description": "A basic hello world app",
"main": "index.js",
"scripts": {
"test": "echo \"Error: no test specified\" && exit 1"
},
"author": "edX Learner",
"license": "ISC"
}

```

----

## Express

- Express is a web application framework that sits on top of a Node.js server.
- Express helps you modularize and streamline your web application.
- Within Express, you can organize your app in many ways:
- Define separate modules that have different responsibilities.
- Handle requests via different routes and routers.
- Split each step in the processing of a request into Middlewares.

### Adding Express

- To use Express, run the following from the folde where you created your Node.js app:

`npm install express --save`

- The Express package will be downloaded to th project and added to your package.json file as a dependency.
- Package: a package is a module of JavaScript code usually with a specific purpose, that can be re-used and assembled with other modules
- Dependency: A dependency is a piece of code that you program relies on to work correctly.

 ### Express Configuration

- Your package.json file will now have a new section called dependencies
- `npm` can refer to this in the future and re-download or update your packages as needed

```json
"name": "helloworld",
"version": "1.0.0",
"description": "A basic hello world app",
"main": "index.js",
"scripts": {
"test": "echo \"Error: no test specified\" && exit 1"
},
"author": "edX Learner",
"license": "ISC",
"dependencies": {
"express": "^4.15.3"
 }
}
```

### Hello World

- Create an file named index.js in your Node.js
- project root directory with the following contents:

```js
var  express  =  require('express');
var  app  =  express();
app.use('/', (req, res) => {
res.send('Hello World!');
});
app.listen(3000, () => {
 console.log('Listening on port 3000');
});
```

### Running Express

- In the project folder, run: node index.js
- When the server starts, you should see “Listening on port 3000” written to the console/screen
- Open a browser on the same computer and go to
   `http://localhost:3000/`

  
  

## Node.js Request and Response Objects

- Web browsers communicate with Web servers via HTTP requests and responses

- Node.js and Express simplify the development of Web servers to handle HTTP requests and create and return HTTP responses.

  

### Anatomy of an HTTP Request

![](2020-04-12-04-39-29.png)

  

### Node.js/Express Request Objects

- An HTTP Request is represented as an object in the Express app.

- The object is passed as a parameter to the callback function/event handler.

  

```js

var  express  =  require('express');

var  app  =  express();

app.use('/', (req, res) => {

res.send('Hello World!');

});

app.listen(3000, () => {

console.log('Listening on port 3000');

});

```

  

### Request Object Properties/Functions

- `method`: the HTTP Request verb/action.

- `url`: the resource that was requested.

- `headers`: object containing all headers.

- `get(field)`: request header field.

  

```js

app.use('/', (req, res) => {

var  method  = req.method;

var  url  = req.url;

var  agent  = req.headers['user-agent'];

agent  = req.get('User-Agent');

res.send('Hello});

```

### Antomy of an HTTP Response:

  

![](2020-04-12-04-44-35.png)

  

### Node.js/Express Response Objects

- An HTTP Response is also represented as an object in the Express app.

- The object is passed as a parameter to the callback function/event handler:

```js

var  express  =  require('express');

var  app  =  express();

app.use('/', (req, res) => {

res.send('Hello World!');

});

app.listen(3000, () => {

console.log('Listening on port 3000');

});

```

### Response Object Functions

- status: set the HTTP status code

- type: set the HTTP content type

- write: add content to the body of the response

- end: send the response and close the connection

  

```js

app.use('/', (req, res) => {

res.status(200);

res.type('html');

res.write('Hello world!');

res.write('<p>');

res.write('<b>Have a nice day</b>');

res.end();

});

```

### Combining Requests and Responses:

  

```js

app.use('/', (req, res) => {

var  name  = req.query.name; // e.g. /?name=devesh

res.status(200).type('html');

if (name) {

res.write('Hi,  '  +  name  +  "it's nice to see you.");}

else { res.write('Welcome, guest!'); }

res.end();

});

```

---

### Express Routing

  

```js

var  express  =  require('express');

var  app  =  express();

app.use('/about', (req, res) => {

res.send('This is the about page.');

});

app.use('/login', (req, res) => {

res.send('This is the login page.');

});

app.use( /*default*/ (req, res) => {

res.status(404).send('Not found!');

});

app.listen(3000, () => {

console.log('Listening on port 3000');

});

```

### Express Middleware

- A middleware is a function that is invoked in the handling of an HTTP request.

- It is used in the “middle” between receiving a request and sending a response.

- Multiple middlewares can be chained together on the same request.

  

### Middleware: Serving Static Files

- The simplest middleware is express.static, which serves static files that are locally stored.

  

```js

var  express  =  require('express');

var  app  =  express();

app.use('/public', express.static('files'));

app.use( /*default*/ (req, res) => {

res.status(404).send('Not found!');

});

app.listen(3000, () => {

console.log('Listening on port 3000');

});

```

```html

<!-- This is files/index.html -->

<html>

<body>

<h1>Hello!</h1>

<img  src="images/kitty.jpg">

<!-- File is files/images/kitty.jpg -->

</body>

</html>

```

## Middleware: Serving Static Files

- We can use the response object to send back specific HTML files as needed:

  

```js

var  express  =  require('express');

var  app  =  express();

app.use('/public', express.static('files'));

app.use( /*default*/ (req, res) => {

res.status(404).sendFile(__dirname  +  '/404.html');

});

app.listen(3000, () => {

console.log('Listening on port 3000');

});

```

  

### Defining and Using Middleware

- `Middleware` functions can contain any amount of JavaScript code with any functionality

- They take three parameters: `req, res, and next`

- `next()` must be called at the end of the function to invoke the next middleware or the final response:

  

```js

var  express  =  require('express');

var  app  =  express();

var  logger  = (req, res, next) => {

var  url  = req.url;

var  time  =  new  Date();

console.log('Received request for  '  +  url  +

' at  '  +  time);

next();

};

app.use(logger);

app.use('/public', express.static('files'));

app.use( /*default*/ (req, res) => {

res.status(404).sendFile(__dirname  +  '/404.html');

});

app.listen(3000, () => {

console.log('Listening on port 3000');

});

```

  

### Middleware Chaining:

  

- Middleware functions are called in the order in which they are specified.

- Each uses the same Request and Response objects.

- A middleware function can modify the Request so that it can then be used by subsequent middleware functions “downstream” in the route.

  

```js

var  nameFinder  = (req, res, next) => {

var  name  = req.query.name;

if (name) req.username  = name.toUpperCase();

else req.username  =  'Guest';

next();

}

var  greeter  = (req, res, next) => {

res.status(200).type('html');

res.write('Hello,  '  + req.username);

next();

}

var  adminName  = (req, res, next) => {

req.username  =  'Admin';

next();

}

app.use('/welcome', nameFinder, greeter,

(req, res) => { res.end(); } );

app.use('/admin', adminName, greeter,

(req, res) => { res.end();

} );

```

  

### Middleware, Routes, and Routers

- We may find that the same combinations of middleware functions are being used in multiple routes.

- We can combine middleware functions into “sub- routes” using `Routers` and then use those in our routes.

  

```js

var  nameFinder  = (req, res, next) => { .  .  . }

var  greeter  = (req, res, next) => { .  .  . }

var  adminName  = (req, res, next) => { .  .  . }

var  logger  = (req, res, next) => { .  .  . }

var  header  = (req, res, next) => { .  .  . }

var  footer  = (req, res, next) => { .  .  . }

  

app.use('/welcome', logger, nameFinder, header,

  

greeter, footer, (req, res) => { res.end(); } );

  

app.use('/admin', logger, adminName, header, greeter, footer, (req, res) => {

res.end();

} );

var  commonRoute  = express.Router();

  

commonRoute.use(header, greeter, footer);

  

app.use('/welcome', logger, nameFinder, commonRoute,

(req, res) => { res.end(); } );

  

app.use('/admin', logger, adminName, commonRoute,

(req, res) => { res.end(); } );

  

```

---

  

## Getting User Data

### Getting Data from Users: HTTP Requests

  

- Query parameters

- `Key/value` pairs that are part of the `URL`.

- Can be part of a static URL or be generated by an `HTML` form using the “GET” method.

- POST data

- `Key/value` pairs that are included in the body of the `HTTP` request.

- Result from an `HTML` form using the “POST” method.

### Request Object Query Properties

- An HTTP Request object can include `query` properties that come from the URL: `http://localhost:3000/?name=Lydia&location=United+States`

  

```js

app.use('/', (req, res) => {

var  query  = req.query;

console.log(query);

var  name  = query.name;

// 'Lydia'

var  location  = query.location; // 'United States'

var  length  =  Object.keys(query).length; // 2

res.send('Hello World!');

});

```

  

### Request Object Parameters

  

- An HTTP Request object can include `param` properties that come from a parameterized URL: `http://localhost:3000/name/Lydia/location/United States`.

  

```js

app.use('/name/:userName/location/:userLocation',

(req, res) => {

var  params  = req.params;

console.log(params);

var  name  = params.userName;

// 'Lydia'

var  location  = params.userLocation; // 'United States'

var  length  =  Object.keys(params).length; // 2

res.send('Hello World!');

});

```

  

### HTML Forms

- Forms allow users to enter or select data, e.g. via input boxes, checkboxes, radio buttons, etc.

- The form specifies the action and method that result when the user chooses to submit the form.

- Action: the URL to be requested.

- Method: the HTTP Request “verb,” e.g. GET or POST.

  

![](2020-04-12-05-18-38.png)

  
  

```html

<html>

<body>

<form  action="/handleForm"  method="post">

Name: <input  name="username">

<p>

I like:<br>

<input  type=checkbox  name="animal"  value="dogs">Dogs <br>

<input  type=checkbox  name="animal"  value="cats">Cats <br>

<input  type=checkbox  name="animal"  value="birds">Birds <br>

<p>

<input  type=submit  value="Submit form!">

</form>

</body>

```

  

### Reading POST Data in Express

  
  

- When a form’s method is “GET”, the data is sent in the URL query parameters.

- When a form’s method is “POST”, the data is sent in the body of the HTTP request.

- To read the body of the HTTP request in Express, use the body-parser middleware.

- To install it, run: `npm install body-parser`.

  

```js

var  express  =  require('express');

var  app  =  express();

app.use('/public', express.static('files'));

var  bodyParser  =  require('body-parser');

app.use(bodyParser.urlencoded({ extended: true }));

app.use('/handleForm', (req, res) => {

var  name  = req.body.username;

var  animals  = req.body.animal; // this is an array

.  .  .

res.send('Thank you!');

});

app.listen(3000, () => {

console.log('Listening on port 3000');

});

```

  

### Summary

- HTTP Request query properties: key/value pairs that come from URL.

- HTTP Request param properties: key/value pairs that come from parameterized URL.

- HTTP Request body properties: input data from form submitting using POST method.

  

---

### Example:

![](2020-04-12-05-27-54.png)

![](2020-04-12-05-28-12.png)

  

```js

var  bodyParser  =  require('body-parser');

app.use(bodyParser.urlencoded({ extended: true }));

app.use('/handleForm', (req, res) => {

var  name  = req.body.username;

var  animals  = [].concat(req.body.animal);

res.type('html').status(200);

res.write('Hello,  '  +  name  +  ', nice to meet you.');

res.write('<p>Here are the animals you like:');

res.write('<ul>');

animals.forEach( (animal) => {

res.write('<li>'  +  animal  +  '</li>');

});

res.write('</ul>');

res.write("<a href='/public/form.html'>"  +

"Back to form</a>");

res.end();

});

```

  

### What is EJS?

  

- `EJS`, or `EmbeddedJS`, is a view engine that uses data and embedded JavaScript to produce HTML.

- This allows webpages to be developed statically and rendered dynamically `server-side`.

- EmbeddedJS is a package that can be installed with the command: `npm install ejs`.

  

<!-- Continue page 280 -->