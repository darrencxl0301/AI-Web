<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\BaseModel;

class BaseModelSeeder extends Seeder
{
    public function run(): void
    {
        $models = [
            [
                'name' => 'DeepSeek R1 (Distill)',
                'slug' => 'deepseek-r1-distill',
                'provider' => 'DeepSeek',
                'description' => 'High performance reasoning model, optimized for logic and coding tasks.'
            ],
            [
                'name' => 'Qwen 2.5 (72B)',
                'slug' => 'qwen-2.5-72b',
                'provider' => 'Alibaba Cloud',
                'description' => 'Balanced performance for general purpose tasks and multilingual support.'
            ],
            [
                'name' => 'Llama 3 (8B)',
                'slug' => 'llama-3-8b',
                'provider' => 'Meta',
                'description' => 'Lightweight model suitable for fast fine-tuning on smaller datasets.'
            ]
        ];

        foreach ($models as $model) {
            BaseModel::create($model);
        }
    }
}