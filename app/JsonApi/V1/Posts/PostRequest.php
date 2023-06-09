<?php

namespace App\JsonApi\V1\Posts;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class PostRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // If rules are complex, split into single lines
            'content' => ['required', 'string',],
            'publishedAt' => ['nullable', JsonApiRule::dateTime(),],
            'slug' => [
                'required',
                'string',
                Rule::unique('posts', 'slug'),
            ],
            'tags' => [JsonApiRule::toMany(),],
            'title' => ['required', 'string',],
        ];
    }

}
