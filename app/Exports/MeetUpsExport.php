<?php

namespace App\Exports;

use App\Models\MeetUp;
use Maatwebsite\Excel\Concerns\FromCollection;

class MeetUpsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MeetUp::select('title','start_date','end_date','user_id')->get();
    }

    public function headings():array
    {
        return[
            'Title',
            'Start Date',
            'End Date',
            'Creator',
        ];

    }
}
