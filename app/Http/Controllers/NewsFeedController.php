<?php

namespace App\Http\Controllers;

use App\Models\NewsFeed;
use App\Traits\ResponseTrait;
use App\Services\DashboardService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class NewsFeedController extends Controller
{


    use ResponseTrait;
    public function __construct()
    {
        $this->DashboardService = new DashboardService();
    }
   
    public function index()
    {
        try {
            $result = $this->successResponse('All details successfully loaded!');
            // $this->user::all();
            $result['data'] = $this->DashboardService->loadNewsfeed();
        } catch (\Exception $th) {
            $result = $this->errorResponse($th);
        }
        return $this->returnResponse($result);
    }

  
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
 
        $validator = Validator::make($request->all(), [
            'Title' => 'required|unique:news_feeds',
            'ShortDetails' => 'required',
            'Author' => 'required',
            'DatePublish' => 'required',
        ]);


        if ($validator->fails()) {

            $result = $this->failedValidationResponse($validator->errors()->all());
        } else {
            DB::beginTransaction();
            try {
                $result = $this->successResponse('Save Successfully!');
                $result['data'] = $this->DashboardService->createNewsfeeds($request->all());
                DB::commit();
            } catch (\Exception $th) {
                $result = $this->errorResponse($th);
                DB::rollback();
            }
        }

        return $this->returnResponse($result);
    }


    public function show($id)
    {
        try {
            $result = $this->successResponse('All details successfully loaded!');
                $result['data'] = $this->DashboardService->editNewsfeed($id);
        } catch (\Exception $th) {
            $result = $this->errorResponse($th);
        }


        return $this->returnResponse($result);
    }

 
 

    public function destroy($id)
    {
        $result = $this->successResponse("Deleted Successfully");
        try {
            $result['data'] =  $this->DashboardService->delete($id);
        } catch (ModelNotFoundException $except) {
            $result = $this->modelNotFoundResponse($id);
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }
    public function newsfeed_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Title' => 'required',
            'ShortDetails' => 'required',
            'Author' => 'required',
            'DatePublish' => 'required',
        ]);


        if ($validator->fails()) {
            $result = $this->failedValidationResponse($validator->errors()->all());
        } else {
            DB::beginTransaction();
            try {
                $result = $this->successResponse("Updated Successfully");
                $result['data'] = $this->DashboardService->updatenewsfeed($request->all(), $id);
                DB::commit();
            } catch (\Exception $e) {
                $result = $this->errorResponse($e);
                DB::rollback();
            }
        }
        return $this->returnResponse($result);
    }
}
