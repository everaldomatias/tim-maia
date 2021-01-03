jQuery(document).ready(function ($) {

    $('ul[id*="tm_panel_"]').addClass('tm_panel');
    $('ul.tm_panel').each(function () {
        if (0 === $(this).length) {
            return true;
        }

        var panel = $(this),
            panelSectionHidden = panel.find('li[id*="tm_hidden_"]').attr('aria-owns');

        panel.find('li[id*="tm_section_"]').addClass('tm_section');
        panel.find('li[id*="tm_hidden_"]').addClass('tm_hidden');

        // Init sortable.
        panel.sortable({
            item: 'li.tm_section',
            axis: 'y',

            // Update value when we stop sorting.
            stop: function () {
                updateValue();
            }
        });

        // Updates the sorting list.
        function updateValue() {
            var inputValues = panel.find('.tm_section').map(function () {
                var id = $(this).attr('id'),
                    id = id.replace('accordion-section-', '');

                return id;
            }).get().join(',');

            // Add the value to the hidden field
            $('#' + panelSectionHidden).find('.customize-control-text input').prop('value', inputValues);

            // Important! Make sure to trigger change event so Customizer knows it has to save the field
            $('#' + panelSectionHidden).find('.customize-control-text input').trigger('change');

            //console.log(inputValues);
        }

    });

});


/**
 *
 * TinyMCE Custom Control
 *
 * @author Anthony Hortin <https://maddisondesigns.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @link https://github.com/maddisondesigns
 *
 */
jQuery(document).ready(function ($) {

	$('.customize-control-tinymce-editor').each(function () {

		// Get the toolbar strings that were passed from the PHP Class
		var tinyMCEToolbar1String = _wpCustomizeSettings.controls[$(this).attr('id')].skyrockettinymcetoolbar1;
		var tinyMCEToolbar2String = _wpCustomizeSettings.controls[$(this).attr('id')].skyrockettinymcetoolbar2;
		var tinyMCEMediaButtons = _wpCustomizeSettings.controls[$(this).attr('id')].skyrocketmediabuttons;

		wp.editor.initialize($(this).attr('id'), {
			tinymce: {
				wpautop: true,
				toolbar1: tinyMCEToolbar1String,
				toolbar2: tinyMCEToolbar2String
			},
			quicktags: true,
			mediaButtons: tinyMCEMediaButtons
		});

	});
	$(document).on('tinymce-editor-init', function (event, editor) {
		editor.on('change', function (e) {
			tinyMCE.triggerSave();
			$('#' + editor.id).trigger('change');
		});
	});

});
