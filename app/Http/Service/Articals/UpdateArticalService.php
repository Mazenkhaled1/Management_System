<?php

namespace App\Http\Service\Articals;
use App\Http\Requests\UpdateArticalRequest;


class UpdateArticalService
{

    public function update(UpdateArticalRequest $request,$article)
    {
        $data = $request->validated();
        $article->update($data);
        return $article;
    }
}
