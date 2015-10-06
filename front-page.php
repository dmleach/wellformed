<?php get_header(); ?>

<div id="banner" class="container">
    <?php
        /* Find the pages with the name front-page-banner (there should only
           be one */
        $BannerQuery = new WP_Query(array (
            "pagename" => "front-page-banner"
        ));

        /* If such a page was found, display its attachment */
        if ($BannerQuery->have_posts()) {
            $BannerQuery->the_post();
            echo wp_get_attachment_image($BannerQuery->the_ID(), "full");
        }
    ?>
</div>

<div id='three-column' class='container'>
    <?php
        function filterEpisodesPosts($Query) {
            if ($Query->is_home()) {
                $Query->set("category_name", "Episodes");
            }
        }

        add_action("pre_get_posts", "filterEpisodesPosts");

        $idxPost = 0;

        while (have_posts()) {
            the_post();
            $idxPost++;
            $PostTitle = get_the_title();
            $PostExcerpt = get_the_excerpt();
            $PostLink = get_permalink();

            echo "
                <div id='tbox{$idxPost}'>
                    <h2>{$PostTitle}</h2>
                    <p>{$PostExcerpt}</p>
                    <a href='{$PostLink}' class='button'>Read and listen</a>
                </div>
            ";
        }
    ?>
</div>



<div id="page" class="container">
	<div id="content">
		<div class="title">
			<h2>Welcome <span class="byline">to our website</span></h2>
		</div>
		<a href="#" class="image image-full"><img src="<?php bloginfo('template_directory') ?>/assets/images/pic02.jpg" alt="" /></a>
		<!-- <p>This is <strong>WellFormed</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p> -->
	</div>
	<div id="sidebar">
		<h2 class="title">Mauris vulputate</h2>
		<ul class="style2">
			<li class="first">
				<h3><a href="#">Maecenas luctus lectus</a></h3>
				<p><a href="#">Quisque dictum integer nisl risus, sagittis convallis, rutrum id, congue, and nibh.</a></p>
			</li>
			<li>
				<h3><a href="#">Integer gravida nibh</a></h3>
				<p><a href="#">Quisque dictum integer nisl risus, sagittis convallis, rutrum id, congue, and nibh.</a></p>
			</li>
			<li>
				<h3><a href="#">Nulla luctus eleifend</a></h3>
				<p><a href="#">Quisque dictum integer nisl risus, sagittis convallis, rutrum id, congue, and nibh.</a></p>
			</li>
		</ul>
	</div>
</div>

<?php get_footer(); ?>
