@php
  $profileData = $profile ?? null;

  $contactLabel = $profileData?->contact_section_label;
  $contactTitle = $profileData?->contact_section_title;
  $contactDescription = $profileData?->contact_section_description;

  $contactInfoTitle = $profileData?->contact_info_title;
  $contactInfoDescription = $profileData?->contact_info_description;

  $localDomainLabel = $profileData?->local_domain_label;
  $localDomainUrl = $profileData?->local_domain_url;
  $adminDomainUrl = $profileData?->admin_domain_url;

  $successMessage = $profileData?->contact_success_message ?? '✓ pesan terkirim!';

  $nameLabel = $profileData?->contact_name_label ?? 'nama';
  $namePlaceholder = $profileData?->contact_name_placeholder ?? 'Nama kamu';

  $emailLabel = $profileData?->contact_email_label ?? 'email';
  $emailPlaceholder = $profileData?->contact_email_placeholder ?? 'email@domain.com';

  $messageLabel = $profileData?->contact_message_label ?? 'pesan';
  $messagePlaceholder = $profileData?->contact_message_placeholder ?? 'Tulis pesanmu di sini...';

  $submitText = $profileData?->contact_submit_text ?? 'kirim pesan →';
  $loadingText = $profileData?->contact_loading_text ?? 'mengirim...';
@endphp

<div>
  <div class="wrap sec-pad">
    @if($contactLabel)
      <div class="sec-label">
        {{ $contactLabel }}
      </div>
    @endif

    @if($contactTitle)
      <h2 class="sec-title">
        {{ $contactTitle }}
      </h2>
    @endif

    @if($contactDescription)
      <p class="sec-sub">
        {{ $contactDescription }}
      </p>
    @endif

    <div class="contact-layout">
      <div class="ci">
        @if($contactInfoTitle)
          <h3>{{ $contactInfoTitle }}</h3>
        @endif

        @if($contactInfoDescription)
          <p>{{ $contactInfoDescription }}</p>
        @endif

        @forelse($socialContacts as $contact)
          <a
            href="{{ $contact->url }}"
            @if($contact->contact_type !== 'email') target="_blank" rel="noopener noreferrer" @endif
            class="cl"
          >
            <div class="cl-ico">
              {{ $contact->icon }}
            </div>

            {{ $contact->name }}
          </a>
        @empty
          <div class="empty-state">
            <p>Contact belum ditambahkan.</p>
          </div>
        @endforelse

        @if($localDomainLabel || $localDomainUrl || $adminDomainUrl)
          <div style="margin-top:1.5rem;background:var(--surf);border:1px solid var(--bdr);border-radius:8px;padding:1rem;">
            @if($localDomainLabel)
              <div style="font-family:var(--mono);font-size:9px;color:var(--muted2);letter-spacing:.1em;text-transform:uppercase;margin-bottom:.5rem;">
                {{ $localDomainLabel }}
              </div>
            @endif

            @if($localDomainUrl)
              <div style="font-family:var(--mono);font-size:12px;color:var(--acc2);">
                {{ $localDomainUrl }}
              </div>
            @endif

            @if($adminDomainUrl)
              <div style="font-family:var(--mono);font-size:10px;color:var(--muted2);margin-top:3px;">
                {{ $adminDomainUrl }}
              </div>
            @endif
          </div>
        @endif
      </div>

      <div class="cf">
        @if($success)
          <div class="success-msg">
            {{ $successMessage }}
          </div>
        @else
          <label class="fl">
            {{ $nameLabel }}
          </label>

          <input
            type="text"
            class="fi"
            wire:model="name"
            placeholder="{{ $namePlaceholder }}"
          >

          @error('name')
            <div class="error-msg">{{ $message }}</div>
          @enderror

          <label class="fl" style="margin-top:.5rem;">
            {{ $emailLabel }}
          </label>

          <input
            type="email"
            class="fi"
            wire:model="email"
            placeholder="{{ $emailPlaceholder }}"
          >

          @error('email')
            <div class="error-msg">{{ $message }}</div>
          @enderror

          <label class="fl" style="margin-top:.5rem;">
            {{ $messageLabel }}
          </label>

          <textarea
            class="fi"
            wire:model="message"
            placeholder="{{ $messagePlaceholder }}"
          ></textarea>

          @error('message')
            <div class="error-msg">{{ $message }}</div>
          @enderror

          <button
            type="button"
            class="fsub"
            wire:click="submit"
            wire:loading.attr="disabled"
          >
            <span wire:loading.remove>
              {{ $submitText }}
            </span>

            <span wire:loading>
              {{ $loadingText }}
            </span>
          </button>
        @endif
      </div>
    </div>
  </div>
</div>