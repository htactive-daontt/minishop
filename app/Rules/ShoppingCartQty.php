<?php

namespace App\Rules;

use App\Entities\Products\Products;
use Illuminate\Contracts\Validation\Rule;

class ShoppingCartQty implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id, $qty)
    {
        $this->id = $id;
        $this->qty = $qty;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $product = Products::find($this->id);

        if( $this->qty > $product->qty ) {
            return false;
        }else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Số lượng sản phẩm không đủ.';
    }
}
