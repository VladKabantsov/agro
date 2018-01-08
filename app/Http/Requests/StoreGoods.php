<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoods extends FormRequest
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
//        return [
//            'g_name' => 'required',
//            'barcode' => 'required',
//            'categories_id' => 'required',
//            'manfac_id' => 'required',
//            'measure_id' => 'required',
//            'rec_price' => 'required',
//            'description' => 'required',
//        ];
    }
}
