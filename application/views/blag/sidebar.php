					{:if loggedin}
					{usernav}
					{:endif}
					<dl>
						<dt><?php echo lang('Archive'); ?></dt>
						<dd>
							{archive}
						</dd>
					</dl>
					<hr>
					<dl>
						<dt><?php echo lang('Categories'); ?></dt>
						<dd>
							{categories}
						</dd>
					</dl>
					<hr>
					<dl>
						<dt><?php echo lang('Tags'); ?></dt>
						<dd style="text-align:left;">
							{tags}
						</dd>
					</dl>
