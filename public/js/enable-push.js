'use strict';
const swReady=navigator.serviceWorker.ready;
document.addEventListener('DOMContentLoaded', function(){
    initSW();
});
function initSW() {
    if (!"serviceWorker" in navigator) {
        return;
    }
    if (!"PushManager" in window) {
        return;
    }

    navigator.serviceWorker.register('../sw.js')
    //registra el service worker
        .then(() => {
            initPush();
        })
        .catch((err) => {
            console.log(err)
        });
}

function initPush(){
    if (!swReady){
        return;
    }
    //verifica los permisos para recibir notificaciones
    new Promise(function (resolve, reject) {
        const permissionResult = Notification.requestPermission(function (result) {
            resolve(result);
        });
        if (permissionResult) {
            permissionResult.then(resolve, reject);
        }
    })
    .then((permissionResult) => {
            if (permissionResult !== 'granted') {
                throw new Error('Necesito permisos para recibir notificaciones');
            }
            //Llama a la funcion para recibir notificaciones
            subscribeUser();
    });
}

function subscribeUser() {
    swReady
        .then((registration) => {
            //recibe las credeciales del usuario
            const subscribeOptions = {
                userVisibleOnly: true,
                applicationServerKey: urlBase64ToUint8Array(
                    'BB3Wa4YicAUHXcAoWg3WGxqVuR2cawd6qnMOl-dY8vCuuYZMKJ392vHrG6oHIvRyFfB0nzS_3CBA_tRQoqoJUok'
                )
            };

            return registration.pushManager.subscribe(subscribeOptions);
        })
        .then((pushSubscription) => {
            storePushSubscription(pushSubscription);
        });
}
//guarda el usuario 
function storePushSubscription(pushSubscription) {
    const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    fetch('/save', {
        method: 'POST',
        body: JSON.stringify(pushSubscription),
        headers: {                                                                                  
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-Token': token,
        }
    })
        .then((res) => {
            return res.json();
        })
        .then((res) => {
            console.log(res)
        })
        .catch((err) => {
            console.log(err)
        });
}
function urlBase64ToUint8Array(base64String) {
    var padding = '='.repeat((4 - base64String.length % 4) % 4);
    var base64 = (base64String + padding)
        .replace(/\-/g, '+')
        .replace(/_/g, '/');

    var rawData = window.atob(base64);
    var outputArray = new Uint8Array(rawData.length);

    for (var i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}
