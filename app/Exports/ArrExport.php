<?php

namespace App\Exports;

use App\Models\Beneficiary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArrExport implements FromCollection//, WithHeadings
{
     protected $header;
     protected $invoices;
    function __construct(array $invoices)
    {
        $this->invoices = $invoices;
                    //$this->header = $header;

    }
    public function collection()
    {
        return $this->invoices->all();
    }
    /*public function headings(): array
    {
        return $this->header;//["#", "الإسم", "تاريخ الإدخال", "تاريخ التعديل", "رقم الهوية", "المنطقه", "هوية الشريك", "إسم الشريك", "إسم المشروع", "المؤوسسه", "الممول", "الميزانية", "العملة", "تاريخ الإستفاده", "نوع المشروع", "الكشف" ];
    }*/
}
