<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Laravel</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

</head>
<body>

<div id="main-region" class="container">
    <h1>Library...</h1>
</div>

<div id="container2">
    <a href="#books" class="btn btn-primary" role="button">Show all Books</a>
    <a href="#books/add" class="btn btn-warning" role="button">Add Book</a>
    <a href="#users" class="btn btn-primary" role="button">Show all Users</a>
    <a href="#users/add" class="btn btn-warning" role="button">Add User</a>
</div>

<!--TEST BEGIN-->



<!--TEST END-->

<div id="container"></div>
<script type="text/template" id="static-template">
    <p>This is text that was rendered by our Marionette app.</p>
</script>

<!--BOOK TEMPLATE-->

<script type="text/template" id="book-one-detail">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
                <th>User_id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><%- id %></td>
                <td><%- title %></td>
                <td><%- author %></td>
                <td><%- genre %></td>
                <td><%- year %></td>
                <td><%- user_id %></td>
                <td>
                    <a href="#books/edit/<%= id %>" class="btn btn-info" role="button">Edit</a>
                    <a href="#books/delete/<%= id %>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</script>

<!--BOOK EDIT TEMPLATE-->
<script type="text/template" id="book-one-edit">
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
                <th>User_id</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input class="form-control" name="title" type="text" value="<%- title %>" id="title"></td>
                <td><input class="form-control" name="author" type="text" value="<%- author %>" id="author"></td>
                <td><input class="form-control" name="genre" type="text" value="<%- genre %>" id="genre"></td>
                <td><input class="form-control" name="year" type="number" value="<%- year %>" id="year"></td>
                <td><input class="form-control" name="user_id" type="text" value="<%- user_id %>" id="user_id"></td>
                <td> <input class="btn btn-success" type="submit" value="OK"></td>
                {{--<td><a href="#books/<%= id %>" class="btn btn-info" role="button">Show</a></td>--}}
                {{--<td><a href="#books/delete/<%= id %>" class="btn btn-danger" role="button">Delete</a></td>--}}
            </tr>
        </tbody>
    </table>
</script>

<!--BOOKS HEADER TEMPLATE-->
<script id="template-header-books" type="text/template">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Year</th>
            <th>User_id</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <!-- RENDER -->
        </tbody>
</script>
<!--USERBOOKS HEADER TEMPLATE-->
<script id="template-header-usersbooks" type="text/template">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Year</th>
            <th>User_id</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <!-- RENDER -->
        </tbody>
</script>
<script type="text/template" id="book-one">
    <td><%- id %></td>
    <td><%- title %></td>
    <td><%- author %></td>
    <td><%- genre %></td>
    <td><%- year %></td>
    <td><%- user_id %></td>
    <td><a href="#books/<%= id %>" class="btn btn-info" role="button">Show</a></td>
    <td><a href="#users/<%= user_id %>/books/<%= id %>" class="btn btn-success" role="button">Return Book</a></td>
    <td><a href="#books/delete/<%= id %>" class="btn btn-danger" role="button">Delete</a></td>
</script>
<!--USERS TEMPLATE-->
<script id="template-header-users" type="text/template">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <!-- RENDER -->
    </tbody>
</script>
<script type="text/template" id="user-one">
    <td><%- id %></td>
    <td><%- name %></td>
    <td><%- lastname %></td>
    <td><%- email %></td>
    <td>
        <a href="#users/<%= id %>" class="btn btn-info" role="button">Show</a>
        <a href="#users/<%= id %>/books" class="btn btn-success" role="button">User's Books</a>
        <a href="#users/delete/<%= id %>" class="btn btn-danger" role="button">Delete</a>
    </td>
</script>
<!--USER SINGLE SHOW TEMPLATE-->

<script type="text/template" id="user-one-detail">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><%- id %></td>
            <td><%- name %></td>
            <td><%- lastname %></td>
            <td><%- email %></td>
            <td>
                <a href="#users/edit/<%= id %>" class="btn btn-info" role="button">Edit</a>
                <a href="#users/<%= id %>/books" class="btn btn-success" role="button">User's Books</a>
                <a href="#users/delete/<%= id %>" class="btn btn-danger" role="button">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
</script>
<!--USER EDIT TEMPLATE-->
<script type="text/template" id="user-one-edit">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input class="form-control" name="name" type="text" value="<%- name %>" id="name"></td>
            <td><input class="form-control" name="lastname" type="text" value="<%- lastname %>" id="lastname"></td>
            <td><input class="form-control" name="email" type="email" value="<%- email %>" id="email"></td>
            <td> <input class="btn btn-success" type="submit" value="OK"></td>
        </tr>
        </tbody>
    </table>
</script>



<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/underscore.js"></script>
<script src="js/vendor/backbone.js"></script>
<script src="js/vendor/marionette.js"></script>


<script src = "js/models/user.js"></script>
<script src = "js/models/users.js"></script>
<script src = "js/models/book.js"></script>
<script src = "js/models/books.js"></script>
<script src = "js/models/usersbooks.js"></script>


<script src = "js/views/user.js"></script>
<script src = "js/views/users.js"></script>
<script src = "js/views/book.js"></script>
<script src = "js/views/books.js"></script>






<script src = "js/controller.js"></script>
<script src = "js/router.js"></script>




<script src = "js/main.js"></script>
</body>
</html>