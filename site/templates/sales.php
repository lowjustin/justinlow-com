<? snippet('header') ?>

<? $articles = $page->children()->flip() ?>

<div class="tag-list grid">
  <button class="tagsort-reset">All articles</button>
</div>

<article>
  <h1><?= $page->title()->html() ?></h1>
  <ul class="article-list grid">
  <? foreach($articles->visible() as $p): ?>
    <li class="article-item" data-item-tags="<?= $p->tags()->html() ?>">
      <a href="<?= $p->url() ?>">
          <? if($p->hasImages()): ?>
          <?= thumb($p->image(), array('width' => 390, 'height' => '260', 'crop' => true, 'alt' => $p->image()->alt()->h())) ?>
          <? endif ?>
          <?= $p->title()->html() ?>
        </a>
    </li>
  <? endforeach ?>
  </ul>
</article>

<? snippet('footer') ?>