<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Rv\Department;
use App\Models\Rv\DepartmentPage;

class InitDepartmentPages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'department:pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create empty department pages';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (Department::departments([]) as $department) {
            $this->info('Department: ' . $department->name);
            $this->newLine();

            $departmentPage = $department->departmentpages->first();
            if ($departmentPage == null)
            {
                $this->info('No page');
                $departmentPage = new DepartmentPage(['title' => $department->name . ' pagina', 'pagecontent' => '']);
                $department->departmentpages()->save($departmentPage);
            } else {
                $this->info('Page found');
                $departmentPage->pagecontent = '';
                $department->departmentpages()->save($departmentPage);
            }
            $this->newLine();
        }

        return Command::SUCCESS;
    }
}
