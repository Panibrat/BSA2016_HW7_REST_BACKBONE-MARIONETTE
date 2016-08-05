BookModel = Backbone.Model.extend({
    defaults: {
        //id: '',
        title: '',
        author: '',
        year: null,
        genre: '',
        user_id: null
    },
    urlRoot: '/books',
    validate: function(attrs, options) {
        //console.log(attrs);
        alpha = /[a-zA-zà-ÿÀ-ß]+/i;
        if ( !(attrs.genre) || !(attrs.author) || !(attrs.title)) {
            return 'Fill all fields';
        }
        if (!alpha.test(attrs.genre) || !alpha.test(attrs.author)) {
            return "Should be only alpha";
        }
        if ( attrs.year < 0 ) {
            return 'Type real year!';
        }
    },
});