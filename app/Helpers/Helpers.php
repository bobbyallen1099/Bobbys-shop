<?php
if (! function_exists('check_if_product_is_live')) {
    function check_if_product_is_live($product_id) {
        // ...
        $product = \App\Product::where('id', $product_id)->first();

        $today = new DateTime();
        $today = $today->format('d/m/Y');

        $productStartDate = new DateTime($product->start_date);
        $productStartDate = $productStartDate->format('d/m/Y');

        $productEndDate  = new DateTime($product->end_date);
        $productEndDate = $productEndDate->format('d/m/Y');

        $isActive = $today >= $productStartDate && $today <= $productEndDate;

        return $isActive;
    }
}