<?php


namespace App\Services;

use App\Jobs\SendEmailQueueJob;
use App\Models\User;
use App\Repositories\UserRepository;


class UserService
{
    /**
     * @var $userRepository
     */
    protected $userRepository;

    /**
     * PostService constructor.
     *
     * @param userRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function getUserById($id)
    {
         return $this->userRepository->getUserById($id);
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);

    }

    public function createUser(array $userDetails)
    {
        dispatch(new SendEmailQueueJob($userDetails['email']));
        return $this->userRepository->createUser($userDetails);
    }

    public function updateUser($id, array $newDetails)
    {
       return $this->userRepository->updateUser($id,$newDetails);

    }
}
