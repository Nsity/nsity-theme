(function($) {
	
	$(document).on("click", ".add-column-item", function (e) {
		e.preventDefault();

		var element = $(this).parent().parent();

		var num = +element.find("input.column-count").val() + 1;
		element.find("input.column-count").val(num);


		var imgSelect = "";

		for(var k in columnsArgs.images) { 
			var option = '<option value="' + k + '">';
			option += columnsArgs.images[k];
			option += '</option>';
			imgSelect += option; 
		}

		var widgetOptionName = element.find("input.widget-option-name").val();
		var optionName = widgetOptionName.slice(0, widgetOptionName.length - 1);

		var title = optionName + "columnTitles" + "][" + (num-1) + "]";
		var text = optionName + "columnTexts" + "][" + (num-1) + "]";
		var image = optionName + "columnImages" + "][" + (num-1) + "]";

		var child = "<div class='card' id='" + (num-1) + "'>" +
				"<a class='delete-column-item' href='#'' style='float: right; margin-top: 1em;''>Удалить</a>" +
				"<h2>Элемент " + num + "</h2>" +
				"<p>" +
					"<label>Заголовок:</label>" +
					"<input class='widefat element-title' name='" + title + "' type='text' />" +
				"</p>" +
				"<p>" +
					"<label>Текст:</label>" +
					"<textarea class='widefat element-text' rows='15' name='" + text + "'></textarea>" +
				"</p>" +
				"<p>" +
					"<label>Иконка:</label>" +
					"<select class='widefat element-img' name='" + image +"'>" +
					"<option value=''></option>" +
					imgSelect +
					"</select>" +
				"</p>" +
			"</div>";
		element.find("div.column-settings").append(child);

	});

	$(document).on("click", ".delete-column-item", function (e) {
		e.preventDefault();
		element = $(this);

		parentElement = element.parent().parent().parent();
		boxElement = element.parent().parent();

		if (confirm("Вы уверены?")) {
			var deletedId = parseInt(element.parent().attr('id'));
		
			var num = +parentElement.find("input.column-count").val() - 1;
			parentElement.find("input.column-count").val(num);
			
			element.parent().remove();

			for(var i = deletedId + 1; i < num + 1; i++) {
				
				boxElement.find("#" + i).find("h2").text("Элемент " + i);

				var widgetOptionName = parentElement.find("input.widget-option-name").val();
				var optionName = widgetOptionName.slice(0, widgetOptionName.length - 1);

				var title = optionName + "columnTitles" + "][" + (i-1) + "]";
				var text = optionName + "columnTexts" + "][" + (i-1) + "]";
				var image = optionName + "columnImages" + "][" + (num-1) + "]";
				
				boxElement.find("#" + i).find(".element-title").attr("name", title);
				boxElement.find("#" + i).find(".element-text").attr("name", text);
				boxElement.find("#" + i).find(".element-img").attr("name", image);

				boxElement.find("#" + i).attr("id", i - 1);
			}
		}
	});   

})(jQuery);