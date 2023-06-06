<?php


namespace App\Services\UserServices;

use App\Models\FcmToken;
use App\Traits\ApiResponse;
use App\Traits\UploadTrait;
use App\Models\Notification;
use Illuminate\Support\Carbon;

use App\Traits\NotificationTrait;

class NotificationService
{
    use UploadTrait, ApiResponse;
    use NotificationTrait {
        NotificationTrait::__construct as private __notificationTraitConstruct;
    }
    public function __construct(){
        $this->__notificationTraitConstruct(auth()->id());
    }

    public function fetchNotifications($request)
    {
        try {
            $perPage = $request->has('per_page') && $request->per_page > 0 ? $request['per_page'] : 10;
            $all_notifications = NotificationTrait::notifications(0, null)->paginate($perPage);

            if($all_notifications->count() > 0) {
                foreach($all_notifications as $notification) {

                    $notification['gender'] = is_null($notification['gender']) ? 'other':$notification['gender'];
                    $notification['user_picture'] = get_picture($notification['profile_picture'], $notification['gender']);

                    $notification['notify_id'] = ($notification['notify_id'])? "?notify_id=".$notification['notify_id'] : "";

                    // if(strpos($notification['node_url'], "-[guid=]") !== false) {

                    //     $notification['node_url'] = explode("-[guid=]", $notification['node_url'])[0];
                    // }

                    NotificationTrait::notification_message($notification);

                    /* prepare message */
                    $notification['full_message'] = html_entity_decode($notification['first_name'], ENT_QUOTES)." ".html_entity_decode($notification['last_name'], ENT_QUOTES)." ".html_entity_decode($notification['message'], ENT_QUOTES);
                    $notifications[] = $notification;
                }
            }

            return [
                'all_notifications' => $all_notifications,
            ];
        }

    catch (\Exception $e)
        {
            return array(
                'status' => 401,
                'response' => $e->getMessage(),
            );
        }
    }

    public function markAsRead($request)
    {
        try
        {
            if($notification = Notification::whereId($request['notification_id'])->where('to_user_id', auth()->id())->first())
            {
                $notification->update([
                    'read' => '1',
                ]);
                return array(
                    'status' => 200,
                    'message' => 'Notification read successfully!',
                );
            }
            else
            {
                return array(
                    'status' => 0,
                    'response' => 'Notification not found!',
                );
            }


        }
        catch (\Exception $e)
        {
            return array(
                'status' => 401,
                'response' => $e->getMessage(),
            );
        }
    }

    public function markAllAsRead($request)
    {
        try
        {
            Notification::where('to_user_id', auth()->id())->where('read', '0')->update([
                'read' => '1',
            ]);

            return array(
                'status' => 200,
                'response' => 'All notifications read successfully!',
            );
        }
        catch (\Exception $e)
        {
            return array(
                'status' => 401,
                'response' => $e->getMessage(),
            );
        }
    }

    public function markAsSeen($request)
    {
        try
        {
            if($notification = Notification::whereId($request['notification_id'])->where('to_user_id', auth()->id())->first())
            {
                $notification->update([
                    'seen' => '1',
                ]);
                return array(
                    'status' => 200,
                    'message' => 'Notification seen successfully!',
                );
            }
            else
            {
                return array(
                    'status' => 0,
                    'response' => 'Notification not found!',
                );
            }


        }
        catch (\Exception $e)
        {
            return array(
                'status' => 401,
                'response' => $e->getMessage(),
            );
        }
    }

    public function markAllAsSeen($request)
    {
        try
        {
            Notification::where('to_user_id', auth()->id())->where('seen', '0')->update([
                'seen' => '1',
            ]);

            return array(
                'status' => 200,
                'response' => 'All notifications seen successfully!',
            );
        }
        catch (\Exception $e)
        {
            return array(
                'status' => 401,
                'response' => $e->getMessage(),
            );
        }
    }

    public function destroyNotification($id)
    {
        try
        {
            if($notification = Notification::whereId(decrypt($id))->where('to_user_id', auth()->id())->first())
            {
                $notification->delete();
                return array(
                    'status' => 200,
                    'message' => 'Notification read successfully!',
                    'response' => 'notification-delete',
                );
            }
            else
            {
                return array(
                    'status' => 0,
                    'response' => 'Notification not found!'
                );
            }


        }
        catch (\Exception $e)
        {
            return array(
                'status' => 401,
                'response' => $e->getMessage(),
            );
        }
    }

    public function saveFCMToken($request)
    {
        try
        {
            $api_token = getDecryptedBearerToken($request->header('Authorization'));

            if($token = FcmToken::where('fcm_token', $request['fcm_token'])->first())
            {
                if($token['user_id'] == auth()->id())
                {
                    $token->update([
                        'auth_token' => $api_token,
                        'updated_at' => Carbon::now(),
                    ]);

                    return array(
                        'status' => 200,
                        'message' => 'FCM token updated successfully',
                        'response' => 'fcm-token-updated',
                    );
                }
                else
                {
                    $token->delete();

                    FcmToken::create([
                        'user_id' => auth()->id(),
                        'fcm_token' => $request->fcm_token,
                        'auth_token' => $api_token ?? null,
                    ]);

                    return array(
                        'status' => 200,
                        'message' => __('FCM token added successfully'),
                        'response' => 'fcm-token-saved',
                    );
                }

            }
            else
            {
                FcmToken::create([
                    'user_id' => auth()->id(),
                    'fcm_token' => $request->fcm_token,
                    'auth_token' => $api_token ?? null,
                ]);

                return array(
                    'status' => 200,
                    'message' => __('FCM token added successfully'),
                    'response' => 'fcm-token-saved',
                );
            }

        }
        catch (\Exception $e)
        {
            return array(
                'status' =>  $e->getCode(),
                'response' => $e->getMessage(),
            );
        }
    }

    public function destroyFCMToken($request)
    {
        try
        {
            $token = getDecryptedBearerToken($request->header('Authorization'));

           if(!is_null($token))
           {
               FcmToken::where('auth_token', $token)->delete();

                return array(
                    'status' => 200,
                    'message' => __('FCM token deleted successfully'),
                    'response' => 'fcm-token-deleted',
                );
           }
        }
        catch (\Exception $e)
        {
            return array(
                'status' =>  $e->getCode(),
                'response' => $e->getMessage(),
            );
        }
    }

}
