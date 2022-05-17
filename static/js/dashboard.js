$(document).ready(function () {
  $(".assign-container").hide();

  $(".project-container").hide();

  $(".assign-btn").hide();

  if (role == "Supervisor") {
    GetAssignedStudents(id);
  }

  if (role == "Student") {
    GetAssignedInstructor(id);
  }

  GetAssignedInstructors();

  GetAllInstructors();

  GetAllStudents();

  $(".assign-btn").click(function (e) {
    e.preventDefault();
    AssignStudentToInstructor();
  });
});

var students_to_assign = [];

var id = $("#id").val();

var role = $("#role").val();

function GetAssignedInstructors() {
  $.ajax({
    type: "GET",
    url: "./includes/users.inc.php",
    data: {
      assigned_instructors: "assigned_instructors",
    },
    success: function (response) {
      jsonData = JSON.parse(response);
      if (jsonData == false) {
        $(".assigned-instructors").append(
          "<div class='no-user-details'><h3 class='text-normal'>No Instructor assigned...</h3></div>"
        );
      } else {
        for (var i = 0; i < jsonData.length; i++) {
          var counter = jsonData[i];
          $(".assigned-instructors").append(
            "<div class='user-details' onclick=\"AssignedInstructor('" +
              counter.id +
              "');\">" +
              "<h3 class='text-normal'>" +
              counter.fullname +
              "</h3>" +
              "<h5 class='text-normal'>" +
              counter.role +
              "</h5>" +
              "<h5 class='text-normal'>" +
              counter.department +
              "</h5>" +
              "</div>" +
              "<hr>"
          );
        }
      }
    },
  });
}

function GetAssignedInstructor(id) {
  $.ajax({
    type: "POST",
    url: "./includes/users.inc.php",
    data: {
      id: id,
      assigned_instructor: "assigned_instructor",
    },
    success: function (response) {
      jsonData = JSON.parse(response);
      if (jsonData == false) {
        $(".assigned-instructors").append(
          "<div class='no-user-details'><h3 class='text-normal'>Not Assigned to any instructor...</h3></div>"
        );
      } else {
        for (var i = 0; i < jsonData.length; i++) {
          var counter = jsonData[i];
          $(".student-assigned-supervisor").append(
            "<div class='user-details'>" +
              "<h3 class='text-normal'>" +
              counter.fullname +
              "</h3>" +
              "<h5 class='text-normal'>" +
              counter.role +
              "</h5>" +
              "<h5 class='text-normal'>" +
              counter.department +
              "</h5>" +
              "</div>" +
              "<hr>"
          );
        }
      }
    },
  });
}

function AssignedInstructor(id) {
  GetAssignedStudents(id);
}

function GetAssignedStudents(id) {
  $.ajax({
    type: "POST",
    url: "./includes/users.inc.php",
    data: {
      id: id,
      assigned_students: "assigned_students",
    },
    success: function (response) {
      jsonData = JSON.parse(response);
      if (role == "Supervisor") {
        for (var i = 0; i < jsonData.length; i++) {
          var counter = jsonData[i];
          $(".supervisor-assigned-students").append(
            "<div class='user-details' onclick=\"AssignedStudent('" +
              counter.fullname +
              "'," +
              counter.fullname +
              ');">' +
              "<h3 class='text-normal'>" +
              counter.fullname +
              "</h3>" +
              "<h5 class='text-normal'>" +
              counter.role +
              "</h5>" +
              "<h5 class='text-normal'>" +
              counter.department +
              "</h5>" +
              "</div>" +
              "<hr>"
          );
        }
      }
      if (role == "Coordinator") {
        for (var i = 0; i < jsonData.length; i++) {
          var counter = jsonData[i];
          $(".coordinator-assigned-students").append(
            "<div class='user-details' onclick=\"AssignedStudent('" +
              counter.fullname +
              "'," +
              counter.fullname +
              ');">' +
              "<h3 class='text-normal'>" +
              counter.fullname +
              "</h3>" +
              "<h5 class='text-normal'>" +
              counter.role +
              "</h5>" +
              "<h5 class='text-normal'>" +
              counter.department +
              "</h5>" +
              "</div>" +
              "<hr>"
          );
        }
      }
    },
  });
}

function GetAllInstructors() {
  var search_instructor = $("#search_instructor").val();
  $.ajax({
    type: "GET",
    url: "./includes/users.inc.php",
    data: {
      instructors: "instructors",
      search_instructor: search_instructor,
    },
    success: function (response) {
      jsonData = JSON.parse(response);
      for (var i = 0; i < jsonData.length; i++) {
        var counter = jsonData[i];
        $(".instructors").append(
          "<div class='user-details' onclick=\"AssignInstructor('" +
            counter.fullname +
            "'," +
            counter.id +
            ');">' +
            "<h3 class='text-normal'>" +
            counter.fullname +
            "</h3>" +
            "<h5 class='text-normal'>" +
            counter.role +
            "</h5>" +
            "<h5 class='text-normal'>" +
            counter.department +
            "</h5>" +
            "</div>" +
            "<hr>"
        );
      }
    },
  });
}

function GetAllStudents() {
  $.ajax({
    type: "GET",
    url: "./includes/users.inc.php",
    data: {
      students: "students",
    },
    success: function (response) {
      jsonData = JSON.parse(response);
      for (var i = 0; i < jsonData.length; i++) {
        var counter = jsonData[i];
        $(".students").append(
          "<div class='user-details' onclick=\"AssignStudent('" +
            counter.fullname +
            "'," +
            counter.id +
            ' );">' +
            "<h3 class='text-normal'>" +
            counter.fullname +
            "</h3>" +
            "<h5 class='text-normal'>" +
            counter.role +
            "</h5>" +
            "<h5 class='text-normal'>" +
            counter.department +
            "</h5>" +
            "</div>" +
            "<hr>"
        );
      }
    },
  });
}

function Logout() {
  if (confirm("Are you sure you want to logout")) {
    $.ajax({
      type: "POST",
      url: "logout.php",
      data: {
        logout: "",
      },
      success: function (response) {
        if (response == "Logged out") {
          window.location.assign("login.php");
        }
      },
    });
  }
}

function AssignInstructor(name, id) {
  $(".assign-instructor").text(name);
  $("#instructor-to-assign").val(id);
}

function AssignStudent(name, id) {
  var instructor_to_assign = $("#instructor-to-assign").val();

  if (instructor_to_assign == "") {
    alert("Please select instructor first");
    return;
  }

  if (!students_to_assign.includes(id)) {
    students_to_assign.push(id);

    $(".column-body").append(
      "<div class='assign-student' id='" +
        id +
        "'>" +
        "<div>" +
        name +
        "</div>" +
        "<div class='cursor' onclick='UnAssignStudent(" +
        id +
        ")'><i class='fa-solid fa-xmark'></i></div>"
    );

    $(".assign-btn").show();
  } else {
    alert("Student is already selected");
  }
}

function UnAssignStudent(id) {
  $("#" + id).remove();
  students_to_assign = ArrayRemove(students_to_assign, id);
}

function ArrayRemove(arr, value) {
  return arr.filter(function (ele) {
    return ele != value;
  });
}

function AssignStudentToInstructor() {
  var instructor_to_assign = $("#instructor-to-assign").val();

  $.ajax({
    type: "POST",
    url: "./includes/users.inc.php",
    data: {
      instructor_to_assign: instructor_to_assign,
      students_to_assign: students_to_assign,
    },
    success: function (response) {
      toastr.success("", response, {
        debug: false,
        showMethod: "fadeIn",
        showEasing: "swing",
        showDuration: 300,
        showEasing: "swing",
        hideMethod: "fadeOut",
        positionClass: "toast-top-center",
        progressBar: true,
      });
      setTimeout(function () {
        location.reload();
      }, 5000);
    },
  });
}

/************* ADD PROJECT MODAL *******************/
var add_project_modal = document.getElementById("add_project_modal");

var add_project = document.getElementById("add_project");

var close_add_project_modal = document.getElementById(
  "close_add_project_modal"
);

add_project.onclick = function () {
  add_project_modal.style.display = "block";
};

close_add_project_modal.onclick = function () {
  add_project_modal.style.display = "none";
};

/************* END ADD PROJECT MODAL *******************/

function OpenAssign() {
  $(".dashboard-container").hide();

  $(".assign-container").show();

  $(".dashboard").removeClass("active");

  $(".assign").addClass("active");
}

function OpenProject() {
  $(".dashboard-container").hide();

  $(".assign-container").hide();

  $(".project-container").show();

  $(".dashboard").removeClass("active");

  $(".project").addClass("active");
}

function OpenDashboard() {
  $(".dashboard-container").show();

  $(".assign-container").hide();

  $(".project-container").hide();

  $(".assign").removeClass("active");

  $(".project").removeClass("active");

  $(".dashboard").addClass("active");
}
