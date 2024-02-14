<?php

namespace App\Http\Controllers\Articals;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AllArticalsResource;
use App\Http\Service\Articals\AllArticalsService;
use App\Models\Artical;

class AllArticalController extends Controller
{

    protected $allArticalsService;
    public function __construct(AllArticalsService $allArticalsService)
    {
        $this->allArticalsService = $allArticalsService;
    }


    public function index()
    {
        $articals = $this->allArticalsService->index();
        return $this->apiResponse(AllArticalsResource::collection($articals), ' Articals Retrieved Successfully ', 200);
    }


    public function search(Request $request)
    {
        $word    = $request->input('search') ?? null;
        $artical = Artical::search($word)->get();
        if (count($artical) > 0) {
            return $this->apiResponse(AllArticalsResource::collection($artical), 'Search Completed Successfully', 200);
        }
        return $this->apiResponse([], 'Not Matching',404);
    }
}
