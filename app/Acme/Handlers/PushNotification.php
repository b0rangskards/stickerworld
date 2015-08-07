<?php  namespace Acme\Handlers; 

use Acme\Helpers\NotificationMessagesHelper;
use Acme\Notifications\NotificationInterface;
use Acme\Projects\Events\ProjectHasCreated;
use Laracasts\Commander\Events\EventListener;
use Log;
use Notification;

class PushNotification extends EventListener implements NotificationInterface {

	private $notificationHelper;

	function __construct(NotificationMessagesHelper $notificationHelper)
	{
		$this->notificationHelper = $notificationHelper;
	}

	public function whenProjectHasCreated(ProjectHasCreated $event)
	{
		$notification = $this->notificationHelper->projectConfirmationToAccountant($event->project, $event->user);

		$this->sendNotification($notification['from_userid'], $notification['to_userid'], $notification['title'], $notification['content'], $notification['link']);
	}


	public function sendNotification($from_userid, $to_userid, $title, $content, $link = '')
	{
		Notification::createNotification($from_userid, $to_userid, $title, $content, $link);
	}
}