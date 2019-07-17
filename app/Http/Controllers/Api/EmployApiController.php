<?php

namespace App\Http\Controllers\Api;

use App\Models\Employ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use JWTAuth;

class EmployApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Hi";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Employ
     */
    public function store(Request $request)
    {
        $user = auth('api')->user()->id;
        $cvFile = $this->saveFile($request, $user);
        $employ = new Employ($request->all());
        $employ->cv = $cvFile;
        $employ->user_id = $user;
        $employ->save();

        return $employ;

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Employ|Employ[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        $employ = Employ::find($id);
        if (isset($employ)) {
            return $employ;
        } else {
            return response()->json(["error" => "no data found"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $request
     * @return bool|string
     */
    public function saveFile($request, $userId)
    {
        $random = Str::random(10);
        if ($request->hasfile('cv')) {
            $image = $request->file('cv');
            $name = $random . 'cv_' . $userId . ".jpg";
            $image->move(public_path() . '/cv/', $name);
            return $name;
        }
        return false;
    }
}
