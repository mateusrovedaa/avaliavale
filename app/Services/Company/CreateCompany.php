<?php

declare(strict_types=1);

namespace App\Services\Company;

use App\Models\Company;
use Illuminate\Http\UploadedFile;

class CreateCompany
{
    public function handle(array $data): Company
    {
        /** @var UploadedFile|null $logo */
        $logo = $data['logo'] ?? null;

        $company = new Company;
        $company->name = $data['name'];
        $company->description = $data['description'] ?? null;
        $company->category_id = $data['category_id'];
        $company->logo = $logo ? base64_encode(file_get_contents($logo->path())) : null;

        $company->save();

        return $company;
    }
}
