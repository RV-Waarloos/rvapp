<?php

namespace App\Imports;

use App\Models\Rv\ClubMember;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;

// class ClubMembersImport implements ToModel
class ClubMembersImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $cm = new ClubMember([
            'firstname'     => $row[0],
            'lastname'     => $row[1],
            'email'    => $row[2],
            'password' => Hash::make('password')
        ]);
        return $cm;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $cm = new ClubMember([
                'firstname'     => $row[0],
                'lastname'     => $row[1],
                'email'    => $row[2],
                'password' => Hash::make('password')
            ]);
        }
    }
}
