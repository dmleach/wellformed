<?php

namespace dmleach\wellformed;

class Footer
{
	public function computeWelcomeHtml()
	{
		$Html = "<div id='fbox1'>";

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

	public function computeSocialHtml()
	{
		$Html = "<div id='fbox3'>";

		$SocialMediaQuery = new \WP_Query(array (
			"name"           => "social-media",
			"post_type"      => "page",
			"post_status"    => "publish",
			"posts_per_page" => 1
		));

		if ($SocialMediaQuery->have_posts()) {
			$SocialMediaQuery->the_post();
			$Title = the_title('', '', false);
			$Content = get_the_content();
			$Html .= "
				<div id='content'>
					<div class='title'>
						<h2>{$Title}</h2>
					</div>
					{$Content}
				</div>
			";
		}

		$Html .= "</div>";

		return $Html;
	}

	public function computeCopyrightHtml()
	{
		$Html = "<div id='copyright' class='container'>";

		$CopyrightQuery = new \WP_Query(array (
			"name"           => "copyright",
			"post_type"      => "page",
			"post_status"    => "publish",
			"posts_per_page" => 1
		));

		if ($CopyrightQuery->have_posts()) {
			$CopyrightQuery->the_post();
			$Html .= get_the_content();
		}

		$Html .= "</div>";

		return $Html;
	}
}

/**** SCRIPT EXECUTION BEGINS HERE ********************************************/
echo "<div id='footer' class='container'>";

$Footer = new Footer();
echo $Footer->computeWelcomeHtml();
echo $Footer->computeSocialHtml();

echo "</div>";

echo $Footer->computeCopyrightHtml();

echo "</body>";
echo "</html>";
