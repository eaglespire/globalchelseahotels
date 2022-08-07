<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'check_in_date_time' => 'required',
            'check_out_date_time' => 'required',
            'booking_type' => 'required',
            'rooms' => 'required',
            'payment_type' => 'required',
            'no_of_adult' => 'required',
            'no_of_children' => 'required',
        ];
    }
}