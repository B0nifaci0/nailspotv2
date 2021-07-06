document
    .getElementById("name")
    .addEventListener("keyup", slugChange);

document
    .getElementById('price')
    .addEventListener('keypress', numberValidate)

function slugChange() {
    name = document.getElementById("name").value;
    document.getElementById("slug").value = slug(name);
}
function slug(str) {
    var $slug = "";
    var trimmed = str.trim(str);
    $slug = trimmed
        .replace(/[^a-z0-9-]/gi, "-")
        .replace(/-+/g, "-")
        .replace(/^-|-$/g, "");
    return $slug.toLowerCase();
}


function numberValidate(e) {
    var key = window.event ? e.which : e.keyCode;
    if (key < 48 || key > 57) {
        e.preventDefault();
    }
}


ClassicEditor
    .create(document.querySelector('#description'),
    {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'blockQuote'],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    })
    .catch(error => {
        console.log(error);
    });

//Cambiar imagen
document.getElementById("file").addEventListener('change', changeImage);

function changeImage(event) {
    var file = event.target.files[0];

    var reader = new FileReader();
    reader.onload = (event) => {
        document.getElementById("picture").setAttribute('src', event.target.result);
    };

    reader.readAsDataURL(file);
}
//Seo Form
const seoName=(event)=>{
    let name=document.getElementById('name').value;
    let title=document.getElementById('seoTitle').value=name;
}
document.getElementById("name").addEventListener("keyup", seoName);

document.addEventListener('DOMContentLoaded', function() {
    let des=document.querySelector('.ck-content').firstChild;
    let content=document.querySelector('.ck-content');
    content.addEventListener("keyup", function(){
        document.getElementById("seoDescription").value=des.textContent;
    });
 }, false);