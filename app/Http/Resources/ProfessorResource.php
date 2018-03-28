<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfessorResource extends JsonResource
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
                'type'        => 'Professor',
                'attributes'  => [
                    'First name'=>$this->first_name,
                    'Last name'=>$this->last_name,
                    'Birth date'=>$this->birth_date,
                    'Office number'=>$this->office,
                ],
            ];
    }
}
