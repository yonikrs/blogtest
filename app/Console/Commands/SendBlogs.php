<?php

namespace App\Console\Commands;

use App\Mail\BlogMail;
use App\Models\Blog;
use App\Models\Site;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:blogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to send blogs to the users';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $users = User::all();

        $sites = Site::all();
        foreach ($sites as $site) {
            $blogs = $site->blogs;

            foreach ($blogs as $blog) {
                foreach ($users as $user) {
                    if (!$blog->users->contains($user)) {
                        $blog->users()->attach($user->id);
                        Mail::to($user)->send(new BlogMail($blog));
                    }
                }
            }
        }
    }
}
