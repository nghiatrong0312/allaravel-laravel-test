<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Session;

use App\Products;
use App\Size;
use App\Color;
use App\Library;
use App\Categories;
use App\Order;
use App\Order_Product;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewall()
    {
        $product = Products::cursor();

        return view('backend/products/viewall', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::cursor();
        $id_pro = Products::limit(1)->orderBy('id_product', 'DESC')->get();
        return view('backend/products/create', [
            'categories' => $categories,
            'id_pro' => $id_pro,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'product_name'      => 'required',
            'product_price'     => 'required',
            'product_category'  => 'integer|boolean|min:0|max:1',
            'product_brand'     => 'required',
            'product_size'      => 'integer|boolean|min:0|max:1',
            'product_color'     => 'integer|boolean|min:0|max:1',
            'product_avatar'    => 'required',
            'product_library'   => 'required',
            'product_quantity'  => 'required',
        ];

        $messeges = [
            'product_name.required'     => 'Vui Long Nhap Ten San Pham',
            'product_quantity.required' => 'Vui Long Nhap So Luong San Pham',
            'product_price.required'    => 'Vui Long Nhap Gia San Pham',
            'product_category.boolean'  => 'Vui Long Nhap Loai San Pham',
            'product_brand.required'    => 'Vui Long Nhap Nhan Hieu San Pham',
            'product_size.boolean'      => 'Vui Long Nhap Size San Pham',
            'product_color.boolean'     => 'Vui Long Nhap Mau San Pham',
            'product_avatar.required'   => 'Vui Long Nhap Anh Dai Dien San Pham',
            'product_library.required'  => 'Vui Long Nhap Thu Vien Anh San Pham',
        ];

        $validator = Validator::make($request->all(), $rules, $messeges);
        if ($validator->fails()) {
            return redirect('/admin/product/create')->withErrors($validator)->withInput();
        }

        if (!empty($request->file('product_library'))) {

            foreach ($request->file('product_library') as $librarys) {

                
                Storage::put('upload/'.$librarys->getClientOriginalName(), file_get_contents($librarys));

                $library                = new Library();
                $library->id_product    = $request->input('product_id');
                $library->name_img      = $librarys->getClientOriginalName();
                $library->save();
            }
        }

        if (!empty($request->input('size_product'))) {

            foreach ($request->input('size_product') as $key => $sizes) {
                $size               = new Size();
                $size->id_product   = $request->input('product_id');
                $size->size_product = $sizes;
                $size->save();
            }
        }
        
        if (!empty($request->input('color_product'))) {
        
            foreach ($request->input('color_product') as $key => $colors) {
                $color                  = new Color();
                $color->id_product      = $request->input('product_id');
                $color->color_product   = $colors;
                $color->save();
            }
        }

            $product_avatar = $request->file('product_avatar');
            Storage::put('upload/'.$product_avatar->getClientOriginalName(), file_get_contents($product_avatar));
            $product_avatar             = $request->file('product_avatar');
            $products                   = new Products();
            $products->id_product       = $request->input('product_id');
            $products->product_name     = $request->input('product_name');
            $products->quantity_product = $request->input('product_quantity');
            $products->product_price    = $request->input('product_price');
            $products->product_img      = $product_avatar->getClientOriginalName();
            $products->categories_id    = $request->input('product_categories');
            $products->status           = $request->input('status_product');
            $products->brand_product    = $request->input('product_brand');
            $products->save();

            return redirect('/admin/product/viewall');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $products = Products::where(['categories_id' => $id])->get();

        return view('backend/products/view', ['products' => $products]);
    }

    public function viewdetail($id){
        $products       = Products::where(['id_product' => $id])->get();
        $size           = Size::Where(['id_product' => $id])->get();
        $color          = Color::where(['id_product' => $id])->get();
        $library        = Library::where(['id_product' => $id])->limit(4)->get();
        $sold           = Order_Product::where(['id_product' => $id])->get();
        $category_id    = 0;
        foreach ($products as $key => $value) {
            $category_id = $value['categories_id'];
        }
        $category = Categories::where(['id_categories' => $category_id])->get();
        return view('backend/products/viewdetail', [
            'products'  => $products,
            'size'      => $size,
            'color'     => $color,
            'category'  => $category,
            'library'   => $library,
            'sold'      => $sold,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editview($id)
    {
        $products = Products::where(['id_product' => $id])->get();
        $size = Size::where(['id_product' => $id])->get();
        $color = Color::where(['id_product' => $id])->get();
        $library = Library::where(['id_product' => $id])->get();
        return view('backend/products/editview', [
            'products'  => $products,
            'size'      => $size,
            'color'     => $color,
            'library'   => $library,
        ]);
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
        if (isset($_POST['size_product'])) {
            foreach ($_POST['size_product'] as $key => $sizes) {
                $size               = new Size();
                $size->id_product   = $id;
                $size->size_product = $sizes;
                $size->save();
            }
            return redirect('admin/product/viewdetail/'.$id);
        }
        if (isset($_POST['color_product'])) {
            foreach ($_POST['color_product'] as $key => $colors) {
                $color                  = new Color();
                $color->id_product      = $id;
                $color->color_product   = $colors;
                $color->save();
            }
            return redirect('admin/product/viewdetail/'.$id);
        }
        if ($request->hasFile('library_product')) {
            $library = Library::where(['id_product' => $id])->get();
            foreach ($library as $key => $libraryes) {
                Storage::delete('upload/'.$libraryes['name_img']);
                Library::where('id_product', $id)->delete();
            }
            
            foreach ($request->file('library_product') as $library) {
                Storage::put('upload/'.$library->getClientOriginalName(), file_get_contents($library));
                $img                = new Library();
                $img->id_product    = $id;
                $img->name_img      = $library->getClientOriginalName();
                $img->save();
            }
            return redirect('admin/product/viewdetail/'.$id);
        }
        if ($request->hasFile('avatar_product')) {
            $product    = Products::where(['id_product' => $id])->get();
            $name_img   = 0;
            foreach ($product as $key => $products) {
                $name_img = $products['product_img'];
            }
            Storage::delete('upload/'.$name_img);
            $img_avatar = $request->file('avatar_product');
            if (!empty($img_avatar)) {
                Storage::put('upload/'.$img_avatar->getClientOriginalName(), file_get_contents($img_avatar));
            }
            Products::where(['id_product' => $id])->update([
                'product_name'      => $request->input('product_name'),
                'product_price'     => $request->input('product_price'),
                'product_img'       => $img_avatar->getClientOriginalName(),
                'categories_id'     => $request->input('category_product'),
                'brand_product'     => $request->input('brand_product'),
                'quantity_product'  => $request->input('quantity_product'),
                'describe_product'  => $request->input('description_product'),
            ]);
            return redirect('admin/product/viewdetail/'.$id);
        }
        if (!isset($_POST['avatar_product'])) {
            Products::where(['id_product' => $id])->update([
                'product_name'      => $request->input('product_name'),
                'product_price'     => $request->input('product_price'),
                'categories_id'     => $request->input('category_product'),
                'brand_product'     => $request->input('brand_product'),
                'quantity_product'  => $request->input('quantity_product'),
                'describe_product'  => $request->input('description_product'),
            ]);
            return redirect('admin/product/viewdetail/'.$id);
        }
        return redirect('admin/product/editview/'.$id);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $library = Library::where(['id_product' => $id])->get();
        foreach ($library as $key => $librarys) {
            Storage::delete('upload/'.$librarys['name_img']);

        }
        $product = Products::where(['id_product' => $id])->get();
        $avatar_product = 0;
        foreach ($product as $key => $products) {
            $avatar_product = $products['product_img'];
        }
        Storage::delete('upload/'.$avatar_product);
        Library::where(['id_product' => $id])->delete();
        Size::where('id_product', $id)->delete();
        Products::where('id_product', $id)->delete();
        Color::where('id_product', $id)->delete();

        return redirect('admin/product/viewall');
    }

    public function sold()
    {
        $sold_order = Order::where(['status' => 4])->get();

        return view('backend/products/sold', ['sold_order' => $sold_order]);
    }
}
