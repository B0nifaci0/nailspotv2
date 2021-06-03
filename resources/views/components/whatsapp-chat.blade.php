<div>
    <div class="absolute z-50">
        <div id="WAButton"></div>
    </div>
    <script>
        let noWhats={!!json_encode($contact[0]->phone)!!};
        $(function() { 
            $ ('#WAButton').floatingWhatsApp({ 
            phone:'52'+noWhats,
            popupMessage:'Hola, ¿Cómo podemos ayudarte?', 
            showPopup:true,
            headerTitle:'Nailspot',
            size:'50px'
            }); 
        });
   </script>
</div>