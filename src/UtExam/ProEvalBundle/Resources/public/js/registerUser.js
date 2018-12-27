$(document).ready(function() {
  $('body').on('click','.registerAlumno', function() {
    var bandera= true;
    var expOnlyLetters= /^[a-zA-Z\s]+$/;
    var none="'none'";
    var boxName= document.getElementById('userName').value;
    var boxCarrera= document.getElementById('userCarrera').value;
    var boxTurno= document.getElementById('exampleFormControlSelect1').value;
    if (boxName===""||boxCarrera===""||boxTurno==="") {
      console.log('no lo has llenado');
    var bandera= false;
    $(".loginContainer").append('\
    <div class="alert">\
       <span class="closebtn" onclick="this.parentElement.style.display='+none+';">&times;</span> \
       <strong>¡Alerta!</strong> Debes de llenar todos los campos.\
   </div>\
    ');
    window.setTimeout(function() { $(".alert").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 2500);
    return;
    }
    if (bandera) {
    var data = {
      "alumno" : boxName,
      "carrera" : boxCarrera,
      "turno" : boxTurno,
    }
    $.ajax({
      url: 'register',
      type: 'POST',
      data:  data,
      beforeSend: function() {
        $('body').append('\
        <div class="loadingContent" id="divLoading">\
          <h1>\
          <span class="let1">S</span>\
          <span class="let2">i</span>\
          <span class="let3">p</span>\
          <span class="let4">r</span>\
          <span class="let5">e</span>\
          <span class="let6">.</span>\
          <span class="let7">.</span>\
          </h1>\
          <div class="overlay"></div>\
        </div>\
        ')
        console.log("login");
      },
      success: function send(data) {
        console.log("cargando");
        alert(data);
      },
      complete: function() {
        console.log("terminando");
        location.reload();
        $('.loadingContent').remove();
      },
    });
  }
});
});
