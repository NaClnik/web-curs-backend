<?php


namespace App\Services\Redirects\Handlers;


class GetRedirectUrlByRoleHandler
{
    // TODO: Написать маршруты для ролей.
    private array $rolesToUrl = [
        'admin' => '/admin',
        'employee' => '/employee'
    ]; // rolesToUrl.

    public function handle(string $role) : string
    {
        return $this->rolesToUrl[$role];
    } // handle.
} // GetRedirectUrlByRoleHandler.
