<?php

namespace App\Http\Controllers;

use App\Models\Rv\Department;
use App\Models\Rv\DepartmentPage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rv\DepartmentPage  $departmentPage
     * @return \Illuminate\Http\Response
     */
    public function show(DepartmentPage $departmentPage)
    {
        //
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rv\DepartmentPage  $departmentPage
     * @return \Illuminate\Http\Response
     */
    public function showActivePageForDepartment(Department $department)
    {
        $page = $department->activeDepartmentPage();
        $viewBag = $page ? array_intersect_key($page->toArray(), 
            array_flip(['title', 'pagecontent'])) : ['title' => '', 'pagecontent' => ''];

        return view('departmentpage.show')
            ->with($viewBag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rv\DepartmentPage  $departmentPage
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartmentPage $departmentPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rv\DepartmentPage  $departmentPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepartmentPage $departmentPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rv\DepartmentPage  $departmentPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartmentPage $departmentPage)
    {
        //
    }
}
