<?php

class Notification extends \Eloquent {

	protected $fillable = ['from_userid', 'to_userid', 'title', 'content', 'link', 'is_seen'];

	public static function createNotification($from_userid, $to_userid, $title, $content, $link)
	{
		$notification = new static(compact('from_userid', 'to_userid', 'title', 'content', 'link'));
		$notification->save();

		return $notification;
	}

}