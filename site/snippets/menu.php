<div role="navigation" class="nav">
  <ul class="row">
    <li><a href="<?= page('articles')->url() ?>">Article Index</a></li>
    <? if(page('sales')->isVisible() AND page('sales')->hasVisibleChildren()): ?>
    <li><a href="<?= page('sales')->url() ?>">Shop</a></li>
    <? endif ?>
    <li><a href="<?= page('contact')->url() ?>">Contact Justin</a></li>
  </ul>
</div>