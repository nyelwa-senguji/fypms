$(document).ready(function () {
  $("#notify").hide();

  $("#login_btn").click(function (e) {
    e.preventDefault();
    LoginFunc();
  });

  $("#add_new_role").click(function (e) {
    e.preventDefault();
    AddNewRole();
  });

  $("#add_new_department").click(function (e) {
    e.preventDefault();
    AddNewDepartment();
  });

  $("#add_new_user").click(function (e) {
    e.preventDefault();
    AddUserFunc();
  });

  /********** POPULATE ROLES **********/
  $.ajax({
    type: "GET",
    url: "./includes/role.inc.php",
    success: function (response) {
      jsonData = JSON.parse(response);
      for (var i = 0; i < jsonData.length; i++) {
        var counter = jsonData[i];
        $("#role").append(
          "<option value='" + counter.role_name + "'>" + counter.role_name + "</option>"
        );
      }
    },
  });
  /********** END POPULATE ROLES **********/

  /********** POPULATE DEPARTMENT **********/
  $.ajax({
    type: "GET",
    url: "./includes/department.inc.php",
    success: function (response) {
      jsonData = JSON.parse(response);
      for (var i = 0; i < jsonData.length; i++) {
        var counter = jsonData[i];
        $("#department").append(
          "<option value='" + counter.department_name + "'>" + counter.department_name + "</option>"
        );
      }
    },
  });
  /********** END POPULATE DEPARTMENT **********/
});
