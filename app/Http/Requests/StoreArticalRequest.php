<?php

namespace App\Http\Requests;

use App\Http\Traits\Api\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;


class StoreArticalRequest extends FormRequest
{
    use ApiResponse;
        /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

        /**
     * Get the validation rules that apply to the request.
     *
     */

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
