<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrainingJob;
use Carbon\Carbon;

class TrainingJobSeeder extends Seeder
{
    public function run()
    {
        // Sample training jobs for demo
        $jobs = [
            [
                'name' => 'Manufacturing QC Assistant',
                'model_type' => 'Qwen-4B',
                'dataset_name' => 'QC Procedures (2.1K samples)',
                'status' => 'running',
                'progress' => 67,
                'loss' => 0.0847,
                'epochs' => 3,
                'batch_size' => 8,
                'started_at' => Carbon::now()->subHours(2),
                'metrics' => [
                    'learning_rate' => '3e-4',
                    'current_epoch' => 2
                ]
            ],
            [
                'name' => 'Supplier Database Assistant',
                'model_type' => 'SmolLM-1.7B',
                'dataset_name' => 'Supplier Data (1.8K samples)',
                'status' => 'completed',
                'progress' => 100,
                'loss' => 0.0523,
                'accuracy' => 94.2,
                'epochs' => 3,
                'batch_size' => 8,
                'started_at' => Carbon::now()->subHours(4)->subMinutes(23),
                'completed_at' => Carbon::now()->subHours(3),
                'metrics' => [
                    'final_loss' => 0.0523,
                    'best_accuracy' => 94.2,
                    'total_epochs' => 3,
                    'learning_rate' => '3e-4'
                ]
            ],
            [
                'name' => 'HR Policy Assistant',
                'model_type' => 'Llama-3B',
                'dataset_name' => 'HR Policies (950 samples)',
                'status' => 'queued',
                'progress' => 0,
                'epochs' => 3,
                'batch_size' => 8,
                'metrics' => []
            ],
            [
                'name' => 'Customer Service Bot',
                'model_type' => 'DeepSeek-1.5B',
                'dataset_name' => 'Customer Inquiries (1.2K samples)',
                'status' => 'failed',
                'progress' => 15,
                'epochs' => 3,
                'batch_size' => 16,
                'started_at' => Carbon::yesterday(),
                'completed_at' => Carbon::yesterday()->addMinutes(12),
                'error_message' => 'Out of memory during epoch 1. Consider reducing batch size or using a smaller model variant.',
                'metrics' => [
                    'failed_at_epoch' => 1,
                    'memory_usage' => '98%'
                ]
            ],
            [
                'name' => 'Inventory Management Assistant',
                'model_type' => 'Qwen-1.5B',
                'dataset_name' => 'Inventory Records (3.2K samples)',
                'status' => 'completed',
                'progress' => 100,
                'loss' => 0.0612,
                'accuracy' => 91.8,
                'epochs' => 4,
                'batch_size' => 8,
                'started_at' => Carbon::now()->subDays(2),
                'completed_at' => Carbon::now()->subDays(2)->addHours(2)->addMinutes(45),
                'metrics' => [
                    'final_loss' => 0.0612,
                    'best_accuracy' => 91.8,
                    'total_epochs' => 4,
                    'learning_rate' => '3e-4'
                ]
            ]
        ];

        foreach ($jobs as $job) {
            TrainingJob::create($job);
        }
    }
}