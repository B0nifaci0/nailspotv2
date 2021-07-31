document.addEventListener("DOMContentLoaded", function(){
fetch('/notifications')
//consume las notificaciones
      .then(response => response.json())
      .then((data) => {
            const notificaciones=document.getElementById('show-notification'), $btnNotification=document.getElementById('btn-notifications'),
            $icon=document.createElement("b");
            //crea las notificaciones
            if(data.total>0){
                  $icon.textContent=data.total;
                  $icon.classList.add("text-sm","md:text-md","bg-indigo-800","rounded-full","w-5","text-white");
                  $btnNotification.appendChild($icon);
                  notificaciones.classList.add("max-h-52","overflow-y-scroll")
                  this.data=data.notifications.forEach(el=>{
                        let $content=document.createElement('div'),$link =document.createElement("a"),$body=document.createElement('p')
                        $photo=document.createElement('img');
                        $body.textContent=el.data.body;
                        $photo.setAttribute("src", el.data.icon);
                        $link.setAttribute("href", el.data.action_url);
                        $link.setAttribute("id", el.id);
                        $link.appendChild($photo);
                        $link.appendChild($body);
                        $link.classList.add("flex", "flex-1", "bg-indigo-700", "p-1", "border", "hover:bg-indigo-800", "items-center", "rounded-md");
                        $photo.classList.add("inline-block", "rounded-full", "w-10");
                        $body.classList.add("text-white","font-extrabold","inline-block", "text-xs","md:text-md", "p-2");
                        $content.appendChild($link);
                        notificaciones.appendChild($content);
                        $link.addEventListener('click', markAsRead);
                  })
            }else{
                  $body=document.createElement('p');
                  $body.textContent="!No hay notificaciones para ti!";
                  $body.classList.add("p-2", "bg-gray-100", "text-center", "rounded-md");
                  notificaciones.appendChild($body);
            }
      })
      .catch(error=>console.log(error));
//Elimina la notificacion
function markAsRead(obj) {
      const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
      console.log(this.id);
      fetch(`/notifications/${this.id}/read`,{
            method:'DELETE',
            headers:{
                  'X-CSRF-Token': token,
            }
      })
      .then(res=>res.text()) 
      .catch(err=>console.log(err));
}
})