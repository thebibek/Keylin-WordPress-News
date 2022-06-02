<div class="modal fade login-modal" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal-label">
    <div class="modal-dialog">
        <div class="modal-content login-signup-form">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#10005;</span></button>
				<div class="modal-title" id="login-modal-label">
					<ul class="nav nav-tabs js-login-form-tabs" role="tablist">
					    <li role="presentation" class="active"><a href="#login-tab" aria-controls="login-tab" role="tab" data-toggle="tab"><?php esc_html_e('Log in', 'keylin');?></a></li>
                        <?php if ( get_option('users_can_register') ) : //Taken from wp-login.php ?>
					    <li role="presentation"><a href="#signup-tab" aria-controls="signup-tab" role="tab" data-toggle="tab"><?php esc_html_e('Sign up', 'keylin');?></a></li>
                        <?php endif;?>
					</ul>
				</div>
			</div>
            <div class="modal-body">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="login-tab">
                        <div class="login-with-social">
							<?php do_action('login_form'); ?>
						</div>
                        <?php if( class_exists( 'APSL_Lite_Class' ) ) {?>
                        <div class="block-divider"><span><?php esc_html_e('or', 'keylin');?></span></div>
                        <?php }?>
                        <form name="lwa-form" class="bk-lwa-form" action="<?php echo esc_attr(site_url('wp-login.php', 'login_post')); ?>" method="post">
                            <div class="bk-login-status">
                                <span class="lwa-status"></span>
                            </div>
							<p class="lwa-username login-username">
								<label for="user_login_l"><?php esc_html_e('Username', 'keylin');?></label>
								<input type="text" name="log" id="user_login_l" class="input" value="" size="20">
							</p>
							<p class="lwa-password login-password">
								<label for="user_pass"><?php esc_html_e('Password', 'keylin');?></label>
								<input type="password" name="pwd" id="user_pass" class="input" value="" size="20">
							</p>
                            <div class="lwa-submit login-submit">
        	                    <div class="lwa-links">
                                    <div class="login-remember"><label><input name="rememberme" type="checkbox" id="lwa_rememberme" value="<?php esc_attr_e('forever','keylin'); ?>" /> <span><?php esc_html_e( 'Remember Me','keylin') ?></span></label></div>
        	                    </div>
                                <div class="lwa-submit-button login-submit">
        	                        <input id="wp-submit" class="btn btn-block btn-primary lwa-wp-submit" type="submit" name="wp-submit" value="<?php esc_attr_e('Log In','keylin'); ?>" tabindex="100" />
        	                        <input type="hidden" name="lwa_profile_link" />
                                	<input type="hidden" name="login-with-ajax" value="<?php esc_attr_e('login','keylin'); ?>" />
        							<input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url('/')); ?>" />
        	                    </div>
        	                </div>

                            <p class="login-lost-password">
                                <a class="lwa-links-remember link link--darken" href="<?php echo esc_url(site_url('wp-login.php?action=lostpassword')); ?>" title="<?php esc_attr_e('Password Lost and Found','keylin') ?>"><?php esc_attr_e('Lost your password?','keylin') ?></a>
							</p>

						</form>
                    </div>
                    <?php if ( get_option('users_can_register') ) : //Taken from wp-login.php ?>
                    <div role="tabpanel" class="tab-pane fade lwa-register" id="signup-tab">
				    	<form name="login-form" id="loginform" action="#" method="post">
							<div class="login-with-social">
    							<?php do_action('register_form'); ?>
                                <?php do_action('lwa_register_form'); ?>
    						</div>
                            <div class="block-divider"><span><?php esc_html_e('or', 'keylin');?></span></div>
                            <p class="login-username">
								<label for="user_login"><?php esc_html_e('Username', 'keylin');?></label>
								<input type="text" name="user_login" id="user_login" class="input" value="" size="20">
							</p>
                            <p class="login-email">
								<label for="user_login"><?php esc_html_e('E-mail', 'keylin');?></label>
								<input type="text" name="user_email" id="user_email" class="input" value="" size="20">
							</p>
                            <p class="login-submit">
                                <input class="btn btn-block btn-primary" type="submit" value="<?php esc_attr_e('Sign Up','keylin'); ?>" tabindex="100" />
                				<input type="hidden" name="login-with-ajax" value="<?php esc_attr_e('Sign Up','keylin'); ?>" />
                            </p>
						</form>
				    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>