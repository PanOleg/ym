<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    protected CompanyRepository $companyRepo;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepo = $companyRepo;
    }

    public function addCompanyForUser(array $data, int $userId): \App\Models\Company
    {
        $data['user_id'] = $userId;
        return $this->companyRepo->create($data);
    }

    public function getCompaniesByUser(int $userId)
    {
        return $this->companyRepo->getAllByUserId($userId);
    }
}
