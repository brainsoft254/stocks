<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportAgingAnalysis implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithProperties
{

    private $details;
    private $headers;
    public function  __construct($details, $headers)
    {
        $this->details = $details;
        $this->headers = $headers;
    }

    public function properties(): array
    {
        return [
            'title'          => 'Client Aging Analaysis',
            'period'    => 'Period: xxx',
        ];
    }

    public function headings(): array
    {
        return array_slice($this->headers, 1);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->details;
    }

    public function styles(Worksheet $sheet)
    {


        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],


        ];
    }
}