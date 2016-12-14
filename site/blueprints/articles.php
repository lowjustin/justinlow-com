<?php if(!defined('KIRBY')) exit ?>

title: Articles - List
pages:
  limit: 50
  num: date
  sort: flip
  template: article
files: false
fields:
  title:
    label: Title
    type:  text