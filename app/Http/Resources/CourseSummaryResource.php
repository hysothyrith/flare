<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseSummaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category->name,
            'author' => $this->author->first_name . ' ' . $this->author->last_name,
            'cover_image' => $this->cover_image,
            'number_of_lesson' => $this->lessons->count(),
            'duration' => $this->lessons->sum('duration')
        ];
    }
}
