UserView = Marionette.ItemView.extend({
    template: "#user-one",
    tagName: 'tr',
});
UserDetailView = Marionette.ItemView.extend({
    template: "#user-one-detail",
});
UserDetailEdit = Marionette.ItemView.extend({
    template: "#user-one-edit",
    tagName: "form",
    events: {
        'submit': 'submitForm',
    },
    submitForm: function (e) {
        e.preventDefault();
        user = this.model;
        name =  $(e.currentTarget).find('input[id="name"]').val();
        lastname =  $(e.currentTarget).find('input[id="lastname"]').val();
        email =  $(e.currentTarget).find('input[id="email"]').val();
        user.set({
            name: name,
            lastname: lastname,
            email:  email,
        });
        if(!user.isValid()){
            alert(user.validationError);
            console.log("ERROR: " +user.validationError);
            return;
        }
        user.save();
        Backbone.history.navigate('/users', {
            trigger: true
        });
    },

});

