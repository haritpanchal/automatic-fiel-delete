jQuery(document).ready(function() {
    jQuery('.ondelete').on('click', function() {
        var file_name = jQuery('.file_name').val();
        var deleteFile = function() {
            jQuery.ajax({
                url: delete_file.ajaxurl,
                type: "post",
                dataType: "json",
                data: {
                    action: "delete_action",
                    file_name: file_name,
                },
                success: function(response) {
                    if (response.status == 1) {
                        console.log("file deleted");
                    } else {
                        console.log("something wrong");
                    }
                }
            });
        }
        setTimeout(deleteFile, 10000);
    })

})