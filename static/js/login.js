/************* LOGIN FUNC *******************/
function LoginFunc() {
  var username = $("#username").val();

  var password = $("#password").val();

  $.ajax({
    type: "POST",
    url: "./includes/login.inc.php",
    data: {
      username: username,
      password: password,
    },
    success: function (response) {
      if (response != "Success") {
        $("#notify").html(response).fadeIn(600);
      } else {
        window.location.assign("dashboard.php");
      }
    },
  });
}
/************* END LOGIN FUNC *******************/

/************* ADD USER FUNC *******************/
function AddUserFunc() {
  var full_name = $("#full_name").val();

  var department = $("#department").val();

  var role = $("#role").val();

  var user = $("#user").val();

  var user_password = $("#user_password").val();

  $.ajax({
    type: "POST",
    url: "./includes/registration.inc.php",
    data: {
      full_name: full_name,
      department: department,
      role: role,
      user: user,
      user_password: user_password,
    },
    success: function (response) {
      alert(response);

      $("#full_name").val("");

      $("#department").val("");

      $("#role").val("");

      $("#user").val("");

      $("#user_password").val("");

      add_user_modal.style.display = "none";
    },
  });
}
/************* END ADD USER FUNC *******************/

/************* ADD USER MODAL *******************/
var add_user_modal = document.getElementById("add_user_modal");

var add_user = document.getElementById("add_user");

var close_add_user_modal = document.getElementById("close_add_user_modal");

add_user.onclick = function () {
  add_user_modal.style.display = "block";
};

close_add_user_modal.onclick = function () {
  add_user_modal.style.display = "none";
};

/************* END ADD USER MODAL *******************/
