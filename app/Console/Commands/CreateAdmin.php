<?php

namespace App\Console\Commands;

use App\Helpers\StringHelpers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-admin {--email=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating admin user for the specified email address';

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
    public function handle(): int
    {
        $email = $this->option('email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Invalid email address provided');
            return 1;
        }

        $password = $this->option('password') ?? StringHelpers::getRandomString();

        if (User::query()->where('email', $email)->first()) {
            $this->error('Admin user NOT created. User with provided email already exists');
            return 1;
        }

        $user = new User([
            'email' => $email,
            'name' => 'Administrator',
        ]);
        $user->password = Hash::make($password);
        $user->save();

        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
        $this->info('Admin user created. Password is: ' . $password);

        return 0;
    }
}
