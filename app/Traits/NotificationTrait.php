<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Reminder;
use App\Models\UserFriend;
use App\Models\PinedFriend;
use App\Models\CommentReply;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

trait NotificationTrait
{
    public $_data = [];

    public function __construct($id)
    {
        if (!empty($id) && !is_null($id)) {
            $this->_data = User::findUser($id);
            /* update user last seen */
            User::updateUser($this->_data['id']);
            /* get all friends ids */
            $this->_data['friends_ids'] = $this->get_friends_ids($this->_data['id']);
        }
    }

    /* ------------------------------- */
    /* Notifications */
    /* ------------------------------- */

    /**
     * get_notifications
     *
     * @param integer $offset
     * @param integer $last_notification_id
     * @return array
     */

    public function get_notifications($offset = 0, $last_notification_id = null, $max_result=10)
    {
        $offset *= $max_result;
        $notifications = [];
        if ($last_notification_id !== null) {
            $get_notifications =  self::lastNotificationId($last_notification_id)
                ->get();
        } else {
            $get_notifications =  self::notifications($offset, $max_result)
                ->get();
        }

        if ($get_notifications->count() > 0) {
            foreach ($get_notifications->toArray() as $notification) {
                $notification['gender'] = is_null($notification['gender']) ? 'other' : $notification['gender'];
                $notification['user_picture'] = get_picture($notification['profile_picture'], $notification['gender']);


                $notification['user_name']=$notification['first_name'] .' '. $notification['last_name'];
                $notification['notify_id'] = ($notification['notify_id']) ? "?notify_id=".$notification['notify_id'] : "";

                // if (strpos($notification['node_url'], "-[guid=]") !== false) {
                //     $notification['node_url'] = explode("-[guid=]", $notification['node_url'])[0];
                // }

                $this->notification_message($notification);

                /* prepare message */

                $notification['full_message'] = html_entity_decode($notification['first_name'], ENT_QUOTES)." ".html_entity_decode($notification['last_name'], ENT_QUOTES)." ".html_entity_decode($notification['message'], ENT_QUOTES);
                $notifications[] = $notification;
            }
        }
        return $notifications;
    }

    public static function notification_with_id($notification_id)
    {
        return Notification::query()
            ->select('notifications.*', 'users.id as user_id', 'users.username', 'users.first_name', 'users.last_name', 'users.gender', 'profile_picture')
            ->join('users', 'notifications.from_user_id', '=', 'users.id')
            ->where('notifications.id', $notification_id);
    }

    public static function lastNotificationId($id)
    {
        return Notification::query()
            ->select('notifications.*', 'users.id as user_id', 'users.username', 'users.first_name', 'users.last_name', 'users.gender', 'users.profile_picture')
            ->join('users', 'notifications.from_user_id', '=', 'users.id')
            ->whereNotIn('users.status', config()->get('constant.user_account_status'))
            ->where(function ($query) {
                $query->where('notifications.to_user_id', '=', auth()->id())
                    ->OrWhere('notifications.to_user_id', '=', 0);
            })->where('notifications.id', '>', (int)$id)
            ->orderBy('notifications.id', 'DESC');
    }

    public static function notifications($offset, $max_result)
    {
        return Notification::query()
            ->select(
                'notifications.*',
                'users.id as user_id',
                'users.username',
                'users.first_name',
                'users.last_name',
                'users.gender',
                'users.profile_picture'
            )
            ->join('users', 'notifications.from_user_id', '=', 'users.id')
            ->whereNotIn('users.status', config()->get('constant.user_account_status'))
            ->join('user_privacy_profiles', 'notifications.from_user_id', '=', 'user_privacy_profiles.user_id')
            ->where('notifications.to_user_id', '=', auth()->id())
            ->OrWhere('notifications.to_user_id', '=', 0)
            ->orderBy('notifications.id', 'DESC')
            ->offset($offset)
            ->limit($max_result);
    }

    public function unseenNotificationsCount()
    {
        return Notification::where('to_user_id', auth()->id())->where('seen', '0')->count();
    }

    public function unreadNotificationsCount()
    {
        return Notification::where('to_user_id', auth()->id())->where('read', '0')->count();
    }

    public static function notification_message(&$notification){
        switch ($notification['action']) {
            case 'user_birthday':
                $notification['icon'] = "fas fa-birthday-cake";
                $notification['app_url'] = null;
                $notification['web_url'] = null;
                $notification['message'] = __("Birthday is today.");
                break;

            case 'friend_birthday':
                $notification['icon'] = "fas fa-birthday-cake";
                $notification['app_url'] = url('/').'/api/customer/contacts/'.$notification['node_id'];
                $notification['web_url'] = null;
                $notification['message'] = __("Birthday is today.");
                break;

            case 'user_birthday_reminder':
                $notification['icon'] = "far fa-bell";
                $notification['app_url'] = null;
                $notification['web_url'] = null;
                $notification['message'] = __("Birthday is after 1 week.");
                break;

            case 'friend_birthday_reminder':
                $notification['icon'] = "far fa-bell";
                $notification['app_url'] = url('/').'/api/customer/contacts/'.$notification['node_id'];
                $notification['web_url'] = null;
                $notification['message'] = __("Birthday is after 1 week.");
                break;
        }
    }

}
