<?php namespace ProcessWire;

if(!defined("PROCESSWIRE")) die();

/** @var Wire $wire */

/**
 * ProcessWire Bootstrap API Ready
 * ===============================
 * This ready.php file is called during ProcessWire bootstrap initialization process.
 * This occurs after the current page has been determined and the API is fully ready
 * to use, but before the current page has started rendering. This file receives a
 * copy of all ProcessWire API variables.
 *
 */

// webp image support
if($page->template != 'admin') {
  $wire->addHookAfter('Pageimage::url', function($event) {
      static $n = 0;
      
      // Skip if already in a recursive call
      if(++$n === 1) {
          $image = $event->object;
          $extension = strtolower(pathinfo($image->filename, PATHINFO_EXTENSION));
          
          // Only convert to webp if NOT a gif
          if($extension !== 'gif') {
              $event->return = $image->webp()->url();
          }
      }
      $n--;
  });
}

  // access init method from within the custom page class
  // $pages->get("template=tag")->init();
  // $pages->get("template=default-page")->init();