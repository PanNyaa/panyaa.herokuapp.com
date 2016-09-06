<?php
/**
 * This file defines the markup of the search form.
 */
?>
<div class="search_section"> 
    <form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input class="subscribe" placeholder="<?php _e('Find it?', 'plain-blog'); ?>" name="s" type="text">
        <input class="subscribe_btn" value="<?php _e('🔍', 'plain-blog'); ?>" name="" type="submit">
    </form>
</div>