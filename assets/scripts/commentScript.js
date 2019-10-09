<script type="text/javascript">
    $(function(){    
        var base_url = '<?php echo pathUrl(); ?>';

        $(document).on('click', '#add_comment', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: base_url + 'comment/add-comment',
                data: {data: {
                        'comment_id': $('#comment_id').val(),
                        'comment': $('#news_comment').val()
                    }
                },
                dataType: 'json',
                cache: false,
                success : function(response){
                    if (response.status) {
                        $('#news_comment').val('');
                        loadComments();
                    } else {
                        $('.ajax-response-comment').show();
                        $('.ajax-message-comment').html(response.message);

                        setTimeout(function(){
                            $('.ajax-response-comment').fadeOut();
                        },2000);
                    }
                    
                },
                error : function(){
                    alert("Unable to connect to server.");
                }

            });
        });

        $(document).on('click', '.delete-comment', function(){
            var id = $(this).attr('data-comment-id');

            bootbox.confirm('Are you sure do you want to delete this comment?', function(e){

                if (e) {

                    $.ajax({
                        type: 'POST',
                        url: base_url + 'comment/delete-comment',
                        data: {"id": id},

                        success : function(data) {

                           loadComments();

                        },
                        error : function() {
                            alert("Unable to connect to server.");
                        }              
                        
                    });
                }

            });

        });

        function loadComments(){
            var id = $('[name="id"]').val();

            $.ajax({
                type: 'GET',
                url: base_url + 'comment/list-comment/' + id,
                data: [],
                dataType: 'json',
                cache: false,

                success : function(data) {
                    var html = '';

                    if (data.comments.length > 0) {
                        $(data.comments).each(function(key, val){

                            html += '<div class="comment-list mb-2">\
                                <div class="user-profile">\
                                    <div class="row">\
                                        <div class="col-md-8">\
                                            <h5><i class="fas fa-user-tie"></i> '+ val.name +'</h5>\
                                            <small>'+ val.date +'</small>\
                                        </div>\
                                        <div class="col-md-4 text-right">\
                                            <a href="javascript:void(0);" id="" data-comment-id="'+ val.id +'" class="delete-comment"><h5 class="hvr-icon-pulse-grow"><i class="fas fa-times "></i></h5></a>\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="user-comment">'+ val.comment +'</div>\
                            </div>';

                        });

                } else {
                    html += '<div class="alert alert-success">No Comment...</div>';
                }

                    $('#comment-section').html(html);
                },
                error : function() {
                    alert("Unable to connect to server.");
                }              
                
            });

        }
        loadComments();
    });
</script>


<script>
    function goBack() {
      window.history.back();
    }
</script>