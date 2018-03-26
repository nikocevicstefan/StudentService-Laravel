<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
            [
                'id'          => $this->id,
                'type'         => 'Student',
                'attributes'  => [
                    'first name'=> $this->first_name,
                    'last name'=> $this->last_name,
                    'birth date'=> $this->birth_date,
                    'index'=> $this->index,
                ],
                'course' => $this->course->name,
            ];
    }
}
