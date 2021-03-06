<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $redux_builder_amp;
amp_header() ?>
<div class="cntr archive">
	<div class="arch-tlt">
		<?php amp_archive_title(); ?>
	</div>
	<div class="arch-dsgn">
		<div class="arch-psts">
			<?php amp_loop_template(); ?>
			<?php amp_pagination(); ?>
		</div>
		<?php 

		if(isset($redux_builder_amp['gbl-sidebar']) && $redux_builder_amp['gbl-sidebar'] == '1'){ ?>
		<div class="sdbr-right">
			<?php 
			$sidebar_output = '';
				$sanitized_sidebar = ampforwp_sidebar_content_sanitizer('swift-sidebar');
			if ( $sanitized_sidebar) {
				$sidebar_output = $sanitized_sidebar->get_amp_content();
				echo apply_filters('ampforwp_modify_sidebars_content',$sidebar_output);
			}
			?>
		</div>
		<?php } ?>
	</div>
</div>
<?php amp_footer()?>