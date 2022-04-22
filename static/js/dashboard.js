$(document).ready(function () {
  $(".assign-container").hide();

  $(".assign-btn").hide();

  GetAllInstructors();

  GetAllStudents();

  $(".assign-btn").click(function (e) {
    e.preventDefault();
    AssignStudentToInstructor();
  });
});

var assigned_students = [];

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

  if (instructor_to_assign == ""){
    alert("Please select instructor first");
    return;
  }

  if (!assigned_students.includes(id)) {
    assigned_students.push(id);
    
    $(".column-body").append(
      "<div class='assign-student'>" +
        "<div>" +
        name +
        "</div>" +
        "<div class='cursor'><i class='fa-solid fa-xmark'></i></div>"
    );

    $(".assign-btn").show();
  } else {
    alert("Student is already selected");
  }
}

function AssignStudentToInstructor() {}

function OpenAssign() {
  $(".dashboard-container").hide();

  $(".assign-container").show();

  $(".dashboard").removeClass("active");

  $(".assign").addClass("active");
}

function OpenDashboard() {
  $(".dashboard-container").show();

  $(".assign-container").hide();

  $(".assign").removeClass("active");

  $(".dashboard").addClass("active");
}
