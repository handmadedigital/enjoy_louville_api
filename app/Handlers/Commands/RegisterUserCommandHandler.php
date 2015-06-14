<?php

namespace ThreeAccents\Handlers\Commands;

use ThreeAccents\Commands\RegisterUserCommand;
use Illuminate\Queue\InteractsWithQueue;
use ThreeAccents\Users\Entities\User;
use ThreeAccents\Users\Repositories\UserRepository;

class RegisterUserCommandHandler
{
    /**
     * @var UserRepository
     */
    protected $userRepo;

    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Handle the command.
     *
     * @param  RegisterUserCommand  $command
     * @return void
     */
    public function handle(RegisterUserCommand $command)
    {
        $user = User::register($command->getUsername(), $command->getEmail(), $command->getFirstName(), $command->getLastName(), $command->getPassword(), $command->getPhoneNumber());

        $this->userRepo->persist($user);
    }
}
