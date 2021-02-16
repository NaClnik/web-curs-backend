<?php


namespace App\Services\Redirects;


use App\Services\Redirects\Handlers\GetRedirectUrlByRoleHandler;

class RedirectsService
{
    // Хэндлеры.
    private GetRedirectUrlByRoleHandler $getRedirectUrlByRoleHandler;

    public function __construct(GetRedirectUrlByRoleHandler $getRedirectUrlByRoleHandler)
    {
        $this->getRedirectUrlByRoleHandler = $getRedirectUrlByRoleHandler;
    } // __construct.

    public function getRedirectUrlByRole(string $role)
    {
        return $this->getRedirectUrlByRoleHandler->handle($role);
    } // getRedirectUrlByRole.
} // RedirectsService.
