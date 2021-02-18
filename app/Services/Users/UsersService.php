<?php


namespace App\Services\Users;


use App\Mail\AuthUserMail;
use App\Models\User;
use App\Services\Users\Handlers\HireUserAndSendMailHandler;
use App\Services\Users\Repositories\UsersRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsersService
{
    // Поля класса.
    private UsersRepository $usersRepository;

    // Хэндлеры класса.
    private HireUserAndSendMailHandler $hireUserAndSendMailHandler;

    public function __construct(UsersRepository $usersRepository, HireUserAndSendMailHandler $hireUserAndSendMailHandler)
    {
        $this->usersRepository = $usersRepository;
        $this->hireUserAndSendMailHandler = $hireUserAndSendMailHandler;
    } // __construct.

    public function createUserFromArray(array $data): User
    {
        return $this->usersRepository->createFromArray($data);
    } // createUserFromArray.

    public function hireUserAndSendMail(array $data)
    {
        $this->hireUserAndSendMailHandler->handle($data);
    } // hireUserAndSendMail.

    public function getAllUsers(){
        return $this->usersRepository->getAll();
    } // getAllUsers.

    public function getUserById(int $id){
        return $this->usersRepository->getById($id);
    } // getUserById.

    public function updateUser(User $user, array $data)
    {
        $this->usersRepository->update($user, $data);
    } // updateUser.

    public function getUserByEmailAndPassword(string $email, string $password) : User
    {
        $user = $this->usersRepository->getByEmail($email);

        // TODO: Проверить на работоспособность.
        if(!Hash::check($password, $user->password)){
            throw new AuthorizationException('invalid password');
        } // if.

        return $user;
    } // getUserByEmailAndPassword.

} // UsersService.
