<?php
// Dm test comment : List by domain
// Vars : $dmTestCommentPager

echo _open('div.dm_test_comment.list_by_domain');

 echo $dmTestCommentPager->renderNavigationTop();

  echo _open('ul.elements');

  foreach ($dmTestCommentPager as $dmTestComment)
  {
    echo _open('li.element');
    
      echo $dmTestComment;
      
    echo _close('li');
  }

  echo _close('ul');

 echo $dmTestCommentPager->renderNavigationBottom();

echo _close('div');