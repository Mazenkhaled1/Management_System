<?php

namespace App\Http\Requests;

use App\Http\Traits\Api\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;


class UpdateArticalRequest extends FormRequest
{
    use ApiResponse;
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'        => 'required|max:255|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048 ',
            'title'       => 'required|string',
            'description' => 'required|string',
            'comment'     => 'nullable|string',
        ];
    }
}
