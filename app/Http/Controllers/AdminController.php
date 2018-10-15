<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Store;

use App\Item;

use DB;

use Auth;



use Illuminate\Support\Facades\Redirect;

use File;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
    	return view('admin.dashboard');
    }


    /*
|--------------------------------------------------------------------------
| Item Part
|--------------------------------------------------------------------------
|
| List the Item and add new Item
|
*/



    /**
     * List Items Posted by the Related Store.
     *
     */

    public function liststores()
    {

        $items = Item::where(['display'=>1 , 'store_id'=>Auth::guard('admin')->user()->id])->get();
        return view('admin.items.list',compact('items'));
    }


    /**
     * Create a new Items form.
     *
    */

    public function newstores()
    {
        return view('admin.items.new');
    }



    /**
     * List of delected items from Store.
     *
     */

    public function deleted()
    {
        $items = Item::where(['display'=> 0 , 'store_id'=>Auth::guard('admin')->user()->id])->get();
        return view('admin.items.deleted',compact('items'));
    }


    /**
     * Create a new Items (save).
     *
    */

    public function saveitems(Request $request)
    {

        $stores = $request->validate([
            'store_id' => 'required',
            'brand_name' => 'required',
            'print' => 'required',
            'size' => 'required',
            'cost' => 'required',
            'color' => 'required',
            'description' => 'required',
            'status' => 'required',
            'display' => 'required',
            'photo'=>'required',
        ]);


        $image = '';
        if($request->hasfile('image')){
            $files = $request->file('image');
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/upload/items';
                $imgPath = public_path().$folderName;
                $imgname = str_random(10).'.'.$extension;

                $file->move($imgPath , $imgname);
                $image[] = $imgname;
            }
        }


        $imgname = '';

        if($img = $request->photo){

            $fileName = $img->getClientOriginalName();
            $extension = $img->getClientOriginalExtension() ?: 'png';
            $folderName = '/upload/items';
            $imgPath = public_path().$folderName;

            $imgname = str_random(10).'.'.$extension;
            $img->move($imgPath , $imgname);
        }

        $items = new Item();
// dd($imgname);
        $items->store_id = $request->store_id;
        $items->brand_name = $request->brand_name;
        $items->print = $request->print;
        $items->size = $request->size;
        $items->cost = $request->cost;
        $items->color = $request->color;
        $items->description = $request->description;
        $items->display = $request->display;
        $items->status = $request->status;
        $items->images = json_encode($image);
        $items->photo = $imgname;

        $items->save();

        return redirect(route('store.list.items'));
    }

    /**
     * edit form for the selected items (edit).
     *
    */

    public function edititems(Request $request)
    {
        // dd($request);
        $items = Item::where('id', $request->id)->first();
        $photo = json_decode($items->images);
        // dd($photo);
        return view('admin.items.edit',compact('items', 'photo'));
    }

    /**
     * update selected items.
     *
    */

    public function updateitems(Request $request)
    {
        // dd($request);

        $stores = $request->validate([
            'store_id' => 'required',
            'brand_name' => 'required',
            'print' => 'required',
            'size' => 'required',
            'cost' => 'required',
            'color' => 'required',
            'description' => 'required',
            'status' => 'required',
            'display' => 'required',
        ]);

        $items = Item::where('id', $request->id)->first();


        $image = '';
        if($request->hasfile('image')){
            $files = $request->file('image');
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/upload/items';
                $imgPath = public_path().$folderName;
                $imgname = str_random(10).'.'.$extension;

                $file->move($imgPath , $imgname);
                $image[] = $imgname;

                 $oldPath = public_path() . $folderName . $items->image;

                 // dd($oldPath);
                //delete old pic if exists
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
        }


       $imgname = '';

        if($img = $request->photo){

            $fileName = $img->getClientOriginalName();
            $extension = $img->getClientOriginalExtension() ?: 'png';
            $folderName = '/upload/items';
            $imgPath = public_path().$folderName;

            $imgname = str_random(10).'.'.$extension;
            $img->move($imgPath , $imgname);

        $oldPath = public_path() . $folderName . $items->photo;
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
        }



// dd(json_encode($image));

        // dd($items , $request);

        $items->store_id = $request->store_id;
        $items->brand_name = $request->brand_name;
        $items->print = $request->print;
        $items->size = $request->size;
        $items->cost = $request->cost;
        $items->color = $request->color;
        $items->description = $request->description;
        $items->display = $request->display;
        $items->status = $request->status;
        $items->images = json_encode($image);
        $items->photo = $imgname;

        $items->save();

        return redirect(route('store.list.items'));
    }

    /**
     * delete selected store (delete).
     *
    */

    public function deleteitems($id)
    {
        $items = Item::where('id', $id)->first();

        // delete the data
/*        $imgPath = 'upload/stores';
        $oldpath = public_path().$imgPath.$store->images;

        //delete image
        if(File::exists($oldpath))
        {
            File::delete($oldpath);
        }

        //delete content
        $store->delete();*/


        //display none

        $items->where('id', $id)->update(array('display' => 0));

         return redirect(route('store.list.items'));
       
        
    }


    /**
     * change the stock of selected row's items.
     *
    */

    public function stock($id = null)
    {
        $item = Item::where('id', $id)->first();

        if($item->status == 1){
            $item->status = 0;
            $message = 'Selected Item Stock Status Updated.';
        }else{
            $item->status = 1;
            $message = 'Selected Item Stock Status Updated.';
        }

        $item->save();

         return Redirect::back()->with('success', $message);
    }

    /**
     * Onstock the selected ITEMS.
     *
    */

    public function onstock(Request $request)
    {
        $item = $request->ids;
        
        $items = DB::table('items')->whereIn('id', $item)->update(['status'=> 1]);
        return Redirect::back()->with('success', 'Selected Item is Updated as a stock available');
    }


    /**
     * Deactivate the selected items.
     *
    */

    public function outofstock(Request $request)
    {
        $item = $request->ids;
        
        $items = DB::table('items')->whereIn('id', $item)->update(['status'=> 0]);
         return Redirect::back()->with('success', 'Selected Item is Updated as a stock not available');
    }

    /**
     * Delete the selected items.
     *
    */

    public function group_delete(Request $request)
    {
        $item = $request->ids;
        $items = DB::table('items')->whereIn('id', $item)->update(array('display' => 0));
         return Redirect::back()->with('success', 'Selected Item is Deleted');

    }


    
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
