<?php namespace ProcessWire;

// Optional main output file, called after rendering page’s template file. 
// This is defined by $config->appendTemplateFile in /site/config.php, and
// is typically used to define and output markup common among most pages.
// 	
// When the Markup Regions feature is used, template files can prepend, append,
// replace or delete any element defined here that has an "id" attribute. 
// https://processwire.com/docs/front-end/output/markup-regions/
	
/** @var Page $page */
/** @var Pages $pages */
/** @var Config $config */
/** @var RockFrontend $rockfrontend */

$home = $pages->get('/'); // homepage directory

?>
<!DOCTYPE html>
<html lang="en">
	<head id="html-head">
		
		<!-- hide our site content -->
		<!-- <style>html{visibility: hidden;opacity:0;}body.preload * {transition: none !important;animation: none !important;}body.preload .page-content {opacity: 0;visibility: hidden;}</style> -->

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<!-- add our styles and scripts -->
		<?= $rockfrontend->styleTag($config->urls->templates . "dst/styles.min.css") ?>
		<?= $rockfrontend->scriptTag($config->urls->templates . "dst/scripts.min.js") ?>
		
		<!-- make sure we get styling on mobile by setting meta viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <title><?php echo ($page->name == 'home' ? $page->title : $page->title . ' — ' . $home->title); ?></title> -->
		<!-- <meta name="description" content="Laskfar Vortok is an intermedia composer and telepresent videomaker."> -->
		<meta name="keywords" content="laskfar, vortok, info, music, cinema, experimental, video, los angeles, audio, artist, sound art, video art, vj, creative director, filmmaker, visual artist, glitch, network, code, music video, machine learning">
		<meta name="generator" content="ProcessWire">

		<!-- fonts -->
		<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="" rel="stylesheet">  -->

		<!-- favicons -->
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $config->urls->assets?>favicon/favicon.gif">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $config->urls->assets?>favicon/favicon.ico">
		<!-- <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $config->urls->assets?>favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $config->urls->assets?>favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $config->urls->assets?>favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php echo $config->urls->assets?>favicon/site.webmanifest">
		<link rel="mask-icon" href="<?php echo $config->urls->assets?>favicon/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff"> -->

		<!-- metatags -->
		<?php $metadata = $modules->get('MarkupMetadata');?>
		<?php echo $metadata->render();?>

		<!-- rss -->
		<link rel="alternate" type="application/rss+xml" title="Vortok • Bildwissenschaft RSS Feed" href="<?= $pages->get('/rss/')->url ?>" />
		
		<!-- mastodon verification -->
		<link rel="me" href="https://merveilles.town/@vortok" />

	</head>
	<body id="html-body">
		<!-- make sure we are in dark mode -->
		<!-- if the default is dark mode, assign it in main.js and set the below if statement to "disabled" and `theme-light` -->
		<script type="text/javascript">
			const selectedTheme = localStorage.getItem('dark-mode');
			if (selectedTheme === "disabled") {
				html.dataset.theme = `theme-light`;
			};
		</script>

		<?= $rockfrontend->render("sections/includes/header.latte") ?>
		<?= $rockfrontend->renderLayout($page) ?>
		<?= $rockfrontend->render("sections/includes/footer.latte") ?>

		<!-- show our site content -->
		<!-- <style>html{visibility: visible;opacity:1;}</style> -->

		<!-- unhide the site content set via inline css above -->
		<!-- <script type="text/javascript">window.addEventListener('load', function () {document.body.classList.remove('preload');});</script> -->

		<!-- scripts for once DOM is loaded -->
		<script type="text/javascript" src="<?php echo $config->urls->templates?>scripts/onload.js" defer></script>
		
		<!-- script to display JS classes -->
		<script type="text/javascript">document.documentElement.classList.add('js');</script>
	</body>
</html>