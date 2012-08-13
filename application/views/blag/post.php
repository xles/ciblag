<!-- Start component model -->
			<div class="row show-grid">
				<div class="span9">
					<article>
					<h1>{title}</h1>
					{body}
					</article>
					<div class="row">
						<div class="span1">
							<img src="{avatar}" class="pull-right">
						</div>
						<div class="span8">
							<dl class="dl-horizontal">
								<dt>{@Posted_by}</dt>
								<dd><a href="{author_profile}">{author}</a></dd>
								<dd><time class="timeago" datetime="{date_iso}">{date}</time></dd>
								<dt>{@Category}</dt>
								<dd><a href="{category_url}">{category}</a></dd>
								<dt>{@Tags}</dt>
								<dd>
									{:loop tags}
									<a class="{tags.url}">{tags.tag}</a>
									{:endloop}
								</dd>
							</dl>
						</div>
					</div>
					<hr>
					<h3>Comments and shit</h3>
					{comments}
				</div>
				<div class="span3">
					<?php var_dump($_SERVER);?>
					{sidebar}
				</div>
			</div>
<!-- End component model -->
