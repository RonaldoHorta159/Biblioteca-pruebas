<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\{User, auther, category, publisher, book, student, settings, book_issue};

class LibraryLogicTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create());
    }
    public function test_create_author()
    {
        auther::factory()->create(['name' => 'A']);
        $this->assertDatabaseHas('authers', ['name' => 'A']);
    }

    public function test_update_author()
    {
        $a = auther::factory()->create(['name' => 'A']);
        $a->update(['name' => 'B']);
        $this->assertDatabaseHas('authers', ['id' => $a->id, 'name' => 'B']);
    }

    public function test_delete_author()
    {
        $a = auther::factory()->create();
        $a->delete();
        $this->assertDatabaseMissing('authers', ['id' => $a->id]);
    }

    public function test_create_category()
    {
        category::factory()->create(['name' => 'C']);
        $this->assertDatabaseHas('categories', ['name' => 'C']);
    }

    public function test_update_category()
    {
        $c = category::factory()->create(['name' => 'C']);
        $c->update(['name' => 'D']);
        $this->assertDatabaseHas('categories', ['id' => $c->id, 'name' => 'D']);
    }

    public function test_delete_category()
    {
        $c = category::factory()->create();
        $c->delete();
        $this->assertDatabaseMissing('categories', ['id' => $c->id]);
    }

    public function test_create_publisher()
    {
        publisher::factory()->create(['name' => 'P']);
        $this->assertDatabaseHas('publishers', ['name' => 'P']);
    }

    public function test_update_publisher()
    {
        $p = publisher::factory()->create(['name' => 'P']);
        $p->update(['name' => 'Q']);
        $this->assertDatabaseHas('publishers', ['id' => $p->id, 'name' => 'Q']);
    }

    public function test_delete_publisher()
    {
        $p = publisher::factory()->create();
        $p->delete();
        $this->assertDatabaseMissing('publishers', ['id' => $p->id]);
    }

    public function test_create_student()
    {
        student::factory()->create(['name' => 'S']);
        $this->assertDatabaseHas('students', ['name' => 'S']);
    }

    public function test_update_student()
    {
        $s = student::factory()->create(['name' => 'S']);
        $s->update(['name' => 'T']);
        $this->assertDatabaseHas('students', ['id' => $s->id, 'name' => 'T']);
    }

    public function test_delete_student()
    {
        $s = student::factory()->create();
        $s->delete();
        $this->assertDatabaseMissing('students', ['id' => $s->id]);
    }

    public function test_create_book()
    {
        book::factory()->create(['name' => 'B']);
        $this->assertDatabaseHas('books', ['name' => 'B']);
    }

    public function test_update_book()
    {
        $b = book::factory()->create(['name' => 'B']);
        $b->update(['name' => 'C']);
        $this->assertDatabaseHas('books', ['id' => $b->id, 'name' => 'C']);
    }

    public function test_delete_book()
    {
        $b = book::factory()->create();
        $b->delete();
        $this->assertDatabaseMissing('books', ['id' => $b->id]);
    }

    public function test_book_relations()
    {
        $b = book::factory()->create();
        $this->assertNotNull($b->auther);
        $this->assertNotNull($b->category);
        $this->assertNotNull($b->publisher);
    }

    public function test_issue_book_creates_record()
    {
        $issue = book_issue::factory()->create();
        $this->assertDatabaseHas('book_issues', ['id' => $issue->id]);
    }

    public function test_issue_book_updates_status()
    {
        $issue = book_issue::factory()->create();
        $issue->update(['issue_status' => 'Y']);
        $this->assertEquals('Y', $issue->fresh()->issue_status);
    }

    public function test_return_book_sets_return_day()
    {
        $issue = book_issue::factory()->create();
        $issue->update(['return_day' => now()]);
        $this->assertNotNull($issue->fresh()->return_day);
    }

    public function test_settings_update()
    {
        $set = settings::factory()->create();
        $set->update(['fine' => 9]);
        $this->assertEquals(9, $set->fresh()->fine);
    }
    public function test_multiple_books_can_be_created()
    {
        book::factory()->count(3)->create();
        $this->assertDatabaseCount('books', 3);
    }

    public function test_student_email_is_valid()
    {
        $s = student::factory()->create();
        $this->assertMatchesRegularExpression('/@/', $s->email);
    }


    public function test_book_issue_relationships()
    {
        $issue = book_issue::factory()->create();
        $this->assertInstanceOf(book::class, $issue->book);
        $this->assertInstanceOf(student::class, $issue->student);
    }

    public function test_settings_default_values()
    {
        $set = settings::factory()->make();
        $this->assertEquals('N', book_issue::factory()->make()->issue_status);
    }

    public function test_books_table_is_empty_initially()
    {
        $this->assertDatabaseCount('books', 0);
    }

    public function test_students_table_is_empty_initially()
    {
        $this->assertDatabaseCount('students', 0);
    }

    public function test_publishers_table_is_empty_initially()
    {
        $this->assertDatabaseCount('publishers', 0);
    }

    public function test_authors_table_is_empty_initially()
    {
        $this->assertDatabaseCount('authers', 0);
    }

    public function test_categories_table_is_empty_initially()
    {
        $this->assertDatabaseCount('categories', 0);
    }

    public function test_settings_table_is_empty_initially()
    {
        $this->assertDatabaseCount('settings', 0);
    }
    public function test_setting_return_days()
    {
        $set = settings::factory()->create(['return_days' => 5]);
        $this->assertEquals(5, $set->return_days);
    }

    public function test_book_issue_sets_book_unavailable()
    {
        $issue = book_issue::factory()->create();
        $this->assertEquals('N', $issue->book->fresh()->status);
    }

    public function test_book_issue_return_makes_book_available()
    {
        $issue = book_issue::factory()->create();
        $issue->update(['issue_status' => 'Y']);
        $issue->book->update(['status' => 'Y']);
        $this->assertEquals('Y', $issue->book->fresh()->status);
    }

    public function test_author_count()
    {
        auther::factory()->count(3)->create();
        $this->assertDatabaseCount('authers', 3);
    }

    public function test_category_count()
    {
        category::factory()->count(4)->create();
        $this->assertDatabaseCount('categories', 4);
    }

    public function test_publisher_count()
    {
        publisher::factory()->count(2)->create();
        $this->assertDatabaseCount('publishers', 2);
    }

    public function test_student_count()
    {
        student::factory()->count(5)->create();
        $this->assertDatabaseCount('students', 5);
    }

    public function test_book_count()
    {
        book::factory()->count(6)->create();
        $this->assertDatabaseCount('books', 6);
    }

    public function test_issue_count()
    {
        book_issue::factory()->count(7)->create();
        $this->assertDatabaseCount('book_issues', 7);
    }
    public function test_create_multiple_authors()
    {
        auther::factory()->count(2)->create();
        $this->assertDatabaseCount('authers', 2);
    }

    public function test_create_multiple_categories()
    {
        category::factory()->count(2)->create();
        $this->assertDatabaseCount('categories', 2);
    }

    public function test_create_multiple_publishers()
    {
        publisher::factory()->count(2)->create();
        $this->assertDatabaseCount('publishers', 2);
    }

    public function test_create_multiple_students()
    {
        student::factory()->count(2)->create();
        $this->assertDatabaseCount('students', 2);
    }

    public function test_create_multiple_books()
    {
        book::factory()->count(2)->create();
        $this->assertDatabaseCount('books', 2);
    }

    public function test_create_multiple_issues()
    {
        book_issue::factory()->count(2)->create();
        $this->assertDatabaseCount('book_issues', 2);
    }

    public function test_delete_settings()
    {
        $s = settings::factory()->create();
        $s->delete();
        $this->assertDatabaseMissing('settings', ['id' => $s->id]);
    }

    public function test_update_issue_dates()
    {
        $issue = book_issue::factory()->create();
        $issue->update(['return_date' => now()->addDays(2)]);
        $this->assertEquals(2, $issue->return_date->diffInDays($issue->issue_date));
    }
    public function test_setting_fine_defaults()
    {
        $set = settings::factory()->make();
        $this->assertIsInt($set->fine);
    }

    public function test_user_factory_creates_record()
    {
        $user = User::factory()->create();
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    public function test_issue_dates_order()
    {
        $issue = book_issue::factory()->create();
        $this->assertTrue($issue->return_date->gt($issue->issue_date));
    }
}
