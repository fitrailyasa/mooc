<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MoocController extends Controller
{
    public function index()
    {
        // Definisi kriteria dan bobot Fuzzy (contoh menggunakan TFN)
        $criteria = [
            [
                'name' => 'Organisational',
                'weight' => [0.22, 0.25, 0.30] // nilai fuzzy [l, m, u]
            ],
            [
                'name' => 'Technical',
                'weight' => [0.18, 0.20, 0.22]
            ],
            [
                'name' => 'Social',
                'weight' => [0.25, 0.30, 0.35]
            ],
            [
                'name' => 'Pedagogical',
                'weight' => [0.20, 0.22, 0.24]
            ],
            [
                'name' => 'Software',
                'weight' => [0.15, 0.18, 0.20]
            ]
        ];

        // Data alternatif dan penilaian skala Likert untuk setiap kriteria
        $alternatives = [
            'Academia' => [4, 3, 4, 5, 3],
            'Research' => [3, 4, 3, 4, 2],
            'Software Development' => [5, 4, 5, 4, 4],
            'Administration' => [2, 3, 4, 3, 3]
        ];

        // 1. Defuzzifikasi bobot fuzzy menggunakan rata-rata
        $defuzzified_weights = [];
        foreach ($criteria as $criterion) {
            $defuzzified_weight = array_sum($criterion['weight']) / count($criterion['weight']);
            $defuzzified_weights[$criterion['name']] = $defuzzified_weight;
        }

        // 2. Menghitung rata-rata (mean) untuk setiap kriteria di semua alternatif
        $criteria_means = [];
        for ($i = 0; $i < count($criteria); $i++) {
            $total = 0;
            foreach ($alternatives as $alt) {
                $total += $alt[$i];
            }
            $criteria_means[$criteria[$i]['name']] = $total / count($alternatives);
        }

        // 3. Menghitung PDA dan NDA setiap alternatif untuk setiap kriteria
        $results = [];
        foreach ($alternatives as $altName => $scores) {
            $SP = 0;
            $SN = 0;
            foreach ($scores as $index => $score) {
                $criterionName = $criteria[$index]['name'];
                $mean = $criteria_means[$criterionName];
                $weight = $defuzzified_weights[$criterionName];

                // Menghitung Positive Distance from Average (PDA) dan Negative Distance from Average (NDA)
                $PDA = max(0, ($score - $mean) / $mean);
                $NDA = max(0, ($mean - $score) / $mean);

                // Akumulasi SP (Sum Positive) dan SN (Sum Negative)
                $SP += $weight * $PDA;
                $SN += $weight * $NDA;
            }

            // 4. Menghitung Total Skor Evaluasi (S)
            $S = ($SP + (1 - $SN)) / 2;
            $results[$altName] = $S;
        }

        // 5. Urutkan hasil berdasarkan nilai evaluasi S tertinggi
        arsort($results);

        // Menampilkan hasil di view atau JSON
        return response()->json([
            'defuzzified_weights' => $defuzzified_weights,
            'criteria_means' => $criteria_means,
            'results' => $results
        ]);
    }
}
