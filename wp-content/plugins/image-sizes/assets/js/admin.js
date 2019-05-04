jQuery(function($){
	// toggle checkbox
	$(".mdc-image-sizes-wrap input[type='checkbox']").each(function(i){
		if(i==0) {
			$(this).addClass('check-all')
		}
		else {
			$(this).addClass('check-this')
		}
	})
	var chk_all = $(".check-all")
	var chk = $('.check-this')
	chk_all.change(function () {
	    chk.prop('checked',this.checked);
	});
	chk.change(function () {
		if ($('.check-this:checked').length == chk.length){
			chk_all.prop('checked',true);
		}
		else {
			chk_all.prop('checked',false);
		}
	});

	// send message
	$("#wpp-contact").submit(function(e){
		e.preventDefault()
		var form = $(this)
		var formdata = form.serialize()
		$('.button-primary', form).attr('disabled',true).val('Sending Message..')
		$('.wpp-success').hide()
		$.ajax({
			url: ajaxurl,
			data: formdata,
			type: 'POST',
			success: function(data) {
				$('.button-primary', form).attr('disabled',false).val('Send Message')
				$('.wpp-success').show().fadeOut(5000)
			}
		})
	})
})