<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Addattrib extends Component
{
	public $addmores = [];
	public $specheads = [];
	public $attributes = [];

	public function mount($specheads, $attributes)
	{
		$this->specheads = $specheads;
		$this->attributes = $attributes;
	}

	public function increment()
	{
		$this->addmores[] = count($this->addmores);
	}
	public function remove($index)
	{		
		unset($this->addmores[$index]);
	}
    public function render()
    {
        return view('livewire.addattrib');
    }
}
