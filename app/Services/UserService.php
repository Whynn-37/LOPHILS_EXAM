<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Class UserService
{

    public function __construct()
    {
        $this->UserRepository= new UserRepository();
    }
    public function loadUsers()
    {
       return $this->UserRepository->loadUsers();
    }
    public function editUser($id)
    {
       return $this->UserRepository->editUser($id);
    }
    public function createUser($data)
    {
       return $this->UserRepository->createUser($data);
    }
    public function delete($id)
    {
       return $this->UserRepository->delete($id);
    }
    public function updateUser($data,$id)
    {
       return $this->UserRepository->updateUser($data,$id);
    }
    public function updateorcreate($data)
    {
       return $this->UserRepository->updateorcreate($data);
    }

}