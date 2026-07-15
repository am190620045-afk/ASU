<?php

namespace ASU\Admin\Dashboard;

use ASU\Core\Services\SecurityService;

class DashboardController
{
    public function __construct(private SecurityService $security)
    {
    }

    public function index(): array
    {
        return [
            'title' => 'ASU Admin Dashboard',
            'users' => $this->security->users(),
            'roles' => $this->security->roles(),
            'permissions' => $this->security->permissions(),
        ];
    }
}
