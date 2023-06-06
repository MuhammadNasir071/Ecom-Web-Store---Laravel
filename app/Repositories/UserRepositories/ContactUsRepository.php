<?php

namespace App\Repositories\UserRepositories;

use App\Traits\UploadTrait;
use App\Exceptions\GeneralException;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;

class ContactUsRepository
{
    use UploadTrait;

    public function contactsUs($request)
    {
        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        try
        {
            Mail::send('emails.contact_us', [                     // send email to Gift Poke from user/customer
                        'name' => $request->name,
                        'email' => $request->email,
                        'subject' => $request->subject,
                        'message_query' => $request->message,
            ],
            function ($message) use ($request){
                $message->to('mail@gifter.trztechnologies.com')->from($request->email)->subject('Contact Us Email!');
            });


            Mail::send('emails.contactus_return_message', [         // send email to user/customer from Gift Poke Teem
                'name' => $request->name,
                'subject' => $request->subject,
            ],
            function ($message) use ($request){
                $message->to($request->email)->from('mail@gifter.trztechnologies.com')->subject($request->subject);
            });

            return;
        }
        catch(\Exception $e)
        {
            throw new GeneralException($e->getMessage(), 500);
        }
    }

}
