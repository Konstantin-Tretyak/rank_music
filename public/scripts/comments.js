$(document).ready
(
    function()
    {
        $("form.comment").on ('submit',
          function(event)
          {
             event.preventDefault();
             var form = $(this);
             $.ajax
                (
                    form.attr('action'),
                    {
                        method: 'POST',
                        dataType: 'json',
                        data: $("form").serialize(),
                        success: function(result)
                        {
                            $("form").trigger("reset");
                            ///TODO: Delete errors when it's all right

                            var msg = $("<div class='one_comment'></div>");

                            ///TODO: with img src
                            msg.append(`
                                        <div class="about_user">
                                            <div class="user_img col-md-2 col-sm-2 col-xs-2">
                                                <img src="`+`http://`+window.location.host+`\\`+result.user_img+`">
                                            </div>
                                            <div class="user_name col-md-10 col-sm-10 col-xs-12">
                                                <h4>`+result.user_name+`</h4>
                                                <h6>
                                                    На сайте с `+result.user_creat+`
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="user_coment">
                                            <div class="col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-10 col-xs-12  comment">
                                                <p>
                                                    `+result.body+`
                                                </p>
                                                <p class="coment_date">
                                                    Дата комментирования: `+result.date+`
                                                </p>
                                            </div>
                                        </div>
                            `);
                            $(".people_comments").prepend(msg);

                            notify('Комментарий был отправлен', 'success');
                        },
                        error: function ( jqXHR )
                        {
                            app.defaultAjaxError(form, jqXHR);
                        },
                        beforeSend: function()
                        {
                            form.addClass("whirl");
                        },
                        complete: function()
                        {
                            form.removeClass("whirl");
                        }
                    }
                )
          }
        );
    }
);
