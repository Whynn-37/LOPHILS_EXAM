<?php

namespace App\Repositories;

use App\Models\NewsFeed;


class DashboardRepository
{

    public function __construct()
    {
        $this->newsfeed = new NewsFeed();
    }
    public function loadNewsfeed()
    {
        return $this->newsfeed->orderBy('id')->get();
    }
    public function createNewsfeeds($data)
    {
        return $this->newsfeed->create($data);
    }
    public function editNewsfeed($id)
    {
        return $this->newsfeed->findOrFail($id);
    }
    public function delete($id)
    {
       return $this->newsfeed->findOrFail($id)->delete();
    }
    public function updatenewsfeed($data,$id)
    {
        $this->newsfeed->findOrFail($id)->update($data);
    }
  
}
