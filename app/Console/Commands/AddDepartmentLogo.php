<?php

namespace App\Console\Commands;

use App\Models\Rv\Department;
use Illuminate\Console\Command;

class AddDepartmentLogo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'department:logo';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $department = Department::find(1);
        $department->addMedia(storage_path('images/wielertoeristen-logo.jpg'))
                   ->toMediaCollection(); 



        return Command::SUCCESS;
    }
}
