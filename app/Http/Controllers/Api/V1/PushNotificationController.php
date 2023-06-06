<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\ApiV1Controller;
use App\Traits\ApiResponse;
use App\Services\UserServices\NotificationService;
use Illuminate\Http\Request;

class PushNotificationController extends ApiV1Controller
{
    use ApiResponse;

    public function fetchNotifications(Request $request)
    {
        $response = new NotificationService();
        $data = $response->fetchNotifications($request);
        return $this->success(__('Fetch All Notifications'), ['success' => true, 'data' => $data], 200);
    }

    public function markAsRead(Request $request)
    {
        $response = new NotificationService();
        $data = $response->markAsRead($request);
        if ($data['status'] == 200)
            return $this->success(__('Mark as read'), ['success' => true, 'data' => true], 200);
        else
            return $this->createInternalErrorResponse($data['response'], ['error' => true]);
    }

    public function markAllAsRead(Request $request)
    {
        $response = new NotificationService();
        $data = $response->markAllAsRead($request);
        if ($data['status'] == 200)
            return $this->success(__('Mark all as read'), ['success' => true, 'data' => true], 200);
        else
            return $this->createInternalErrorResponse($data['response'], ['error' => true]);
    }

    public function markAsSeen(Request $request)
    {
        $response = new NotificationService();
        $data = $response->markAsSeen($request);
        if ($data['status'] == 200)
            return $this->success(__('Mark as seen'), ['success' => true, 'data' => true], 200);
        else
            return $this->createInternalErrorResponse($data['response'], ['error' => true]);
    }

    public function markAllAsSeen(Request $request)
    {
        $response = new NotificationService();
        $data = $response->markAllAsSeen($request);
        if ($data['status'] == 200)
            return $this->success(__('Mark all as seen'), ['success' => true, 'data' => true], 200);
        else
            return $this->createInternalErrorResponse($data['response'], ['error' => true]);
    }

    public function destroyNotification($id)
    {
        $response = new NotificationService();
        $data = $response->destroyNotification($id);
        if ($data['status'] == 200)
            return $this->success(__('delete notification'), ['success' => true, 'data' => true], 200);
        else
            return $this->createInternalErrorResponse($data['response'], ['error' => true]);
    }

    public function saveFCMToken(Request $request)
    {
        $request->validate([
            'fcm_token' => 'required',
        ]);

        $response = new NotificationService();
        $data = $response->saveFCMToken($request);
        if ($data['status'] == 200)
            return $this->success(__('FCM token added successfully'), ['success' => true, 'data' => true], 200);
        else
            return $this->createInternalErrorResponse($data['response'], ['error' => true]);
    }

    public function destroyFCMToken(Request $request)
    {
        $response = new NotificationService();
        $data = $response->destroyFCMToken($request);
        if ($data['status'] == 200)
            return $this->success(__('FCM token deleted successfully'), ['success' => true, 'data' => true], 200);
        else
            return $this->createInternalErrorResponse($data['response'], ['error' => true]);
    }
}
