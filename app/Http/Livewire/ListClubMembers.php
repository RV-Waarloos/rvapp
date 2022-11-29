<?php

namespace App\Http\Livewire;

use App\Models\Rv\ClubMember;
use App\Models\Rv\ClubMembership;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class ListClubMembers extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public function render()
    {
        return view('livewire.list-club-members');
    }

    protected function getTableQuery(): Builder
    {
        // return ClubMember::query();

        // return ClubMember::whereHas('clubmemberships', function (Builder $query){
        //     $query->whereRelation('season', 'year', "=" , 2022);
        // });

            $se = 2021;

        return ClubMember::with([
            'clubmemberships' => function ($query) use($se){
                $query->whereRelation('season', 'year', "=" , $se);
            },
            'clubmemberships.department',
            'clubmemberships.season'
        ])
        ->whereHas('clubmemberships', function ($query) use($se){
            $query->whereRelation('season', 'year', "=" , $se);
        })
        ->orderBy('lastname');

        // return ClubMembership::with('clubmember')->whereRelation('season', 'year', "=" , 2022); //->orderBy(ClubMember::select('name'));
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\TextColumn::make('profile.birthdate')->date('d-m-Y')->label('Geboortedatum'),
            Tables\Columns\TextColumn::make('profile.city')->label('Gemeente'),
            Tables\Columns\TextColumn::make('jefke')->label('Afdeling'),
            // Tables\Columns\TextColumn::make('email'),
            // Tables\Columns\TextColumn::make('department.name'),
        ];
    }
}
