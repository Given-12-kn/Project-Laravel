<?php

namespace App\Imports;

use App\Models\NamaModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportExcel implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ImportExcel([
            'email' => $row[0],
            'nrp' => $row[1],
            'role_account' => $row[2],
            'is_active' => $row[3],
        ]);
    }
}
