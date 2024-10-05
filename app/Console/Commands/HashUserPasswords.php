<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class HashUserPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:hash-user-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hashes the passwords of all users if not already hashed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            // $this->info("Before Hashing: {$user->password}");
            // $user->password = Hash::make($user->password);
            // $user->save();
            // $this->info("After Hashing: {$user->password}");

            if (!Hash::needsRehash($user->password)) {
                $this->info("{$user->name} have benn hashed");
                $this->info("\n");
                continue;
            }

            $this->info("Hashing {$user->name}");
            $this->info("From {$user->password}");

            $user->password = Hash::make($user->password);
            $user->save();

            $this->info("To {$user->password}");
            $this->info("\n");
        }

        $this->info('Successfully :D');
    }
}
