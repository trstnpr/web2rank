<?php
	if(recent_blog()) {
?>
	<div class="widget widget-blog">

		<h4 class="widget-header">Recent Posts</h4>

		<div class="widget-content">
			<ul class="blog-list">
			<?php foreach(recent_blog() as $widget_blog) { ?>
				<li><a href="<?php echo base_url($widget_blog->slug); ?>"><?php echo $widget_blog->title; ?></a></li>
			<? } ?>
			</ul>
			
		</div>

	</div>
<?php
	}
?>