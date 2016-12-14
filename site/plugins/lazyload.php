<?php
/**
* Lazy Load Plugin
* Lazy Load Plugin for jQuery: http://www.appelsiini.net/projects/lazyload
* Add c::set('lazyload', true); to site/config.php
*
* @author Justin Low <justin@justinlow.com>
* @version 1.0.0
*/

kirbytext::$pre[] = function($kirbytext, $value) {
	if (c::get('lazyload')) {
		return str_replace("(image:", "(lazyload:", $value);
	} else {
		return $value;
	}
};

/**
 * Modified copy of kirbytext::$tags['image']
 */

kirbytext::$tags['lazyload'] = array(
	'attr' => array(
		'width',
		'height',
		'alt',
		'text',
		'title',
		'class',
		'imgclass',
		'linkclass',
		'caption',
		'link',
		'target',
		'popup',
		'rel'
	),
	'html' => function($tag) {

		$url		 = $tag->attr('lazyload');
		$alt		 = $tag->attr('alt');
		$title	 = $tag->attr('title');
		$link		= $tag->attr('link');
		$caption = $tag->attr('caption');
		$file		= $tag->file($url);

		// use the file url if available and otherwise the given url
		$url = $file ? $file->url() : url($url);

		// alt is just an alternative for text
		if($text = $tag->attr('text')) $alt = $text;

		// try to get the title from the image object and use it as alt text
		if($file) {

			if(empty($alt) and $file->alt() != '') {
				$alt = $file->alt();
			}

			if(empty($title) and $file->title() != '') {
				$title = $file->title();
			}
			
      // force a thumbnail
      $maxImageSize = c::get('maxImageSize', '820');
      if( $tag->attr('width') and $tag->attr('height') ) {
        $url = thumb($file, array('width' => $tag->attr('width'), 'height' => $tag->attr('height'), 'crop' => true))->url();
      } else if(!empty($tag->attr('width')) or !empty($tag->attr('height'))){
        $url = thumb($file, array('width' => $tag->attr('width'), 'height' => $tag->attr('height')))->url();
      } else if($file->width() > $maxImageSize or $file->height() > $maxImageSize){
        $fit_to = $file->isLandscape() ? 'width' : 'height';
        $url = thumb($file, array($fit_to => $maxImageSize))->url();
      }

		}

		if(empty($alt)) $alt = pathinfo($url, PATHINFO_FILENAME);

		// link builder
		$_link = function($image) use($tag, $url, $link, $file) {

			if(empty($link)) return $image;

			// build the href for the link
			if($link == 'self') {
				$href = $url;
			} else if($file and $link == $file->filename()) {
				$href = $file->url();
			} else {
				$href = $link;
			}

			return html::a(url($href), $image, array(
				'rel'		=> $tag->attr('rel'),
				'class'	=> $tag->attr('linkclass'),
				'title'	=> $tag->attr('title'),
				'target' => $tag->target()
			));

		};

		// image builder
		$_image = function($class) use($tag, $url, $alt, $title) {
			$src = $url;
			$attr = array(
				'width'	=> $tag->attr('width'),
				'height' => $tag->attr('height'),
				'class'	=> $class,
				'title'	=> $title,
				'alt'	=> $alt
			);
			$attr = array_merge(array('data-original' => $src, 'alt' => pathinfo($src, PATHINFO_FILENAME)), $attr);
			return html::tag('img', null, $attr);
		};

		if(kirby()->option('kirbytext.image.figure') or !empty($caption)) {
			$image	= $_link($_image($tag->attr('imgclass')));
			$figure = new Brick('figure');
			$figure->addClass($tag->attr('class'));
			$figure->append($image);
			if(!empty($caption)) {
				$figure->append('<figcaption>' . html($caption) . '</figcaption>');
			}
			return $figure;
		} else {
			$class = trim($tag->attr('class') . ' ' . $tag->attr('imgclass'));
			return $_link($_image($class));
		}

	}
);