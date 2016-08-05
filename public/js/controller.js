myController = Marionette.Object.extend({
    initialize: function(){
        console.log('myController ititialllazed!!!');
    },
    SingleBook: function(id){
        book = new BookModel({id: id});
        book.fetch();
        view = new BookDetailView({model: book});
        App.content.show(view);
    },
    SingleUser: function(id){
        user = new UserModel({id: id});
        user.fetch({
            success: function (user){
                view = new UserDetailView({model: user});
                App.content.show(view);
            }
        });
    },
    booksAdd: function(){
        console.log('booksAdd');
        book = new BookModel();
        view = new BookDetailEdit({model: book});
        App.content.show(view);

    },
    usersAdd: function(){
        console.log('usersAdd');
        user = new UserModel();
        view = new UserDetailEdit({model: user});
        App.content.show(view);

    },
    booksEdit: function(id){
        console.log('booksEdit');
        book = new BookModel({id: id});
        book.fetch({
            success: function (book) {
                view = new BookDetailEdit({model: book});
                App.content.show(view);
            }
        });

    },
    returnBook: function(userid, bookid){
        console.log("userID: " + userid + " bookID " + bookid);
        ReturnBookModel = Backbone.Model.extend({
            url: function(){
                return this.instanceUrl;
            },
            initialize: function(props){
                this.instanceUrl = '/users/' + userid + '/books/' + bookid;
            }
        });
        returnBook = new  ReturnBookModel();
        returnBook.fetch({
            success: function(){
                returnBook.destroy();
                Backbone.history.navigate('users/' + userid + '/books', {
                    trigger: true
                });
            }
        });
    },

    index: function(){
        console.log('indexPage???');
    },
    books: function(){
        console.log('books___Page???');
        booksCollection = new BooksCollection();
        booksCollection.fetch();
        allBooksView = new BooksView({
            collection:  booksCollection
        });
        App.content.show( allBooksView);
    },
    users: function(){
        console.log('users___Page???');
        usersCollection = new UsersCollection();
        usersCollection.fetch();
        allUsersView = new UsersView({
            collection:  usersCollection
        });
        App.content.show(allUsersView);
    },

    UsersBooks: function(id){
        console.log('Urersbooks___Page???');
        UsersBooksCollection = Backbone.Collection.extend({
            model: BookModel,
            url: '/users/' + id + '/books'
        });
        booksCollection = new UsersBooksCollection();
        booksCollection.fetch({
            success: function (booksCollection) {
                allBooksView = new UsersBooksView({ collection:  booksCollection});
                App.content.show(allBooksView);
            }

        });
    },

    destroyBook: function(id){
        console.log(id);
        book = new BookModel({id: id});
        book.destroy();
        Backbone.history.navigate('/books', {
            trigger: true
        });
    },
    destroyUser: function(id){
        console.log(id);
        user = new UserModel({id: id});
        user.destroy();
        Backbone.history.navigate('/users', {
            trigger: true
        });
    },
});