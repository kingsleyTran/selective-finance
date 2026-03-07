<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OurTeam extends Component
{
    public string $title;
    public ?string $subtitle = null;
    public array $members;

    /**
     * Create a new component instance.
     *
     * @param  array<int, object{name: string, role: string, image?: string, link?: string}>  $members
     */
    public function __construct(string $title, ?string $subtitle = null, array $members = [])
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        foreach ($members as $member) {
            $this->members[] = (object) [
                'name' => is_object($member) ? ($member->name[0]->text ?? '') : ($member['name'] ?? ''),
                'position' => is_object($member) ? ($member->position[0]->text ?? '') : ($member['position'] ?? ''),
                'avatar' => is_object($member) ? ($member->avatar->url ?? '') : ($member['avatar'] ?? ''),
                'phone_number' => is_object($member) ? ($member->phone_number[0]->text ?? '') : ($member['phone_number'] ?? ''),
                'email' => is_object($member) ? ($member->email[0]->text ?? '') : ($member['email'] ?? ''),
            ];
        }
    }

    /**
     * Get the view / contents of the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.our-team');
    }
}
