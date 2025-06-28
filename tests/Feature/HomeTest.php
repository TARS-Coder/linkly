<?php

use App\Models\User;
use App\Models\Company;

it('Check for root response', function () {
    $response = $this->get('/');

    $response->assertRedirect('/login');
});

it("Checking Login", function () {

    $company = Company::factory()->create();
    $user = User::factory()->create([
        "company_id" => $company->id,
    ]);

    $this->actingAs($user);

    $response = $this->get("/");
    $response->assertOk();

});