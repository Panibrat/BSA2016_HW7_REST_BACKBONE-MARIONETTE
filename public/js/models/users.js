UsersCollection = Backbone.Collection.extend({
    model: UserModel,
    url: '/users'
});