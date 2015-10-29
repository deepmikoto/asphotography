/**
 * Created by MiKoRiza-OnE on 10/29/2015.
 */

asphotography.LandingPage = Marionette.ItemView.extend({
    className: 'landing-page container',
    ui: {
        logoAndButton: '#logo-and-button',
        logo: '#logo',
        button: '#button'
    },
    events: {
        'click @ui.button': 'showPortfolio'
    },
    initialize: function ()
    {
        this.listenTo( asphotography.app.globalChannel.vent, 'body:resize', this.adaptToWindowSize )
    },
    getTemplate: function ()
    {
        /** @namespace asphotography.templates.landingPage */
        return _.template( asphotography.templates.landingPage );
    },
    onShow: function ()
    {
        this.adaptToWindowSize();
        this.animateIntoView();
    },
    adaptToWindowSize: function ( dimensions )
    {
        dimensions = dimensions ||
            {
                width: $( window ).width(),
                height: $( window ).height()
            }
        ;
        this.ui.logoAndButton.css({
            maxHeight: ( dimensions.height * 25 / 100 ) + 'px',
            maxWidth: ( dimensions.width * 50 / 100 ) + 'px',
            top: ( dimensions.height / 3 - this.ui.logoAndButton.height() ) + 'px'
        });
    },
    animateIntoView: function()
    {
        var _this = this;
        setTimeout( function () {
            $( '#loader' ).animate({
                margin: 0,
                opacity: '0.5',
                height: '44px',
                width: '44px',
                left: _this.ui.button.offset().left + 'px',
                top: _this.ui.button.offset().top + 'px'
            }, 1200, function (){
                $( '#loader' ).parent().remove();
            });
            setTimeout(function (){
                _this.$el.animate({
                    opacity: 1
                }, 1000 );
            }, 500 )
        }, 1000 );
    },
    showPortfolio: function ( e )
    {
        e.preventDefault();
        alert( 'we\'re working on it!' );
    }
});