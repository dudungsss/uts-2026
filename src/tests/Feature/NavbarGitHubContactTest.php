<?php

namespace Tests\Feature;

use App\Models\Contact;
use Tests\TestCase;

class NavbarGitHubContactTest extends TestCase
{
    /**
     * Test that GitHub contact is stored in database
     */
    public function test_github_contact_can_be_stored(): void
    {
        $contact = Contact::create([
            'name' => 'dudungsss',
            'contact_type' => 'github',
            'is_system_contact' => true,
            'url' => 'https://github.com/dudungsss',
            'icon' => '🐙',
            'display_order' => 1,
        ]);

        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'contact_type' => 'github',
            'is_system_contact' => true,
            'name' => 'dudungsss',
        ]);
    }

    /**
     * Test that GitHub contact can be retrieved
     */
    public function test_get_github_contact(): void
    {
        Contact::create([
            'name' => 'LinkedIn Name',
            'contact_type' => 'linkedin',
            'is_system_contact' => true,
            'url' => 'https://linkedin.com',
            'display_order' => 2,
        ]);

        $githubContact = Contact::create([
            'name' => 'dudungsss',
            'contact_type' => 'github',
            'is_system_contact' => true,
            'url' => 'https://github.com/dudungsss',
            'icon' => '🐙',
            'display_order' => 1,
        ]);

        $retrieved = Contact::where('contact_type', 'github')
            ->where('is_system_contact', true)
            ->first();

        $this->assertEquals('dudungsss', $retrieved->name);
        $this->assertEquals('https://github.com/dudungsss', $retrieved->url);
    }

    /**
     * Test that system contacts can be retrieved for navbar
     */
    public function test_get_system_contacts_for_navbar(): void
    {
        $github = Contact::create([
            'name' => 'dudungsss',
            'contact_type' => 'github',
            'is_system_contact' => true,
            'url' => 'https://github.com/dudungsss',
            'icon' => '🐙',
            'display_order' => 1,
        ]);

        $systemContacts = Contact::where('is_system_contact', true)
            ->orderBy('display_order')
            ->get();

        $this->assertCount(1, $systemContacts);
        $this->assertEquals('dudungsss', $systemContacts->first()->name);
    }
}
