<?php

namespace App\Imports;

use App\Userstable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsersImport implements WithMultipleSheets//, ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
//    public function model(array $row)
//    {
//        return new Userstable([
//            'name' => $row[0],
//            'middlename' => $row[1],
//            'lastname' => $row[2],
//            'number' => $row[3]
//        ]);
//    }

    public function sheets(): array
    {
        return [
            0 => new FirstSheetImport(),
            1 => new SecondSheetImport()
        ];
    }
}
