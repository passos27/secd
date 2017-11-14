<?php 

add_theme_support('post-thumbnails');
add_theme_support('widgets');

//adiciona suporte a menus 

if(function_exists(register_nav_menu)){
register_nav_menu('menu_topo','Menu principal');
}


if(function_exists(register_nav_menu)){
register_nav_menu('Blogs','Menu de blogs do autor');
}

if(function_exists(register_nav_menu)){
register_nav_menu('Rodape','Menu do rodapé');
}

//adiciona suporte a sidebar
//sidebar

if (function_exists(register_sidebar)){
	register_sidebar(
	array(
	
	'name'=> 'lateral',
	'before_widget' => '<div class="case_sidebar">',
	'after_widget' => '</div>',
	'before_title'  => '<h1 class="t_si n">',
	'after_title'   => '</h1><div class="separador"></div>',
	)
	
	);
}
//sidebar blogs
if (function_exists(register_sidebar)){
	register_sidebar(
	array(
	
	'name'=> 'blogs',
	'before_widget' => '<div class="blogs_c">',
	'after_widget' => '</div>',
	'before_title'  => '<h1 class="t_si">',
	'after_title'   => '</h1>',
	)
	
	);
}
//sidebar ultimas
if (function_exists(register_sidebar)){
	register_sidebar(
	array(
	
	'name'=> 'ultimas/comentários',
	'before_widget' => '<div class="ul_co">',
	'after_widget' => '</div>',
	'before_title'  => '<h2 class="t_co">',
	'after_title'   => '</h2><div class="sep"></div>',
	)
	
	);
}

if (function_exists(register_sidebar)){
	register_sidebar(
	array(
	
	'name'=> 'mapa',
	'before_widget' => '<div class="site_m">',
	'after_widget' => '</div>',
	'before_title'  => '<h1 class="t_sm">',
	'after_title'   => '<div class="int"></div></h1>',
	)
	
	);
}
if (function_exists(register_sidebar)){
  register_sidebar(
  array(
  
  'name'=> 'social',
  'before_widget' => '<div class="social_a">',
  'after_widget' => '</div>',
  'before_title'  => '<div>',
  'after_title'   => '</div>',
  )
  
  );
}



// Limite de caracteres

function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).'...';
} else {
$excerpt = implode(" ",$excerpt);
}
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
return $excerpt;
}


//paginação
function post_pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='paginacao'><span>Páginas:</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."' class='current'>&laquo;</a>";
         if($paged > 6 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>1</a> <span class='current'>...</span>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<span class='current'>...</span> <a href='".get_pagenum_link($pages)."'>$pages</a>";
         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."' class='current'>&raquo;</a>";
         echo "</div>\n";
     }
}





//função para alterar logo do painel de login

function my_custom_login_logo() {
echo '<style type="text/css">
h1 a { background-image:url('.get_bloginfo('template_directory').'/imagens/logo_admin.png) !important;

background-size:100px 100px !important; width: 120px !important;

 }
</style>';

}
add_action('login_head', 'my_custom_login_logo');


function my_login_logo_url() {

    return get_bloginfo( 'url' );
}
//alterar url do logo de login
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url_title() {
    return 'Ir para'.get_bloginfo('name');
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );






//caminho da postagem
function wp_custom_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current_b">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'categoria "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . '' . single_tag_title('', false) . '' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} // end wp_custom_breadcrumbs()




?>
 

