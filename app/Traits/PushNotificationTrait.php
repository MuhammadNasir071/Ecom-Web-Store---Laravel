<?php


namespace App\Traits;


use App\Models\Notification;
use App\Models\User;

trait PushNotificationTrait
{
    /**
     * post_notification
     *
     * @param integer $to_user_id
     * @param string $action
     * @param string $node_type
     * @param string $node_url
     * @param string $notify_id
     * @return void
     */
    public function post_notification($args = [])
    {
        $to_user_id = !isset($args['to_user_id']) ? dd(400) : $args['to_user_id'];
        $from_user_id = !isset($args['from_user_id']) ? auth()->id() : $args['from_user_id'];
        $action = !isset($args['action']) ? dd(400) : $args['action'];
        $node_type = !isset($args['node_type']) ? '' : $args['node_type'];
        $node_id = !isset($args['node_id']) ? '' : $args['node_id'];
        $message = !isset($args['message']) ? '' : $args['message'];


        /* insert notification */
        $new_notification = Notification::create([
            'to_user_id' => $to_user_id,
            'from_user_id' => $from_user_id,
            'action' => $action,
            'node_type' => $node_type,
            'node_id' => $node_id,
            'message' => $message,
        ]);
        $user = User::whereId((int)$to_user_id)->with('fcmTokens')->first();
        /* Firebase push notifications */

        $tokens = $user['fcmTokens'];

        if ($tokens->count()) {
            $_notification = structuredNotification(NotificationTrait::notification_with_id($new_notification->id)->First());

            $gifter_notification = [
                "title" => __('Gift Poke'),
                "body" => $_notification['full_message'],
                'icon' =>  url('/') . '/' . 'assets/images/gift_poke_logo.png'
            ];

            $gifter_notification_data = $_notification;

            return sendPushNotification($tokens->pluck('fcm_token'), $gifter_notification, $gifter_notification_data);
        }
    }
}
