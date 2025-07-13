<?php

namespace App;

class Helpers
{
    /**
     * Generate WhatsApp order link from cart data
     *
     * @param array $cart Array of cart items: [['name' => ..., 'qty' => ..., 'price' => ...], ...]
     * @param int $total Total price
     * @param string|null $userName
     * @return string WhatsApp link
     */
    public static function generateWhatsAppOrderLink(array $cart, $total, $userName = null)
    {
        $waNumber = env('RM_WA_NUMBER', '6282162660660');
        $message = "Halo, saya ingin memesan makanan:%0A";
        foreach ($cart as $item) {
            $message .= "- {$item['name']} ({$item['qty']} porsi)%0A";
        }
        $message .= "Total: Rp " . number_format($total, 0, ',', '.') . "%0A";
        if ($userName) {
            $message .= "Nama: {$userName}%0A";
        }
        $link = "https://wa.me/{$waNumber}?text=" . $message;
        return $link;
    }
} 