<?php

namespace Tests\Feature;

use App\Models\Profile;
use Tests\TestCase;

class ProfileNameTest extends TestCase
{
    /**
     * Test that profile can store name field
     */
    public function test_profile_can_store_name(): void
    {
        $profile = Profile::create([
            'name' => 'Yuliadhy Nugraha',
            'hero_badge' => 'available for work',
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'name' => 'Yuliadhy Nugraha',
        ]);

        $this->assertEquals('Yuliadhy Nugraha', $profile->name);
    }

    /**
     * Test that profile name can be updated
     */
    public function test_profile_name_can_be_updated(): void
    {
        $profile = Profile::create([
            'name' => 'Old Name',
            'hero_badge' => 'available for work',
            'is_active' => true,
        ]);

        $profile->update(['name' => 'Updated Name']);

        $this->assertDatabaseHas('profiles', [
            'id' => $profile->id,
            'name' => 'Updated Name',
        ]);
    }

    /**
     * Test that active profile name can be retrieved
     */
    public function test_get_active_profile_name(): void
    {
        Profile::create([
            'name' => 'Inactive Profile',
            'is_active' => false,
        ]);

        $activeProfile = Profile::create([
            'name' => 'Active Profile',
            'is_active' => true,
        ]);

        $retrieved = Profile::where('is_active', true)->first();

        $this->assertEquals('Active Profile', $retrieved->name);
    }
}
