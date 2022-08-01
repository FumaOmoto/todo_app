<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{   
    /** @test */
    public function show_index(){
        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200);
    }
    
    /** @test */
    public function show_edit(){
        $response = $this->get(route('tasks.edit'));
        $response->assertStatus(200);
    }

}
