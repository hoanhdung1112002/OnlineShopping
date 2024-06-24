<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Web_Menus;
use App\Models\User;
use Illuminate\Support\Str;

class MenuClientController extends Controller
{
    public function index(){
        $listMenus=Web_Menus::orderBy('menu_id','DESC')->paginate(10);
        return view('backend.menuweb.index')->with('listMenus',$listMenus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::get();
        return view('backend.menuweb.create')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'menu_name'=>'string|required',
            'controller_name'=>'string|nullable',
            'action_name'=>'string|nullable',
            'level'=>'integer|required',
            'parent_id'=>'integer|required',
            'menu_order'=>'integer|required',
            'position'=>'integer|required',
            'link'=>'string|required',
            'create_by'=>'string|nullable',
            'update_by'=>'string|nullable',
            'status'=>'required|in:active,inactive',
            'description'=>'string|nullable',

        ]);
        $data=$request->all();
        $status=Web_Menus::create($data);

        if($status){
            request()->session()->flash('success','Lưu dữ liệu thành công');
        }
        else{
            request()->session()->flash('error','Đã xảy ra lỗi khi lưu dữ liệu');
        }
        return redirect()->route('menuweb.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::get();
        $menuWeb=Web_Menus::findOrFail($id);
        return view('backend.menuweb.edit')->with('menuWeb',$menuWeb)->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menuWeb=Web_Menus::findOrFail($id);
        $this->validate($request,[
            'menu_name'=>'string|required',
            'controller_name'=>'string|nullable',
            'action_name'=>'string|nullable',
            'level'=>'integer|required',
            'parent_id'=>'integer|required',
            'menu_order'=>'integer|required',
            'position'=>'integer|required',
            'link'=>'string|required',
            'create_by'=>'string|nullable',
            'update_by'=>'string|nullable',
            'status'=>'required|in:active,inactive',
            'description'=>'string|nullable',
        ]);
        $data=$request->all();
        // $slug=Str::slug($request->title);
        // $count=Banner::where('slug',$slug)->count();
        // if($count>0){
        //     $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        // }
        // $data['slug']=$slug;
        // return $slug;
        $status=$menuWeb->fill($data)->save();
        if($status){
            request()->session()->flash('success','Lưu dữ liệu thành công');
        }
        else{
            request()->session()->flash('error','Đã xảy ra lỗi khi lưu dữ liệu');
        }
        return redirect()->route('menuweb.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu=Web_Menus::findOrFail($id);
        $status=$menu->delete();

        if($status){
            request()->session()->flash('success','Xóa dữ liệu thành công');
        }
        else{
            request()->session()->flash('error','Đã xảy ra lỗi không thể xóa');
        }
        return redirect()->route('menuweb.index');
    }
}
