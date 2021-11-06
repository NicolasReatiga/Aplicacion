$(document).ready(function () {
  tbUsers = $("#tb-users").DataTable({
    columnDefs: [
      {
        targets: -1,
        data: null,
        defaultContent:
          "<div class='text-center'> <div class='btn-group'><button class='btn btn-success btnEdit'>Editar</button><button class='btn btn-danger btnDelete'>Eliminar</button></div></div>",
      },
    ],

    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });

  //Funcinalidad para boton
  $("#btn-add").click(function () {
    $("#formPersonas").trigger("reset");
    $(".modal-header").css(
      "background",
      "linear-gradient(5deg, #414A9B, #4785EF)"
    );
    $(".modal-title").text("Agregar usuario");
    $(".modal-title").css("color", "#fff");
    $("#modalCRUD").modal("show");
    UserId = null;

    opcion = 1; //Crear
  });

  // capturar fila para modificar o eliminar registros
  var fila;

  //Boton editar
  $(document).on("click", ".btnEdit", function () {
    fila = $(this).closest("tr");

    UserId = parseInt(fila.find("td:eq(0)").text());
    Identification = parseInt(fila.find("td:eq(1)").text());
    Name1 = fila.find("td:eq(2)").text();
    Name2 = fila.find("td:eq(3)").text();
    Name3 = fila.find("td:eq(4)").text();
    Name4 = fila.find("td:eq(5)").text();
    UserName = fila.find("td:eq(6)").text();
    Password = fila.find("td:eq(7)").text();
    UserEmail = fila.find("td:eq(8)").text();
    RolId = parseInt(fila.find("td:eq(9)").text());

    //Obtener valores registrados
    $("#Identification").val(Identification);
    $("#Name1").val(Name1);
    $("#Name2").val(Name2);
    $("#Name3").val(Name3);
    $("#Name4").val(Name4);
    $("#UserName").val(UserName);
    $("#Password").val(Password);
    $("#UserEmail").val(UserEmail);
    $("#RolId").val(RolId);

    opcion = 2; //Editar

    $(".modal-header").css(
      "background",
      "linear-gradient(5deg, #414A9B, #FF7B8C)"
    );
    $(".modal-title").text("Modificar usuario");
    $(".modal-title").css("color", "#fff");
    $("#modalCRUD").modal("show");
  });

  //Boton borrar
  $(document).on("click", ".btnDelete", function () {
    fila = $(this);
    UserId = parseInt($(this).closest("tr").find("td:eq(0)").text());
    opcion = 3; //Eliminar

    var respuesta = confirm(
      "¿Está seguro de que desea eliminar el usuario con ID " + UserId + "?"
    );

    if (respuesta) {
      $.ajax({
        url: "../../modulos/2_ModPrincipal/crud.php",
        type: "POST",
        dataType: "json",
        data: { opcion: opcion, UserId: UserId },
        success: function () {
          tbUsers.row(fila.parents("tr")).remove().draw();
        },
      });
    }
  });

  $("#formPersonas").submit(function (e) {
    //Se omite el comportamiento default del submit (cargar)
    e.preventDefault();

    //Se obtienen los valores ingresados en el formulario
    Identification = $.trim($("#Identification").val());
    Name1 = $.trim($("#Name1").val());
    Name2 = $.trim($("#Name2").val());
    Name3 = $.trim($("#Name3").val());
    Name4 = $.trim($("#Name4").val());
    UserName = $.trim($("#UserName").val());
    Password = $.trim($("#Password").val());
    UserEmail = $.trim($("#UserEmail").val());
    RolId = $.trim($("#RolId").val());

    $.ajax({
      url: "../../modulos/2_ModPrincipal/crud.php",
      type: "POST",
      dataType: "json",
      data: {
        opcion: opcion,
        UserId: UserId,
        Identification: Identification,
        Name1: Name1,
        Name2: Name2,
        Name3: Name3,
        Name4: Name4,
        UserName: UserName,
        Password: Password,
        UserEmail: UserEmail,
        RolId: RolId,
      },

      success: function (data) {
        UserId = data[0].UserId;
        Identification = data[0].Identification;
        Name1 = data[0].Name1;
        Name2 = data[0].Name2;
        Name3 = data[0].Name3;
        Name4 = data[0].Name4;
        UserName = data[0].UserName;
        Password = data[0].Password;
        UserEmail = data[0].UserEmail;
        RolId = data[0].RolId;

        if (opcion == 1) {
          //Agregar registro en la tabla
          tbUsers.row
            .add([
              UserId,
              Identification,
              Name1,
              Name2,
              Name3,
              Name4,
              UserName,
              Password,
              UserEmail,
              RolId,
            ])
            .draw();
        } else {
          //Agregar registro en la tabla
          tbUsers
            .row(fila)
            .data([
              UserId,
              Identification,
              Name1,
              Name2,
              Name3,
              Name4,
              UserName,
              Password,
              UserEmail,
              RolId,
            ])
            .draw();
        }
      },
    });

    $("#modalCRUD").modal("hide");
  });
});
