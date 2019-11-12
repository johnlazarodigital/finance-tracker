(function( $ ) {
	'use strict';

	console.log('Yo!');

	var ajax_url = ajax_data.url;

	$(document).on('click', '.add-button', function() {

		$('.details-form-add').slideToggle();

		console.log(ajax_url);

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

            	console.log(response);

            	console.log('success!');

            },
            error: function(error) {
                console.log(error);
            }
        });

	});

	$(document).on('click', '.minus-button', function() {

		$('.details-form-minus').slideToggle();

	});


	$(document).on('submit', '#form-source-new-post', function( event ) {

		console.log(ajax_url);

		// event.preventDefault();

		// var data = {
  //           action: 'souins_ajax_source_add_new_post',
  //           source: $(this).find('.source').val()
  //       };

		// $.ajax({
  //           type: 'post',
  //           dataType: 'json',
  //           url: ajax_url,
  //           data: data,
  //           success: function(response) {

  //           	console.log(response);

  //           	console.log('success!');

  //           },
  //           error: function(error) {
  //               console.log(error);
  //           }
  //       });

	});

})( jQuery );
