$(document).ready(function() {

    $('form').submit(function(event) {

		event.preventDefault();

		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
                alert(result);
                json =jQuery.parseJSON(result);
			    if(typeof json.url != 'undefined') {
                    window.location.href = '/' + json.url;
                }else{}
			},
		});

    });

    $('.cat').click(function(event) {

        event.preventDefault();
        $.ajax({
            type: "post",
            url: "/category",
            data: {'id':$(this).attr('name')},
            success: function(result) {
                result = jQuery.parseJSON(result);
                $(".content").empty();

                $.each(result,function(i,item){

                        $(".content").append("<div class=\"news\">\n" +
                            "\n" +
                            "        <h2 class=\"tatle\"><a class=\"post\" name="+item.id+" href=\"#\">"+item.Title+"</a></h2>\n" +
                            "            <div class=\"text\">\n" +
                            "                <p>"+item.description+"></p></div>\n" +
                            "            <div class=\"view\">\n" +
                            "\n" +
                            "                <p>Добавлено"+item.Date_cr+" View:"+item.veiw+"</p>\n" +
                            "            </div>\n" +
                            "    </div>");

                });
                $('.post').click(function(event) {
                    event.preventDefault();
                    $.ajax({
                        type: "post",
                        url: "/getnews",
                        data: {'id':$(this).attr('name')},
                        success: function(result) {
                            result = jQuery.parseJSON(result);
                            $(".content").empty();
                            $.each(result,function(i,item){
                                $(".content").append("<div class=\"news\">\n" +
                                    "\n" +
                                    "        <h2 class=\"tatle\"><a  name="+item.id+" href=\"#\">"+item.Title+"</a></h2>\n" +
                                    "            <div class=\"text\" style=\"height: 100%; \">\n" +
                                    "                <p>"+item.description+"></p></div>\n" +
                                    "            <div class=\"view\">\n" +
                                    "\n" +
                                    "                <p>Добавлено"+item.Date_cr+" View:"+item.veiw+"</p>\n" +
                                    "            </div>\n" +
                                    "    </div>");
                            });
                        },
                    });

                });
                },

        });

    });
    $('.post').click(function(event) {
        event.preventDefault();
        $.ajax({
            type: "post",
            url: "/getnews",
            data: {'id':$(this).attr('name')},
            success: function(result) {
                result = jQuery.parseJSON(result);
                $(".content").empty();

                $.each(result,function(i,item){
                    $(".content").append("<div class=\"news\">\n" +
                        "\n" +
                        "        <h2 class=\"tatle\"><a  name="+item.id+" href=\"#\">"+item.Title+"</a></h2>\n" +
                        "            <div class=\"text\" style=\"height: 100%; \">\n" +
                        "                <p>"+item.description+"></p></div>\n" +
                        "            <div class=\"view\">\n" +
                        "\n" +
                        "                <p>Добавлено"+item.Date_cr+" View:"+item.veiw+"</p>\n" +
                        "            </div>\n" +
                        "    </div>");
                });
            },
        });

    });

});