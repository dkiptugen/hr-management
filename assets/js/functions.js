$(document).ready(function() {
    $("#add-modal-form").submit(function(e) {
        e.preventDefault();
        $("#add-loader").show();
        console.log($("#add-modal-form").serialize());
        var form_data = $("#add-modal-form").serialize();
        do_save(submit_add_url, form_data, 'add');

    });
    
    $("#edit-modal-form").submit(function(e) {
        e.preventDefault();
        $("#edit-loader").show();
        console.log($("#edit-modal-form").serialize());
        var form_data = $("#edit-modal-form").serialize();
        submit_edit_url += $("#edit-key_id").val();
        do_save(submit_edit_url, form_data, 'edit');
    });

    $("#suspend-modal-form").submit(function(e) {
        e.preventDefault();
        $("#suspend-loader").show();

        console.log($("#suspend-modal-form").serialize());
        var form_data = $("#suspend-modal-form").serialize();
        submit_suspension_url += $("#edit-key_id").val();
        do_save(submit_suspension_url, form_data, 'suspend');
    });

	$(".unsuspend-item").click(function(e) {
		e.preventDefault();
        var name_value = $(this).data('name');
        var id_value = $(this).data('id');
        
		if(confirm("Are you sure you want to lift "+name_value+"'s suspension?")) {
            var form_data = {status_id: 1};
            submit_unsuspension_url += id_value;
            do_save(submit_unsuspension_url, form_data, 'unsuspend');
		}
	});
    

    function do_save(submit_url, form_data, task) {
        $("#FormLoading").show();
        //form_data["tsa_token"] = getCookie("tsa_token");
		$.ajax({
			url: submit_url,
			type: 'POST',
			data: form_data,
			success: function(obj) {
                console.log(obj);
                $('#'+task+"-loader").fadeOut(500, function() {
					$(this).remove();
                });

				if (obj["status"] == "Y") {
                    $('#'+task+'Modal').modal('hide');
                    if(task != "unsuspend") $("#"+task+"-modal-form")[0].reset();
                    toastr["success"]("Operation succeeded", "Success!", {closeButton: true, progressBar: true, timeOut: 2000 });
                    setTimeout(function(){// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                   }, 2500); 
				} else if(obj["status"] == "N") {
                    toastr["error"]("Please try again.", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
				} else if(obj["status"] == "ND") {
                    toastr["warning"]("Missing required data", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
                } else if(obj["status"] == "IT") {
                    alert("Your session has expired. Login to continue.");
                    setCookie("tsa_token", "", 1);
                }

			}
		});
    }

    $(".reset-pin").click(function(e) {
        e.preventDefault();
        var first_name = $(this).data('name');

        if(confirm("You are about to reset "+first_name+"'s PIN. Continue?")) {

            var form_data = {
                identifier: $(this).data('id')
            };
            $.ajax({
                url: reset_pin_url,
                type: 'POST',
                data: form_data,
                success: function(result) {
                    if(result["status"] == "Y") {
                        toastr["success"](first_name+"'s PIN has been reset.", "Success!", {closeButton: true, progressBar: true, timeOut: 2000 });
                    } else if(result["status"] == "IT"){
                        toastr["error"]("Session has expired.", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
                        location.reload();
                    } else {
                        toastr["error"]("Please try again.", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
                    }
    
                }
            });
        }
    });
});