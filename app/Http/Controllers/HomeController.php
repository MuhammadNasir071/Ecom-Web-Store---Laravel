<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\PushNotificationTrait;

class HomeController extends Controller
{
    use PushNotificationTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('verified');
        // $this->middleware('verified_by_admin');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // User role
        $role = Auth::user()->roles->first();

        // Check user role
        if($role->id)
        {
            switch ($role->id)
            {
                case 1:
                    return redirect(route('admin.dashboard'));
                    break;
                case 2:
                    return redirect(route('vendor.dashboard'));
                    break;
                case 3:
                    flash(trans('auth.ACCOUNT_VERIFIED'), 'success');
                    return redirect(route('login'))->with(Auth::logout());
                    break;
                default:
                    return redirect(route('login'));
                    break;
            }
        }
        else
        {
            return redirect(route('login'));
        }

    }

    public function testPushNotification()
    {
        $userId = User::first()->id;
        $result = $this->post_notification(array('to_user_id'=> $userId, 'action'=>'user_birthday', 'node_type'=>null, 'node_id' => 1, 'from_user_id' => $userId));
        dd($result);
    }
}
