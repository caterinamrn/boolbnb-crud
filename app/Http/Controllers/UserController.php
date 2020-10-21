<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\Service;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\UploadedFile;

use Illuminate\Http\File;

use Illuminate\Support\Str;

class UserController extends Controller
{
  public function __construct() {

    $this->middleware('auth');
  }

  public function create() {

      return view('apartment-create');

    }
    public function store(Request $request) {

      $validator = Validator::make($request->all(), [
        'description' => ['required','string','regex:/^[a-zA-Z]+$/u','min:3','max:150'],
        'number_of_rooms' => ['required', 'integer', 'min:1'],
        'number_of_beds' => ['required', 'integer', 'min:1'],
        'number_of_bathrooms' => ['required', 'integer', 'min:1'],
        'square_meters' => ['required', 'integer', 'min:30'],
        'address' => ['required','string','regex:/^[a-zA-Z]+$/u','min:3','max:80'],
        'city' => ['required','string','regex:/^[a-zA-Z]+$/u','min:3','max:60'],
        'state' => ['required','string','regex:/^[a-zA-Z]+$/u','min:3','max:60'],
        'image' =>  ['required','image','mimes:jpeg,png,jpg,gif','max:2048']
       ]);

        if ($validator->fails()) {
                return redirect('/create')
                       ->withErrors($validator)
                       ->withInput();
              }

      $user = Auth::user();
      $data = $request -> all();

      $apart = Apartment::create($data);

      $wifi = $request -> input('wifi');
      if ($wifi) {
      $apart -> services() -> attach(1);
      }

      $parking = $request -> input('parking');
      if ($parking) {
      $apart -> services() -> attach(2);
      }

      $sauna = $request -> input('sauna');
      if ($sauna) {
      $apart -> services() -> attach(3);
      }

      $sea_view = $request -> input('sea_view');
      if ($sea_view) {
      $apart -> services() -> attach(4);
      }

      $pool = $request -> input('pool');
      if ($pool) {
      $apart -> services() -> attach(5);
      }

      $reception = $request -> input('reception');
      if ($reception) {
      $apart -> services() -> attach(6);
      }

      if($request->hasfile('image')) {

      $file =  $request->file('image');
      $extension = $file -> getClientOriginalExtension();
      $filename = time() . "." . $extension;
      $file -> move('img/', $filename);
      $apart -> image = $filename;
    }

      $us_id = $user -> id;
      $apart -> user_id = $us_id;
      $apart->save();



      return redirect()-> route('user.index');
    }

    public function usindex() {
      $user = Auth::user();
      $id = $user -> id;
      $aparts = Apartment::where('user_id',$id) -> get();

      // dd($apartms);

      return view('user-apartments',compact('aparts'));
    }

    public function edit($id) {

      $apart = Apartment::findOrFail($id);
      $services = $apart->services()->get();

      return view('edit-apartment',compact('apart','services'));
    }
    public function update(Request $request,$id) {

      $validator = Validator::make($request->all(), [
        'description' => ['required','string','regex:/^[a-zA-Z]+$/u','min:3','max:150'],
        'number_of_rooms' => ['required', 'integer', 'min:1'],
        'number_of_beds' => ['required', 'integer', 'min:1'],
        'number_of_bathrooms' => ['required', 'integer', 'min:1'],
        'square_meters' => ['required', 'integer', 'min:30'],
        'address' => ['required','string','regex:/^[a-zA-Z]+$/u','min:3','max:80'],
        'city' => ['required','string','regex:/^[a-zA-Z]+$/u','min:3','max:60'],
        'state' => ['required','string','regex:/^[a-zA-Z]+$/u','min:3','max:60'],
        'image' =>  ['image','mimes:jpeg,png,jpg,gif','max:2048']
       ]);

        if ($validator->fails()) {
                return redirect('/create')
                       ->withErrors($validator)
                       ->withInput();
              }

      $data = $request -> all();
      $apart = Apartment::findOrFail($id);
      $services = $apart->services()->detach();
      // $apart -> update($data);

      $wifi = $request -> input('wifi');
      if ($wifi) {
      $apart -> services() -> sync(1,false);
      }

      $parking = $request -> input('parking');
      if ($parking) {
      $apart -> services() -> sync(2,false);
      }

      $sauna = $request -> input('sauna');
      if ($sauna) {
      $apart -> services() -> sync(3,false);
      }

      $sea_view = $request -> input('sea_view');
      if ($sea_view) {
      $apart -> services() -> sync(4,false);
      }

      $pool = $request -> input('pool');
      if ($pool) {
      $apart -> services() -> sync(5,false);
      }

      $reception = $request -> input('reception');
      if ($reception) {
      $apart -> services() -> sync(6,false);
      }

      if($request->hasfile('image')) {

        $image_path = "img/". $apart->image;  // Value is not URL but directory file path

        if (\File::exists($image_path)) {
            \File::delete($image_path);

            $apart -> update($data);

            $file =  $request->file('image');
            $extension = $file -> getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file -> move('img/', $filename);
            $apart -> image = $filename;
           }
         } else{
                  $apart -> update($data);
                }


         $apart->save();


      return redirect() -> route('user.index');
    }
    public function delete($id) {

      $apart = Apartment::findOrFail($id);
      $apart -> delete();

      return redirect() -> route('user.index');
    }
    public function show($id) {

      $apart = Apartment::findOrFail($id);

      $services = $apart->services()->get();

      return view('show-apartment', compact('apart','services'));
    }
}
