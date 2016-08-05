//BooksView = Marionette.CompositeView.extend({
//    tagName: "table",
//    template: "#books-all",
//    //className: "table",
//    childView: BookView,
//    childViewContainer: "tbody"
//});
BooksView = Marionette.CompositeView.extend({
    template: '#template-header-books',
    childView: BookView,
    tagName: 'table',
    childViewContainer: 'tbody',
    className: 'table',
    //el: '#container',
    modelEvents: {
        'change': 'render'
    },
    collectionEvents: {
        'change': 'render'
    }
});

UsersBooksView = Marionette.CompositeView.extend({
    template: '#template-header-usersbooks',
    childView: BookView,
    tagName: 'table',
    childViewContainer: 'tbody',
    className: 'table',
});