(function () {
    $(function () {
        var $url = $('#url');
        var $closestInput = $url.closest('.input');
        $url.inputmask('Regex', {
            regex: "(http|ftp|https)://[\\w-]+(\\.[\\w-]+)+([\\w.,@?^=%&amp;:/~+#-]*[\\w@?^=%&amp;/~+#-])?"
        });

        $(document).on('submit', '.short-url-form', function (event) {
            event.preventDefault();

            if ($url.val() === '') {
                if (!$closestInput.hasClass('error')) {
                    $closestInput.addClass('error');
                }
            }

            $.post(Route['api.shorter.generate'], $(this).serializeArray()).done(function (response) {
                var $shortUrl = $('#short-url');
                if (response && !response.success) {
                    var error = '';
                    if (response.error) {
                        response.error.forEach(function (item) {
                            error += ' ' + item;
                        });
                    } else {
                        error = 'Undefined error';
                    }
                    swal(error, "", "error");
                    return;
                }
                $shortUrl.val(response.data.redirect_url);
            });
        });

        var clipboard = new Clipboard('.copy-to-clipboard');
        clipboard.on('success', function(e) {
            swal("Url copied to clipboard!", "", "success");
        });

        clipboard.on('error', function(e) {
            swal("Could not copy URL to clipboard.", "Try to repeat after some time.", "error");
        });

        $(document).on('click', '.copy-to-clipboard', function (event) {
            event.preventDefault();
        });

        $(document).on('keypress', '#url', function (event) {
            if ($(this).val() === '') {
                if (!$closestInput.hasClass('error')) {
                    $closestInput.addClass('error');
                }
                return;
            }

            return $closestInput.removeClass('error');
        });
    });
})();