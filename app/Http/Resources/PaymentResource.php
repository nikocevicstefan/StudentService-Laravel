<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
                'id'        => $this->id,
                'type'      => 'Payment',
                'semester_id'  =>$this->semester_id,
                'student_id'   => $this->student_id,
                'amount'       => $this->amount
            ];
    }
}
