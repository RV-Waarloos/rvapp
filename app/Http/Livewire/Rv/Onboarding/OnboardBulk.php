<?php

namespace App\Http\Livewire\Rv\Onboarding;

use App\Imports\ClubMemberOnboardingImport;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class OnboardBulk extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $attachment;
    public $failureMessages;

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('attachment')
                ->disk('local')
                ->directory('onboarding')
                ->visibility('private'),
        ];
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        try {
            $this->failureMessages = null;

            $import = new ClubMemberOnboardingImport;
            Excel::import($import, $data['attachment'], 'local');
            $this->failureMessages[] = 'Registratie van ' . $import->getRowCount() . ' nieuwe leden gestart.';
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $failure) {
                $row = $failure->row(); // row that went wrong
                $attr = $failure->attribute(); // either heading key (if using heading row concern) or column index
                $error = $failure->errors()[0]; // Actual error messages from Laravel validator
                $value = $failure->values()[$attr]; // The values of the row that has failed.
                $this->failureMessages[] = 'Lijn ' . $row . ' email: ' . $value . ' ' . $error;
            }
        }


        Storage::delete($data['attachment']);
        $this->attachment = null;
    }

    public function render(): View
    {
        return view('livewire.rv.onboarding.onboard-bulk');
    }
}
