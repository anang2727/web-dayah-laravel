<?php

namespace App\Exports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class SantriExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    public function query()
    {
        return Santri::query();
    }

    public function map($santri): array
    {
        return [
            // $invoice->invoice_number, /model tanpa relasi
            // $invoice->user->name,/model dengan relasi

            $santri->id,
            $santri->image,
            $santri->nama_santri,
            $santri->alamat,
            $santri->nik,
            $santri->no_kk,
            $santri->tgl_lahir,
            $santri->nama_ayah,
            $santri->nama_ibu,
            $santri->tgl_masuk,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Foto',
            'Nama',
            'Alamat',
            'Nik',
            'No KK',
            'Tgl Lahir',
            'Nama Ayah',
            'Nama Ibu',
            'Tgl Masuk',
        ];
    }

    public function export()
    {
        return (new SantriExport)->download('santri-' . Carbon::now()->format('Ymd') . '.xlsx');
    }
}
