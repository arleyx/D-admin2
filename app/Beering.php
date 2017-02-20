<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Donation;

class Beering extends Model
{
    public function donations()
    {
        $donations = collect();

        foreach (Donation::all() as $donation) {
            $beering = User::find($donation->user_id)->group->beering;
            if ($this->id == $beering->id) $donations->push($donation);
        }

        return $donations;
    }

    public function getChart()
    {
        $chart = new Chart();
        $donations = $this->donations();

        $months = [];
        $monthsDonations = [];

        foreach ($donations as $donation) {
            $index = strftime('%m', strtotime($donation->date)).strftime('%Y', strtotime($donation->date));
            $value = [
                strftime('%B', strtotime($donation->date)),
                strftime('%Y', strtotime($donation->date)),
            ];

            $months[$index] = $value;

            if (!isset($monthsDonations[$index])) $monthsDonations[$index] = 0;

            $monthsDonations[$index] += $donation->amount;
        }

        $labels = collect(array_values($months));
        $data = collect(array_values($monthsDonations));

        /*$labels->prepend([
            strftime('%B', strtotime($labels->first()[0] .' '. $labels->first()[1] .' -1 month')),
            strftime('%Y', strtotime($labels->first()[0] .' '. $labels->first()[1] .' -1 month')),
        ]);

        $labels->push([
            strftime('%B', strtotime($labels->last()[0] .' '. $labels->last()[1] .' +1 month')),
            strftime('%Y', strtotime($labels->last()[0] .' '. $labels->last()[1] .' +1 month')),
        ]);

        $data->prepend(0);
        $data->push(0);*/

        $chart->setLabels($labels);
        $chart->setData($data);

        return $chart;
    }
}
