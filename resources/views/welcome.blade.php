<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="../js/jquery.js"></script>
        <script src="../js/underscore.js"></script>

        <script src="../js/backbone.js"></script>
        <script src="js/marionette.js"></script>
    </head>
    <body>

        <div id="container2">

            <a href="#books" class="btn btn-primary" role="button">Show all Books</a>

            <hr>
        </div>
        <div id="container"></div>

        <script id="template-header" type="text/template">
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>User_id</th>
                    <th>Show this Book</th>
                    <th>Delete this Book</th>
                </tr>
                </thead>
                <tbody>
                    <!-- RENDER -->
                </tbody>
            </table>
        </script>


        <script id="template" type="text/template">

            <td><%= title %></td>
            <td><%= author %></td>
            <td><%= genre %></td>
            <td><%= year %></td>
            <td><%= user_id %></td>
            <td><a href="#books/<%= id %>" class="btn btn-info" role="button">Show</a></td>
            <td><a href="#books/delete/<%= id %>" class="btn btn-danger" role="button">Delete</a></td>

        </script>



        <script type="application/javascript">
            (function() {
                window.App = {
                    Models: {},
                    Views: {},
                    Collections: {}
                };
                App.Models.Book = Backbone.Model.extend({
                    defaults: {
                        //id: '',
                        title: 'Titlelelele',
                        author: 'Authorrrrr',
                        year: 1000,
                        genre: 'Genreeeeee',
                        user_id: 1
                    },
                    urlRoot: '/books'
                });
                App.Collections.Books = Backbone.Collection.extend({
                    model: App.Models.Book,
                    url: '/books'
                });

                App.Views.Book = Marionette.ItemView.extend({
                    tagName: 'tr',
                    //el: '.table tbody',
                    template: '#template',
                    ui: {
                        title: 'h1' // alias???
                    },
                   // el: '#container',
                    events: {
                        'click h1': function(){
                            this.model.set({
                                user_id: (new Date()).getTime()
                            });
                        }
                    },
                    modelEvents: {
                        'change': 'render'
                    }
                });

                App.Views.Books = Marionette.CompositeView.extend({
                    template: '#template-header',
                    childView: App.Views.Book,
                    childViewContainer: 'table tbody',
                    el: '#container',
//                    events: {
//                        'click h1': function(){
//                            this.model.set({
//                                user_id: (new Date()).getTime()
//                            });
//                        }
//                    },
                    modelEvents: {
                        'change': 'render'
                    },
                    collectionEvents: {
                        'change': 'render'
                    }
                });

            }());

            myController = Marionette.Object.extend({
                initialize: function(){
                    console.log('myController ititialllazed!!!');
                },
                index: function(){
                    console.log('indexPage???');


                },
                books: function(){
                    console.log('booksPage???');
                    var booksCollection = new App.Collections.Books();
                    booksCollection.fetch();
                    allBooksView = new App.Views.Books({
                        collection:  booksCollection
                    });
                    allBooksView.render();
                },
                SingleBook: function(id){
                    console.log(id + ' SingleBookPage???');
                    var book = new App.Models.Book({id: id});
                    book.fetch();
                    viewBook = new  App.Views.Book({
                        model: book,
                        el: '.table tbody'
                    });
                    viewBook.render();

                },
                destroy: function(id){
                    console.log(id);
                    var book = new App.Models.Book({id: id});
                     book.destroy();
                    Backbone.history.navigate('/books', {
                        trigger: true
                     });
                },
                usersBooks: function(userId){
                    console.log(userId +  'usersBooksController');
                }
            });
            myRouter = Marionette.AppRouter.extend({
                controller: new myController(),
                appRoutes: {
                    "": "index",
                    "books": "books",
                    "books/:id": "SingleBook",
                    "books/delete/:id": "destroy",
                    'users/:userId/books': 'usersBooks'
                }
            });




            var bookone = new App.Models.Book({id: 21});
            bookone.fetch();



            viewBook = new  App.Views.Book({
                model: bookone
            });
            viewBook.render();

//            var booksCollection = new App.Collections.Books();
//            booksCollection.fetch();

//            allBooksView = new App.Views.Books({
//                collection:  booksCollection
//            });
//            allBooksView.render();

        new myRouter();
        Backbone.history.start();


//            validate: function (attrs) {
//                console.log(attrs);
//
//                if (!attrs.firstname) {
//                    return 'Обязательно';
//                }
//                if (!attrs.lastname) {
//                    return 'Обязательно';
//                }
//                if (!attrs.email) {
//                    return 'Обязательно';
//                }




//
//            RegisterList = Backbone.Collection.extend({
//                url: 'http://localhost:8000/api/userbook',
//                model: RecordModel
//            });

//            books.fetch({
//                success: function (coll) {
//                    MyApp.content.show(new BooksView({
//                        collection: coll
//                    }));
//                }
//            });


        </script>





    </body>
</html>
