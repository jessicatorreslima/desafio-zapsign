<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\Company;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Doc::oldest()->paginate(10);
        $companies = Company::all();
    
        return view('docs/index',compact('docs','companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $users = User::all();
        return view('docs/create',compact('companies','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        Doc::create($request->all());
     
        return redirect()->route('docs.index')
                        ->with('success','Doc created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function show(Doc $doc)
    {
        $docs = Doc::oldest()->paginate(10);
        return view('docs/show',compact('doc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function edit(Doc $doc)
    {
        $companies = Company::all();
        $users = User::all();
        return view('docs/edit',compact('doc','companies','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doc $doc)
    {
        $request->validate([
            'name' => 'required',
            //'email' => 'required',
        ]);
    
        $doc->update($request->all());
    
        return redirect()->route('docs.index')
                        ->with('success','Doc updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doc $doc)
    {
        $doc->delete();
    
        return redirect()->route('docs.index')
                        ->with('success','Doc deleted successfully');
    }
}
