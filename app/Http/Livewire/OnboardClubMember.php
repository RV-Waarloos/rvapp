<?php

namespace App\Http\Livewire;

use App\Events\ClubMemberOnboardingStarted;
use App\Models\Rv\ClubMemberOnboarding;
use App\Models\Rv\Department;
use App\Models\Rv\OnboardingStatus;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;


class OnboardClubMember extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms; 

    // public $email;
    // public $firstname;
    // public $lastname;
    // public $department;

    public ClubMemberOnboarding $ob;

    public function mount(): void 
    {
        $this->form->fill();
    } 

    protected function getFormSchema(): array
    {

        return [
            Card::make()->columns(2)
            ->schema([
                Forms\Components\TextInput::make('firstname')->required()->minLength(1)->maxLength(64)->label('Voornaam'),
                Forms\Components\TextInput::make('lastname')->required()->minLength(2)->maxLength(32)->label('Achternaam'),
                Forms\Components\TextInput::make('email')->email()->required()->label('Email')->unique(table: User::class),
                Forms\Components\Select::make('department_id')
                    ->options(Department::orderedNamesAndIds())
                    ->required()
                    ->label('Afdeling')
    
            ])

        ];


        // return [
        //     Forms\Components\TextInput::make('firstname')->required()->minLength(1)->maxLength(64)->label('Voornaam'),
        //     Forms\Components\TextInput::make('lastname')->required()->minLength(2)->maxLength(32)->label('Achternaam'),
        //     Forms\Components\TextInput::make('email')->email()->required()->label('Email'),
        //     Forms\Components\Select::make('department_id')
        //         ->options(Department::orderedNamesAndIds())
        //         ->required()
        //         ->label('Afdeling')

        // ];
    }

    protected function getFormModel(): string
    {
        return ClubMemberOnboarding::class;
    }

    public function submit(): void
    {
        $attrs = $this->form->getState();
        $attrs['initiator_id'] = Auth::id();
        $attrs['status'] = OnboardingStatus::WaitRegistration->value;;

        $onboarding = ClubMemberOnboarding::create($attrs);

        ClubMemberOnboardingStarted::dispatch($onboarding);
    }

    public function create(): void
    {
        $xx = $this->form->getState();
    }


    public function render()
    {
        return view('livewire.onboard-club-member');
    }
}


