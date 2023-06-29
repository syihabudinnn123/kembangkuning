<?php
namespace App\Exports;
use App\Warga;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class WargaReport implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('excel.warga', [
            'warga' => Warga::all()
        ]);
    }
}
