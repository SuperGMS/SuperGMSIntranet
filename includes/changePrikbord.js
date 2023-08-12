function savePoorten(object) {
    $.ajax({
        url: 'https://mijn.district-rijnmond.net/includes/savepoorten.php',
        data: {content: object.value, id: object.id},
        cache: false,
        error: function (response) {
            location.reload();
        },
        success: function (response) {
            // A response to say if it's updated or not
            location.reload();
        }
    });
}