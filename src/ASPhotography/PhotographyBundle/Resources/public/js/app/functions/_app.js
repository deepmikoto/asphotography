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
                this.startRouter();
            }
        });
    },
    startRouter: function()
    {
        asphotography.app.router = new asphotography.Router();
        Backbone.history.start({ pushState: true, root: root });
    },
    setPageTitle: function( title )
    {
        $( document).prop( 'title', title );
    }
});