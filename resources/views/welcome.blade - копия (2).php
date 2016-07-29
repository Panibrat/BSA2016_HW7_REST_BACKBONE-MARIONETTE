<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <script src="../js/underscore.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/backbone.js"></script>
        <script src="js/marionette.js"></script>
    </head>
    <body>
        <div class="container">

            <div id="template" style="display: none">
                <h1>Books</h1>
            </div>
    </div>


        <script>
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
                App.Views.Books = Backbone.View.extend({
                    tagName: 'ul',

                    render: function() {
                        this.collection.each(this.addOne, this);
                        return this;
                    },

                    addOne: function(Book) {
                        var Book = new App.Views.Book({ model: Book });
                        this.$el.append( Book.render().el );
                    }


                });


                App.Views.Book = Backbone.View.extend({
                    tagName: 'li',

                    render: function() {
                        this.$el.html( this.model.get('title') );
                        return this;
                    }
                });
            }());


            var booksCollection = new App.Collections.Books();
            booksCollection.fetch();
            var booksView = new App.Views.Books({ collection: booksCollection });
            booksView.render();

            //$(document.body).append(BooksView.el);
        </script>





    </body>
</html>
