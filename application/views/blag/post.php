<!-- Start component model -->
			<div class="row show-grid">
				<div class="span9">
					<article>
					<h1><?php echo $title; ?></h1>
					<?php echo $body; ?>
					</article>
					<div class="row">
						<div class="span1">
							<img src="<?php echo $author['avatar']; ?>" class="pull-right">
						</div>
						<div class="span8">
							<dl class="dl-horizontal">
								<dt><?php echo lang('Posted_by'); ?></dt>
								<dd><a href="<?php echo $author['url']; ?>"><?php echo $author['username']; ?></a></dd>
								<dd><time class="timeago" datetime="<?php echo $date_iso; ?>"><?php echo $date; ?></time></dd>
								<dt><?php echo lang('Category'); ?></dt>
								<dd><a href="<?php echo $category['url']; ?>"><?php echo $category['title']; ?></a></dd>
								<dt><?php echo lang('Tags'); ?></dt>
								<dd>
									<?php foreach($tags as $tag): ?>
									<a href="<?php echo $tag['url']; ?>" class="label"><?php echo $tag['title']; ?></a>
									<?php endforeach; ?>
								</dd>
							</dl>
						</div>
					</div>
					<hr>
					<h3><?php echo lang('Comments'); ?></h3>
					{comments}
				</div>
				<div class="span3">
					<?php $this->load->view('blag/sidebar'); ?>
				</div>
			</div>
<!-- End component model -->
