<?php

namespace dmleach\wellformed;

class FrontPage
{
    public function computeBannerHtml()
    {
        $Html = "<div id='banner' class='container'>";

        /* Find the pages with the name front-page-banner (there should only
           be one */
        $BannerQuery = new \WP_Query(array (
            "pagename" => "front-page-banner"
        ));

        /* If such a page was found, get its attachment */
        if ($BannerQuery->have_posts()) {
            $BannerQuery->the_post();
            $Html .= wp_get_attachment_image($BannerQuery->the_ID(), "full");
        }

        $Html .= "<div id='banner' class='container'>";

        wp_reset_postdata();

        return $Html;
    }

    public function computeEpisodesHtml()
    {
        $Html = "<div id='three-column' class='container'>";

        /* Find the three newest pages in the Episodes category */
        $EpisodesQuery = new \WP_Query(array (
            "category_name"  => "Episodes",
            "order"          => "DESC",
            "orderby"        => "date",
            "post_status"    => "publish",
            "post_type"      => "post",
            "posts_per_page" => 3
        ));

        $idxPost = 0;

        while ($EpisodesQuery->have_posts()) {
            $EpisodesQuery->the_post();
            $idxPost++;
            $Title = the_title('', '', false);
            $Excerpt = get_the_excerpt();
            $Permalink = get_permalink($EpisodesQuery->the_ID());
            $Html .= "
                <div id='tbox{$idxPost}'>
                    <h2>{$Title}</h2>
                    <p>{$Excerpt}</p>
                    <a href='{$Permalink}' class='button'>Read and listen</a>
                </div>
            ";
        }

        $Html .= "</div>";

        wp_reset_postdata();

        return $Html;
    }
}

/**** SCRIPT EXECUTION BEGINS HERE ********************************************/

/* This WordPress function brings in the content of header.php */
get_header();

$FrontPage = new FrontPage();
echo $FrontPage->computeBannerHtml();
echo $FrontPage->computeEpisodesHtml();

?>






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
