<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use App\Pangaea\Subscriber;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\Validator;
use Spatie\WebhookServer\WebhookCall;

class PublishMessageController extends Controller
{
    public function publish(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                '*'   => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => 'error',
                    'message' => $validator->errors()
                ], 422);
            }

            $subscribers = Subscriber::getSubscribersByTopic($request->topic);

            if ($subscribers) {
                foreach ($subscribers as $subscriber) {
                    WebhookCall::create()
                        ->url($subscriber->url)
                        ->payload([
                            "topic" => $request->topic,
                            "data"  => $request->all()
                            ])
                        ->useSecret('pangaea-secret')
                        ->dispatch();
                }
            }

            $data = [
                'message'   => count($subscribers) .' Subscribers were notified',
                "data" => $request->all()
            ];

            return response()->json($data, 200);
        } catch (\JsonException $e) {
            return response()->json([], 400);
        }
    }
}
