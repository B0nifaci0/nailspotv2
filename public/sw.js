self.addEventListener('push', function(e){
    alert("aver");
    if((!self.Notification && self.Notification.permission===granted)){
        return;
    }
    if(e.data){
        var msg=e.data.json();
        console.log(msg);
        e.waitUntil(self.registration.showNotification(msg.title,{
            body:msg.body,
            icon:msg.icon,
        }));
    }
});

