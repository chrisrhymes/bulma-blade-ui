<?php

namespace Tests\Views;

use Tests\DBTestCase;
use Tests\Models\User;

class PaginationTest extends DBTestCase
{
    /** @test */
    public function it_renders_pagination()
    {
        $view = $this->blade(
            '{{ $users->links("bbui::pagination") }}',
            ['users' => User::paginate(1)]
        );

        $view->assertSee('<nav class="pagination is-centered" role="navigation" aria-label="pagination">', false);
        $view->assertSee('Goto page 1');
        $view->assertSee('Goto page 2');
        $view->assertSee('pagination-previous');
        $view->assertSee('pagination-next');
    }

    /** @test */
    public function it_does_not_render_pagination_when_not_needed()
    {
        $view = $this->blade(
            '{{ $users->links("bbui::pagination") }}',
            ['users' => User::paginate(3)]
        );

        $view->assertDontSee('<nav class="pagination is-centered" role="navigation" aria-label="pagination">', false);
    }
}
