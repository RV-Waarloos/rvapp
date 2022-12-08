<?php

namespace App\Imports;

use App\Models\Rv\ClubMemberOnboarding;
use App\Models\Rv\Department;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;
use App\Models\Rv\OnboardingStatus;
use App\Models\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class ClubMemberOnboardingImport implements ToModel, WithHeadingRow, WithValidation //, WithBatchInserts
{
    private $rows = 0;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ++$this->rows;

        // $dd = Department::where('name', $row['afdeling'])->first();

        return new ClubMemberOnboarding([
            'firstname' => $row['voornaam'],
            'lastname' => $row['achternaam'],
            'email' => $row['email'],
            'initiator_id' => Auth::id(),
            'department_id' => Department::where('name', $row['afdeling'])->first()->id,
            'status' => OnboardingStatus::WaitRegistration->value,
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
        return [
            'email' => function($attribute, $value, $onFailure)
            {
                if (User::where('email', $value)->exists()) {
                    $onFailure('Lid met email adres: ' . $value . ' bestaat al.');
                }

                if (ClubMemberOnboarding::where('email', $value)
                        ->where('status', OnboardingStatus::WaitRegistration->value)
                        ->exists()) {
                    $onFailure('Registratie voor nieuw lid met email adres: ' . $value . ' bestaat al (of dubbel email adres in bestand).');
                }
            }
        ];
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
