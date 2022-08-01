<?php

namespace App\Console\Commands;

use App\Events\UserFavouriteColorUpdated;
use Illuminate\Console\Command;

class UsersFavouriteColor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates users fav color';

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
        $colors= ['Red', 'Green', 'Blue', 'Orange', 'Yellow'];
        $user= \App\Models\User::find(1);
        $user->update(['favourite_color->color'=> $colors[array_rand($colors)]]);
        UserFavouriteColorUpdated::dispatch($user);
        echo $user->favourite_color['color'];
        return 0;
    }
}
