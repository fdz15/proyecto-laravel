// Obtener referencia al input y a la imagen
function previewImage(event, imageId){
  if(event.target.files.length > 0){
    let src = URL.createObjectURL(event.target.files[0]);
    let imgPreview = document.getElementById(imageId);
    imgPreview.src = src;
    imgPreview.style.display = "block";
  }
}

const validateSize = (imageId, maxSize)=>{
  let size= document.getElementById(imageId).files[0].size;
  return (size<=maxSize);
}
const validateType= (imageId,...fileTypes)=>{
const NOT_FOUND=-1;
  let type= document.getElementById(imageId).files[0].type;
  const upperCased = fileTypes.map(it => it.toUpperCase());
  return (upperCased.indexOf(type.toUpperCase()) !== NOT_FOUND); 
}
function validateData(){
  let isValid=true;
  if (!validateSize('foto',2048*1024)) {
      alert ("El tamaño de la foto debe ser menor a 2MB");
      isValid=false;
  }
  return isValid;
}

function previewPDF (event, idFrame){
  if(event.target.files.length >0){
    let src = URL.createObjectURL(event.target.files[0]);
    let pdfPreview = document.getElementById(idFrame);
    pdfPreview.src = src;
    pdfPreview.style.display = "block";
  }
}

function validarExt()
{
    var archivoInput = document.getElementById('perfil');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.pdf)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('Solo se permite seleccionar archivos con extención PDF');
        archivoInput.value = '';
        return false;
    }

    else
    {
        //PRevio del PDF
        if (archivoInput.files && archivoInput.files[0]) 
        {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
                document.getElementById('visorArchivo').innerHTML = 
                '<embed src="'+e.target.result+'" width="500" height="375" />';
            };
            visor.readAsDataURL(archivoInput.files[0]);
        }
    }
}