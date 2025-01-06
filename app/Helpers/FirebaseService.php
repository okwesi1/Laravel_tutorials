<?php
namespace App\Helpers;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class FirebaseService
{
    protected $firebase;

    public function __construct()
    {
        $this->firebase = (new Factory())
            ->withServiceAccount(storage_path('app/firebase/mcini-mobile-app-firebase-adminsdk-58wzp-8518450fca.json'))
            ->createMessaging();
    }

    public function sendSingleNotification($token, $title, $body)
    {
        //! Single notification
        $message = CloudMessage::new()
        ->toToken($token)
            ->withNotification([
                'title' => $title,
                'body' => $body,
            ])
            ->withData([
                'extra_data' => 'Some extra data', // Optional data payload
            ]);
        try {
            // Send single notification
            $this->firebase->send($message);
            $this->firebase->sendMulticast($message, $token);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function sendMultipleNotification($tokens, $title, $body)
    {
        //! multiple notifications
        $message = CloudMessage::new()
            ->withNotification([
                'title' => $title,
                'body' => $body,
            ])
            ->withData([
                'extra_data' => 'Some extra data', // Optional data payload
            ]);
        try {
            // Send multiple notifications
            $this->firebase->sendMulticast($message, $tokens);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
