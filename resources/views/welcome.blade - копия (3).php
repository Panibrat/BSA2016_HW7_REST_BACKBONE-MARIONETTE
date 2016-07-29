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
        <div id="container"></div>
        <div id="container2"></div>
        {{--<script id="template" type="text/template">--}}
            {{--<h1>Book:</h1><hr>--}}
            {{--<h3><%= title %></h3>--}}
            {{--<h4><%= author %></h4>--}}
            {{--<h4><%= genre %></h4>--}}
            {{--<h4><%= year %></h4>--}}
            {{--<h4><%= user_id %></h4>--}}
            {{--<h4>Time Now: <%= user_id %></h4>--}}


        {{--</script>        --}}

        <script id="template-header" type="text/template">
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>User_id</th>
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

            var bookone = new App.Models.Book({id: 21});
            bookone.fetch();
            var booksCollection = new App.Collections.Books();
            booksCollection.fetch();

            View = Marionette.ItemView.extend({
                template: '#template',
                el: '#container'
            });
            viewBook = new  App.Views.Book({
                model: bookone
            });
            //viewBook.render();


            allBooksView = new App.Views.Books({
                collection:  booksCollection
            });
            allBooksView.render();

        </script>





    </body>
</html>
