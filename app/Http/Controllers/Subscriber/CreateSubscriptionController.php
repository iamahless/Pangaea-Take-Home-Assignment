<?php

namespace App\Http\Controllers\Subscriber;

use App\Http\Controllers\Controller;
use App\Pangaea\Subscriber;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\Validator;

class CreateSubscriptionController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'url'   => 'required|max:255'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => 'error',
                    'message' => $validator->errors()
                ], 422);
            }

            $data = [
                'url'   => $request->url,
                'topic' => $request->topic
            ];

            Subscriber::createNewSubscription($data);

            return response()->json($data, 201);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
