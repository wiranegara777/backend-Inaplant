<?php
namespace App\Exports;

use App\Laporan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class LaporansExport implements FromQuery
{
    use Exportable;

    public function __construct(int $id_group_farm)
    {
        $this->id_group_farm = $id_group_farm;
    }

    public function query()
    {
        return Laporan::query()->where('id_group_farm', $this->id_group_farm);
    }
}