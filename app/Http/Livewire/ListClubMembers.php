<?php

namespace App\Http\Livewire;

use App\Models\Rv\ClubMember;
use App\Models\Rv\ClubMembership;
use App\Models\Rv\ClubMembershipStatus;
use App\Models\Rv\ClubMemberWithMembership;
use App\Models\Rv\Department;
use App\Models\Rv\Season;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;
use Filament\Tables\Filters\Layout;
use Filament\Tables\Filters\SelectFilter;

class ListClubMembers extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public function render()
    {
        return view('livewire.list-club-members');
    }

    protected function getTableQuery(): Builder
    {
            // $se = 2021;

        // return ClubMember::with([
        //     'clubmemberships' => function ($query) use($se){
        //         $query->whereRelation('season', 'year', "=" , $se);
        //     },
        //     'clubmemberships.department',
        //     'clubmemberships.season'
        // ])
        // ->whereHas('clubmemberships', function ($query) use($se){
        //     $query->whereRelation('season', 'year', "=" , $se);
        // })
        // ->orderBy('lastname');

        return ClubMemberWithMembership::orderBy('lastname');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('firstname'),
            Tables\Columns\TextColumn::make('lastname'),
            Tables\Columns\TextColumn::make('email'),
            // Tables\Columns\TextColumn::make('birthdate')->date('d-m-Y')->label('Geboortedatum'),
            // Tables\Columns\TextColumn::make('streetandnumber')->label('Adres'),
            // Tables\Columns\TextColumn::make('zipcode')->label('Postcode'),
            Tables\Columns\TextColumn::make('city')->label('Gemeente'),
            // Tables\Columns\TextColumn::make('phone')->label('Telefoon'),
            Tables\Columns\TextColumn::make('departmentname')->label('Afdeling'),
            Tables\Columns\TextColumn::make('year')->label('Seizoen'),
            Tables\Columns\TextColumn::make('membershipstatus')->enum([0 => 'Pending', 1 => 'Active'])->label('Status'),

        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('Afdeling')
            ->options(array_combine(Department::orderedNames(),Department::orderedNames()))
            ->attribute('departmentname'),

            SelectFilter::make('Seizoen')
            ->options(array_combine(Season::orderedYears(), Season::orderedYears()))
            ->attribute('year')->default(date('Y'))
        ];
    }

    protected function getTableFiltersLayout(): ?string
    {
        return Layout::AboveContent;
    }
}
