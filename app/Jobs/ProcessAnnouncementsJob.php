<?php

namespace App\Jobs;

use App\Contracts\INotificationService;
use App\Models\System\Announcement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

class ProcessAnnouncementsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue;

    public function handle(): void
    {
        $announcements = Announcement::where('publish_at', '<=', now())
            ->where('is_sent', false)
            ->get();

        foreach ($announcements as $announcement) {
            app(INotificationService::class)->broadcast(
                $announcement->target_roles,
                $announcement->body
            );

            $announcement->is_sent = true;
            $announcement->save();
        }
    }
}
