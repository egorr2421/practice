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
			    if(json.url) {
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
    $('.post').click(function(event)  {
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

    $('.addpost').click(function(event) {
                $(".content").empty();
        $(".content").append(
            "\t\t\t\t<div class=\"add-form\">\n" +
            "\t\t\t\t<div class=\"title-add\">\n" +
            "\t\t\t\t<label>Title</label> <br>\n" +
            "\t\t\t\t<input class=\"input-add\" type=\"text\" name=\"title\"></div>\n" +
            "\t\t\t\t<div class=\"text-post\">\n" +
            "\t\t\t\t<label>Text</label> <br>\n" +
            "\t\t\t\t<textarea class=\"post\"></textarea> \n" +
            "\t\t\t\t</div>\t\n" +
            "<select class=\"sub select-cat\" style=\"float:left;\">\n" +
            "                <option value='1' >Спорт</optionс>\n" +
            "                <option value='2'>Искуство</option>\n" +
            "                <option value='5' >Политика</optionс>\n" +
            "                <option value='6' >Развличение</optionс>\n" +
            "                <option value='9' >Технологии</optionс>\n" +
            "                <option value='10' >IT</optionс>\n" +
            "            \t</select> " +
            "\t\t\t\t<input type=\"submit\" class=\"sub button-add\" name=\"sub\">\n" +
            "\t\t\t\t</div>\n");
        $('.button-add').click(function(event) {
            event.preventDefault();
            $.ajax({
                type: "post",
                url: "/account/add",
                data: {'title':$(".input-add").val(),'text':$(".post").val(),'category':$('.select-cat').val()},
                success: function(result) {
                    json =jQuery.parseJSON(result);
                    if(json.url) {
                        window.location.href = '/' + json.url;
                    }
                }

        });
        });
    });
    $('.del-post').click(function(event) {
    let t = $(this).attr('name');
        $.ajax({
            type: "post",
            url: "/account/dell",
            data: {'id':$(this).attr('name')},
            success: function(result) {
                //window.location.href = "/account/profile";
                $('#'+t).remove();
            }

        });
    });
    $('.edit-post').click(function(event) {
        $('.content').empty();
        $.ajax({
            type: "post",
            url: "/getnews",
            data: {'id':$(this).attr('name')},
            success: function(result) {
                result = jQuery.parseJSON(result);
                $.each(result, function (i, item) {
                    $(".content").append(
                        "\t\t\t\t<div class=\"add-form\">\n" +
                        "\t\t\t\t<div class=\"title-add\">\n" +
                        "\t\t\t\t<label>Title</label> <br>\n" +
                        "\t\t\t\t<input class=\"input-add input-edit\" type=\"text\" name=\"title\" value=\""+item.Title+"\"></div>\n" +
                        "\t\t\t\t<div class=\"text-post\">\n" +
                        "\t\t\t\t<label>Text</label> <br>\n" +
                        "\t\t\t\t<textarea class=\"post edit-post\" >"+item.description+"</textarea> \n" +
                        "\t\t\t\t</div>\t\n" +
                        "<select class=\"sub select-cat\" style=\"float:left;\">\n" +
                        "                <option value='1' >Спорт</optionс>\n" +
                        "                <option value='2' >Искуство</option>\n" +
                        "                <option value='5' >Политика</optionс>\n" +
                        "                <option value='6' >Развличение</optionс>\n" +
                        "                <option value='9' >Технологии</optionс>\n" +
                        "                <option value='10' >IT</optionс>\n" +
                        "            \t</select> " +
                        "\t\t\t\t<input type=\"submit\" class=\"sub button-add\" name=\""+item.id+"\">\n" +
                        "\t\t\t\t</div>\n"
                    );
                });
                $('.button-add').click(function (event) {
               // alert("sad");
                    $.ajax({
                        type: "post",
                        url: "/account/edit",
                        data: {'id': $(this).attr('name') ,'cat':$('.sub').val(), 'tatle': $('.input-edit').val() , 'text': $('.edit-post').val()},
                        success: function (result) {
                            window.location.href = "/account/profile";
                        },
                    });



                });
            },
        });
    });
});