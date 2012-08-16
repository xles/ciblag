<!-- Start component model -->
<?php $posts = array('bob'); ?>
			<div class="row show-grid">
				<div class="span9">
					<?php if($posts): ?>
					<?php foreach($posts as $post): ?>

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

					<?php endforeach; ?>
					<hr>
					<?php echo $this->pagination->create_links(); ?>
					<?php else: ?>
					omglol no posts yo
					<?php endif; ?>
				</div>
				<div class="span3">
					<?php $this->load->view('blag/sidebar'); ?>
				</div>
			</div>
<!-- End component model -->
