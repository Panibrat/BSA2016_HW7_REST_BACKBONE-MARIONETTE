UsersBooksCollection = Backbone.Collection.extend({
    model: BookModel,
    url: '/users/1/books'
});
