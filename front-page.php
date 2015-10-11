<?php

namespace dmleach\wellformed;

class FrontPage
{
    public function computeBannerHtml()
    {
        $Html = "";
        $CustomHeader = get_custom_header();

        if ($CustomHeader->url != '') {
            $Height = ($CustomHeader->height == "" ? "" : " height={$CustomHeader->height}");
            $Width = ($CustomHeader->width == "" ? "" : "width={$CustomHeader->width}");
            $Html = "
                <div id='banner' class='container'>
                    <img src='{$CustomHeader->url}'{$Height}{$Width} alt=''/>
                </div>
            ";
        };

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
            $Thumbnail = get_the_post_thumbnail();
            $Title = the_title('', '', false);
            $Excerpt = get_the_excerpt();
            $Permalink = get_permalink($EpisodesQuery->the_ID());
            $Html .= "
                <div id='tbox{$idxPost}'>
                    {$Thumbnail}
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

    public function computeWelcomeHtml()
    {
        $Html = "<div id='page' class='container'>";

        $WelcomeQuery = new \WP_Query(array (
            "name"           => "welcome",
            "post_type"      => "page",
            "post_status"    => "publish",
            "posts_per_page" => 1
        ));

        if ($WelcomeQuery->have_posts()) {
            $WelcomeQuery->the_post();
            $Title = the_title('', '', false);
            $Content = get_the_content();
            $Html .= "
                <div id='content'>
                    <div class='title'>
                        <h2>{$Title}</h2>
                    </div>
                    <p>{$Content}</p>
                </div>
            ";
        }

        $Html .= "</div>";

        return $Html;
    }
}

/**** SCRIPT EXECUTION BEGINS HERE ********************************************/

/* This WordPress function brings in the content of header.php */
get_header();

$FrontPage = new FrontPage();
echo $FrontPage->computeBannerHtml();
echo $FrontPage->computeEpisodesHtml();

get_footer();
