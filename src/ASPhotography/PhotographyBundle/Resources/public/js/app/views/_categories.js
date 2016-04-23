/**
 * Created by MiKoRiza-OnE on 11/12/2015.
 */

asphotography.CategoriesView = Marionette.LayoutView.extend({
    className: 'categories',
    ui: {

    },
    events: {

    },
    initialize: function ()
    {

    },
    getTemplate: function ()
    {
        /** @namespace asphotography.templates.categories */
        return _.template( asphotography.templates.categories );
    },
    onShow: function ()
    {
        this.animateIntoView();
    },
    animateIntoView: function ()
    {
        var delay = 1500;
        asphotography.app.radio.broadcast( 'global', 'landing:page:hide', delay );
        $( 'html' ).addClass( 'no-overflow' );
        this.$el.animate({
            right: 0
        }, delay, function (){
            $( 'html' ).removeClass( 'no-overflow' );
        });
    }
});