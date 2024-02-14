<?php

namespace App\Http\Controllers\Articals;

use App\Helpers\ApiResponse;
use App\Exceptions\ArticalException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticalRequest;
use App\Http\Requests\UpdateArticalRequest;
use App\Http\Resources\StoreArticalResource;
use App\Http\Resources\UpdateArticalResource;
use App\Http\Service\Articals\StoreArticalService;
use App\Http\Service\Articals\UpdateArticalService;
use App\Http\Service\Articals\deleteArticalService;
use App\Models\Artical;
use App\Models\User;
use Illuminate\Http\Request;

class UserArticalController extends Controller
{

    protected $storeArticalService;
    protected $updateArticalService;
    protected $deleteArticalService;

    public function __construct(StoreArticalService $storeArticalService, UpdateArticalService  $updateArticalService, deleteArticalService $deleteArticalService)
    {
        $this->storeArticalService  = $storeArticalService;
        $this->updateArticalService = $updateArticalService;
        $this->deleteArticalService = $deleteArticalService;
    }
    public function store(StoreArticalRequest $request)
    {
        $record = $this->storeArticalService->store($request);
        if ($record) {
            return $this->apiResponseStored(new StoreArticalResource($record));
        }
    }
    public function update(UpdateArticalRequest $request, Artical $artical)
    {
        $record = $this->updateArticalService->update($request, $artical);
        return $this->apiResponseUpdated(new UpdateArticalResource($record));
    }


    public function destroy(Request $request, Artical $article)
    {
        $delete = $this->deleteArticalService->destroy($request, $article);
        return $this->apiResponseDeleted();
    }
}
