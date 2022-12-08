<?php

namespace App\Http\Livewire;

use App\Models\Rv\ClubMemberOnboarding;
use App\Models\Rv\OnboardingStatus;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class OnboardingList extends Component implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return ClubMemberOnboarding::query();
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'created_at';
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('created_at')->date()->sortable()->label('Gestart op'),
            Tables\Columns\TextColumn::make('initiator.name')->label('Aanvrager'),

            Tables\Columns\TextColumn::make('firstname')->label('Voornaam'),
            Tables\Columns\TextColumn::make('lastname')->label('Acternaam'),
            Tables\Columns\TextColumn::make('email')->label('Email')->sortable(),
            Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'danger' => 'Cancelled',
                    'warning' => 'Wacht op registratie',
                    'success' => 'Geregistreerd',
                ]),
            Tables\Columns\TextColumn::make('updated_at')->date()->label('Laatse wijziging'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            // Tables\Filters\Filter::make('published')
            //     ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'Afgebroken' => 'Afgebroken',
                    'Wacht op registratie' => 'Wacht op registratie',
                    'Geregistreerd' => 'Geregistreerd',
                    'Wacht op start' => 'Wacht op start',
                ]),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('Afbreken')
                ->action(function (ClubMemberOnboarding $record) {
                    $record->status = OnboardingStatus::Cancelled;
                    $record->save();
                })
                ->visible(fn (ClubMemberOnboarding $record): bool => $record->status == OnboardingStatus::WaitRegistration),
            Tables\Actions\Action::make('Mailen')
                ->action(function (ClubMemberOnboarding $record) {
                })
                ->visible(fn (ClubMemberOnboarding $record): bool => $record->status == OnboardingStatus::WaitRegistration),
        ];
    }

    public function render(): View
    {
        return view('livewire.onboarding-list');
    }
}
