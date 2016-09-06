<?php
/**
 * This file defines the markup of the search form.
 */
?>



<div class="h_search_section"> 
    <form id="h_searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    
        <input class="h_subscribe" placeholder="<?php _e('けんさく！', 'plain-blog'); ?>" onfocus="this.placeholder='|'" onblur=" this.placeholder='<?php _e('サイト内けんさく！', 'plain-blog'); ?>' " name="s" type="text">
        <input class="h_subscribe_btn" value="<?php _e('🔍', 'plain-blog'); ?>" name="" type="submit">	<!-- this.placeholder='|' -->
    </form>
</div>

