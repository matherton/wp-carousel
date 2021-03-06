<?php
	$path_to_this_theme_dir = str_replace(basename(__FILE__), '', __FILE__);
	$path_to_this_theme_dir = str_replace($_SERVER['DOCUMENT_ROOT'],'', $path_to_this_theme_dir);
	$path_to_this_theme_dir = str_replace(str_replace('index.php', '', $_SERVER['PHP_SELF']), '', $path_to_this_theme_dir);
	$path_to_this_theme_dir = get_option('siteurl').'/'.$path_to_this_theme_dir;
	
	if (!$config['HAS_IMG_WIDTH'])
	{
	 	$config['IMG_WIDTH'] = '';
	}
	if (!$config['HAS_IMG_HEIGHT'])
	{
		$config['IMG_HEIGHT'] = '';
	}
	if (!$config['HAS_PANEL_WIDTH'])
	{
		$config['PANEL_WIDTH'] = '';
	}
	if (!$config['HAS_PANEL_HEIGHT'])
	{
		$config['PANEL_HEIGHT'] = '';
	}
	if (!isset($config['CAROUSEL_WIDTH']))
	{
		$config['CAROUSEL_WIDTH'] = '';
	}
	if (!isset($config['CAROUSEL_HEIGHT']))
	{
		$config['CAROUSEL_HEIGHT'] = '';
	}	
?>

	<!-- Arrows -->

	<div class="theme-skinless" style="width:<?php echo $config['CAROUSEL_WIDTH']; ?>">
		<?php if ($config['ARROWS']): ?>
		<div class="arrow-right"><a href="javascript:stepcarousel.stepBy('carousel_<?php echo $c_id; ?>', -<?php echo $config['SLIDE_POSTS']; ?>)"><?php printf(__('Forward %s panel', 'wp_carousel'), $config['SLIDE_POSTS']); ?></a></div>
		<div class="arrow-left"><a href="javascript:stepcarousel.stepBy('carousel_<?php echo $c_id; ?>', <?php echo $config['SLIDE_POSTS']; ?>)"><?php printf(__('Back %s panel', 'wp_carousel'), $config['SLIDE_POSTS']); ?></span></a></div>
		<div class="clear"></div>
		<?php endif; ?>
	</div>
	
	<!-- Carousel's body -->
	
	<div id="carousel_<?php echo $c_id; ?>" class="stepcarousel theme-skinless" style="width:<?php echo $config['CAROUSEL_WIDTH']; ?>; height:<?php echo $config['CAROUSEL_HEIGHT']; ?>">
	
		<div class="belt">
			<?php foreach ($items as $i_id => $item): ?>
			<div class="panel" style="width:<?php echo $config['PANEL_WIDTH']; ?>; height:<?php echo $config['PANEL_HEIGHT']; ?>;">
				
				<?php
						
					$there_is_image = false;
					if ($item['IMAGE_URL'] != '')
					{
						$there_is_image = true;
					}
					
					$there_is_video = false;
					if ($item['VIDEO'] != '')
					{
						$there_is_video = true;
					}
					
					if (WP_CAROUSEL_SHOW_VIDEOS_FIRST)
					{
						if ($there_is_video)
						{
							echo do_shortcode( '[embed width="'.str_replace('px', '', str_replace('%', '', str_replace('em', '', $config['IMG_WIDTH']))).'" height="'.str_replace('px', '', str_replace('%', '', str_replace('em', '', $config['IMG_HEIGHT']))).'"]'.$item['VIDEO'].'[/embed]');
						}
						else
						{
							?>
						<a href="<?php echo $item['LINK_URL']; ?>" title="<?php echo $item['TITLE']; ?>">
							<img src="<?php echo $item['IMAGE_URL']; ?>" alt="<?php echo $item['TITLE']; ?>" title="<?php echo $item['TITLE']; ?>" style="width:<?php echo $config['IMG_WIDTH']; ?>; height:<?php echo $config['IMG_HEIGHT']; ?>;" />
						</a>
							<?php
						}
					}
					else
					{
						if ($there_is_image)
						{
							?>
						<a href="<?php echo $item['LINK_URL']; ?>" title="<?php echo $item['TITLE']; ?>">
							<img src="<?php echo $item['IMAGE_URL']; ?>" alt="<?php echo $item['TITLE']; ?>" title="<?php echo $item['TITLE']; ?>" style="width:<?php echo $config['IMG_WIDTH']; ?>; height:<?php echo $config['IMG_HEIGHT']; ?>;" />
						</a>
							<?php
						}
						else
						{
							echo do_shortcode('[embed width="'.str_replace('px', '', str_replace('%', '', str_replace('em', '', $config['IMG_WIDTH']))).'" height="'.str_replace('px', '', str_replace('%', '', str_replace('em', '', $config['IMG_HEIGHT']))).'"]'.$item['VIDEO'].'[/embed]');
						}
					}
				
				?>	
				
				<div class="panel-text">
					<?php echo $item['DESC']; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	
	</div>
	
	<!-- Pagination -->
	
	<div class="theme-skinless" style="width:<?php echo $config['CAROUSEL_WIDTH']; ?>">
		<?php if ($config['ENABLE_PAGINATION']): ?>
			<div id="carousel_<?php echo $c_id; ?>-paginate" class="wp_carousel_skinless_pagination">
				<img src="<?php echo $path_to_this_theme_dir; ?>img/opencircle.png" data-over="<?php echo $path_to_this_theme_dir; ?>img/graycircle.png" data-select="<?php echo $path_to_this_theme_dir; ?>img/closedcircle.png" data-moveby="1" />
			</div>
		<?php endif; ?>
	</div>