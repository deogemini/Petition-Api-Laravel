<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetitionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //this is where the data to be viewed in a json object will be structured
        return [
            'id' => $this->id,
            'title' =>ucwords($this->title),
            'description' => $this->description,
            'category' => $this->category,
            'author' => $this->author,
            'signees' => $this->signees
        ];
    }
}
