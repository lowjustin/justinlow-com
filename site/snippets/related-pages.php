<?
  $options = array(
    'minHits' => 4,
    'searchItems' => explode(",", $page->tags()),
    'thisPage' => $page->id()
  );
  $relpages = relatedpages($options);
?>
<? if ($page->parent() == "articles" OR $page->isHomePage()): ?>
  <? if (!empty($relpages->data)): ?>
  <section class="related-articles">
    <h2>Related Articles</h2>
    <ul>
      <? foreach($relpages as $relpage): ?>
      <li><a href="<?= $relpage->url() ?>"><?= $relpage->title() ?></a></li>
      <? endforeach ?>
    </ul>
  </section>
  <? endif ?>
<? endif ?>