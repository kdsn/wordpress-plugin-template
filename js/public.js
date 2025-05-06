(function($) {
    $(document).ready(function() {

        // Eksempel: Toggle besked
        $('.plugin-name-toggle-button').on('click', function() {
            $('.plugin-name-message').fadeToggle();
        });

        // AJAX eksempel (valgfrit)
        $('#plugin-name-action-btn').on('click', function(e) {
            e.preventDefault();

            $.ajax({
                url: plugin_name_ajax.ajax_url,
                method: 'POST',
                data: {
                    action: 'plugin_name_do_something',
                    security: plugin_name_ajax.nonce
                },
                success: function(response) {
                    alert(response.data.message || 'Success!');
                },
                error: function() {
                    alert('Something went wrong.');
                }
            });
        });

        console.log('Plugin Name public.js loaded');

    });
})(jQuery);
