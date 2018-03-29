<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class SubjectResource extends JsonResource
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
                'type' => 'Subject',
                'attributes' => [
                    'name' => $this->name,
                    'credits' => $this->credits,
                    'description' => $this->description,
                    'semester' => $this->semester,
                    'professors' => Subject_ProfessorResource::collection($this->subject_professor)
                ],
            ];
    }
}
