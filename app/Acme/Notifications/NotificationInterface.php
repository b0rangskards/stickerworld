<?php  namespace Acme\Notifications; 

interface NotificationInterface {

	public function sendNotification($from_userid, $to_userid, $title, $content, $link = '');

} 