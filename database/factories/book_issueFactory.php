<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\book_issue;
use App\Models\book;
use App\Models\student;
use Carbon\Carbon;

class book_issueFactory extends Factory
{
    protected $model = book_issue::class;

    public function configure()
    {
        return $this->afterCreating(function (book_issue $issue) {
            $issue->book->update(['status' => 'N']);
        });
    }

    public function definition()
    {
        return [
            'student_id' => student::factory(),
            'book_id' => book::factory(),
            'issue_date' => Carbon::now(),
            'return_date' => Carbon::now()->addDays(7),
            'issue_status' => 'N',
        ];
    }
}
