myRouter = Marionette.AppRouter.extend({
    controller: new myController(),

    appRoutes: {
        "": "index",
        "books": "books",
        "users/:id/books": "UsersBooks",
        "books/add": "booksAdd",
        "users/add": "usersAdd",
        "books/edit/:id": "booksEdit",
        "users": "users",
        "books/:id": "SingleBook",
        "users/:id": "SingleUser",
        "books/delete/:id": "destroyBook",
        "users/delete/:id": "destroyUser",
        "users/:userid/books/:bookid": "returnBook",
        "default": "index"
    }
});
