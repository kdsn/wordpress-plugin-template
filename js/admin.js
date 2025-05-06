(function($) {
    $(document).ready(function() {

        // Eksempel: Vis/skjul et ekstra felt baseret på checkbox
        $('#enable_extra_option').on('change', function() {
            if ($(this).is(':checked')) {
                $('#extra_option_field').slideDown();
            } else {
                $('#extra_option_field').slideUp();
            }
        });

        // Eksempel: Bekræftelsesdialog før handling
        $('.plugin-name-danger-button').on('click', function(e) {
            if (!confirm('Are you sure you want to do this?')) {
                e.preventDefault();
            }
        });

        // Debug info
        console.log('Plugin Name admin.js loaded');

    });
})(jQuery);
