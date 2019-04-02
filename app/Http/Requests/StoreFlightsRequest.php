<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFlightsRequest extends FormRequest
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
          'from' => 'required|string|max:255',
          'departure_airport' => 'required|string|max:255',
          'to' => 'required|string|max:255',
          'arrival_airport' => 'required|string|max:255',
          'depart_date' => 'required|string|max:255',
          'depart_time' => 'required|string|max:255',
          'arrival' => 'required|string|max:255',
          'seats' => 'required|string|max:255',
          'price' => 'required|string|max:255',
          'created_by' => 'required',
        ];
    }
}
