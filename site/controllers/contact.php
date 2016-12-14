<?php

return function($site, $pages, $page) {

   $form = uniform('contact-form', array(
         'required' => array('_from' => 'email'),
         'actions'  => array(
            array(
               '_action' => 'email',
               'to'      => 'low.justin@gmail.com',
               'sender'  => 'justin@justinlow.com',
            )
         )
      )
   );

   return compact('form');
};