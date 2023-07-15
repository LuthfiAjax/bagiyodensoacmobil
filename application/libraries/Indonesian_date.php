<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indonesian_date {

    private $days = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    private $months = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    public function format_date($date) {
        $timestamp = $date;
        $day_index = date('w', $timestamp);
        $day_name = $this->days[$day_index];
        $month_index = date('n', $timestamp);
        $month_name = $this->months[$month_index];
        $new_date = $day_name . ', ' . date('d', $timestamp) . ' ' . $month_name . ' ' . date('Y', $timestamp);
        return $new_date;
    }

}
