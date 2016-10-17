var UserController = function(){
    this.invitesTray = new NotificationTray("notifications_invites_tray", "/invites");
};

UserController.prototype.start = function(){
    this.invitesTray.load();
};

UserController.prototype.openNotifications = function(type, caller){
    if(type === "invites"){
        this.invitesTray.toggle();
    }
};

var NotificationTray = function(elementID, source, type){
    // Elements
    this.parent = document.getElementById(elementID);
    this.indicator = document.querySelector("#" + elementID + " .indicator");
    this.list = document.querySelector("#" + elementID + " .list");
    this.hidden = true;

    // Other Data
    this.source = source;
    this.type = type;
};

NotificationTray.prototype.toggle = function(){
    if(this.hidden){
        $(this.list).show();
        this.hidden = false;
    }else{
        $(this.list).hide();
        this.hidden = true;
    }
};

NotificationTray.prototype.updateNotifications = function(rawResult){
    this.indicator.innerHTML = rawResult.length;

    this.fillNotifications(rawResult);
};

NotificationTray.prototype.fillNotifications = function(rawResult){
    for(var x = 0; x < rawResult.length; x++){
        var notification = rawResult[x];

        this.addNotificationHTML(notification);
    }
};

NotificationTray.prototype.addNotificationHTML = function(notification){
    new InviteNotification(notification, this.list);
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

var InviteNotification = function(invite, parent){
    this.invite = invite;
    this.parent = parent;

    this.buildHTML();
};

InviteNotification.prototype.buildHTML = function(){
    this.element = document.createElement("div");
    this.message = document.createElement("div");
    this.actionsPanel = document.createElement("div");
    this.acceptButton = document.createElement("a");
    this.rejectButton = document.createElement("button");

    this.element.className = "notification";

    this.message.innerHTML = this.invite.message;
    this.message.className = "message";

    this.actionsPanel.className = "actions";

    this.acceptButton.innerHTML = "<i class='material-icons'>done</i>";
    this.acceptButton.className = "accept";
    this.acceptButton.href = "/invites/accept/" + this.invite.targetObject.id;

    this.rejectButton.innerHTML = "<i class='material-icons'>close</i>";
    this.rejectButton.className = "reject";

    this.actionsPanel.appendChild(this.acceptButton);
    this.actionsPanel.appendChild(this.rejectButton);

    this.element.appendChild(this.message);
    this.element.appendChild(this.actionsPanel);

    this.parent.appendChild(this.element);
};

(function($, ctx){
    $(document).ready(function(){
        ctx.userController = new UserController();
    });

    ctx.onload = function(){
        ctx.userController.start();
    }
})(jQuery, window);
