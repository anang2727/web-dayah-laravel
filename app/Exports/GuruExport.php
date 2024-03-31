<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class GuruExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    public function query()
    {
        return Guru::query();
    }

    public function map($guru): array
    {
        return [
            // $invoice->invoice_number, /model tanpa relasi
            // $invoice->user->name,/model dengan relasi

            $guru->id,
            $guru->image,
            $guru->nama_santri,
            $guru->alamat,
            $guru->n_ktp,
            $guru->no_kk,
            $guru->pekerjaan,
            $guru->pendidikan_terakhir,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Foto',
            'Nama',
            'Alamat',
            'No Ktp',
            'No KK',
            'Pekerjaan',
            'Pendidikan Terakhir',
        ];
    }

    public function export()
    {
        return (new GuruExport)->download('Guru-' . Carbon::now()->format('Ymd') . '.xlsx');
    }
}
