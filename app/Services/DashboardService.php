<?php

namespace App\Services;

use App\Repositories\DashboardRepository;

Class DashboardService
{

    public function __construct()
    {
        $this->DashboardRepository= new DashboardRepository();
    }

    public function loadNewsfeed()
    {
       return $this->DashboardRepository->loadNewsfeed();
    }
    public function createNewsfeeds($data)
    {
       return $this->DashboardRepository->createNewsfeeds($data);
    }
    public function editNewsfeed($id)
    {
       return $this->DashboardRepository->editNewsfeed($id);
    }
    public function delete($id)
    {
       return $this->DashboardRepository->delete($id);
    }
    public function updatenewsfeed($data, $id)
    {
       return $this->DashboardRepository->updatenewsfeed($data,$id);
    }

}