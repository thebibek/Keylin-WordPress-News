<?php $atbs_option = ATBS_Core::bk_get_global_var('atbs_option');?>
<?php if($atbs_option['bk-mailchimp-shortcode'] != ''):?>
<!-- Subscribe modal -->
<div class="modal fade subscribe-modal" id="subscribe-modal" tabindex="-1" role="dialog" aria-labelledby="subscribe-modal-label">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#10005;</span></button>

                <?php if($atbs_option['bk-mailchimp-title'] != ''):?>
				    <h4 class="modal-title" id="subscribe-modal-label"><?php echo esc_attr($atbs_option['bk-mailchimp-title']);?></h4>
                <?php endif;?>

			</div>
			<div class="modal-body">
				<div class="subscribe-form subscribe-form--horizontal text-center max-width-sm">
                    <?php echo do_shortcode($atbs_option['bk-mailchimp-shortcode']);?>
				</div>
			</div>
		</div>
	</div>
</div><!-- Subscribe modal -->
<?php endif;?>