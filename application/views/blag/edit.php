<!-- Start component model -->
			<div class="row show-grid">
				<div class="span9">
					<div class="form-actions">
						<div class="pull-right"> 
						<button type="submit" class="btn btn-primary"><?php echo lang('Keep_draft'); ?></button>
						<button class="btn btn-danger"><?php echo lang('Remove_post'); ?></button>
						<button class="btn btn-warning" disabled title="<?php echo lang('Not_authorized'); ?>"><?php echo lang('Publish'); ?></button>
						</div>
					</div>
					<?php $this->load->view('blag/view'); ?>
					<hr>
					<h3><?php echo lang('Edit_post'); ?></h3>
			<form class="form-vertical">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="input01"><?php echo lang('Title'); ?></label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="input01">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<textarea class="input-xlarge ckeditor" id="textarea" name="moot">{body}</textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="pubdate"><?php echo lang('Pubdate'); ?></label>
						<div class="controls">
							<input type="date" class="input-xlarge" id="pubdate" value="<?php echo date('Y-m-d'); ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="input01"><?php echo lang('Category'); ?></label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="input01">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="input01"><?php echo lang('Tags'); ?></label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="input01">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="optionsCheckbox"><?php echo lang('Allow_comments'); ?></label>
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="optionsCheckbox" value="option1">
								(<?php echo lang('Recommended'); ?>)
							</label>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary"><?php echo lang('Save_and_preview'); ?></button>
						<button class="btn"><?php echo lang('Cancel'); ?></button>
					</div>
				</fieldset>
			</form>
					</div>
				<div class="span3">
					<?php $this->load->view('blag/sidebar'); ?>
				</div>
			</div>
<!-- End component model -->
