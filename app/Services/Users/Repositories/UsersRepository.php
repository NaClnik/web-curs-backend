<?php


namespace App\Services\Users\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersRepository
{
    public function createFromArray(array $data): User{
        return User::query()->create($data);
    } // createFromArray.

    public function getAll(){
        return User::all();
    } // getAll.

    public function getById(int $id){
        return User::query()->find($id);
    } // getById.

    public function update(User $user, array $data){
        $user->update($data);
    } // update.

    public function getByEmail(string $email){
        return User::query()->where('email', $email)->firstOrFail();
    } // getByEmailAndPassword.
} // UsersRepository.
