<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @var Post
     */
    protected $post;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getAllUsers()
    {
        return $this->user->paginate();
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function deleteUser($id){
        return User::destroy($id);
    }

    public function createUser(array $userDetails)
    {
        return User::create($userDetails);
    }

    public function updateUser($id, array $newDetails)
    {
           $user =  User::where('id',$id)->first();
           $user->update($newDetails);
           return $user;
    }
}
