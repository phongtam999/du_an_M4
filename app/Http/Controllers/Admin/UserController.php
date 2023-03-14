<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $this->authorize('view', $user);
        $users = User::paginate(2);
        $param = [
            'users' => $users,
        ];
        return view('admin.users.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $this->authorize('create', User::class);
        $groups = Group::get();
        $param = [
            'groups' => $groups,
        ];
        return view('admin.users.add', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $user = new User();       
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $file = $request->image;
        if ($request->hasFile('image')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('image')->storeAs('public/images', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $user->image = $fileExtension;
        }
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->group_id = $request->group_id;
        $user->save();
        toast('Đăng kí thành công','success','top-right');
        return redirect()->route('user.index');
      
    }

    public function show($id)
    {
        $this->authorize('view', User::class);

        $user = User::findOrFail($id);
        $param =[
            'user'=>$user,
        ];
        return view('admin.users.profile',  $param );
    }

    public function edit($id)
    {
        $this->authorize('update', User::class);
        $user = User::find($id);
        $groups = Group::get();
        $param =[
            'user'=>$user,
            'groups'=>$groups,

        ];
        return view('admin.users.edit', $param);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update', User::class);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $file = $request->image;
        if ($request->hasFile('image')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('image')->storeAs('public/images', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $user->image = $fileExtension;
        }
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->group_id = $request->group_id;
        $user->save();
        toast('cập nhật thành công','success','top-right');

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', User::class);
        $user = User::findOrFail($id);
            $user->delete();
       return redirect()->back();
    }

}
