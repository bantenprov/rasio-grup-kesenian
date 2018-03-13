<?php

namespace Bantenprov\RasioGrupKesenian\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\RasioGrupKesenian\Facades\RasioGrupKesenianFacade;

/* Models */
use Bantenprov\RasioGrupKesenian\Models\Bantenprov\RasioGrupKesenian\RasioGrupKesenian;

/* Etc */
use Validator;

/**
 * The RasioGrupKesenianController class.
 *
 * @package Bantenprov\RasioGrupKesenian
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RasioGrupKesenianController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RasioGrupKesenian $rasio_grup_kesenian)
    {
        $this->rasio_grup_kesenian = $rasio_grup_kesenian;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->rasio_grup_kesenian->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->rasio_grup_kesenian->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rasio_grup_kesenian = $this->rasio_grup_kesenian;

        $response['rasio_grup_kesenian'] = $rasio_grup_kesenian;
        $response['status'] = true;

        return response()->json($rasio_grup_kesenian);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RasioGrupKesenian  $angka_melek_huruf
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rasio_grup_kesenian = $this->rasio_grup_kesenian;

        $validator = Validator::make($request->all(), [
            'label' => 'required|max:16|unique:rasio_grup_kesenians,label',
            'description' => 'max:255',
        ]);

        if($validator->fails()){
            $check = $rasio_grup_kesenian->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $rasio_grup_kesenian->label = $request->input('label');
                $rasio_grup_kesenian->description = $request->input('description');
                $rasio_grup_kesenian->save();

                $response['message'] = 'success';
            }
        } else {
            $rasio_grup_kesenian->label = $request->input('label');
            $rasio_grup_kesenian->description = $request->input('description');
            $rasio_grup_kesenian->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rasio_grup_kesenian = $this->rasio_grup_kesenian->findOrFail($id);

        $response['rasio_grup_kesenian'] = $rasio_grup_kesenian;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RasioGrupKesenian  $rasio_grup_kesenian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rasio_grup_kesenian = $this->rasio_grup_kesenian->findOrFail($id);

        $response['rasio_grup_kesenian'] = $rasio_grup_kesenian;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RasioGrupKesenian  $rasio_grup_kesenian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rasio_grup_kesenian = $this->rasio_grup_kesenian->findOrFail($id);

        if ($request->input('old_label') == $request->input('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:rasio_grup_kesenians,label',
                'description' => 'max:255',
            ]);
        }

        if ($validator->fails()) {
            $check = $rasio_grup_kesenian->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $rasio_grup_kesenian->label = $request->input('label');
                $rasio_grup_kesenian->description = $request->input('description');
                $rasio_grup_kesenian->save();

                $response['message'] = 'success';
            }
        } else {
            $rasio_grup_kesenian->label = $request->input('label');
            $rasio_grup_kesenian->description = $request->input('description');
            $rasio_grup_kesenian->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RasioGrupKesenian  $rasio_grup_kesenian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rasio_grup_kesenian = $this->rasio_grup_kesenian->findOrFail($id);

        if ($rasio_grup_kesenian->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
