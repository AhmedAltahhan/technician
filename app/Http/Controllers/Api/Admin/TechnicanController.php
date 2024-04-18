<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthTechnicianResource;
use App\Services\TechnicanService;
use Illuminate\Http\Request;

class TechnicanController extends Controller
{
    public function __construct(private TechnicanService $technicanService)
    {
    }

    public function all()
    {
        $users = $this->technicanService->all();
        return AuthTechnicianResource::collection($users);
    }

    function active(string $id)
    {
        $this->technicanService->active($id);
        return response()->json(['message' => "Done"],200);
    }
}
