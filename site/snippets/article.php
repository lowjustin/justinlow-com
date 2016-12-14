<? snippet('status', array('page' => $page)) ?>

<article>
  <h1><?= $page->title()->html() ?></h1>
  <?= $page->text()->kirbytext() ?>
</article>

<? snippet('related-pages', array('page' => $page)) ?>
