$(function () {

    // formulaire de l'application

        var $sections = $('.form-section');

        function navigateTo(index) {
            // Mark the current section with the class 'current'
            $sections
                .removeClass('current')
                .eq(index)
                .addClass('current');
            // Show only the navigation buttons that make sense for the current section:
            $('.form-navigation .previous').toggle(index > 0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type=submit]').toggle(atTheEnd);
        }

        function curIndex() {
            // Return the current index by looking at which section has the class 'current'
            return $sections.index($sections.filter('.current'));
        }

        // Previous button is easy, just go back
        $('.form-navigation .previous').click(function() {
            navigateTo(curIndex() - 1);
        });

        // Next button goes forward iff current block validates
        $('.form-navigation .next').click(function() {
            if ($('.demo-form').parsley().validate({group: 'block-' + curIndex()}))
                navigateTo(curIndex() + 1);
        });

        // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
        $sections.each(function(index, section) {
            $(section).find(':input').attr('data-parsley-group', 'block-' + index);
        });
        navigateTo(0); // Start at the beginning

        // Ajax formulaire



        // errors display function
        function showErrors(errors, inputName, showAsPopover) {
            var targetElt = $('#' + inputName);
            targetElt.closest('.form-section').find('.feedback').remove();
            if (!!errors[inputName]) {
                targetElt.closest('.form-section')
                    .removeClass('has-success')
                    .addClass('has-error');

                if (showAsPopover) {
                    if (targetElt.data('bs.popover')) {
                        targetElt.data('bs.popover').options.content = errors[inputName]

                    } else {
                        targetElt.popover({
                            content: errors[inputName]
                        })
                    }
                    targetElt.popover('show');
                } else {
                    targetElt
                        .after($('<p class="text-danger">' + errors[inputName] + '</p>'));
                }
            } else {
                targetElt.closest('.form-section')
                    .removeClass('has-error')
                    .addClass('has-success');

            }
        }

        $('#newsletter-form input, #newsletter-form textarea').on('focus', function (e) {
            e.preventDefault() && e.stopPropagation();
            var that = this;
            var targetElt = $(that);
            targetElt.closest('.form-section')
                .removeClass('has-error')
                .find('.feedback')
                .remove();
        });

        $('#newsletter-form input, #newsletter-form textarea').on('keyup', function (e) {
            e.preventDefault() && e.stopPropagation();
            var that = this;
            $.post(
                '/controllers/FormController.php?action=check',
                $(that).serialize(),
                function (data) {
                    var inputName = $(that).attr('name');
                    var errors = data['errors'];
                    showErrors(errors, inputName, 1);
                }
            );
        });


        $('#newsletter-form input, #newsletter-form textarea').on('blur', function (e) {
            e.preventDefault() && e.stopPropagation();
            var that = this;
            $.post(
                '/controllers/FormController.php?action=check',
                $(that).serialize(),
                function (data) {
                    var inputName = $(that).attr('name');
                    var errors = data['errors'];
                    showErrors(errors, inputName, 0);
                }
            );
        });

        $('#newsletter-form').on('submit', function (e) {
            e.preventDefault() && e.stopPropagation();
            var that = this;
            $.post(
                '/controllers/FormController.php?action=save',
                $(that).serialize(),
                function (data) {
                    $(that).append('<span>Enregistré avec succés à la newsletter</span>');
                }
            );
        });

        // display errors if errors retrieved from PHP form submit
        $('#newsletter-form input, #newsletter-form textarea').each(function () {
            var that = this;
            var inputName = $(that).attr('name');
            var errors = phpErrors;
            if(errors[inputName]) {
                showErrors(errors, inputName, 0);
            }
        });


});