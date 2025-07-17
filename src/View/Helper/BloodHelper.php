<?php
namespace App\View\Helper;

use Cake\View\Helper;

class BloodHelper extends Helper
{
    /**
     * Returns the color associated with a blood type
     *
     * @param string $bloodType The blood type (A, B, AB, O, etc.)
     * @return string Hex color code
     */
    public function typeColor($bloodType)
    {
        $colors = [
            'A+' => '#e74c3c',  // Red
            'A-' => '#e74c3c',
            'B+' => '#3498db',  // Blue
            'B-' => '#3498db',
            'AB+' => '#9b59b6', // Purple
            'AB-' => '#9b59b6',
            'O+' => '#2ecc71',  // Green
            'O-' => '#2ecc71',
        ];

        // Default to a neutral color if blood type not found
        return $colors[$bloodType] ?? '#95a5a6';
    }

    /**
     * Returns a formatted blood type with color
     *
     * @param string $bloodType The blood type
     * @return string HTML formatted blood type
     */
    public function formattedType($bloodType)
    {
        $color = $this->typeColor($bloodType);
        return '<span style="color: ' . $color . '; font-weight: bold;">' . h($bloodType) . '</span>';
    }
}