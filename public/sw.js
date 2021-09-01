self.addEventListener('push', function(e){
    if((!self.Notification && self.Notification.permission===granted)){
        return;
    }
    var msg=e.data.json();
    e.waitUntil(self.registration.showNotification(msg.title,{
        body:msg.body,
        icon:msg.icon,
        badge:msg.badge,
        vibrate:[200, 100, 200],
    }));

    self.addEventListener('notificationclick', function (event) {
        event.notification.close();
        event.waitUntil(
        clients.openWindow(msg.dir)
        );
    })
});

