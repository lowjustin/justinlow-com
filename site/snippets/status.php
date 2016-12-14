<? if ($page->status()->isNotEmpty() AND $page->status() != 'live'): ?>
<div class="banner__status row" data-status="<?= $page->status() ?>">
  <div class="banner__status--tag"><?= $page->status() ?></div>
  <div class="banner__status--message">
    <? switch ($page->status()): ?>
<? case 'archived': ?>
  <span>This article has been archived from a previous iteration of this website and may not be consistent in tone.</span>
<? break ?>
<? case 'draft': ?>
  <span>This article is still a draft. It is provided for discussion only and may change at any moment.</span>
<? break ?>
    <? endswitch ?>
  </div>
</div>
<? endif  ?>