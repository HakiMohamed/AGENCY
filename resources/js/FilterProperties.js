$(document).ready(function(){
    $('#filter-form').submit(function(e){
        e.preventDefault(); 
        var formData = $(this).serialize(); 
        $.ajax({
            url: "{{ route('properties.filter') }}", 
            method: 'POST', 
            data: formData, 
            success: function(response){ 
                $('#property-list').html(response.html); 
            },
            error: function(xhr, status, error){ 
                console.error(error); 
            }
        });
        return false; 
    });
});