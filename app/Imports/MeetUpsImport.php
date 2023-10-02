<?php

namespace App\Imports;

use App\Models\MeetUp;
use Maatwebsite\Excel\Concerns\ToModel;

class MeetUpsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MeetUp([
            'title' => $row[0],
            'Start Date'=>$row[1],
            'End Date'=>$row[2],
            'Creator'=>$row[3],
        ]);
    }
}
