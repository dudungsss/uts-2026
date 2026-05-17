<x-layouts.app title="Contact — Yuliadhy Nugraha">
<div>
<style>
.contact-layout{display:grid;grid-template-columns:1fr 1.3fr;gap:2.5rem;margin-top:2rem;}
.ci h3{font-size:1.3rem;font-weight:700;margin-bottom:.8rem;}
.ci p{font-size:13px;color:var(--muted);line-height:1.85;margin-bottom:1.5rem;}
.cl{display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid var(--bdr);
  font-family:var(--mono);font-size:11px;color:var(--muted);text-decoration:none;transition:color .2s;}
.cl:hover{color:var(--acc2);}
.cl-ico{width:30px;height:30px;background:var(--surf2);border:1px solid var(--bdr);border-radius:6px;
  display:flex;align-items:center;justify-content:center;font-size:14px;}
.cf{background:var(--surf);border:1px solid var(--bdr);border-radius:12px;padding:1.75rem;}
.fl{font-family:var(--mono);font-size:10px;color:var(--muted2);letter-spacing:.08em;text-transform:uppercase;
  display:block;margin-bottom:7px;}
.fi{width:100%;background:var(--surf2);border:1px solid var(--bdr);border-radius:6px;
  padding:9px 13px;color:var(--txt);font-family:var(--sans);font-size:13px;outline:none;
  transition:border-color .2s;margin-bottom:1rem;}
.fi:focus{border-color:var(--bdr2);}
.fi::placeholder{color:var(--muted2);}
textarea.fi{resize:vertical;min-height:90px;margin-bottom:1rem;}
.fsub{width:100%;font-family:var(--mono);font-size:11px;color:var(--bg);background:var(--acc);
  padding:11px;border-radius:6px;border:none;cursor:pointer;letter-spacing:.07em;transition:all .2s;}
.fsub:hover{background:var(--acc2);}
.fsub:disabled{opacity:.6;cursor:not-allowed;}
.success-msg{font-family:var(--mono);font-size:11px;color:var(--green);
  background:var(--green-bg);border:1px solid var(--green-bdr);border-radius:6px;padding:10px;
  text-align:center;margin-top:.8rem;}
.error-msg{font-family:var(--mono);font-size:10px;color:var(--amber);margin-top:4px;}
@media(max-width:700px){.contact-layout{grid-template-columns:1fr;}}
</style>

  <div class="wrap sec-pad">
    <div class="sec-label">contact</div>
    <h2 class="sec-title">Get in Touch</h2>
    <p class="sec-sub">Kirim pesan — tersimpan langsung ke database via Laravel Contact model.</p>

    <div class="contact-layout">
      {{-- Info --}}
      <div class="ci">
        <h3>Let's connect</h3>
        <p>Ada pertanyaan tentang project atau ingin berkolaborasi? Isi form atau hubungi langsung melalui channel di bawah.</p>
        <a href="mailto:yuliadhy@email.com" class="cl">
          <div class="cl-ico"><i class="ti ti-mail" aria-hidden="true"></i></div>
          yuliadhy@email.com
        </a>
        <a href="https://github.com/dudungsss" target="_blank" class="cl">
          <div class="cl-ico"><i class="ti ti-brand-github" aria-hidden="true"></i></div>
          github.com/dudungsss
        </a>
        <a href="#" class="cl">
          <div class="cl-ico"><i class="ti ti-brand-linkedin" aria-hidden="true"></i></div>
          linkedin.com/in/yuliadhy
        </a>
        <div style="margin-top:1.5rem;background:var(--surf);border:1px solid var(--bdr);border-radius:8px;padding:1rem;">
          <div style="font-family:var(--mono);font-size:9px;color:var(--muted2);letter-spacing:.1em;text-transform:uppercase;margin-bottom:.5rem;">domain lokal</div>
          <div style="font-family:var(--mono);font-size:12px;color:var(--acc2);">http://UTS.test</div>
          <div style="font-family:var(--mono);font-size:10px;color:var(--muted2);margin-top:3px;">http://UTS.test/admin</div>
        </div>
      </div>

      {{-- Form --}}
      <div class="cf">
        @if($success)
          <div class="success-msg">✓ pesan terkirim! tersimpan ke database contacts.</div>
        @else
          <div>
            <label class="fl">nama</label>
            <input type="text" class="fi" wire:model="name" placeholder="Nama kamu">
            @error('name') <div class="error-msg">{{ $message }}</div> @enderror
          </div>
          <div style="margin-top:1rem;">
            <label class="fl">email</label>
            <input type="email" class="fi" wire:model="email" placeholder="email@domain.com">
            @error('email') <div class="error-msg">{{ $message }}</div> @enderror
          </div>
          <div style="margin-top:1rem;">
            <label class="fl">pesan</label>
            <textarea class="fi" wire:model="message" placeholder="Tulis pesanmu di sini..."></textarea>
            @error('message') <div class="error-msg">{{ $message }}</div> @enderror
          </div>
          <button class="fsub" wire:click="submit" wire:loading.attr="disabled">
            <span wire:loading.remove>kirim pesan →</span>
            <span wire:loading>mengirim...</span>
          </button>
        @endif
      </div>
    </div>
  </div>
</div>
</x-layouts.app>