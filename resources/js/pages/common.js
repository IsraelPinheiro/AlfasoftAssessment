$(function(){
    //Close Modal
	$(document).on("hidden.bs.modal", ".modal", function(){
		$(this).remove();
	});
});