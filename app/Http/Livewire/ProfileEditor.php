<?php

namespace App\Http\Livewire;

use App\Models\Rv\ClubMember;
use App\Models\Rv\ClubMemberOnboarding;
use App\Models\Rv\OnboardingStatus;
use App\Models\Rv\Profile;
use App\Models\User;
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

class ProfileEditor extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public ClubMemberOnboarding $onboarding;
    public bool $isOnboarding;

    public function mount(): void
    {
        if ($this->isOnboarding) {

            $this->form->fill([
                'firstname' => $this->onboarding->firstname,
                'lastname' => $this->onboarding->lastname,
                'email' => $this->onboarding->email,
            ]);
        }
    }

    protected function getFormSchema(): array
    {

        $wz = Wizard::make([
            Wizard\Step::make('Persoonsgegevens')
                ->schema([
                    Forms\Components\TextInput::make('firstname')->required()->minLength(1)->maxLength(32)->label('Voornaam'),
                    Forms\Components\TextInput::make('lastname')->required()->minLength(2)->maxLength(32)->label('Achternaam'),
                    Forms\Components\TextInput::make('email')->email()->required()->label('Email')->unique(table: User::class),
                    Forms\Components\DatePicker::make('profile.birthdate')->displayFormat('d/m/Y')->label('Geboortedatum')
                ]),
            Wizard\Step::make('Adresgegevens')
                ->schema([
                    Forms\Components\TextInput::make('streetandnumber')->maxLength(64)->label('Straat en nummer'),
                    Forms\Components\TextInput::make('zipcode')->numeric()->mask(
                        fn (TextInput\Mask $mask) => $mask
                            ->numeric()
                            ->decimalPlaces(0)
                            ->integer()
                            ->minValue(1000)
                            ->maxValue(9999)
                    )->label('Postcode'),
                    Forms\Components\TextInput::make('city')->maxLength(32)->label('Gemeente'),
                    Forms\Components\TextInput::make('phone')->tel()->label('Telefoon'),

                ]),
            Wizard\Step::make('Privacy akkoord')
                ->schema([
                    Forms\Components\TextInput::make('password')->required()->password()->minLength(6)->maxLength(32)->confirmed()->label('Paswoord'),
                    Forms\Components\TextInput::make('password_confirmation')->required()->password()->minLength(6)->maxLength(32)->label('Herhaal paswoord'),

                ]),
        ]);



        return  [$wz];
    }


    public function submit()
    {
        $attrs = $this->form->getState();
        // $attrs['initiator_id'] = Auth::id();
        // $attrs['status'] = OnboardingStatus::WaitRegistration->value;;

        $attrs['password'] = Hash::make($attrs['password']);

        $cm = ClubMember::create($attrs);
        $cm->profile()->create($attrs['profile']);

        if ($this->isOnboarding) {
            $this->onboarding->status = OnboardingStatus::Registered;
            $this->onboarding->save();
        }

        return redirect()->route('home')->with('statusflash', 'Je account is geactiveerd. Je kan nu inloggen.');
    }


    public function render()
    {
        return view('livewire.profile-editor');
    }
}