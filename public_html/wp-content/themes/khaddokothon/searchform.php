<?php
/**
 * Default Searchform
 *
 * @package KhaddoKothon
 */
?>


<form method="get" class="khaddokothon-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" class="khaddokothon-search-field" placeholder="<?php echo
    esc_attr_x( 'Search...', 'placeholder', 'khaddokothon' ); ?>" value="<?php
    echo get_search_query(); ?>" required name="s" />
    <button type="submit" class="khaddokothon-btn"><i class="fas fa-search"></i></button>
</form>
