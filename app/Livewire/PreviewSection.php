<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PageSection;

class PreviewSection extends Component
{
    public PageSection $section;

    public function render()
    {
        return view('livewire.preview-section');
    }
}
