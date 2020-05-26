<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\ProductAttribute;

class Editattrib extends Component
{
	public $addmores = [];
	public $specheads = [];
	public $attributes = [];

	public function mount($specheads, $attributes, $oldattrib)
	{
		$this->specheads = $specheads;
		$this->attributes = $attributes;
		$this->addmores = $oldattrib->toArray();
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
        return view('livewire.editattrib');
    }
}
