<?php 
    $darkModeActive  = ATBS_Core::bk_get_darkmode_cookie();
    $activeClass = $darkModeActive ? ' active' : '';
?>
<!-- Button Dark Mode & Light Mode   -->
<button class="atbs-theme-switch<?php echo esc_attr($activeClass); ?>">
    <span class="dark-mode-button">
        <i class="mdicon mdicon-moon1"></i>
    </span>
    <span class="light-mode-button">
        <i class="mdicon mdicon-wb_sunny"></i>
    </span>
</button>