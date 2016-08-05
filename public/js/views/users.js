UsersView = Marionette.CompositeView.extend({
    template: '#template-header-users',
    childView: UserView,
    tagName: 'table',
    childViewContainer: 'tbody',
    className: 'table',
});
