asphotography.RadioFunctions = Marionette.extend({
    constructor: function()
    {
        this.initializeRadioChannels();
        this.transmitBodyBehaviour();
    },
    initializeRadioChannels: function()
    {
        asphotography.app.globalChannel   = Backbone.Wreqr.radio.channel( 'global' );
        asphotography.app.routerChannel   = Backbone.Wreqr.radio.channel( 'router' );
        asphotography.app.securityChannel = Backbone.Wreqr.radio.channel( 'security' );
    },
    broadcast: function(channel, message, data)
    {
        data = data || null;
        Backbone.Wreqr.radio.vent.trigger( channel, message, data );
    },
    transmitBodyBehaviour: function ()
    {
        var _this = this;
        $( window ).on( 'resize', function(){
            _this.broadcast( 'global', 'body:resize',
                {
                    width: $( document ).width(),
                    height: $( document ).height()
                }
            );
        });
    }
});