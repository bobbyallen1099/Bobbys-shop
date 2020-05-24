<?php

use App\Product;


if (! function_exists('check_if_product_is_live')) {
    function check_if_product_is_live(Product $product) {
        // If draft mode is turned off
        if($product->live == 1) {


            // Setup today variable
            $today = new DateTime();
            $today = $today->format('d/m/Y');

            // Grab start date
            $productStartDate = new DateTime($product->start_date);
            $productStartDate = $productStartDate->format('d/m/Y');

            // Grab end date
            $productEndDate  = new DateTime($product->end_date);
            $productEndDate = $productEndDate->format('d/m/Y');


            // If start & end date are not blank
            if($product->start_date !== "0000-00-00" && $product->end_date !== "0000-00-00") {

                // If today is between start & end date
                $isActive = $today >= $productStartDate && $today <= $productEndDate;

            } else {
                // If only start date is not blank
                if($product->start_date != "0000-00-00") {

                    // If today is bigger than start date
                    $isActive = $today >= $productStartDate;

                }elseif ($product->end_date != "0000-00-00") {
                    // If only end date is not blank

                    // If today is less than end date
                    $isActive = $today <= $productEndDate;

                } else {

                    $isActive = true;

                }

            }

        } else {
            $isActive = false;
        }

        return $isActive;
    }
}