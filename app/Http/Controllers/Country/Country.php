<?php

namespace App\Http\Controllers\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\Models\CountryModel;

class Country extends Controller
{
    public function index()
    {
        return response()->json(CountryModel::get(), 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attributes = [
            'iso' => 'required|min:3|max:10',
            'name' => 'required|min:3|max:10',
            'dname' => 'required|min:3|max:10',
            'iso3' => 'required|min:3|max:10',
            'position' => 'required|min:3|max:10',
            'numcode' => 'required|min:3|max:10',
            'phonecode' => 'required|min:3|max:10',
            'created' => 'required|min:3|max:10',
            'register_by' => 'required|min:3|max:10',
            'modified' => 'required|min:3|max:10',
            'modified_by' => 'required|min:3|max:10'
        ];

        $validator = Validator::make($request->all(), $attributes);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }

        $country = CountryModel::create($request->all());
        return response()->json($country, 201);
    }

    public function show($id)
    {
        $country = CountryModel::find($id);

        if(is_null($country))
        {
            return response()->json(['message' => 'Record Not Found'], 404);
        }

        return response()->json(CountryModel::find($id), 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $country = CountryModel::find($id);

        if(is_null($country))
        {
            return response()->json(['message' => 'Record Not Found'], 404);
        }

        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function destroy($id)
    {
        $country = CountryModel::find($id);

        if(is_null($country))
        {
            return response()->json(['message' => 'Record Not Found'], 404);
        }

        $country->delete();
        return response()->json(null, 204);
    }
}
