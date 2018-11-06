<?php

namespace App\Http\Controllers;

use App\Mail\StoreRegistered;
use App\Mail\OwnerRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Store;
use App\OwnerList;
use App\Owner;
use App\BroughtItem;
use App\Fraud;
use File;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OwnerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('owner');
    }


    public function index()
    {
    	return view('owner.dashboard');
    }



/*
|--------------------------------------------------------------------------
| Stores Part
|--------------------------------------------------------------------------
|
| List the Stores and add new Stores
|
*/



    /**
     * List Stores.
     *
     */

    public function liststores()
    {
        $store = Store::where('display',1)->get();
        return view('owner.stores.list',compact('store'));
    }

    /**
     * Create a new Store form.
     *
    */

    public function newstores()
    {
        return view('owner.stores.new');
    }


    /**
     * Register Stores.
     *
     */

    public function registered()
    {
        $store = Store::where(['display'=>1 , 'status'=>1])->get();
        return view('owner.stores.registered',compact('store'));
    }


    /**
     * Delete selected Store.
     *
     */

    public function deleted()
    {
        $store = Store::where(['display'=>0])->get();
        return view('owner.stores.deleted',compact('store'));
    }


    /**
     * Create a new Store (save).
     *
    */

    public function savestores(Request $request)
    {
        $stores = $request->validate([
            'owner_name' => 'required',
            'store_name' => 'required',
            'location' => 'required',
            'citizionship' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:stores|max:255',
            'profession' => 'required',
        ]);

        $store = new Store();

        $imgname = '';

        if($img = $request->image){

            $fileName = $img->getClientOriginalName();
            $extension = $img->getClientOriginalExtension() ?: 'png';
            $folderName = '/upload/stores';
            $imgPath = public_path().$folderName;

            $imgname = str_random(10).'.'.$extension;
            $img->move($imgPath , $imgname);
        }

        $store->owner_name = $request->owner_name;
        $store->store_name = $request->store_name;
        $store->location = $request->location;
        $store->citizionship = $request->citizionship;
        $store->contact = $request->contact;
        $store->email = $request->email;
        $store->profession = $request->profession;
        $store->images = $imgname;

        $store->verifyToken = str_random(40);

        $store->save();

        $thisStore = Store::findorfail($store->id);
        $this->emailSentStore($thisStore);

        return redirect(route('owner.list.stores'));
    }

    /**
     * edit form for the selected store (edit).
     *
    */

    public function editstores(Request $request)
    {
        $store = Store::where('id', $request->id)->first();
        return view('owner.stores.edit',compact('store'));
    }

    /**
     * update selected store.
     *
    */

    public function updatestores(Request $request)
    {
        $stores = $request->validate([
            'owner_name' => 'required',
            'store_name' => 'required',
            'location' => 'required',
            'citizionship' => 'required',
            'contact' => 'required',
            'email' => 'required|max:255',
            'profession' => 'required',
        ]);
        $store = Store::where('id', $request->id)->first();

         $imgname = '';

        if($img = $request->image){

            $fileName = $img->getClientOriginalName();
            $extension = $img->getClientOriginalExtension() ?: 'png';
            $folderName = '/upload/stores';
            $imgPath = public_path().$folderName;

            $imgname = str_random(10).'.'.$extension;
            $img->move($imgPath , $imgname);
        }

        $store->owner_name = $request->owner_name;
        $store->store_name = $request->store_name;
        $store->location = $request->location;
        $store->citizionship = $request->citizionship;
        $store->contact = $request->contact;
        $store->email = $request->email;
        $store->profession = $request->profession;

        if($img = $request->image){
            $store->images = $imgname;
        }else{
            $store->images = $store->images ;
        }

        $store->save();

        return redirect(route('owner.list.stores'));
    }

    /**
     * delete selected store (delete).
     *
    */

    public function deletestores($id)
    {
        $store = Store::where('id', $id)->first();

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

        $store->where('id', $id)->update(array('display' => 0));

         return redirect(route('owner.list.stores'));
       
        
    }


    /**
     * change the profession of selected row's stores.
     *
    */

    public function profession($id = null)
    {
        $store = Store::where('id', $id)->first();

        if($store->profession == 'Activate'){
            $store->profession = 'Deactivate';
            $message = 'Selected Store Deactivated';
        }else{
            $store->profession = 'Activate';
            $message = 'Selected Store Activated';
        }

        $store->save();

         return Redirect::back()->with('success', $message);
    }

    /**
     * Activate the selected Stores.
     *
    */

    public function activate(Request $request)
    {
        $store = $request->ids;
        
        $stores = DB::table('stores')->whereIn('id', $store)->update(['profession'=>'Activate']);
        return Redirect::back()->with('success', 'Selected Stores Activated');
    }


    /**
     * Deactivate the selected Stores.
     *
    */

    public function deactivate(Request $request)
    {
        $store = $request->ids;
        
        $stores = DB::table('stores')->whereIn('id', $store)->update(['profession'=>'Deactivate']);
         return Redirect::back()->with('success', 'Selected Stores Deactivated');
    }

    /**
     * Delete the selected Stores.
     *
    */

    public function group_delete(Request $request)
    {
        $store = $request->ids;
        $stores = DB::table('stores')->whereIn('id', $store)->update(array('display' => 0));
        return redirect(route('owner.list.stores'));
    }

    /**
     * Send email for registration.
     *
    */

    public function emailSentStore($thisStore)
    {
        Mail::to($thisStore['email'])->send(new StoreRegistered($thisStore));
    }



/*
|--------------------------------------------------------------------------
| Owner Part
|--------------------------------------------------------------------------
|
| List the Owner and add new Owner
|
*/

    /**
     * List Owner.
     *
    */

    public function listowner()
    {
        $owner = OwnerList::where('display',1)->get();
        return view('owner.owners.list',compact('owner'));
    }

    /**
     * Create a new Owner form.
     *
    */

    public function newowner()
    {
        return view('owner.owners.new');
    }


    /**
     * Register Stores.
     *
     */

    public function owner_registered()
    {
        $owner = OwnerList::where(['display'=>1 , 'status'=>1])->get();
        return view('owner.owners.registered',compact('owner'));
    }


    /**
     * Delete selected Store.
     *
     */

    public function owner_deleted()
    {
        $owner = OwnerList::where(['display'=>0])->get();
        return view('owner.owners.deleted',compact('owner'));
    }


    /**
     * Create a new Owner (save).
     *
    */

    public function saveowner(Request $request)
    {
        $owners = $request->validate([
            'name' => 'required',
            'citizionship' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:owner_lists|max:255',
            'profession' => 'required',
        ]);

        $owners = new OwnerList();

        $imgname = '';

        if($img = $request->image){

            $fileName = $img->getClientOriginalName();
            $extension = $img->getClientOriginalExtension() ?: 'png';
            $folderName = '/upload/owners';
            $imgPath = public_path().$folderName;

            $imgname = str_random(10).'.'.$extension;
            $img->move($imgPath , $imgname);
        }

        $owners->name = $request->name;
        $owners->citizionship = $request->citizionship;
        $owners->contact = $request->contact;
        $owners->email = $request->email;
        $owners->profession = $request->profession;
        $owners->images = $imgname;

        $owners->verifyToken = str_random(40);
        $owners->save();

        $thisStore = OwnerList::findorfail($owners->id);
        $this->emailSentOwner($thisStore);

        return redirect(route('owner.list.owners'));
    }

    /**
     * edit form for the selected Owner (edit).
     *
    */

    public function editowner(Request $request)
    {
        $owner = OwnerList::where('id', $request->id)->first();
        return view('owner.owners.edit',compact('owner'));
    }

    /**
     * update selected store.
     *
    */

    public function updateowner(Request $request)
    {
        $stores = $request->validate([
            'name' => 'required',
            'citizionship' => 'required',
            'contact' => 'required',
            'email' => 'required|max:255',
            'profession' => 'required',
        ]);
        $owners = OwnerList::where('id', $request->id)->first();

         $imgname = '';

        if($img = $request->image){

            $fileName = $img->getClientOriginalName();
            $extension = $img->getClientOriginalExtension() ?: 'png';
            $folderName = '/upload/owners';
            $imgPath = public_path().$folderName;

            $imgname = str_random(10).'.'.$extension;
            $img->move($imgPath , $imgname);
        }

        $owners->name = $request->name;
        $owners->citizionship = $request->citizionship;
        $owners->contact = $request->contact;
        $owners->email = $request->email;
        $owners->profession = $request->profession;

        if($img = $request->image){
            $owners->images = $imgname;
        }else{
            $owners->images = $owners->images ;
        }

        $owners->save();

        return redirect(route('owner.list.owners'));
    }

    /**
     * delete selected Owner (delete).
     *
    */

    public function deleteowner($id)
    {
        $owners = OwnerList::where('id', $id)->first();


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

        // $owners->where('id', $id)->update(array('display' => 0));

         return redirect(route('owner.list.owners'));
       
        
    }


    /**
     * change the profession of selected row's stores.
     *
    */

    public function owner_profession($id = null)
    {
        $owners = OwnerList::where('id', $id)->first();

        if($owners->profession == 'Activate'){
            $owners->profession = 'Deactivate';
            $message = 'Selected Store Deactivated';
        }else{
            $owners->profession = 'Activate';
            $message = 'Selected Store Activated';
        }

        $owners->save();

         return Redirect::back()->with('success', $message);
    }

    /**
     * Activate the selected Stores.
     *
    */

    public function owner_activate(Request $request)
    {
        $owner = $request->ids;
        
        $owners = DB::table('owner_lists')->whereIn('id', $owner)->update(['profession'=>'Activate']);
        return Redirect::back()->with('success', 'Selected Owner Activated');
    }


    /**
     * Deactivate the selected Stores.
     *
    */

    public function owner_deactivate(Request $request)
    {
        $owner = $request->ids;
        
        $owners = DB::table('owner_lists')->whereIn('id', $owner)->update(['profession'=>'Deactivate']);
         return Redirect::back()->with('success', 'Selected Owner Deactivated');
    }

    /**
     * Delete the selected Stores.
     *
    */

    public function owner_group_delete(Request $request)
    {
        $owner = $request->ids;
        $owners = DB::table('owner_lists')->whereIn('id', $owner)->update(array('display' => 0));
        return Redirect::back()->with('success', 'Selected Owner Deleted');
    }

    /**
     * Send email for registration.
     *
    */

    public function emailSentOwner($thisOwner)
    {
        Mail::to($thisOwner['email'])->send(new OwnerRegistered($thisOwner));
    }


/*
|--------------------------------------------------------------------------
| Brought Items
|--------------------------------------------------------------------------
|
| List of Brought Items and their information.
|
*/



    /**
     * To Be Worked On
     *
    */

    public function list_workon()
    {
        $owner = DB::table('brought_items')
            ->join('frauds', 'frauds.brought_item_id', '!=', 'brought_items.id')
            ->get();
        return view('owner.broughtitems.toWorkOn',compact('owner'));
    }


    /**
     * Orderd items of selected User.
     *
    */

    public function orderd($id)
    {
        $o = BroughtItem::where('id', $id)->first();
        $item = json_decode($o->items);
        return view('owner.broughtitems.orderedItems',compact('o' , 'item'));
    }


    /**
     * Orderd items of which are fraud
     *
    */

    public function fraud($id)
    {
        // $items = DB::table('brought_items')
        //     ->leftJoin('users', 'brought_items.email', '=', 'users.email' )
        //     ->where(['brought_items.id' => $id])
        //     ->first();

        $fraud = new Fraud();

        $fraud->brought_item_id = $id;

        $fraud->save();

        return Redirect::back()->with('success', 'Selected Itemes Set as Fraud');
    }



    /**
     * Gaurd
     *
     */
    protected function guard()
    {
        return Auth::guard('owner');
    }
}
