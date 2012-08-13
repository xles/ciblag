<!-- Start component model -->
			<div class="row show-grid">
				<div class="span9">
					<h3>{@New_post}</h3>
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
							<textarea class="input-xlarge ckeditor" id="textarea" name="moot"></textarea>
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
					{:if loggedin}
					{usernav}
					{:endif}
					<dl>
						<dt>{@Archive}</dt>
						<dd>
							{archive}
						</dd>
					</dl>
					<hr>
					<dl>
						<dt>{@Categories}</dt>
						<dd>
							{categories}
						</dd>
					</dl>
					<hr>
					<dl>
						<dt>{@Tags}</dt>
						<dd style="text-align:left;">
							{tags}
						</dd>
					</dl>
					{/components/blag/sidebar}
				</div>
			</div>
<!-- End component model -->
