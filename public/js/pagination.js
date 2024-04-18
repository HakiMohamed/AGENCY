    var page = 1;
    var loading = false;
    var lastProperty = false;

    function loadMoreProperties() {
    if (loading || lastProperty) return;

    var scrollTop = $(window).scrollTop();
    var windowHeight = $(window).height();
    var documentHeight = $(document).height();

    if (scrollTop + windowHeight >= documentHeight - 500) {
        loading = true;
        page++;

        $('#loading-indicator').show();

        $.ajax({
            url: "{{ route('properties.filter') }}",
            type: "POST",
            data: $('#filter-form').serialize() + '&page=' + page,
            success: function(response) {
                if (response.html.trim() != '') {
                    $('#new-properties').append(response.html);
                    loading = false;
                } else {
                    lastProperty = true; 
                }
                $('#loading-indicator').hide();
            },
            error: function(xhr, status, error) {
                console.error(error);
                loading = false;
                $('#loading-indicator').hide();
            }
        });
    }
}

    $(window).on('scroll', loadMoreProperties);
