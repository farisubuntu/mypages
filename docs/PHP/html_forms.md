# Working with Forms in PHP

from (https://www.section.io/engineering-education/working-with-forms-in-php/)

---

- There are four database operations involved, these being create, read, update, and delete. This pattern is commonly known by the acronym CRUD operations.
- Hypertext Transfer Protocol (HTTP) enables communication between the client (browser) and the server.
- HTTP supports several methods such as GET, POST, and PUT. Data is processed based on the selected method:
  - The GET method fetches data from the server.
  - The POST method sends data from the HTML form to the server to create a resource.
  - PUT method sends data to the server to create or update a resource.

#### Creating form:

copy this code into `index.php`

```html
<body>
  <h1>HTML Form</h1>
  <!-- The action identifies the page where the form input is submitted.  -->
  <form method="" action="index.php">
    Name: <input type="text" name="name" /><br /><br />
    Email: <input type="text" name="email" /><br />
    <br />
    <input type="submit" value="submit" />
  </form>
</body>
```

- POST is a superglobal method, which collects form data and submits it to the HTTP server. The data entered is encoded, and the content is hidden. POST method has a global scope, and data is accessed from any script.
- POST does not have a limitation on the amount of data sent from the form.

#### Processing the form data (PHP script)

```php
<?php
    # Check if name and email fileds are empty
    if(empty($_POST['name']) && empty($_POST['email'])){
        # If the fields are empty, display a message to the user
        echo " <br/> Please fill in the fields";
    # Process the form data if the input fields are not empty
    }else{
        $name= $_POST['name'];
        $email= $_POST['email'];
        echo ('Your Name is:     '. $name. '<br/>');
        echo ('Your Email is:'   . $email. '<br/>');
    }
?>
```

- Most systems have a limit of 255 characters. The best example of using the GET method is with the search engine forms. The code below can be used to process an HTML form with a method set as GET.

```php
<?php
    # Check if name and email fileds are empty
    if(empty($_GET['name']) && empty($_GET['email'])){
        # If the fields are empty, display a message to the user
        echo "Please fill in the fields";
    # Process the form data if the input fields are not empty
    }else{
        $name= $_GET['name'];
        $email= $_GET['email'];
        echo ('Welcome:     '. $name. '<br/>');
        echo ('This is your email address:'   . $email. '<br/>');
    }
?>
```

## HTML forms and MySQL database CRUD operations

- First, create a MySQL database and name it crud. Create a table with three columns, name it user.
  The columns are:

  - id
  - name
  - email

  #### Create a database server Connection:

- Create a file named connect.php and place in it the following code. The scripts make a connection to the MySQL database server. later you will use this file using `include("connect.php")`

```php
  <?php
    $servername = "localhost";
    $username = "root"; # MySQL user
    $password = ""; # MySQL Server root password
    $dbname='crud'; # Database name
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        # Display an error mesage if the connection fails
        die("Connection failed: " . $conn->connect_error);
    }
?>
```

#### Create a record in the database:

```php
<?php
// Include script to make a database connection
include("connect.php");
// Check if input fileds are empty
if(empty($_POST['name']) && empty($_POST['email'])){
    // If the fields are empty, display a message to the user
    echo "Please fill in the fields";
// Process the form data if the input fields are not empty
}else{
    $name= $_POST['name'];
    $email= $_POST['email'];
    echo ('Your Name is:     '. $name. '<br/>');
    echo ('Your Email is:'   . $email. '<br/>');
    # Insert into the database
    $query = "INSERT INTO user(name,email) VALUES ('$name','$email')";
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully !";
    } else {
         echo "Error inserting record: " . $conn->error;
    }
}
?>
```

- Here is the form:

```html
<body>
  <h1>Form</h1>
  <form method="post" action="form-post.php">
    Name: <input type="text" name="name" /><br /><br />
    Email: <input type="text" name="email" /><br />
    <br />
    <input type="submit" name="save" value="submit" />
  </form>
</body>
```

#### Read data and display in a HTML table

```php
<?php
# Include script to make a database connection
include("connect.php")
$ Read From the database and display in the table
$query2 = "SELECT * FROM user";
$result = $conn->query($query2);
if ($result->num_rows > 0) {
    # Output data for each row
    echo "<table id='tsa' border='1' id='example' class='table table-striped responsive-utilities table-hover'>
              <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action 1</th>
                <th>Action 2</th>
                </tr>
              </thead>
              ";
    while($row = $result->fetch_assoc()) {
       echo "<tr id='green' ",">",
            "<td>", $row["id"],"</td>",
            "<td>", $row["name"],"</td>",
            "<td>", $row["email"],"</td>",
            "<td>",
                "<form action='update.php' method='post'>
                 <input name='id' value='",$row["id"],"' hidden>
                 <button type='submit' name='update' value='update'>Edit</button>
                </form>",
            "</td>",
            "<td>",
                "<form action='form-post.php' method='post'>
                 <input name='id' value='",$row["id"],"' hidden>
                 <button type='submit' name='delete' value='delete'>Delete</button>
                </form>",
            "</td>",
            "</tr>";
    }
    echo  "</table>";
}else {
 echo "No Records!";
}
?>
```

#### Update existing data in the database:

- The update form is displayed when we click the edit button in the table cell.
- Take note of the code used to create the edit button on the table. The update button is a submit button for a form with **hidden** input fields.

```html
<td>
  <form action="update.php" method="post">
    <input name="id" value='",$row["id"],"' hidden />
    <button type="submit" name="update" value="update">Edit</button>
  </form>
</td>
```

- In the update.php script, a form with data matching the submitted information is displayed for editing. Once the edit is complete, the updated data is resubmitted to the script for processing. In this case, we are using the same script to process update requests.

```php
<?php
// Include script to make a database connection
include("connect.php");
// Empty string to be used later
$name='';
$email='';
$id='';

// Button click to update using POST method
if(!empty($_POST['update']) && !empty($_POST['id']) )  {
  $id=$_POST['id'];
  // Fetch record with ID and populate it in the form
  $query2 = "SELECT * FROM user WHERE id='".$_POST['id']."' ";
  $result = $conn->query($query2);
  if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
      $name=$row["name"];
      $email=$row["email"];
    }
    echo "Current Details: " ."<b> - Name:</b> " . $name. " <b>Email:</b>" . $email. "<br>";
  } else {
    echo "Error updating";
  }
}

// Button click to update using GET method
if(!empty($_GET['update']) && !empty($_GET['id']) )  {
  $id=$_GET['id'];
  // Fetch record with id and populate it in the form
  $query2 = "SELECT * FROM user WHERE id='".$_GET['id']."' ";
  $result = $conn->query($query2);
  if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
      $name=$row["name"];
      $email=$row["email"];
    }
    echo "Current Details: " ."<b> - Name:</b> " . $name. " <b>Email:</b>" . $email. "<br>";
  } else {
    echo "Error updating";
  }
}
// Check that the input fields are not empty and process the data
if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['id']) ){
    // Insert into the database
  $query = "UPDATE user SET name='".$_POST['name']."', email='".$_POST['email']."' WHERE id='".$_POST['id']."' ";
  if (mysqli_query($conn, $query)) {
      echo "Record updated successfully!<br/>";
      echo '<a href="form-get.php">Get Form</a><br/>
            <a href="form-post.php">Post Form</a>';
      die(0);
  } else {
      // Display an error message if unable to update the record
       echo "Error updating record: " . $conn->error;
       die(0);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>FORM</title>
</head>
<body>
    <h1>Form</h1>
    <p>Edit the record</p>
    <form method="POST" action="update.php">
        ID: <input type="text" name="id" value="<?php echo($id); ?>" required><br><br/>
        Name: <input type="text" name="name" value="<?php echo($name); ?>" required><br><br/>
        Email: <input type="text" name="email" value="<?php echo($email); ?>" required><br/>
        <br/>
        <input type="submit" value="update">
    </form>
</body>
</html>
```
#### Delete a record in the table:

- To delete a record in the table, the user clicks the delete button in the HTML table. Take note of the code used to display a button inside a table cell.

```html
<td>
    <form action='form-post.php' method='post'>
        <input name='id' value='",$row["id"],"' hidden>
        <button type='submit' name='delete' value='delete'>Delete</button>
    </form>
</td>
```
- The submit button has a hidden id field. The data is sent to a form and processed by the PHP script below. If the id is not empty, then the record with the submitted id is deleted.

```php
// Check that the input fields are not empty and process the data
if(!empty($_POST['delete']) && !empty($_POST['id'])){
    $query3 = "DELETE FROM user WHERE id='".$_POST['id']."' ";
    if (mysqli_query($conn, $query3)) {
        echo "Record deleted successfully !";
    } else {
        // Display an error message if unable to delete the record
       echo "Error deleting record: " . $conn->error;
    }
}
```