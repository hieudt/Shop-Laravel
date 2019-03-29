<?php

namespace App\Http\Controllers;


use DB;
use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;
use App\Product;

class SubCategoryController extends Controller
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
        if ($request->ajax()) {
            $this->validate(
                $request,
                [
                    'name_sub' => 'required|min:3|max:150|unique:SubCategory,name_sub', /* không trùng tiêu đề khác */
                    'slug' => 'unique:SubCategory,slug',
                ],
                [
                    'name_sub.required' => 'Bạn chưa nhập tiêu đề',
                    'name_sub.min' => 'Tiêu đề tối thiểu 3 ký tự',
                    'name_sub.max' => 'Tiêu đề tối đa 150 ký tự',
                    'slug.unique' => 'Đường dẫn tắt bị trùng',
                    'name_sub.unique' => 'Tên danh mục con bị trùng'
                ]
            );

            $Category = Category::find($request->id_cat);
            if(!empty($Category))
            {
                $SubCategory = new SubCategory;
                $SubCategory->name_sub = $request->name_sub;
                if ($request->slug == '') {
                        $SubCategory->slug = changeTitle($request->name_sub);
                    } else {
                    $SubCategory->slug = $request->slug;
                }
                $SubCategory->id_category = $request->id_cat;
                $SubCategory->save();
                return response()->json(['success' => 'Thêm mới thành công']);
            } else 
            {
                return response('Danh mục cha không tồn tại',422);
            }

            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        if ($request->ajax()) {
            $this->validate(
                $request,
                [
                    'name_sub' => 'required|min:3|max:150|unique:SubCategory,name_sub,'.$request->id, /* không trùng tiêu đề khác */
                    'slug' => 'unique:SubCategory,slug,'.$request->id
                ],
                [
                    'name_sub.required' => 'Bạn chưa nhập tiêu đề',
                    'name_sub.min' => 'Tiêu đề tối thiểu 3 ký tự',
                    'name_sub.max' => 'Tiêu đề tối đa 150 ký tự',
                    'slug.unique' => 'Đường dẫn tắt sbị trùng',
                    'name_sub.unique' => 'Tên danh mục con bị trùng'
                ]
            );

            $Category = Category::find($request->id_cat);
            if ($Category) {
                $SubCategory = SubCategory::find($request->id);
                if($SubCategory)
                {
                    $SubCategory->name_sub = $request->name_sub;
                    if ($request->slug == '') {
                        $SubCategory->slug = changeTitle($request->title);
                    } else {
                        $SubCategory->slug = $request->slug;
                    }
                    $SubCategory->id_category = $request->id_cat;
                    $SubCategory->save();
                    return response()->json(['success'=>'Cập nhật thành công']);
                } else {
                    return response('Danh mục con không tồn tại',422);
                }
                
            } else {
                return response('Danh mục cha không tồn tại', 422);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SubCategory = SubCategory::find($id);
        if ($SubCategory) {
            $Sub = Product::where('id_sub', $id)->get()->toArray();
            if (!empty($Sub)) {
                return response('Tồn tại sản phẩm trong danh mục này', 422);
            } else {
                $SubCategory->delete();
                return response()->json(['success' => 'Xóa thành công']);
            }
        } else {
            return response('Thất bại', 422);
        }
    }

    public function Search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = SubCategory::where('name_sub','like','%'.$query.'%')
                        ->orWhere('slug','like','%'.$query.'%')
                        ->orderBy('id','asc')
                        ->get();
                //$data = DB::table('SubCategory')
                  //  ->where('title', 'like', '%' . $query . '%')
                    //->orWhere('slug', 'like', '%' . $query . '%')
                    //->orderBy('id', 'asc')
                    //->get();
            } else {
                $data = SubCategory::orderBy('id','asc')->get();
                //$data = DB::table('SubCategory')
                    //->orderBy('id', 'asc')
                   // ->get();
            }
            $total_row = $data->count();
            $output = '';
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                     <tr>
                     <td class="sorting_1">' . $row->id . '</td>
                     <td>' . $row->name_sub . '</td>
                     <td>' . $row->Category->title . '</td>
                     <td>' . $row->slug . '</td>
                     <td><button class="btn btn-outline-primary editedSub" id="' . $row->id . '" title="' . $row->name_sub . '" slug="' . $row->slug . '" id-cat="'.$row->Category->id.'" name-cat="'.$row->Category->title.'">Sửa</button>
                     <button type="button" class="btn btn-outline-danger deleteSub" id="' . $row->id . '">Xóa</button>
                     </td>
                     </tr>
                    ';
                }
            } else {
                $output .= '<tr><td colspan="5" align="center">
                    Không tìm thấy kết quả
                </td></tr>';
            }

            $data = array(
                'table_data' => $output,
            );

            echo json_encode($data);
        }
    }
    
}
