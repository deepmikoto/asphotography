/**
 * Our Marionette app
 */
asphotography.app = new Marionette.Application();
//
///**
// * The main regions of our app
// */
//asphotography.app.addRegions({
//    appContainer: '#app-container'
//});

/** we initialize app functions */
asphotography.app.addInitializer(function()
{
    asphotography.app.generalFunctions = new asphotography.GeneralFunctions;
    asphotography.app.appFunctions     = new asphotography.AppFunctions;
    asphotography.app.radio            = new asphotography.RadioFunctions;
});

/**
 * initialize app data variable and app user object
 */
asphotography.app.addInitializer( function()
{
    asphotography.app.data = {};
    asphotography.app.user = new asphotography.User();
});

/**
 * Now we launch the app
 */
asphotography.app.start();