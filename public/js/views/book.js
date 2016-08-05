BookView = Marionette.ItemView.extend({
    template: "#book-one",
    tagName: 'tr',
        events: {
    },
    modelEvents: {
        'change': 'render'
    }

});
BookDetailView = Marionette.ItemView.extend({
    template: "#book-one-detail",
    //tagName: 'tr',
        events: {
    },
    modelEvents: {
        'change': 'render'
    }

});
BookDetailEdit = Marionette.ItemView.extend({
    template: "#book-one-edit",
    tagName: "form",
    events: {
        'submit': 'submitForm',
    },
    submitForm: function (e) {
        e.preventDefault();
        book = this.model;
        title =  $(e.currentTarget).find('input[id="title"]').val();
        author =  $(e.currentTarget).find('input[id="author"]').val();
        year =  $(e.currentTarget).find('input[id="year"]').val();
        genre =  $(e.currentTarget).find('input[id="genre"]').val();
        user_id =  $(e.currentTarget).find('input[id="user_id"]').val();
        //console.log(title);
        book.set({
            title: title,
            author: author,
            year:  year,
            genre: genre,
            user_id: user_id
        });
        if(!book.isValid()){
            alert(book.validationError);
            console.log("ERROR: " + book.validationError);
            return;
        }
        book.save();
        Backbone.history.navigate('/books', {
            trigger: true
        });
    },

});

