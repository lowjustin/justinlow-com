<?php if(!defined('KIRBY')) exit ?>

title: Articles - Item
pages: false
files:
  sortable: true
  fields:
    alt:
      label: Alt Text
      type:  text
fields:
  title:
    label: Title
    type:  text
  date:
    label: Date
    type: date
    width: 1/2
    default: today
  status:
    label: Status
    type:  select
    default: draft
    options:
      archived: Archived
      draft: Draft
      live: Live
    width: 1/2
  text:
    label: Text
    type:  textarea
  excerpt:
    label: Excerpt
    type:  textarea
  tags:
    label: Tags
    type:  tags