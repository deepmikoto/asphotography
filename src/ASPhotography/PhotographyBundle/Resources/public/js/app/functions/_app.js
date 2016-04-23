asphotography.AppFunctions = Marionette.extend({
    constructor: function ()
    {
        this.fetchTemplates();
    },
    fetchTemplates: function ()
    {
        $.ajax({
            context: this,
            type: 'GET',
            url: asphotography.apiRoutes.FETCH_TEMPLATES_URL,
            dataType: 'json',
            success: function( response )
            {
                asphotography.templates = response;
                this.generateAppRegions();
            }
        });
    },
    generateAppRegions: function ()
    {
        var app_container = 'app-container',
            categories_container = 'categories-container',
            gallery_container = 'gallery-container';
        $( '<div/>', { 'id': gallery_container, 'class': gallery_container }).prependTo( 'body' );
        $( '<div/>', { 'id': categories_container, 'class': categories_container }).prependTo( 'body' );
        $( '<div/>', { 'id': app_container, 'class': app_container }).prependTo( 'body' );
        asphotography.app.addRegions({
            appContainer: '#' + app_container,
            categoriesContainer: '#' + categories_container,
            galleryContainer: '#' + gallery_container
        });
        this.startRouter();
    },
    startRouter: function()
    {
        asphotography.app.router = new asphotography.Router();
        Backbone.history.start({ pushState: true, root: root });
    },
    setPageTitle: function( title )
    {
        $( document ).prop( 'title', title );
    }
});