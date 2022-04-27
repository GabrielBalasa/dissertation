$(document).ready(function(){
    $('#dataTable').DataTable();
});

$(document).ready(function(){
    $('#clientsTable').DataTable();
});

$(document).ready(function(){
    $('#exercisesTableTrainer').DataTable();
});

$(document).ready(function(){
    $('#workoutTable').DataTable();
});

$(document).ready(function(){
    $('#workoutsTableClient').DataTable();
});

$(document).ready(function(){
    $('#exercisesTableClient').DataTable();
});

$(document).ready(function(){
    $('#usersTableAdmin').DataTable();
});

$(document).ready(function(){
    $('#waitingListTableAdmin').DataTable();
});

$('#clientsTable').dataTable( {
    "columns": [
        { "width": "35%" },
        { "width": "35%" },
        { "width": "10%" },
        { "width": "10%" },
        { "width": "10%" }
    ]
});
  
$('#exercisesTableTrainer').dataTable( {
    "columns": [
        { "width": "25%" },
        { "width": "25%" },
        { "width": "25%" },
        { "width": "5%" },
        { "width": "5%" },
        { "width": "5%" },
        { "width": "5%" },
        { "width": "5%" }
    ]
});

$('#workoutTable').dataTable( {
    "columns": [
      { "width": "25%" },
      { "width": "48%" },
      { "width": "10%" },
      { "width": "8%" },
      { "width": "9%" }
    ]
});
  
$('#workoutsTableClient').dataTable( {
    "columns": [
        { "width": "30%" },
        { "width": "30%" },
        { "width": "30%" },
        { "width": "10%" }
    ]
});

$('#exercisesTableClient').dataTable( {
    "columns": [
      { "width": "22%" },
      { "width": "60%" },
      { "width": "12%" },
      { "width": "3%" },
      { "width": "3%" }
    ]
});

$('#waitingListTableAdmin').dataTable( {
    "columns": [
      { "width": "25%" },
      { "width": "30%" },
      { "width": "10%" },
      { "width": "15%" },
      { "width": "10%" },
      { "width": "10%" }
    ]
});