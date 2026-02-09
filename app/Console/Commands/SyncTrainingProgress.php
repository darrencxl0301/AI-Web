<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncTrainingProgress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-training-progress';

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
            $progress = $job->calculateProgress();
            
            if ($progress >= 99) {
                $job->update([
                    'status' => 'completed',
                    'progress' => 100,
                    'completed_at' => now(),
                ]);
                $this->info("Job #{$job->id} marked as COMPLETED.");
            } else {
                $job->update(['progress' => $progress]);
            }
        }
    }
}
