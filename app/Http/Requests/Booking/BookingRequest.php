<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'bookingDate' => ['required', 'date', 'max:255'],
            'bookingHour' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'restaurant_table_id' => ['required', 'numeric', 'min:1', 'max:5']
        ];
    }

}
