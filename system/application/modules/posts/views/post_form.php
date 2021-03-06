<form action="<?php echo site_url('panel/posts/'.$type.'/'.$filename); ?>" class="panel-form" method="POST">
	<div class="row heading">
		<div class="col-md-6">
			<h1><a href="<?php echo site_url('panel/posts'); ?>">POSTS</a> &bull; <?php echo strtoupper($type); ?> POST</h1>
		</div>
		<div class="col-md-6 align-right">
			<button type="submit" name="btnSave" class="btn btn-info"><span class="fa fa-save"></span> Save</button>
			<button type="submit" name="btnSaveExit" value="1" class="btn btn-default"><span class="fa fa-save"></span> Save and exit</button>
		</div>
	</div>
	<ul class="nav nav-tabs" role="tablist">
		<li class="active"><a href="#main" role="tab" data-toggle="tab">Main</a></li>
		<li><a href="#optional" role="tab" data-toggle="tab">Optional</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane active" id="main">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="title">Title <small>post title</small></label>
						<input type="text" class="form-control title" name="title" value="<?php echo set_value('title', validate_value($post, 'title')); ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="slug">Slug <small>post url</small></label>
						<input type="text" class="form-control slug" name="slug" value="<?php echo set_value('slug', validate_value($post, 'slug')); ?>">
					</div>		
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="content" class="pull-left">Content</label>
						
						<div class="btn-group pull-right" role="group">
							<button type="button" data-editor="ckeditor" class="btn btn-editor btn-xs btn-success">CKEditor</button>
							<button type="button" data-editor="codemirror" class="btn btn-editor btn-xs">Code</button>
						</div>

						<textarea id="contentfield" class="form-control ckeditor clearfix" name="content" rows="20"><?php echo set_value('content', validate_value($post, 'content')); ?></textarea>
					</div>
				</div>
			</div>
		</div>

		<div class="tab-pane" id="optional">
			<div class="form-group">
				<label for="intro">Introduction</label>	
				<textarea class="form-control" name="intro" id="intro" rows="4"><?php echo set_value('intro', validate_value($post, 'intro')); ?></textarea>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="content">Featured Image</label>
						<div class="row">
							<div class="col-md-9">
								<input type="text" id="post_image" name="post_image" class="form-control" value="">
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-default btn-sm btn-block" data-toggle="modal" data-target="#myModal">Browse</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="labels">Labels <small>or categories</small></label>
						<input type="text" name="labels" id="labels" class="form-control" value="<?php echo set_value('labels', validate_value($post, 'labels')); ?>">
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="title">Layout <small>page layout file</small></label>
						<select class="form-control" name="layout" id="layout">
							<option value="">Auto</option>
							<?php foreach ($layouts as $layout): ?>
								<option value="<?php echo substr($layout, 0, -4); ?>" <?php echo (substr($layout, 0, -4) == validate_value($post, 'layout')) ? "selected" : ''; ?>><?php echo $layout; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="meta_description">Meta Description <small>optional</small></label>
						<textarea name="meta_description" class="form-control" rows="6"><?php echo set_value('meta_description', validate_value($post, 'meta_description')); ?></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>

</form>

<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<iframe src="<?php echo base_url(ADDON_PATH.'vendor/rfm/filemanager/dialog.php?type=1&site='.SITE_SLUG.'&field_id=post_image&relative_url=1&fldr='); ?>" width="100%" height="600px" frameborder="0"></iframe>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->