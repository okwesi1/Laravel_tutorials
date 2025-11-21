<?php

use App\Helpers\FirebaseService;
use App\Notifications\CustomFirebaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Fcm\FcmMessage;
// use NotificationChannels\Fcm\Resources\Notification;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('test', function () {
    try {
        $multiple_tokens = ["fR9k1VS4TeaKEUFIYwIg7_:APA91bHYZP6qkhpyGUyIRZo5mHUEVJVi7c2TqnoHgb0z73F20xTPYnHe2OcnTOLa1tawOVFY5nKinKx4NIeb8eghnThRMFxGWPpQXAjmzEbqW9ZObrFPjac", "hjjhjhjh"];

        // Notification::route('fcm', $user_token)
        // ->notify(new CustomFirebaseNotification('FIRST PUSH NOTIFICATION', 'Hello world'));

        $firebaseService = new FirebaseService();
        $firebaseService->sendMultipleNotification($multiple_tokens, 'Test Title', 'Test Body');

        $response = [
            'success' => 'true',
            'message' => 'Token found',
            'token' => $multiple_tokens
        ];

        return json_encode($response, JSON_FORCE_OBJECT);
        // return response()->json([
        //     'success' => 'true',
        //     'message' => 'Token found',
        //     'token' => json_encode($multiple_tokens, JSON_FORCE_OBJECT)
        // ]);
    } catch (\Throwable $th) {
        return response()->json([
            'success' => 'false',
            'message' => $th->getMessage() . ', Line: ' . $th->getLine(),
        ]);
    }
});
