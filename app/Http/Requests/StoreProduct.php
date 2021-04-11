<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\vendor;
class StoreProduct extends FormRequest
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
        $data = vendor::all();
        return [
            'product_name'=>'string|required',
            'description'=>'string|required',
            'warranty'=>'nullable',
            'product_image'=>'required',
            'stock'=>'nullable|numeric',
            'price'=>'nullable|numeric',
            'offer_price'=>'nullable|numeric',
            'discount_price'=>'nullable|numeric',
            'weight'=>'string|required',
            'size'=>'string|required',
            'colours'=>'string|required',
            'status'=>'required|in:active,inactive',
            'date'=>'string|required',
            'category_id'=>'required|exists:categories,id',
            'child_cat_id'=>'nullable|exists:categories,id',
            'vendor_id'=>'required|exists:vendor,id'
        ];
    }
}
