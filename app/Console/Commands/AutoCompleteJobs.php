<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutoCompleteJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-complete-jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $runningJobs = \App\Models\TrainingJob::where('status', 'running')->get();

        foreach ($runningJobs as $job) {
            if ($job->remaining_seconds <= 0) {
                $job->update([
                    'status' => 'completed',
                    'progress' => 100,
                    'fine_tuned_model_path' => 'models/fine-tuned/' . $job->job_name . '-' . time()
                ]);
                $this->info("Job #{$job->id} ({$job->job_name}) has been marked as COMPLETED.");
            }
        }
    }
}
