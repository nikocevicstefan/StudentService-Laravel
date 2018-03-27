<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return
            [
                'id' => $this->id,
                'type' => 'Course',
                'name' => $this->name,
                'semesters' => SemesterResource::collection($this->semesters),
            ];
    }
}
