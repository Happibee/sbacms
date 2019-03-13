// Collect data from addService form and pass it to addService.php

$('#addServiceForm').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:'util/addService.php',
      method: 'POST',
      data:$('#addServiceForm').serialize(),
      success:function(data){
        //$('#addServiceForm')[0].reset();
        $('#addService').modal('hide');
        alert("New Service Added!");
        location.reload();
      }
      });
  });

  //update
$(document).on('click', '.update-service', function(){
    var id = $(this).attr("id");
    $.ajax({
      url:'util/updateService.php',
      method: "POST",
      data:{id:id},
      success:function(data){
        $('#updateServiceModalContent').html(data);
        $('#updateService').modal('show');
      }
    });
  }); 

//delete
$(document).on('click', '.delete-archive-service', function(){
    var id = $(this).attr("id");
    var event = $(this).attr("event");
    var q = confirm("Are you sure you want to permanently "+ event +" service?");
      if (q == true) {
        $.post('util/deleteService.php', {
          id: id,
          event: event
        }, function(data){
          location.reload();
        }).fail(function() {
          alert("Unable to " + event + "item.");
        });
      }
      return false;
  });

// Get and pass the necessary data to updateAppointmentStatus.php
$(document).on('click', '.update-appointment', function(){
    let id = $(this).attr("id");
    let status = $(this).attr("status");
    let event = $(this).attr("event");
    let q = confirm("Are you sure you want to "+ event +" appointment?");
    if(q == true){
        $.post('util/updateAppointmentStatus.php', {
            id: id,
            status: status
        }, function(data){
            location.reload();
            alert("Appointment successfully " + event + "ed");
        }).fail(function() {
            alert("Unable to Delete");
        });
    }
    return false;
});