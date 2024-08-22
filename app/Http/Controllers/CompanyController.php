<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function createCompany(Request $request)
    {
        $data = $request->only(['title', 'phone', 'description']);
        $userId = auth()->id(); // Припустимо, що користувач аутентифікований
        $company = $this->companyService->addCompanyForUser($data, $userId);
        return response()->json($company, 201);
    }

    public function getCompanies()
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userId = $user->id;
        $companies = $this->companyService->getCompaniesByUser($userId);

        if ($companies->isEmpty()) {
            return response()->json(['message' => 'No companies found for this user'], 404);
        }

        return response()->json($companies);
    }

}
