<?php
namespace App\View\Helper;

use Cake\View\Helper;

class BloodBaseHelper extends Helper
{
    public function formatNric($nric)
    {
        if (strlen($nric) === 9) {
            return substr($nric, 0, 1) . '****' . substr($nric, 5);
        }
        return $nric;
    }

    public function formatPhone($phone)
    {
        if (strlen($phone) === 10) {
            return substr($phone, 0, 3) . '-' . substr($phone, 3, 3) . '-' . substr($phone, 6);
        }
        return $phone;
    }

    public function formatDateTime($dateTime)
    {
        if ($dateTime instanceof \Cake\I18n\Time) {
            return $dateTime->format('Y-m-d H:i');
        }
        return date('Y-m-d H:i', strtotime($dateTime));
    }

    public function getAppointmentStatus($dateTime, $manualStatus = null)
    {
        if ($manualStatus) {
            return ucfirst($manualStatus);
        }

        $now = new \DateTime();
        $appointmentTime = $dateTime instanceof \DateTime ? $dateTime : new \DateTime($dateTime);

        if ($appointmentTime < $now) {
            return 'Completed';
        }
        return 'Upcoming';
    }
}