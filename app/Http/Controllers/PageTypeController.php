<?php

namespace App\Http\Controllers;

use App\Models\PageType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageTypeController extends Controller
{
    public function index()
    {
        $pages= PageType::where('show_on_homepage','!=',null)->get();
        return view('pages.page-list',compact('pages'));
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required'
        ]);
       $slug=Str::slug($data['title']);
       $id= PageType::create([
            'title'=>$request->title,
            'slug'=>$slug,
            'show_on_homepage'=>1
       ]);
        return redirect()->back()->with('msg','Page inserted successfully');
    }
    
    public function disable(PageType $page)
    {
        PageType::query()->where('id',$page->id)->update([
            'show_on_homepage'=>0
        ]);
        
        return redirect()->route('page-type.index')->with('msg','Page Disabled successfully');
    }

    public function enable (PageType $page)
    {
        PageType::query()->where('id',$page->id)->update([
            'show_on_homepage'=>1
        ]);
        return redirect()->route('page-type.index')->with('msg','Page Enabled successfully');
    }



}
