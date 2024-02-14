<?php

namespace App\Http\Service\Articals;

use App\Exceptions\ArticalException;
use Illuminate\Http\Request;

class deleteArticalService
{

    public function destroy(Request $request, $article)
    {
        if ($article->user_id != $request->user()->id) {
            throw new ArticalException('User Not Found');
        }
        $article->delete();
        return $article;
    }
}
