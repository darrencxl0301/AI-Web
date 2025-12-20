<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GoogleAIService
{
    protected $apiKey;
    protected $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models';

    public function __construct()
    {
        $this->apiKey = config('services.google_ai.api_key');
    }

    public function chat($message, $modelType = 'gemini-flash')
    {
        $startTime = microtime(true);
        
        try {
            $systemPrompt = $this->getSystemPrompt($modelType);
            

            $response = Http::timeout(30)
                ->withOptions(['verify' => false])
                ->post("{$this->baseUrl}/gemini-flash-latest:generateContent?key={$this->apiKey}", [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $systemPrompt . "\n\nUser: " . $message]
                            ]
                        ]
                    ]
                ]);

            $endTime = microtime(true);
            $responseTime = round(($endTime - $startTime) * 1000);

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    $aiResponse = $data['candidates'][0]['content']['parts'][0]['text'];
                    
                    return [
                        'success' => true,
                        'response' => $aiResponse,
                        'metadata' => [
                            'response_time' => $responseTime,
                            'model' => 'gemini-flash-latest',
                            'tokens_used' => $this->estimateTokens($message . $aiResponse)
                        ]
                    ];
                } else {
                    return [
                        'success' => false,
                        'error' => 'Unexpected response format: ' . json_encode($data)
                    ];
                }
            }

            $statusCode = $response->status();
            $responseBody = $response->body();
            
            return [
                'success' => false,
                'error' => "API request failed. Status: {$statusCode}, Response: {$responseBody}"
            ];

        } catch (\Exception $e) {
            Log::error('Google AI API Error: ' . $e->getMessage());
            
            return [
                'success' => false,
                'error' => 'Service temporarily unavailable: ' . $e->getMessage()
            ];
        }
    }

    protected function getSystemPrompt($modelType)
    {
        $prompts = [
            'manufacturing-qc' => "You are a Manufacturing Quality Control Assistant trained on quality control procedures and standards. You help with process questions, standards verification, and troubleshooting guidance. Respond professionally and provide specific, actionable information about quality control processes, material specifications, and testing procedures. When possible, reference specific procedures like 'QC-Bear-2024' and include technical details like tolerances, testing frequencies, and equipment specifications.",
            
            'supplier-assistant' => "You are a Supplier Database Assistant that helps find supplier information, contact details, and procurement data. You have access to supplier databases and can provide contact information, lead times, payment terms, and pricing details. Respond with specific supplier information including company names, contact persons, phone numbers, and business terms when asked about suppliers or procurement.",
            
            'hr-policy' => "You are an HR Policy Assistant that answers questions about employee policies, procedures, and company guidelines. You help with leave policies, working hours, benefits, and HR procedures. Provide clear, accurate information about company policies and employee entitlements, referencing specific policy numbers or handbook sections when relevant.",
            
            'default' => "You are a helpful business AI assistant designed for small and medium enterprises. Provide professional, accurate, and practical responses to business-related questions."
        ];

        return $prompts[$modelType] ?? $prompts['default'];
    }

    protected function estimateTokens($text)
    {
        return ceil(str_word_count($text) * 1.3);
    }
}