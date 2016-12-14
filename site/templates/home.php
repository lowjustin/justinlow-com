<? $page = page('articles')->children()->visible()->last() ?>

<? snippet('header', array('page' => $page)) ?>

<? snippet('article', array('page' => $page)) ?>

<? snippet('footer') ?>