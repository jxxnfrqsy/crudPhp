<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

 <link rel=sylesheet href="https//cdn.datatables.net/2.1.4/css/dataTables.dat">
 <link rel=sylesheet href="https//cdn.datatables.net/2.1.4/js/dataTables.min.">


 <link rel="stylesheet" href="css/estilos.css">


    <title>Crud con php</title>
  </head>
  <body>
    
  <div class="container fondo">
    <div class="text-center">Crud con php</div>
    
    <div class="row">
        <div class="col-2 offset-10">
            <div class="text-center"></div>
            <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
         <i class="bi bi-plus-circle-fill"></i> Crear
         </button>
        </div>
    </div>
    <br />
    <br />
    <div class="table-responsive">
        <table id="datos_usuario" class="table table-bordered table-striped">
         <thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Direccion</th>
<th>Telefono</th> 
<th>Editar</th>
<th>Borrar</th>
<th></th>


</tr>
         </thead>
        </table>


    </div>

  </div>

  <!-- Modal -->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ingrese sus datos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
 <form method="POST" id="formulario" enctype="multipart/form-data">
<div class="modal-content">
<label for="nombre">Ingrese el nombre</label>
<input type="text" name="nombre" id="nombre" class="form-control">
<br />

<label for="apeliidos">Ingrese los apellidos</label>
<input type="text" name="telefono" id="telefono" class="form-control">
<br />

<label for="direccion">Ingrese la direccion</label>
<input type="text" name="direccion" id="direccion" class="form-control">
<br />

<label for="telefono">Ingrese su telefono</label>
<input type="text" name="telefono" id="telefono" class="form-control">
<br />

<label for="imagen">Seleccione una imagen</label>
<input type="file" name="imagen_usuario" id="imagen_usuario" class="form-control">

<span id="Imagen subida"></span>
<br />
</div>
<div class="modal-footer">
         
<input type="hidden" name="id_usuario" id="id_usuario">
<input type="hidden" name="operacion" id="operacion">

<input type="submit" name="acction" id="action" class="btn btn-success" value="crear">
      </div>
</form>

      </div>

    </div>
  </div>
</div>

    

    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        var dataTable = $('#datos_usuario').dataTable({
          $("#botonCrear").click(function(){
            $("#formulario")[0].reset();
            $(".modal-title")[0].text("crearUsuario");
            $("#action").val("crear");
            $("#operacion").val("crear");
            $("#imagen_subida").html("");




          });
          "processing":true,
          "serverSide":true;
          "order":[],
          "ajax":{
            url: "obtener_registros.php",
            type: "POST"
          },
          "columnsDefs":[{ 
            "targets":[0, 3, 4]
            "orderable":false,
          },

          ]


        });

        $(document).on('submit', '#formulario', function(event){


event.preventDefault();
var nombres = $("nombre").val();
var apellidos = $("apellidos").val();
var direccion = $("direccion").val();
var telefono = $("telefono").val();
var extension = $("#imagen_usuario").val().split('.').pop().toLowerCase();


if(extesion !=''){
   
if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg'])==-1){
alert("formato de imagen invalido"),
$("#imagen_usuario").val('');
return false;
} 

if(nombre != '' && apellidos !=''){
$.ajax({
  url: "crear.php",
  method: "POST",
  data:new formData(this);
  contentType:false;
  processData:false;
  succes:function(data){
alert(data),
$('#formulario')[0].reset();
$('#modalUsuario').modal.hide();
dataTable.ajax.reload();



  }

});
}else{
alert("Algunos campos son obligatorios");

}


}
});

      });
      

       


    </script>


  </body>
</html>