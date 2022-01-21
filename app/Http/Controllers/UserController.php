<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ResponseTrait;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;




class UserController extends Controller
{
    //

    use ResponseTrait;
    public function __construct()
    {
        $this->user = new User();
        $this->UserService = new UserService();
    }
    public function index()
    {

        try {
            $result = $this->successResponse('All details successfully loaded!');
            // $this->user::all();
            $result['data'] = $this->UserService->loadUsers();
        } catch (\Exception $th) {
            $result = $this->errorResponse($th);
        }
        return $this->returnResponse($result);
    }
    public function show($id)
    {
        try {
            $result = $this->successResponse('All details successfully loaded!');
            // $this->user::findorfail($request->employee_number);
            $result['data'] = $this->UserService->editUser($id);
        } catch (\Exception $th) {
            $result = $this->errorResponse($th);
        }


        return $this->returnResponse($result);
    }
    public function store(Request $request)
    {

        // return 1;
        $validator = Validator::make($request->all(), [
            'employee_number' => 'required|unique:users',
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'email'    => 'nullable|unique:users|regex:/(.*)\.com/i',  // 'email'    => 'nullable|regex:/(.*)fujitsu\.com$/i|unique:users',
            'position' => 'required',
            'status' => 'required',
            'section' => 'required',
            'upload-photo' => 'mimes:jpeg,jpg,png',
        ]);

        // $request->except('photo-raw');
        // return $request;
        if ($validator->fails()) {

            $result = $this->failedValidationResponse($validator->errors()->all());
        } else {
            DB::beginTransaction();
            try {

                if ($request->hasFile('upload-photo')) {
                    $image      = $request->file('upload-photo');
                    //$fileName   = time() . '.' . $image->getClientOriginalExtension();

                    $storagePath = Storage::disk('local')->put('images/user-pic', $image, 'public');
                    $request['photo'] =  basename($storagePath);
                }
                $request['password'] =  bcrypt('User123');
                $result = $this->successResponse('Save Successfully!');
                $result['data'] = $this->UserService->createUser($request->except('upload-photo'));
                DB::commit();
            } catch (\Exception $th) {
                $result = $this->errorResponse($th);
                DB::rollback();
            }
        }

        return $this->returnResponse($result);
    }

    public function destroy($id)
    {
        //return $id;
        $result = $this->successResponse("Deleted Successfully");
        try {
            $result['data'] =  $this->UserService->delete($id);
        } catch (ModelNotFoundException $except) {
            $result = $this->modelNotFoundResponse($id);
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }
    public function user_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            //'email'    => 'nullable|unique:users|regex:/(.*)\.com/i',  // 'email'    => 'nullable|regex:/(.*)fujitsu\.com$/i|unique:users',
            'position' => 'required',
           // 'status' => 'required',
            'section' => 'required',
            'upload-photo' => 'mimes:jpeg,jpg,png',
        ]);


        if ($validator->fails()) {
            $result = $this->failedValidationResponse($validator->errors()->all());
        } else {
            DB::beginTransaction();
            try {
                if ($request->hasFile('upload-photo')) {
                    $image  = $request->file('upload-photo');
                    $storagePath = Storage::disk('local')->put('images/user-pic', $image, 'public');
                    $request['photo'] =  basename($storagePath);
                }
                $result = $this->successResponse("Updated Successfully");
                $result['data'] = $this->UserService->updateUser($request->except('upload-photo'), $id);
                DB::commit();
            } catch (\Exception $e) {
                $result = $this->errorResponse($e);
                DB::rollback();
            }
        }
        return $this->returnResponse($result);
    }
    
    public function change_password(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'min:10|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:10'

        ]);



        if ($validator->fails()) {
            $result = $this->failedValidationResponse($validator->errors()->all());
        } else {
            DB::beginTransaction();
            try {
                $result = $this->successResponse("Updated Successfully");
                $request['password'] = bcrypt($request['password']);
                $result['data'] = $this->UserService->updateUser($request->except('password_confirmation'), $id);
                DB::commit();
            } catch (\Exception $e) {
                $result = $this->errorResponse($e);
                DB::rollback();
            }
        }
        return $this->returnResponse($result);
    }
    public function sign_in(Request $request)
    {

      
        $credentials = Validator::make($request->all(), [
            'employee_number' => 'required',
            'password' => 'required',
        ]);

        if ($credentials->fails()) {
            $result = $this->failedValidationResponse($credentials->errors()->all());
        } else {

            if (Auth::attempt($request->all())) {
                $session= json_decode(json_encode(Auth::user()), true);
                $request->session()->put($session);
                $result = $this->successResponse("Login SuccessFully");
                $result['data'] =  $request->session()->all();
                //return redirect('dashboard');
                
            } else {
                $result = $this->failedValidationResponse("The provided credentials do not match our records.");
            }
        }
        return $this->returnResponse($result);
    }
 

}
