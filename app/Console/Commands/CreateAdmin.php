<?php

namespace App\Console\Commands;

use App\Helpers\StringHelpers;
use App\Models\Role;
use App\Services\Role\RoleProvider;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

        /**
         * @var Role $role
         */
        $adminRole = RoleProvider::getAdminRole();
        
        if (!$adminRole) {
            $this->error('Cannot find admin role. Run a migration first.');
            return 1;
        }

        $userService = new UserService();
        
        $password = $this->option('password') ?? StringHelpers::getRandomString();

        $user = $userService->createUser([
            'email' => $email,
            'name' => 'Administrator',
            'role_id' => $adminRole->id,
            'password' => Hash::make($password)
        ]);

        if (!$user) {
            $this->error('Admin user NOT created. Check if user with provided email already exists');
            return 1;
        }

        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
        $this->info('Admin user created. Password is: ' . $password);

        return 0;
    }
}
