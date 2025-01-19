<?php

namespace App\Imports;

use App\Models\live_account;
use App\Models\NamaModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportExcel implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new live_account([
            'email' => $row['email'],
            'nrp' => $row['nrp'],
            'role_account' => $row['role_account'],
            'is_active' => $row['is_active'],
        ]);
    }
}
