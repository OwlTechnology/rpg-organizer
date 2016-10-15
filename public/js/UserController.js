var UserController = function(){
    this.invitesTray = new NotificationTray("notifications_invites_tray", "/invites");
};

UserController.prototype.start = function(){
    this.invitesTray.load();
};

var NotificationTray = function(elementID, source, type){
    // Elements
    this.parent = document.getElementById(elementID);
    this.indicator = document.querySelector("#" + elementID + " .indicator");

    // Other Data
    this.source = source;
    this.type = type;
};

NotificationTray.prototype.updateNotifications = function(rawResult){
    this.indicator.innerHTML = rawResult.length;
};

NotificationTray.prototype.load = function(){
    var self = this;

    $.ajax({
        url: this.source,
        type: "GET",
        data: {}
    }).done(function(result){
        self.updateNotifications(result);
    });
};

(function($, ctx){
    $(document).ready(function(){
        ctx.userController = new UserController();
    });

    ctx.onload = function(){
        ctx.userController.start();
    }
})(jQuery, window);
