<?php

namespace App;

use Illuminate\Support\Collection;

class Chart
{
    private $labels;
    private $data;

    public function __construct($labels = false, $data = false)
    {
        $this->labels = !$labels ? collect() : $labels;
        $this->data = !$data ? collect() : $data;
    }

    public function addLabel($label)
    {
        $this->labels->push($label);
    }

    public function addData($data)
    {
        $this->data->push($data);
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getLabelsToJson()
    {
        return json_encode($this->labels->toArray());
    }

    public function getDataToJson()
    {
        return json_encode($this->data->toArray());
    }

    public function setLabels(Collection $labels)
    {
        return $this->labels = $labels;
    }

    public function setData(Collection $data)
    {
        return $this->data = $data;
    }
}
