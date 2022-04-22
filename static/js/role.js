/************* ADD ROLE FUNC *******************/
var add_role_modal = document.getElementById("add_role_modal");

var add_role = document.getElementById("add_role");

var close_add_role_modal = document.getElementById("close_add_role_modal");

add_role.onclick = function () {
  add_role_modal.style.display = "block";
};

close_add_role_modal.onclick = function () {
  add_role_modal.style.display = "none";
};

function AddNewRole() {

  var role_name = $("#role_name").val();

  $.ajax({
    type: "POST",
    url: "./includes/role.inc.php",
    data: {
      role_name: role_name
    },
    success: function (response) {
      alert(response);

      $("#role_name").val("");
    },
  });
}
/************* END ADD ROLE FUNC *******************/
