<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Offer;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function getOffers(){
        return Offer::select('id','name')->get();
    }

    /* public function store(){
        Offer::create([
            'name' => 'offer2',
            'price' => '5000',
            'details' => 'offer details',
        ]);
    } */

    public function create(){
        return view('offers.create');
    }

    public function store(Request $request){
        $rule=$this->getRules();
        $message=$this->getMessages();

        $validator=Validator::make($request->all(),$rule,$message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }


        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,
        ]);

        return redirect()->back()->with(['success' => 'تم اضافة العرض بنجاح']);
    }

    public function getRules(){
        return $rules=[
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required',
        ];
    }

    public function getMessages(){
        return $messages=[
            'name.required' => trans('message.offer name required'),
            'name.unique' => __('message.offer name must be unique'),
            'price.numeric' => 'سعر العرض يجب أن يكون أرقام',
            'price.required' => 'السعر مطلوب',
            'details.required' => 'التفاصيل مطلوبة',
        ];
    }
}
