/************* ADD ROLE FUNC *******************/
var add_department_modal = document.getElementById("add_department_modal");

var add_department = document.getElementById("add_department");

var close_add_department_modal = document.getElementById("close_add_department_modal");

add_department.onclick = function () {
  add_department_modal.style.display = "block";
};

close_add_department_modal.onclick = function () {
  add_department_modal.style.display = "none";
};
function AddNewDepartment() {

  var department_name = $("#department_name").val();

  $.ajax({
    type: "POST",
    url: "./includes/department.inc.php",
    data: {
      department_name: department_name
    },
    success: function (response) {
      alert(response);
      $("#department_name").val("");
    },
  });
}
/************* END ADD ROLE FUNC *******************/
