$(function(){
	//Buttons
	//Button New
	$('.btn-contacts-add').on("click", function(){
		$.get("/contacts/create", function(data){
			$("body").append(data);
            $(".modal").modal("toggle");
		});
	});

	//Button Edit
	$(document).on("click", ".btn-contacts-edit",function(event){
		$.get("/contacts/"+$(event.target).data("id")+"/edit", function(data){
			$("body").append(data);
            $(".modal").modal("toggle");
		});
    });

    //Button Show
	$(document).on("click", ".btn-contacts-show",function(event){
		$.get("/contacts/"+$(event.target).data("id"), function(data){
			$("body").append(data);
            $(".modal").modal("toggle");
		});
	});

    //Button Store
	$(document).on("click", ".btn-contacts-store",function(){
		var formData = $("#FormModal").serialize();
		$.ajax({
			type:"POST",
			url:"contacts/",
			data: formData,
			dataType: 'json',
			success: function(data){
				$('.modal').modal('hide');
				swal("Success", data.message, "success").then(
					(value) => {
						location.reload();
					}
				);
			},
			error: function(data){
				var errors = data.responseJSON.errors;
				swal("Erro", errors[Object.keys(errors)[0]][0], "error")
			}
		});
	});

    //Button Update
	$(document).on("click", ".btn-contacts-update",function(event){
        var id = $(event.target).data("id")
		var formData = $("#FormModal").serialize();
		$.ajax({
			type:"PUT",
			url:"contacts/"+id,
			data: formData,
			dataType: 'json',
			success: function(data){
				$('.modal').modal('hide');
				swal("Success", data.message, "success").then(
					(value) => {
						location.reload()
					}
				);
			},
			error: function(data){
				var errors = data.responseJSON.errors;
				swal("Erro", errors[Object.keys(errors)[0]][0], "error")
			}
		});
	});

	//Button Deletar
	$(document).on("click", ".btn-contacts-del",function(event){
		swal({
			title: "Do you want to delete the selected contact ?",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		  })
		  .then((willDelete) => {if(willDelete){
				var id = $(event.target).data("id")
				$.ajax({
					url: "contacts/"+id,
					type: 'POST',
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: {_method: 'delete'},
					success:function(data){
						$(event.target).closest("tr").remove()
						swal("Success", data.message, "success")
					},
					error:function(data){
						var errors = data.responseJSON;
						swal("Erro", errors[Object.keys(errors)[0]], "error")
					}
				});
			}
		});
	});
});