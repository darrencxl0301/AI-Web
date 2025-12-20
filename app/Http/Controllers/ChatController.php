<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Services\GoogleAIService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    protected $googleAI;

    public function __construct(GoogleAIService $googleAI)
    {
        $this->googleAI = $googleAI;
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
            'model_type' => 'required|string|in:manufacturing-qc,supplier-assistant,hr-policy'
        ]);

        $sessionId = $request->session()->getId();
        
        // Get AI response from Google AI Studio
        $result = $this->googleAI->chat($request->message, $request->model_type);
        
        if (!$result['success']) {
            return response()->json([
                'error' => $result['error']
            ], 500);
        }

        // Save conversation to database
        $conversation = Conversation::create([
            'model_name' => $request->model_type,
            'user_message' => $request->message,
            'ai_response' => $result['response'],
            'session_id' => $sessionId,
            'metadata' => $result['metadata']
        ]);

        return response()->json([
            'response' => $result['response'],
            'metadata' => $result['metadata'],
            'conversation_id' => $conversation->id
        ]);
    }

    public function getHistory(Request $request)
    {
        $sessionId = $request->session()->getId();
        
        $conversations = Conversation::where('session_id', $sessionId)
            ->orderBy('created_at', 'asc')
            ->limit(50)
            ->get();

        return response()->json($conversations);
    }

    public function clearHistory(Request $request)
    {
        $sessionId = $request->session()->getId();
        
        Conversation::where('session_id', $sessionId)->delete();
        
        return response()->json(['message' => 'History cleared']);
    }
}