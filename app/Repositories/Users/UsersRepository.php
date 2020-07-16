<?php

namespace App\Repositories\Users;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UsersRepository.
 *
 * @package namespace App\Repositories\Users;
 */
interface UsersRepository extends RepositoryInterface
{
    public function getUsers();

    public function getRoles();

    public function createUser($data);

    public function updateUser($data, $id);

    public function createCustomer($data);

    public function login($user);
}
