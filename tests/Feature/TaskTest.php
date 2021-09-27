<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Http\Requests\CreateTaskRequest;
use Carbon\Carbon;

// 実行コマンド
// # php artisan test

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 各テストメソッドの実行前に呼ばれる
     */
    public function setUp() :void
    {
      parent::setUp();

      $this->seed('FoldersTableSeeder');
    }
    /**
     * 期限日が日付ではない場合はバリデーションエラー
     * @test
     */
     public function due_date_should_be_date()
     {
         $response = $this->post('/folders/1/tasks/create', [
             'title' => 'Sample task',
             'due_date' => 123, // 不正なデータ（数値）
         ]);

         $response->assertSessionHasErrors([
             'due_date' => 'The :attribute is not a valid date.',
         ]);
     }
     /**
      * 期限日が過去日付の場合はバリデーションエラー
      * @test
      */
    // public function due_date_should_not_be_past()
    // {
    //   $response = $this->post('/folders/1/tasks/create', [
    //     'title' => 'Sample task',
    //     'due_date' => Carbon::yesterday()->format('j F Y'),// 不正な値
    //   ]);
    //
    //   $response->assertSessionHasErrors([
    //     'due_date' => 'due date should not be past ',
    //   ]);
    // }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    }
}
