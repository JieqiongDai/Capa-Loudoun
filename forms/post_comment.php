<?php
require('forms/Persistence.php');
require('forms/squeeks-Pusher-PHP/lib/Pusher.php');
require('forms/pusher_config.php');

$ajax = ($_SERVER[ 'HTTP_X_REQUESTED_WITH' ] === 'XMLHttpRequest');

$db = new Persistence();
$added = $db->add_comment($_POST);

if($added) {
  $channel_name = 'comments-' . $added['comment_post_ID'];
  $event_name = 'new_comment';

  $pusher = new Pusher(APP_KEY, APP_SECRET, APP_ID);
  $pusher->trigger($channel_name, $event_name, $added);
}

if($ajax) {
  sendAjaxResponse($added);
}
else {
  sendStandardResponse($added);
}

function sendAjaxResponse($added) {
  header("Content-Type: application/json");
  if($added) {
    header( 'Status: 201' );
    echo( json_encode($added) );
  }
  else {
    header( 'Status: 400' );
  }
}

function sendStandardResponse($added) {
  if($added) {
    header( 'Location: index.php' );
  }
  else {
    header( 'Location: index.php?error=Your comment was not posted due to errors in your form submission' );
  }
}
?>
