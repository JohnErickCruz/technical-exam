<div class="container">
	<div class="row	align-items-center">
		<div class="col-md-8">
			<h1>News List </h1>
		</div>
		<div class="col-md-4 text-right">
			<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> Add News</a>
		</div>
	</div>
	<div class="alert alert-danger display-error" style="display: none"></div>
	<table id="news-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr class="text-center">
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="news-body">
 			
        </tbody>
    </table>

	<!--Add Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
			  	<h4 class="modal-title">ADD NEWS</h4>
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>
			  <div class="modal-body">
			  	<div class="ajax-response" style="display: none">
			  		<div class="ajax-message"></div>
			  	</div>
			    <div>
		    		<input type="hidden" name="id">

		    		<div class="form-group">
		    			<input type="text" class="form-control" id="add_news_title" name="title" placeholder="Title">
		    		</div>
		    		<div class="form-group">
		    			<textarea class="form-control" id="add_news_content" name="content" placeholder="Content"></textarea>
		    		</div>
		    		<div class="form-group text-right">
		    			<button type="submit" class="btn btn-success" id="add_news_button" name="add">SUBMIT</button>
		    		</div>
			    </div>
			  </div>
			</div>
		</div>
	</div>

	<!--Edit Modal -->
	<div id="myModalEdit" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
			  	<h4 class="modal-title">EDIT NEWS</h4>
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>
			  <div class="modal-body">
			  	<form id="">
				    <div>
				    	<div class="ajax-response" style="display: none">
					  		<div class="ajax-message"></div>
					  	</div>
			    		<input type="hidden" class="news-id" id="edit_news_id" name="id" value="">

			    		<div class="form-group">
			    			<input type="text" class="form-control news-title" id="edit_news_title" name="title" placeholder="Title" value="" required>
			    		</div>
			    		<div class="form-group">
			    			<textarea class="form-control news-content" id="edit_news_content" name="content" placeholder="Content" required></textarea>
			    		</div>
			    		<div class="form-group text-right">
			    			<button type="submit" class="btn btn-success" id="edit_news_button" name="update">UPDATE</button>
			    		</div>
				    </div>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>

<?php
include_once('assets/scripts/newsScript.js');
?>
