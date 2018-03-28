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
        $professors = DB::table('subject_professor')->where('subject_id', $this->id)->select('professor_id', 'position')->get();

        return
            [
                'id' => $this->id,
                'type' => 'Subject',
                'attributes' => [
                    'name' => $this->name,
                    'credits' => $this->credits,
                    'description' => $this->description,
                    'semester' => $this->semester->name,
                    'professors' => $professors,
                    'students' => $this->students
                ],
            ];
    }
}
