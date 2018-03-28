<?php

namespace App\Http\Resources;

use App\Student_Subject;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Student_SubjectCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => Student_SubjectResource::collection($this->collection),
        ];
    }
}
