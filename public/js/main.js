/**
 * Created by cpaniba on 30.07.2016.
 */

App = new Backbone.Marionette.Application();

App.addRegions({
    content: "#container",
    mainRegion: "#main-region"
});





App.addInitializer(function(options){
    Backbone.history.start();
});

$(document).ready(function(){
    App.start();
});


new myRouter();
//book= new BookModel({id: 1});
//book.fetch();
//view=new BookView({model: book});
//App.content.show(view);