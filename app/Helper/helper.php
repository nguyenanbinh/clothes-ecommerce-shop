<?php

/** Set Sidebar item active */
if (!function_exists('formatDate')) {
    function setActive(array $route): string
    {
        if (is_array($route)) {
            foreach ($route as $r) {
                if (request()->routeIs($r)) {
                    return 'active';
                }
            }
        }

        return '';
    }

    /** Check if product have discount */

    function checkDiscount($product)
    {
        $currentDate = date('Y-m-d');

        if ($product->offer_price > 0 &&
            $currentDate >= $product->offer_start_date &&
            $currentDate <= $product->offer_end_date) {
            return true;
        }

        return false;
    }

    /** Calculate discount percent */

    function calculateDiscountPercent($originalPrice, $discountPrice)
    {
        $discountAmount = $originalPrice - $discountPrice;
        $discountPercent = ($discountAmount / $originalPrice) * 100;

        return round($discountPercent);
    }

    /** Check the product type */

    function productType($type)
    {
        return match ($type) {
            'new_arrival' => 'New',
            'featured_product' => 'Featured',
            'top_product' => 'Top',
            'best_product' => 'Best',
            default => '',
        };
    }
}
