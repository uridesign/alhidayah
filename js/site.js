$(document).ready(function(){
  // Button Menu
  $(".btn-m-menu").click(function(){
    if( !$(this).hasClass("active") ){
      $(this).addClass("active");
			$('.menu').addClass('open')
    } else {
      $(this).removeClass("active");
			$('.menu').removeClass('open')
    }
  });
  /* == END == */

  /* Textbox */
	// jQuery("input.textbox[type='text'], input.textbox[type='password']")
	// 	.wrap("<span class='textboxwrap'></span>");

	/* Texarea */
	// jQuery("textarea.textarea")
	// 	.wrap("<span class='textareawrap'></span>");


  /* Dropdown */
	function loadDropDownList() {
		$(".dropdownlist").each(function(){
			if( !$(this).parent().hasClass("dropdownlistwrap") ) {
				var jQddl = $(this);
				var title = jQddl.attr('title');
				if (title == '' || title == null || $('option:selected', this).val() != '') {
					title = $('option:selected', this).text();
				}
				jQddl
					.css({ 'z-index': 10, 'opacity': 0 })
					.wrap("<span class='dropdownlistwrap'></span>")
					.after('<span class="dropdownlistselector">' + title + '</span>')
					.change(function () {
						val = $('option:selected', this).text();
						$(this).next().text(val);
					})
				if (jQddl.parent().width() == 1) {
					jQddl.parent().width(jQddl.outerWidth());
				}
				jQddl.css({ 'width': '100%' });
			}
		});
	}
	// loadDropDownList();
	/* == END == */

  /* Checkbox */
	$("input[type='checkbox']").each(function(){
		if( !$(this).parent().hasClass("checkboxwrap") )
			$(this).wrap("<a href='javascript:;' class='checkboxwrap'></a>").after('<i class="far fa-square"></i>');
	});
	$("a.checkboxwrap").each(function () {
		if ($(this).find("input").is(':checked')){
			$(this).addClass("active");
			$(this).find('i').removeClass('fa-check-square').addClass('fa-square');
		}
	});
	$("a.checkboxwrap").click(function () {
		if ($(this).hasClass("active")) {
			$(this).removeClass("active");
			$(this).find('i').removeClass('fa-check-square').addClass('fa-square');
			$(this).find("input").prop('checked', false);
		} else {
			$(this).addClass("active");
			$(this).find('i').removeClass('fa-square').addClass('fa-check-square');
			$(this).find("input").prop('checked', true);
		}
	});
	/* == END == */

	/* Radiobutton */
	$("input[type='radio']").each(function(){
		if( !$(this).parent().hasClass("radiowrap") )
			$(this).wrap("<a href='javascript:;' class='radiowrap'></a>").after('<i class="far fa-circle"></i>');
	});
	$("a.radiowrap").each(function () {
		if ($(this).find("input").is(':checked')) {
			$(this).addClass("active");
			$(this).find('i').removeClass('fa-circle').addClass('fa-dot-circle');
		}
	});
	$("a.radiowrap").click(function () {
		var radName = $(this).find("input").attr("name");
		if (!$(this).hasClass("active")) {
			$("input[name='"+radName+"']").parent().removeClass("active");
			$("input[name='"+radName+"']").parent().find('i').removeClass('fa-dot-circle').addClass('fa-circle');
			$(this).addClass("active");
			$(this).find('i').removeClass('fa-circle').addClass('fa-dot-circle');
			$(this).find("input").prop('checked', true);
		} else {
			return false;
		}
	});
  /* == END == */

  /* Text Placeholder */
	$('.form .form-placeholder .form-control').each(function () {
		var parentTarget = $(this).parents('.form-placeholder');
		// parentTarget.addClass('plc-textbox');

		// parentTarget.prepend('<span class="placeholder">'+parentTarget.find('label.label').text()+'</span>');

		var inputTarget = $(this);
		// var labelTarget = parentTarget.find('.form-label');

		(inputTarget.val() == "") ?	parentTarget.removeClass('filled') : parentTarget.addClass('filled');
		
		$(inputTarget).keyup(function () {
			if (!$(this).val() == "") {
				parentTarget.addClass('filled');
			} else {
				parentTarget.removeClass('filled');
			}
		});
	});

	$(".form-label").click(function(){
		$(this).parent().find('input').focus();
	});
	/* == END == */

	/* Textarea Placeholder */
	$('.form li.placeholder .textarea').each(function () {
		var parentTarget = $(this).parents('li.placeholder');
		parentTarget.addClass('plc-textarea');

		parentTarget.prepend('<span class="placeholder">'+parentTarget.find('label.label').text()+'</span>');

		var inputTarget = $(this);
		var labelTarget = parentTarget.find('span.placeholder');

		(inputTarget.val() == "") ?	labelTarget.show() : labelTarget.hide();
		
		$(inputTarget).keyup(function () {
			if (!$(this).val() == "") {
				labelTarget.hide();
			} else {
				labelTarget.show();
			}
		});
	});

	$("span.placeholder").click(function(){
		$(this).parent().find('input').focus();
	});
	/* == END == */

	/* Dropdownlist Placeholder */
	$('.form select.form-control-select').each(function(){
		var inputTarget = $(this);
		var parentTarget = $(this).parents('.form-placeholder-select');

		if (inputTarget.find('option:selected').val() === "") {
			parentTarget.removeClass('filled');
		} else { 
			parentTarget.addClass('filled');
		}

		inputTarget.change(function(){
			if(inputTarget.find('option:selected').val() === ""){
				parentTarget.removeClass('filled');
			}	else {
				parentTarget.addClass('filled');
			}
		});

	});
	/* == // == */
});