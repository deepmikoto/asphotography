/** define the app router that will handle relations between app URL and actions */
asphotography.Router = Marionette.AppRouter.extend({
    routes: {
        '': 'homeAction',
        'login': 'loginAction',
        'logout': 'logoutAction',
        ':placeholder': 'undefinedAction',
        ':placeholder/:placeholder': 'undefinedAction',
        ':placeholder/:placeholder/:placeholder': 'undefinedAction',
        ':placeholder/:placeholder/:placeholder/:placeholder': 'undefinedAction',
        ':placeholder/:placeholder/:placeholder/:placeholder/:placeholder': 'undefinedAction',
        ':placeholder/:placeholder/:placeholder/:placeholder/:placeholder/:placeholder': 'undefinedAction',
        ':placeholder/:placeholder/:placeholder/:placeholder/:placeholder/:placeholder/:placeholder': 'undefinedAction',
        ':placeholder/:placeholder/:placeholder/:placeholder/:placeholder/:placeholder/:placeholder/:placeholder': 'undefinedAction'
    },
    undefinedAction: function()
    {
        Backbone.history.navigate( '', { trigger: true } );
    },
    homeAction: function()
    {
        this.updateAwareness( 'homepage' );
        this.updatePageTitle( 'Andreea Sanduloiu Photography' );
    },
    loginAction: function()
    {
        if ( asphotography.app.user.isLoggedIn() ){
            Backbone.history.navigate( '', { trigger: true } );
        } else {
            this.showLogin();
        }
    },
    logoutAction: function()
    {
        // to be implemented is needed
    },
    showLogin: function()
    {
        // to be implemented is needed
    },
    updateAwareness: function( currentPage )
    {
        asphotography.app.radio.broadcast( 'router', 'change:page', currentPage );
    },
    updatePageTitle: function( title )
    {
        asphotography.app.appFunctions.setPageTitle( title );
    }   
});
