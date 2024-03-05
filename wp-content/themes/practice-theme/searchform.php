<!-- search form -->
<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
  <label>
    <input type="search" class="form-control" placeholder="search" value="<?php echo get_search_query(); ?>" name="s" />
  </label>
  <button type="submit" class="search-submit"><?php echo esc_html_x('Search', 'submit button', 'wordpress'); ?></button>
</form>