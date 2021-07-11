$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
$(document).on('click', 'a.jquery-postback', function(e) {
    e.preventDefault(); // does not go through with the link.

    var $this = $(this);
	console.log($this.data)
    $.post({
        type: $this.data('method'),
        url: $this.attr('href')
    }).done(function()  {
		alert("Success.");
	}).fail(function()  {
		$this.closest('tr').remove();
	}); 
});
