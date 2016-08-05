UserModel = Backbone.Model.extend({
    defaults: {
        name: 'User',
        lastname: 'UserLastName',
        email: 'User@gmail.com'
    },
    urlRoot: '/users'
});
