<?php

declare(strict_types=1);

namespace App\Services\Company;

use App\Models\Company;

class UpdateCompany
{
    public function handle(Company $company, array $data): Company
    {
        $company->description = $data['description'] ?? null;
        $company->category_id = $data['category_id'];

        $company->save();

        return $company;
    }
}
