<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <script src="js/underscore.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/backbone.js"></script>
        <script src="js/marionette.js"></script>

    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
    </div>
        <script type="text/template" id="template-book1">
            <%= title %> --- <%= author %> --- <%= year %>
        </script>

        {{--<script type="text/template" id="template-book">--}}
        {{--<% books.each(function(book) { %>--}}
            {{--<tr>--}}
                {{--<td><%= book.get('id') %></td>--}}
                {{--<td><%= book.get('author') %></td>--}}
                {{--<td><%= book.get('genre') %></td>--}}
                {{--<td><%= book.get('year') %></td>--}}
                {{--<td><%= book.get('title') %></td>--}}
                {{--<td><%= book.get('user_id') %></td>--}}
            {{--</tr>--}}
        {{--% }) %}--}}
       {{--</script>--}}

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
//                App.Views.Books = Backbone.View.extend({
//                    el: 'table tbody',
//                    render: function (){
//                        var template = _.template($('#template-book').html()),
//                        html = template({books: this.collection});
//                        this.$el.html(html);
//                    }
//                });

//                  App.Views.Books = Backbone.View.extend({
//                      tagName: 'ul',
//                      initialize: function(){
//
//                      },
//                      render: function() {
//                          this.collection.each(function(book) {
//                              var bookView = new  App.Views.Book({model: book});
//                              this.$el.append(bookView.render().el);
//                          }, this);
//
//                          return this;
//                      }
//                });
//                App.Views.Books = Backbone.View.extend({
//                      tagName: 'ul',
//                      initialize: function(){
//
//                      },
//                      render: function() {
//                          this.collection.each(this.addOne, this);
//                          return this;
//                      },
//                    addOne: function(book){
//                        var book = new App.Views.Book({model: book});
//                    }
//
//                });

                App.Views.Books = Backbone.View.extend({
                    tagName: 'ul',

                    render: function() {
                        this.collection.each(this.addOne, this);
                        return this;
                    },

                    addOne: function(book) {
                        var task = new App.Views.Book({ model: book });
                        this.$el.append( book.render().el );
                    }


                });

                App.Views.Book = Backbone.View.extend({
                    tagName: 'li',

                    render: function() {
                        this.$el.html( this.model.get('title') );
                        return this;
                    }
                });

//                App.Views.Book = Backbone.View.extend({
//                    tagName: 'li',
//                    template: _.template( $('#template-book1').html() ),
//                    initialize: function(){
//                        this.render();
//                    },
//                    render: function (){
//                        this.$el.html(this.template(this.model.toJSON()));
//                    }
//                });
            }());

//            var bookone = new App.Models.Book({id: 21});
//            bookone.fetch();

            var Bookscollection = new App.Collections.Books();
            Bookscollection.fetch();

//            var OneBookView = new  App.Views.Book({
//                model: bookone
//            });


            $(document.body).append(booksView.el);
        </script>





    </body>
</html>
