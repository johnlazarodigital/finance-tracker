(function( $ ) {
	'use strict';

	var ajax_url = ajax_data.url;

	$(document).on('click', '.add-button', function() {
		$('.details-form-add').slideToggle();
	});

	$(document).on('click', '.minus-button', function() {
		$('.details-form-minus').slideToggle();
	});

	$(document).on('submit', '.details-form', function(event) {

		event.preventDefault();

		var data = {
            action: 'insert_to_db_function',
            type: $(this).find('.input-type').val(),
            amount: $(this).find('.input-amount').val(),
            description: $(this).find('.input-description').val()
        };

		$.ajax({
            type: 'post',
            dataType: 'json',
            url: ajax_url,
            data: data,
            success: function(response) {
            	$('.current-money span').html(response);
            },
            error: function(error) {
                alert(error);
            }
        });

	});

	var data = {
        action: 'get_money_record'
    };

	$.ajax({
        type: 'get',
        dataType: 'json',
        url: ajax_url,
        data: data,
        success: function(response) {
        	$('.current-money span').html(response);
        },
        error: function(error) {
            alert(error);
        }
    });

})( jQuery );