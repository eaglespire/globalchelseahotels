<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'room_no' => ['required', 'string', Rule::unique('rooms')->ignore(request()->room)],
            'price' => 'required|numeric',
            'description' => 'required|string',
            'no_of_people' => 'required|numeric',
            'no_of_bed' => 'required|numeric',
            'status' => 'required|string',
            'image' => 'nullable|image:jpg,jpeg,png'
        ];
    }
}