<?php

namespace App\Http\Controllers;

use App\Organization;
use Auth;
use Illuminate\Http\Request;
use Storage;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Organization = Organization::all();
        return view('photos.Create', compact('Organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organization.Create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'about'=>'required',
            'org_name'=>'required',
            'organization_image'=>'image|nullable|max:1999'
            ]);
        //handle file uploade
        if($request->hasFile('organization_image')){
            //Get Filename with the Extention
            $filenameWithExt = $request->file('organization_image')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extention = $request->file('organization_image')->getClientOriginalExtension();
            //file to store
            $fileNametoStore = $filename.'_'.time().'.'.$extention;
            //uploade image 
            // $path = $request->file('post_photo')->storeAs('', $fileNametoStore); 
            $path =Storage::putFileAs('public/organization', $request->file('organization_image'), $fileNametoStore);
            // dd($path);
            

        } else{
            $fileNametoStore = 'Default.png';
        }


        //create New organization 
        $Organization = new Organization;
        $Organization->org_name = $request->org_name;
        $Organization->about = $request->about;
        $Organization->organization_image = $fileNametoStore;
        $Organization->post_id = Auth::user()->id;
        $Organization->save();
        return redirect()->route('orgshow', ['id' => $Organization->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $Organization = Organization::find($id);
        //thesee are all the post associated with this organization.
        $Posts = $Organization->post;
        return view('Organization.Show', compact('Organization', 'Posts'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Organization = Organization::find($id);
        return view('Organization.Edit',compact('Organization'));
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'about'=>'required',
            'org_name'=>'required',
            'organization_image'=>'image|nullable|max:1999'
            ]);
        //handle file uploade

        //Grab the organization 
        $Organization = Organization::find($id); 
        //Handle photo 
        if($request->hasFile('organization_image'))
        {
            //remove existing file from storage
            Storage::delete('public/organization'.$organization->organization_image);
            //Get Filename with the Extention
            $filenameWithExt = $request->file('organization_image')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Just ext
            $extention = $request->file('organization_image')->getClientOriginalExtension();
            //file to store
            $fileNametoStore = $filename.'_'.time().'.'.$extention;
            //uploade image to storage 
            // $path = $request->file('post_photo')->storeAs('', $fileNametoStore); 
            $path =Storage::putFileAs('public/organization', $request->file('organization_image'), $fileNametoStore);
            // dd($path);
            

        } else{
            $fileNametoStore = 'Default.png';
        }


        //Update Organization 
        
        $Organization->org_name = $request->org_name;
        $Organization->about = $request->about;
        $Organization->organization_image = $fileNametoStore;
        $Organization->post_id = Auth::user()->id;
        $Organization->save();
        return redirect()->route('Organization.Show', ['id' => $Organization->id]);
    }

    
    public function destroy(Organization $organization)
    {
        //
    }
}
