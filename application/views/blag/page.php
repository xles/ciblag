<!-- Start component model -->
			<div class="row show-grid">
				<div class="span9">
					{:if posts}
					{:loop posts}

					<div class="row">
						<div class="span9"> 

						<h2><a href="{posts.url}">{posts.title}</a></h2>
						<p>
							Posted by <a href="{posts.author_profile}">{posts.author}</a>
							in <a href="{posts.category_url}">{posts.category}</a>
							<time class="timeago" datetime="{posts.date_iso}">{posts.date}</time>
						</p>
						{posts.summary}
						</div>
					</div>

					{:endloop}
					{:else}
					BANANAHAMMOCK!
					{:endif}
					<hr>
					<ul class="pager">
						{:if prev_url}
						<li>
							<a href="(prev_url}">&larr; <?php echo lang('Older'); ?></a>
						</li>
						{:else}
						<li class="disabled">
							<a href="#">&larr; <?php echo lang('Older'); ?></a>
						</li>
						{:endif}
						{:if next_url}
						<li>
							<a href="{next_url}"><?php echo lang('Newer'); ?> &rarr;</a>
						</li>
						{:else}
						<li class="disabled">
							<a href="#"><?php echo lang('Newer'); ?> &rarr;</a>
						</li>
						{:endif}
					</ul>
				</div>
				<div class="span3">
					<?php $this->load->view('blag/sidebar'); ?>
				</div>
			</div>
<!-- End component model -->
