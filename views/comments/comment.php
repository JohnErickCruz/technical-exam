<style type="text/css">
    .comment-list{
        border-radius: 5px;
        border: 1px solid #aaa;
    }
    .user-profile{
        border-bottom: 1px solid #aaa;
        background-color:#e3e3e3;
        padding:10px;
    }
    .user-comment{
        padding:10px;
    }
    .delete-comment h5{
        color: red!important;
    }
    .user-profile small{
        color: #1e90ff;
    }
    .sample{
        
    }
</style>
<?php
    $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $segments = explode('/', $urlPath);
?>
<input type="hidden" name="id" value="<?php echo $segments[3]; ?>">
<div class="container sample">
    <div class="row mt-3">
        <div class="col-md-10 mx-auto">
            <div class="row align-items-center">
                <div class="col-md-12 text-right">
                    <button class="btn btn-danger hvr-icon-pulse-grow" onclick="goBack()"><i class="fas fa-arrow-circle-left"></i> Back</button>
                </div>
                <div class="col-md-6">
                    <div class="news-title">
                        <h3><?php echo $viewData['news']['title'] ?></h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="news-date text-right">
                       <small><?php echo date('F j, Y', strtotime($viewData['news']['created_at'])); ?></small>
                    </div>
                </div>
            </div>
            <div class="news-content text-justify">
                <?php echo $viewData['news']['content']; ?>
            </div>
            <div class="news-comment mt-3">
                <form id="frmAddComment">
                    <input type="hidden" name="news_id" id="comment_id" value="<?php echo $viewData['news']['id'] ?>">
                    <div class="form-group">
                        <textarea name="comment" id="news_comment" class="form-control" rows="4" placeholder="Comments"></textarea>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" name="com_submit" class="btn btn-success" id="add_comment">Add Comment</button>
                    </div>
                    <div class="ajax-response-comment">
                        <div class="ajax-message-comment"></div>
                    </div>
                </form>
            </div>
            <div>
                <div ></div>
            </div>
            <div class="comment-section" id="comment-section">
                
            </div>
        </div>
    </div>
</div>
    
<?php
include_once('assets/scripts/commentScript.js');
include_once('views/layouts/footer.php');
?>