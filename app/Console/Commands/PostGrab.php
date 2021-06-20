<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PostGrab extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:get-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets latest posts from remote source and saves to the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Scheduled task running ' . now());
        $response = Http::get(config('app.remote_post_url'));
        $posts = [];
        if($response->successful()) {
            $posts = $response['data'];
            $adminUser = User::where([
                ['name', config('app.admin.admin_name')],
                ['email', config('app.admin.admin_email')]
            ])->first();
            if(count($posts) > 0) {
                $adminUser->posts()->createMany($posts);
            }
        }
        $this->info('Scheduled task has run: ' . now() . ' - ' . count($posts) . ' inserted');
    }
}
