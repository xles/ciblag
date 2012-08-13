<!-- Start component model -->
			<div class="row show-grid">
				<div class="span9">
					<div class="form-actions">
						<div class="pull-right"> 
						<button type="submit" class="btn btn-primary">{@Keep_draft}</button>
						<button class="btn btn-danger">{@Remove_post}</button>
						<button class="btn btn-warning" disabled title="{@Not_authorized}">{@Publish}</button>
						</div>
					</div>
					{/components/blag/view}
					<hr>
					<h3>{@Edit_post}</h3>
			<form class="form-vertical">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="input01">{@Title}</label>
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
						<label class="control-label" for="pubdate">{@Pubdate}</label>
						<div class="controls">
							<input type="date" class="input-xlarge" id="pubdate" value="<?php echo date('Y-m-d'); ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="input01">{@Category}</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="input01">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="input01">{@Tags}</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="input01">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="optionsCheckbox">{@Allow_comments}</label>
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="optionsCheckbox" value="option1">
								({@Recommended})
							</label>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">{@Save_and_preview}</button>
						<button class="btn">{@Cancel}</button>
					</div>
				</fieldset>
			</form>
					</div>
				<div class="span3">
					<?php include('html/sidebar.html'); ?>
				</div>
			</div>
<!-- End component model -->
