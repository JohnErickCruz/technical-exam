<script>
        $(function(){
            var base_url = '<?php echo pathUrl(); ?>';

            function loadNews(){        
                $.ajax({
                    type: 'GET',
                    url: base_url + 'news/list-news',
                    data: [],
                    dataType: 'json',
                    cache: false,

                    success : function(data) {

                        var html = '';

                        if (data.news.length > 0) {

                            $(data.news).each(function(key, val) {

                                html += '<tr>\
                                    <td>'+ val.title+'</td>\
                                    <td>'+ val.content +'</td>\
                                    <td>\
                                        <a href="'+ base_url + 'comment/'+ val.id +'" class="btn btn-success view" data-content="'+ val.id +'" style="width: 100%;margin-bottom: 5px"><i class="fas fa-eye"></i> View</a>\
                                        <a href="#" class="btn btn-info edit" data-toggle="modal" data-target="#myModalEdit" data-news-id="'+ val.id +'"style="width: 100%;margin-bottom: 5px"><i class="fas fa-edit"></i> Edit</a>\
                                        <a href="#" class="btn btn-danger delete delete_news" data-news-id="'+ val.id +'" style="width: 100%"><i class="fas fa-trash-alt"></i> Delete</a>\
                                    </td>\
                                </tr>';
                            });

                        } else {
                            html += '<tr><td class="text-center">No data available in table.</td></tr>';
                        }

                            $('#news-body').html(html);
                        },
                        error : function() {
                            alert("Unable to connect to server.");
                        }              
                    
                });

            }
            loadNews();

            $(document).on('click', '#add_news_button', function(e){
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: base_url + 'news/add',
                    data: {data: {
                            'title': $('#add_news_title').val(),
                            'content': $('#add_news_content').val()
                        }
                    },
                    dataType: 'json',
                    cache: false,
                    success : function(response) {

                    if(response.status){
                        $('#myModal').modal('toggle');
                        $('[name="id"]').val('');
                        $('[name="title"]').val('');
                        $('[name="content"]').val('');
                        loadNews();
                    } else {
                        $('.ajax-response').show();
                        $('.ajax-message').html(response.message);

                        setTimeout(function(){
                            $('.ajax-response').fadeOut();
                        },2000);
                    }

                    },
                    error : function(){
                        alert("Unable to connect to server.");
                    }

                });
            });

            $(document).on('click', '#edit_news_button', function(e){
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: base_url + 'news/edit',
                    data: {data: {
                            'id': $('#edit_news_id').val(),
                            'title': $('#edit_news_title').val(),
                            'content': $('#edit_news_content').val()
                        }
                    },
                    dataType: 'json',
                    cache: false,

                    success : function(response){
                        if (response.status) {
                            $('#myModalEdit').modal('toggle');
                            loadNews();
                        } else {
                            $('.ajax-response').show();
                            $('.ajax-message').html(response.message);

                            setTimeout(function(){
                                $('.ajax-response').fadeOut();
                            },2000);
                        }
                        
                    },
                    error : function(){
                        alert("Unable to connect to server.");
                    }

                });

                return false;
            });

            $(document).on('click', '.delete', function(){
                var id = $(this).attr('data-news-id');
                
                bootbox.confirm('Are you sure do you want to delete this news?', function(e){

                    if(e){

                        $.ajax({
                            
                            type: 'POST',
                            url: base_url + 'news/delete',
                            data: {"id": id},

                            success : function(data) {

                               loadNews();

                            },
                            error : function() {
                                alert("Unable to connect to server.");
                            }              
                            
                        });

                    }

                });

            });
        
        });

        function getTableDataById(id)
        {
            var element = $('a[data-news-id="'+ id +'"]');
            var parentElement = $(element).parent('td').parent('tr');
            var data = {
                'id': id,
                'title': parentElement.children().eq(0).text(),
                'content': parentElement.children().eq(1).html()
            };

            return data;
        }

        $('body').on('click','.edit', function(e) {
          
          e.preventDefault();
          var newsId = $(this).data('news-id');
          var newsData = getTableDataById(newsId);

          $('.news-id').val(newsId);
          $('.news-title').val(newsData.title);
          $('.news-content').val(newsData.content);

          console.log(newsData);
        });

</script>

<script>
    function goBack() {
      window.history.back();
    }
</script>