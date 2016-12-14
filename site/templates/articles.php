<? snippet('header') ?>
<? $articles = $page->children()->flip() ?>

<div class="tag-list grid">
  <button class="tagsort-reset">All articles</button>
</div>

<article>
  <h1><?= $page->title()->html() ?></h1>
  <ul class="article-list grid">
  <? foreach($articles->visible() as $p): ?>
    <li class="article-item" data-item-tags="<?= $p->tags()->html() ?>"><a href="<?= $p->url() ?>"><?= $p->title()->html() ?></a></li>
  <? endforeach ?>
  </ul>
</article>

<? snippet('footer') ?>