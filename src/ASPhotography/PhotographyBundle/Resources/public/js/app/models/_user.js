/** define the model that will hold our user */
asphotography.User = Backbone.Model.extend({
    isLoggedIn: function() {
        return (this.has('username'));
    },
    hasRole: function(role) {
        return (this.has('roles') && this.get('roles').indexOf(role) != -1);
    }
});