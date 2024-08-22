<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function create(array $data): Company
    {
        return Company::create($data);
    }

    public function getAllByUserId(int $userId)
    {
        return Company::where('user_id', $userId)->get();
    }
}
