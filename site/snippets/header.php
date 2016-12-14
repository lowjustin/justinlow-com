<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>

  <meta name="author" content="<?= $site->author()->html() ?>">
  <meta name="copyright" content="<?= $site->copyright() ?>">
  <meta name="description" content="<?= $site->description()->html() ?>">
  <meta name="keywords" content="<?= $site->keywords()->html() ?>,<?= $page->tags()->html() ?>">
  <?
  /*
  <meta name="description" content="<?= $site->description()->html() ?>">
  <meta name="keywords" content="<?= $site->keywords()->html() ?>">
  <!-- <meta name="google-site-verification" content="jFkfiYryzUm8MbHI4aN3O7OWeHX1j7ioE6198JPXuS8" /> -->
  */ ?>

  <meta property="og:title" content="<?= $page->title()->html() ?>">
  <meta property="og:site_name" content="<?= $site->title()->html() ?>"/>
  <meta property="og:url" content="<?= $page->url() ?>">
  <meta property="og:description" content="<?= $page->excerpt()->html() ?>">
  <meta property="og:type" content="article" />
  <meta property="article:author" content="https://www.facebook.com/low.justin" />
  <? if ($image = $page->files()->sortBy('Sort')->first()): ?>
  <meta property="og:image" content="<?= $image->url() ?>">
  <? endif ?>

  <link href="<?= url('assets/images/favicon.ico') ?>" rel="shortcut icon" type="image/x-icon">

  <!-- defer loading of non-critical styles -->
  <noscript id="deferred-styles">
    <?= css('assets/css/style.css') ?>
  </noscript>

  <!-- load non-critical styles -->
  <script>
    var loadDeferredStyles = function() {
      var addStylesNode = document.getElementById("deferred-styles");
      var replacement = document.createElement("div");
      replacement.innerHTML = addStylesNode.textContent;
      document.body.appendChild(replacement)
      addStylesNode.parentElement.removeChild(addStylesNode);
    };
    var raf = requestAnimationFrame || mozRequestAnimationFrame ||
        webkitRequestAnimationFrame || msRequestAnimationFrame;
    if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
    else window.addEventListener('load', loadDeferredStyles);
  </script>

</head>
<body>

  <div class="wrapper column">
    <nav class="pri-nav">
      <? snippet('menu') ?>
    </nav>
    
    <main class="content">
