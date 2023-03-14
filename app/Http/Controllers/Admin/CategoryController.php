<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Aler;
class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $categories = Category::paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return view('admin.categories.add');
    }

    public function store(CategoryRequest $request)
    {
        $this->authorize('create', User::class);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        toast('Thêm thành công','success','top-right');
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $this->authorize('update', Category::class);
        $categories = Category::find($id);
        toast('Sửa thành công','success','top-right');

        return view('admin.categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update', Category::class);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        toast('Cập nhật thành công','success','top-right');

        return redirect()->route('category.index');
    }
    public function destroy($id)
    {   
        $this->authorize('delete', Category::class);
        $category = Category::findOrFail($id);
        $category->delete();
        toast('Xoá thành công','success','top-right');
        return redirect()->back();
    }
    public function trash()
    {
        $this->authorize('trash', Category::class);
        $softs = Category::onlyTrashed()->get();
        return view('admin.categories.soft', compact('softs'));
    }
    //khôi phục lại
    public function restoredelete($id)
    {
        $this->authorize('restoredelete', Category::class);
        $categories = Category::withTrashed()->where('id', $id);
        $categories->restore();
        toast('Khôi phục thành công!','success','top-right');
        return redirect()->route('category.trash');
    }
    // Đưa vào thùng rác
    public  function softdeletes($id)
    {
        try {
            $category = Category::onlyTrashed()->where('id', $id)->forcedelete();
            toast('Xoá thành công','success','top-right');
            return redirect()->route('category.index');

        } catch (\Exception $e) {
            // toast('Xoa that bai!','error','top-right');
            toast('Xoá thất bại','error','top-right');
            
            return redirect()->route('category.trash');
        }
        // $products->deleted_at = date("Y-m-d h:i:s");
        // $products->save();
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('category.index');
        }
        $categories = Category::where('name', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }
}
