<?php

namespace App\Repositories\UserRepositories;

use App\Models\Contact;
use App\Traits\UploadTrait;
use App\Exceptions\GeneralException;
use App\Models\Address;
use App\Models\ContactPrivacy;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ContactRepository
{
    use UploadTrait;

    public function contacts()
    {
        return Contact::where('contact_user_id', auth()->id())->orderBy('user_id', 'DESC');
    }

    public function store($request)
    {
        $contacts = json_decode($request->contacts, true);
        foreach ($contacts as $contactRequest) {
            $user = User::select('id', 'phone_number')->whereContact($contactRequest['contact_number'])->first();
            $user_id = null;
            if (!is_null($user)) {
                $user_id = $user->id;
            }
            if (Contact::where('contact_user_id', auth()->id())->where('contact_number', $contactRequest['contact_number'])->exists()) {
                Contact::where('contact_user_id', auth()->id())->where('contact_number', $contactRequest['contact_number'])->update([
                    'name' => isset($contactRequest['name']) ? $contactRequest['name'] : null,
                    'contact_number' => $contactRequest['contact_number'],
                    'email' => isset($contactRequest['email']) ? $contactRequest['email'] : null,
                    'nick_name' => isset($contactRequest['nick_name']) ? $contactRequest['nick_name'] : null,
                    'date_of_birth' => isset($contactRequest['date_of_birth']) ? $contactRequest['date_of_birth'] : null,
                    'gender' => $contactRequest['gender'] ??   'other',
                    'company' => isset($contactRequest['company']) ? $contactRequest['company'] : null,
                    'notes' => isset($contactRequest['notes']) ? $contactRequest['notes'] : null,
                    'day' => isset($contactRequest['day']) ? $contactRequest['day'] : null,
                    'month' => isset($contactRequest['month']) ? $contactRequest['month'] : null,
                    'year' => isset($contactRequest['year']) ? $contactRequest['year'] : null,
                    'user_id' => $user_id,
                ]);
            } else {
                $contact = Contact::create([
                    'name' => $contactRequest['name'],
                    'contact_user_id' => auth()->id(),
                    'contact_number' => $contactRequest['contact_number'],
                    'email' => isset($contactRequest['email']) ? $contactRequest['email'] : null,
                    'nick_name' => isset($contactRequest['nick_name']) ? $contactRequest['nick_name'] : null,
                    'date_of_birth' => isset($contactRequest['date_of_birth']) ? $contactRequest['date_of_birth'] : null,
                    'gender' => $contactRequest->gender ?? 'other',
                    'company' => isset($contactRequest['company']) ? $contactRequest['company'] : null,
                    'notes' => isset($contactRequest['notes']) ? $contactRequest['notes'] : null,
                    'day' => isset($contactRequest['day']) ? $contactRequest['day'] : null,
                    'month' => isset($contactRequest['month']) ? $contactRequest['month'] : null,
                    'year' => isset($contactRequest['year']) ? $contactRequest['year'] : null,
                    'user_id' => $user_id,
                ]);

                $this->setDefaultContactPrivacy($contact->id);
            }
        }
    }

    public function setDefaultContactPrivacy($contact_id)
    {
        ContactPrivacy::create([
            'contact_id' => $contact_id,
            'privacy_id' => 4,
        ]);
    }

    public function show($contactId)
    {
        return Contact::find($contactId);
    }

    public function update($request, $id)
    {
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->contact_user_id = $request->contact_user_id;
        $contact->contact_number = $request->contact_number;
        $contact->email = $request->email;
        $contact->nick_name = $request->nick_name;
        $contact->date_of_birth = $request->date_of_birth;
        $contact->gender = $request->gender ?? $contact->gender;
        $contact->company = $request->company;
        $contact->notes = $request->notes;
        $contact->image = isset($imagePath[0]) ? $imagePath[0] : null;
        $contact->user_id = auth()->id();
        $contact->save();
    }


    public function delete($contactId)
    {
        try {
            $contact = Contact::findOrFail($contactId);
            $contact->delete();
        } catch (\Throwable $th) {
            throw new GeneralException('Unable to delete birthday.');
        }
    }


    public function storeContactPrivacy($request)
    {
        return ContactPrivacy::where('contact_id', $request->contact_id)->update([
            'contact_id' => $request->contact_id,
            'privacy_id' => $request->sub_privacy_id,
        ]);
    }

    // Fetch Product Categories assign to Contact
    public function fetchContactCategory($contact_id)
    {
        return DB::table('contacts')->where('contacts.id', $contact_id)
        ->join('contact_privacy', 'contacts.id', '=', 'contact_privacy.contact_id')
        ->join('category_privacy', 'contact_privacy.privacy_id', '=', 'category_privacy.privacy_id')
        ->join('categories', 'categories.id', '=', 'category_privacy.category_id')
        ->select('categories.*')->get();
    }

    // Store Contact Address
    public function addContactAddress($request)
    {
        Address::create([
            'contact_id' => $request->contact_id,
            'address_lable' => $request->address_lable,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
        ]);
    }

    // Update Contact Address
    public function updateContactAddress($request, $id)
    {
        $address = Address::where('id', $id)->first();
        $address->address_lable = $request->address_lable;
        $address->street_address = $request->street_address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->postal_code = $request->postal_code;
        $address->save();
    }

    // Delete Contact Address
    public function deleteContactAddress($addressId)
    {
        try 
        {
            $address = Address::findOrFail($addressId);
            $address->delete();
            return true;
        }
        catch (\Throwable $th)
        {
            throw new GeneralException('Unable to delete address of contact.');
        }
    }

    // fetch address of contact
    public function fetchContactAddresses($contact_id)
    {
        return Address::where('contact_id', $contact_id)->with('city', 'state', 'country')->get();
    }
}
