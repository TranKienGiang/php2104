<?php

namespace App\Http\Requests;
use App\Rules\Myrule;
// use App\Rules\NumberRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'code' => ['required', new Myrule],
            'product_name' => 'required|max:30',
            'price' => ['required'],
            // 'price' => ['required', new NumberRule],
            'sale_off' => 'min:0|max:80',
            'sale_off' => 'required|numeric',
            'quantity' => 'required|numeric',
            'img_url' => 'mimes:jpg,png|required|max:5000'
        ];
    }
    public function messages(){
        return [
            'code.required' => 'Vui lòng không bỏ trống !!',
            'product_name.required' => 'Vui lòng không bỏ trống !!',
            'product_name.max:30' => 'Vui lòng nhập không quá 30 ký tự !!!',
            'img_name.required' => 'Vui lòng không bỏ trống !!',
            'price.required' => 'Vui lòng không bỏ trống !!',
            'price.numeric' => 'Vui lòng chỉ nhập số [0-9] !!',
            'sale_off.required' => 'Vui lòng không bỏ trống !!',
            'sale_off.required' => 'Vui lòng không bỏ trống !!',
            'sale_off.min:0' => 'Vui lòng chỉ nhập giá trị từ 0 đến 80',
            'sale_off.max:2' => 'Vui lòng chỉ nhập giá trị từ 0 đến 80',
            'quantity.required' => 'Vui lòng không bỏ trống !!',
            'quantity.numeric' => 'Vui lòng chỉ nhập số [0-9] !!',
            'img_url.mimes:jpg,png' => 'Vui lòng chỉ chọn file .jpg hoặc .png!!',
            'img_url.required' => 'Vui lòng không bỏ trống !!',
            'img_url.size:5000' => 'vui lòng nhập đường dẫn không quá 5M !!!',
        ];
        
    }
}
