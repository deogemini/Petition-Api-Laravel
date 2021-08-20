<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PetitionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //when we are returning a list of resource in our api we need to modify again in data object
        return [
            'data' => $this->collection,
            'version' => '1.0',
            'author' => 'Deogratias Gemini'
        ];
    }
}
