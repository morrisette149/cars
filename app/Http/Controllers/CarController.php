<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; //call the model
use Storage; 
use File;

class CarController extends Controller
{
    //function for index
    public function index(Request $request){
        //if for searching
        if($request->keyword){
            $cars = Car::where('carname', 'LIKE', '%'.$request->keyword.'%')->paginate(5);
        }
        else{
            $cars = Car::paginate(5); //retrieve data from database, one page will display 5 data
        }
       
        //use compact to pass the data
        return view('cars.index', compact('cars'));//return file under cars yg dh dicreate dekat view
    }

    //create 
    public function create(){
        return view('cars.create');
    }

    //store the data
   public function store(Request $request){
    //$car & $filename =variable yg dipakai dlm function, $request variable yg diretrieve
    $car = Car::create($request->all());

    //if to attach file
    if($request->hasfile('attachment')){
        //save and naming the file
        $filename = $car->carname.'-'.date('Y-m-d').'-'.$request->attachment->getClientOriginalExtension();
            //store the attachment into a folder name attachments
            Storage::disk('public')->put('attachments/'.$filename, File::get($request->attachment));

            $car->attachment=$filename;
            $car->save();
    }
    //letak dekat mana2 function yg perlukan alert message
    return redirect()->route('cars:index')->with([
        'alert-type' => 'alert-primary',
        'alert' => 'Car information have been saved!'
    ]);//ikut nama route dlm web.php
}

//show
public function show(Car $car){
    return view('cars.show', compact('car'));
}

//edit
public function edit(Car $car){
    return view('cars.edit', compact('car'));
}

//update
public function update(Request $request, Car $car){
    $car->update($request->all());
    //flash mesaage for update
    return redirect()->route('cars:index')->with([
        'alert-type' => 'alert-warning',
        'alert' => 'Car data have been updated!'
    ]);
}

//delete
public function destroy(Request $request, Car $car){//receive parameter
    //if to check whether it have attachment/not
    if($request->attachment){
        Storage::disk('public')->delete($car->attachment);
    }
    $car->delete();
    //flash message for delete
    return redirect()->route('cars:index')->with([
        'alert-type' => 'alert-danger',
        'alert' => 'Car data have been deleted!'
    ]);
}
}
