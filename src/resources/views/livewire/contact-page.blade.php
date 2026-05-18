<div>
  <div class="wrap sec-pad">
    <div class="sec-label">contact</div>
    <h2 class="sec-title">Get in Touch</h2>
    <p class="sec-sub">Kirim pesan — tersimpan langsung ke database via Laravel Contact model.</p>

    <div class="contact-layout">
      <div class="ci">
        <h3>Let's connect</h3>
        <p>Ada pertanyaan tentang project atau ingin berkolaborasi? Isi form atau hubungi langsung melalui channel di bawah.</p>
        <a href="mailto:ynugrahauga29@email.com" class="cl">
          <div class="cl-ico">✉</div>
          ynugrahauga29@email.com
        </a>
        <a href="https://github.com/dudungsss" target="_blank" class="cl">
          <div class="cl-ico">⑂</div>
          github.com/dudungsss
        </a>
        <a href="#" class="cl">
          <div class="cl-ico">in</div>
          linkedin.com/in/yuliadhy
        </a>
        <div style="margin-top:1.5rem;background:var(--surf);border:1px solid var(--bdr);border-radius:8px;padding:1rem;">
          <div style="font-family:var(--mono);font-size:9px;color:var(--muted2);letter-spacing:.1em;text-transform:uppercase;margin-bottom:.5rem;">domain lokal</div>
          <div style="font-family:var(--mono);font-size:12px;color:var(--acc2);">http://UTS.test</div>
          <div style="font-family:var(--mono);font-size:10px;color:var(--muted2);margin-top:3px;">http://UTS.test/admin</div>
        </div>
      </div>

      <div class="cf">
        @if($success)
          <div class="success-msg">✓ pesan terkirim! tersimpan ke database contacts.</div>
        @else
          <label class="fl">nama</label>
          <input type="text" class="fi" wire:model="name" placeholder="Nama kamu">
          @error('name') <div class="error-msg">{{ $message }}</div> @enderror

          <label class="fl" style="margin-top:.5rem;">email</label>
          <input type="email" class="fi" wire:model="email" placeholder="email@domain.com">
          @error('email') <div class="error-msg">{{ $message }}</div> @enderror

          <label class="fl" style="margin-top:.5rem;">pesan</label>
          <textarea class="fi" wire:model="message" placeholder="Tulis pesanmu di sini..."></textarea>
          @error('message') <div class="error-msg">{{ $message }}</div> @enderror

          <button class="fsub" wire:click="submit" wire:loading.attr="disabled">
            <span wire:loading.remove>kirim pesan →</span>
            <span wire:loading>mengirim...</span>
          </button>
        @endif
      </div>
    </div>
  </div>
</div>