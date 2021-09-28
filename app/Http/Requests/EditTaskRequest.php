<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Task;
use Illuminate\Validation\Rule;

class EditTaskRequest extends CreateTaskRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();

        $status_rule = Rule::in(array_keys(Task::STATUS));
        // -> 'in(1, 2, 3)' を出力する

        return $rules + [
            // 'status' => 'required|in(1, 2, 3)',
            'status' => 'required|' . $status_rule,
        ];
    }

    public function attributes()
    {
      $attributes = parent::attributes();

      return $attributes + [
        'status' => 'Status',
      ];
    }

    public function messages()
    {
      $messages = parent::messages();

      $status_labels = array_map(function($item) {
        return $item['label'];
      }, Task::STATUS);

      $status_labels = implode(', ', $status_labels);

      return $messages + [
        'status.in' => ':attribute must be chosen from one of ' . $status_labels . '.',
      ];
    }
}
