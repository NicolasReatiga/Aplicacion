$("#formlogin").submit(function (e) {
  e.preventDefault();

  // Se obtienen los valores input
  var username = $.trim($("#username").val());
  var password = $.trim($("#password").val());

  if (username.length == "" || password.length == "") {
    return false;
  } else {
    $.ajax({
      url: "../../modulos/1_ModLogin/login.php",
      type: "POST",
      datatype: "json",
      data: {
        username: username,
        password: password,
      },
      success: function (data) {
        if (data == "null") {
          Swal.fire({
            type: 'error',
            icon: 'error',
            title: 'Usuario y/o contraseña incorrectas.',
          });
        } else {
          Swal.fire({
            type: 'success',
            icon: 'success',
            title: 'La conexión ha sido exitosa.',
            confirmButtonColor: '#414A98',
            confirmButtonText: 'Ok',
          }).then((result) => {
            if (result.value) {
              window.location.href = "../../modulos/2_ModPrincipal/User_main.php";
            }
          });
        }
      }
    });
  }
});
