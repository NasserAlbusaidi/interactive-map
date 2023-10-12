<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LogisticCalculator extends Component
{
    public $initialPopulation;
    public $growthRate;
    public $carryingCapacity;
    public $iterations;
    public $answer = [];
    public $data;

    public function calculate()
    {

        $initialPop = $this->initialPopulation / 1000;
        // Initialize array to store population values
        $population = [$initialPop];

        // Run the logistic map for 100 iterations to observe long-term behavior
        for ($i = 0; $i < $this->iterations; $i++) {
            $xn = end($population);
            $xn1 = $this->growthRate * $xn * (1 - $xn);
            $population[] = $xn1;
        }

        // Convert the population fractions back to actual numbers by multiplying with the carrying capacity (1000)
        $this->answer = array_map(function ($p) {
            return $p * $this->carryingCapacity;
        }, $population);



        $this->emit('updateLogisticGraph', [
            'labels' => range(0, $this->iterations),
            'data' => $this->answer,
        ]);
    }


    public function render()
    {
        return view('livewire.logistic-calculator');
    }
}
