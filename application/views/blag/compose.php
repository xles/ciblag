<!-- Start component model -->
			<div class="row show-grid">
				<div class="span9">
					<h3><?php echo lang('New_post') ?></h3>
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
							<textarea class="input-xlarge ckeditor" id="textarea" name="moot"></textarea>
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
