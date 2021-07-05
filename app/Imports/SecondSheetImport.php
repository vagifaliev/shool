<?php


namespace App\Imports;


use Illuminate\Support\Collection;

class SecondSheetImport implements \Maatwebsite\Excel\Concerns\ToCollection
{

    /**
     * @inheritDoc
     */
    public function collection(Collection $collection)
    {
        dd($collection);
    }
}
