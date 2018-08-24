<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Validator;
use DB;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.masters.roles');
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
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return response()->json(['success'=>false, 'error'=>$validator->errors()]);
        }else{
            $role = new Role;

            $role->name = $request->role_name;
            $role->description = $request->description;
            $role->save();
            return response()->json(["success"=>true, "msg"=>"Role was successfully saved!", "data"=>$request->all()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return response()->json(["success"=>true, "msg"=>"", "data"=>$role]);
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
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return response()->json(['success'=>false, 'error'=>$validator->errors()]);
        }else{
            $role = Role::find($id);

            $role->name = $request->role_name;
            $role->description = $request->description;
            $role->save();
            return response()->json(["success"=>true, "msg"=>"Role was successfully updated!", "data"=>$request->all()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return response()->json(["success"=>true, "msg"=>"Role was successfully deleted!", "data"=>""]);
    }

    public function validateRequest($request){
        return Validator::make($request->all(), [
            'role_name' => 'required|unique:roles,name',
            'description' => 'required',
        ]);
    }

    public function getList(Request $request, $type="", $param_id=""){
        // var_dump($request->all());
        // exit();
        DB::enableQueryLog();
        // The columns variable is used for sorting
        $columns = array(
                // datatable column index => database column name
                0 =>'name',
                1 =>'description',
        );

        //Getting the data
        $roles = DB::table('roles');
        $totalData = $roles->count();   //Total record
        $totalFiltered = $totalData;    // No filter at first so we can assign like this

        // Here are the parameters sent from client for paging 
        $start = $request->input('start');  // Skip first start records
        $length = $request->input('length'); //  Get length record from start

        /*
         * Where Clause
         */
        if($request->has('search')){
            // var_dump($request->input('columns.0.search.value')); exit();
            if($request->input('search.value') != '') { 
               $searchTerm = $request->input ('search.value');
                /*
                * Seach clause : we only allow to search on name and description field
                */
                $roles->where(function($q) use ($searchTerm) {
                    $q->where('roles.name', 'Like', '%' . $searchTerm . '%')
                      ->orWhere('roles.description', 'Like', '%' . $searchTerm . '%');
                });
            }
            if(! empty($request->input('columns.0.search.value'))){
                $search_name = $request->input('columns.0.search.value');
                $roles->where('roles.name', 'Like', '%' . $search_name . '%');

                if(! empty($request->input('columns.1.search.value'))){
                    $search_description = $request->input('columns.1.search.value');
                    $roles->where('roles.description', 'Like', '%' . $search_description . '%');
                }
            }

            if(! empty($request->input('columns.1.search.value')) and empty($request->input('columns.0.search.value'))){
                $search_description = $request->input('columns.1.search.value');
                $roles->where('roles.description', 'Like', '%' . $search_description . '%');
            }
        }
        /*
         * Order By
         */
        // $jobs = new Role;
        if ($request->has('order')) {
            if ($request->input ('order.0.column') != '') {
                $orderColumn = $request->input('order.0.column');
                $orderDirection = $request->input('order.0.dir');
                $roles->orderBy($columns[intval($orderColumn)], $orderDirection);
            }
        }

        // Get the real count after being filtered by Where Clause
        $totalFiltered = $roles->count();
        // Data to client
        $roles = $roles->skip($start)->take($length);

        /*
         * Execute the query
         */
        $roles = $roles->get();

        // dd(DB::getQueryLog()); exit();
        /*
        * We built the structure required by BootStrap datatables
        */
        $data = array ();
        foreach($roles as $role) {
            $nestedData = array ();
            $nestedData [0] = $role->name;
            $nestedData [1] = $role->description;
            $nestedData [2] = $role->id;
            // $nestedData [2] = $job->dob;
            // $nestedData [3] = $job->id;
            $data [] = $nestedData;
        }
        /*
        * This below structure is required by Datatables
        */ 
        $tableContent = array (
                "draw" => intval($request->input('draw')), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
                "recordsTotal" => intval($totalData), // total number of records
                "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
                "data" => $data
        );
        return $tableContent;
        // return response()->json(["success"=>true, "msg"=>"", "data"=>$roles]);
    }
}
