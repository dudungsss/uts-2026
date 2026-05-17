<x-layouts.app :title="$project->title . ' — Yuliadhy Nugraha'">
<div>
<style>
.detail-hero{padding:3rem 2rem 2rem;max-width:1060px;margin:0 auto;}
.back-btn{font-family:var(--mono);font-size:10px;color:var(--muted);background:none;border:none;cursor:pointer;
  letter-spacing:.07em;display:inline-flex;align-items:center;gap:6px;margin-bottom:2rem;transition:color .2s;text-decoration:none;}
.back-btn:hover{color:var(--acc2);}
.detail-header{display:grid;grid-template-columns:1fr auto;gap:2rem;align-items:start;margin-bottom:2.5rem;}
.detail-title{font-size:2.2rem;font-weight:800;letter-spacing:-.03em;margin-bottom:.8rem;}
.detail-desc{font-size:14px;color:var(--muted);line-height:1.85;max-width:580px;}
.detail-meta{background:var(--surf);border:1px solid var(--bdr);border-radius:10px;padding:1.5rem;min-width:200px;}
.meta-row{display:flex;flex-direction:column;gap:3px;margin-bottom:1rem;padding-bottom:1rem;border-bottom:1px solid var(--bdr);}
.meta-row:last-child{margin-bottom:0;padding-bottom:0;border-bottom:none;}
.meta-label{font-family:var(--mono);font-size:9px;color:var(--muted2);letter-spacing:.1em;text-transform:uppercase;}
.meta-val{font-family:var(--mono);font-size:11px;color:var(--txt);}

.detail-body{max-width:1060px;margin:0 auto;padding:0 2rem 4rem;}
.detail-sections{display:grid;grid-template-columns:1fr;gap:1.25rem;}
.ds{background:var(--surf);border:1px solid var(--bdr);border-radius:10px;overflow:hidden;}
.ds-head{padding:1rem 1.5rem;border-bottom:1px solid var(--bdr);display:flex;align-items:center;gap:10px;}
.ds-num{font-family:var(--mono);font-size:10px;color:var(--acc);background:rgba(59,130,246,.1);
  border:1px solid var(--bdr2);width:26px;height:26px;border-radius:4px;display:flex;align-items:center;justify-content:center;}
.ds-htitle{font-size:.95rem;font-weight:700;}
.ds-body{padding:1.5rem;}
.ds-body p{font-size:13px;color:var(--muted);line-height:1.85;margin-bottom:.8rem;}
.ds-body p:last-child{margin-bottom:0;}

.req-grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
.req-box{background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;padding:1rem;}
.req-box h4{font-family:var(--mono);font-size:10px;color:var(--acc);letter-spacing:.07em;text-transform:uppercase;margin-bottom:.6rem;}
.req-item{font-size:12px;color:var(--muted);padding:4px 0;border-bottom:1px solid var(--bdr);display:flex;gap:8px;}
.req-item:last-child{border-bottom:none;}
.req-item::before{content:'→';color:var(--acc);font-size:11px;flex-shrink:0;}

.feat-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:10px;}
.feat-item{background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;padding:1rem;}
.feat-item i{font-size:18px;color:var(--acc2);margin-bottom:8px;display:block;}
.feat-item .ft{font-size:12px;font-weight:600;margin-bottom:3px;}
.feat-item .fd{font-size:11px;color:var(--muted);}

.arch-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:10px;}
.arch-item{background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;padding:.9rem;text-align:center;}
.arch-icon{font-size:22px;margin-bottom:6px;}
.arch-name{font-family:var(--mono);font-size:11px;color:var(--txt);font-weight:700;}
.arch-role{font-family:var(--mono);font-size:9px;color:var(--muted2);margin-top:2px;}

.diagram-placeholder{background:var(--surf2);border:1px dashed var(--bdr2);border-radius:8px;
  min-height:180px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;}
.diagram-placeholder i{font-size:32px;color:var(--muted2);}
.diagram-placeholder span{font-family:var(--mono);font-size:11px;color:var(--muted2);letter-spacing:.07em;}
.diagram-placeholder small{font-family:var(--mono);font-size:9px;color:var(--muted2);opacity:.6;}
.diagram-img{width:100%;border-radius:8px;border:1px solid var(--bdr);}
.two-col{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}

.erd-mini{width:100%;font-size:11px;}
.erd-table{background:var(--surf);border:1px solid var(--bdr2);border-radius:6px;overflow:hidden;margin-bottom:0;}
.erd-th{background:rgba(59,130,246,.12);padding:6px 10px;font-family:var(--mono);font-size:10px;
  color:var(--acc2);letter-spacing:.05em;border-bottom:1px solid var(--bdr2);font-weight:700;}
.erd-tr{display:flex;gap:0;border-bottom:1px solid var(--bdr);}
.erd-tr:last-child{border-bottom:none;}
.erd-pk{font-family:var(--mono);font-size:9px;color:var(--amber);padding:5px 8px;min-width:28px;
  border-right:1px solid var(--bdr);display:flex;align-items:center;}
.erd-field{font-family:var(--mono);font-size:9px;color:var(--txt);padding:5px 8px;flex:1;}
.erd-type{font-family:var(--mono);font-size:9px;color:var(--muted2);padding:5px 8px;text-align:right;}
.erd-rel{display:flex;align-items:center;justify-content:center;gap:8px;padding:8px 0;
  font-family:var(--mono);font-size:10px;color:var(--muted2);}

.progress-section{background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;padding:1.25rem;}
.prog-label{font-family:var(--mono);font-size:9px;color:var(--muted2);letter-spacing:.1em;text-transform:uppercase;margin-bottom:.5rem;}
.prog-val{font-family:var(--mono);font-size:1.1rem;color:var(--acc2);font-weight:700;margin-bottom:.6rem;}
.prog-bar{height:6px;background:var(--surf);border-radius:3px;overflow:hidden;}
.prog-fill{height:100%;background:var(--acc);border-radius:3px;}
.timeline{margin-top:1rem;}
.tl-item{display:flex;gap:10px;margin-bottom:.8rem;font-size:12px;color:var(--muted);}
.tl-dot{width:8px;height:8px;border-radius:50%;background:var(--acc);flex-shrink:0;margin-top:3px;}
.tl-dot.done{background:var(--green);}
.tl-dot.todo{background:var(--muted2);}

@media(max-width:700px){.detail-header{grid-template-columns:1fr;}.two-col{grid-template-columns:1fr;}.req-grid{grid-template-columns:1fr;}}
</style>

  <div class="detail-hero">
    <a href="/projects" class="back-btn">← kembali ke projects</a>
    <div class="detail-header">
      <div>
        <div class="tags" style="margin-bottom:1rem;">
          @foreach(explode(',', $project->tech_stack) as $tech)
            <span class="tag">{{ trim($tech) }}</span>
          @endforeach
          @if($project->is_featured)
            <span class="tag g">featured</span>
          @endif
        </div>
        <div class="detail-title">{{ $project->title }}</div>
        <div class="detail-desc">{{ $project->short_description }}</div>
      </div>
      <div class="detail-meta">
        <div class="meta-row">
          <div class="meta-label">status</div>
          @php
            $statusClass = match($project->status) {
              'active' => 'active', 'done','completed' => 'done', default => 'wip',
            };
          @endphp
          <span class="badge {{ $statusClass }}" style="display:inline-block;width:fit-content;margin-top:4px;">{{ $project->status }}</span>
        </div>
        <div class="meta-row">
          <div class="meta-label">tech stack</div>
          <div class="meta-val">{{ $project->tech_stack }}</div>
        </div>
        <div class="meta-row">
          <div class="meta-label">dibuat</div>
          <div class="meta-val">{{ $project->created_at->format('M Y') }}</div>
        </div>
        @if($project->is_featured)
        <div class="meta-row">
          <div class="meta-label">featured</div>
          <div class="meta-val" style="color:var(--green);">★ yes</div>
        </div>
        @endif
      </div>
    </div>
  </div>

  @if($report)
  <div class="detail-body">
    <div class="detail-sections">

      {{-- 01 Problem Analysis --}}
      <div class="ds">
        <div class="ds-head"><div class="ds-num">01</div><div class="ds-htitle">Analisis Masalah</div></div>
        <div class="ds-body">
          @foreach(explode("\n", $report->problem_analysis) as $line)
            @if(trim($line)) <p>{{ trim($line) }}</p> @endif
          @endforeach
        </div>
      </div>

      {{-- 02 System Requirements --}}
      <div class="ds">
        <div class="ds-head"><div class="ds-num">02</div><div class="ds-htitle">Kebutuhan Sistem</div></div>
        <div class="ds-body">
          <div class="req-grid">
            <div class="req-box">
              <h4>Functional</h4>
              @foreach(explode("\n", $report->system_requirements) as $line)
                @if(trim($line)) <div class="req-item">{{ trim($line) }}</div> @endif
              @endforeach
            </div>
            <div class="req-box">
              <h4>Non-Functional</h4>
              <div class="req-item">Dark mode aesthetic UI</div>
              <div class="req-item">Responsive layout</div>
              <div class="req-item">Docker containerized</div>
              <div class="req-item">Filament admin panel</div>
            </div>
          </div>
        </div>
      </div>

      {{-- 03 Main Features --}}
      <div class="ds">
        <div class="ds-head"><div class="ds-num">03</div><div class="ds-htitle">Fitur Utama</div></div>
        <div class="ds-body">
          <div class="feat-grid">
            @foreach(explode("\n", $report->main_features) as $line)
              @if(trim($line))
              <div class="feat-item">
                <i class="ti ti-check" aria-hidden="true"></i>
                <div class="ft">{{ trim($line) }}</div>
              </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>

      {{-- 04 Architecture --}}
      <div class="ds">
        <div class="ds-head"><div class="ds-num">04</div><div class="ds-htitle">Arsitektur & Tech Stack</div></div>
        <div class="ds-body">
          @foreach(explode("\n", $report->architecture) as $line)
            @if(trim($line)) <p>{{ trim($line) }}</p> @endif
          @endforeach
          <div style="margin-top:1rem;padding:1rem;background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;">
            <div style="font-family:var(--mono);font-size:10px;color:var(--acc);margin-bottom:6px;letter-spacing:.05em;">ARSITEKTUR ALUR</div>
            <div style="font-family:var(--mono);font-size:11px;color:var(--muted);display:flex;align-items:center;gap:6px;flex-wrap:wrap;">
              <span style="color:var(--txt);">Browser</span><span style="color:var(--acc);">→</span>
              <span style="color:var(--txt);">Route</span><span style="color:var(--acc);">→</span>
              <span style="color:var(--txt);">Livewire Component</span><span style="color:var(--acc);">→</span>
              <span style="color:var(--txt);">Eloquent Model</span><span style="color:var(--acc);">→</span>
              <span style="color:var(--txt);">MariaDB</span><span style="color:var(--acc);">→</span>
              <span style="color:var(--txt);">Blade View</span>
            </div>
          </div>
        </div>
      </div>

      {{-- 05 ERD --}}
      <div class="ds">
        <div class="ds-head"><div class="ds-num">05</div><div class="ds-htitle">ERD — Entity Relationship Diagram</div></div>
        <div class="ds-body">
          @if($report->erd_image)
            <img src="/storage/{{ $report->erd_image }}" alt="ERD" class="diagram-img">
          @else
            <div class="diagram-placeholder">
              <i class="ti ti-photo" aria-hidden="true"></i>
              <span>[ gambar ERD dari database ]</span>
              <small>upload via Filament Admin → ProjectReport → erd_image</small>
            </div>
          @endif
        </div>
      </div>

      {{-- 06 Flowchart --}}
      <div class="ds">
        <div class="ds-head"><div class="ds-num">06</div><div class="ds-htitle">Flowchart Sistem</div></div>
        <div class="ds-body">
          <div style="background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;padding:1.25rem;margin-bottom:1rem;">
            <div style="font-family:var(--mono);font-size:10px;color:var(--acc);margin-bottom:10px;letter-spacing:.05em;">ALUR SISTEM — USER JOURNEY</div>
            <div style="display:flex;flex-direction:column;gap:6px;font-family:var(--mono);font-size:11px;">
              <div style="display:flex;align-items:center;gap:8px;">
                <div style="background:rgba(59,130,246,.15);border:1px solid var(--bdr2);border-radius:4px;padding:4px 10px;color:var(--acc2);">User Buka Website</div>
                <span style="color:var(--muted2);">↓</span>
              </div>
              <div style="display:flex;align-items:center;gap:8px;">
                <div style="background:var(--surf);border:1px solid var(--bdr);border-radius:4px;padding:4px 10px;color:var(--txt);">Home Page — Hero + Tech Stack</div>
                <span style="color:var(--muted2);">↓</span>
              </div>
              <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;">
                <div style="background:var(--surf);border:1px solid var(--bdr);border-radius:4px;padding:4px 10px;color:var(--txt);">Projects Page — Daftar Project</div>
                <span style="color:var(--muted2);">↓</span>
              </div>
              <div style="display:flex;align-items:center;gap:8px;">
                <div style="background:rgba(52,211,153,.08);border:1px solid var(--green-bdr);border-radius:4px;padding:4px 10px;color:var(--green);">Detail Project — Laporan Awal ★</div>
                <span style="color:var(--muted2);">↓</span>
              </div>
              <div style="display:flex;align-items:center;gap:8px;">
                <div style="background:var(--surf);border:1px solid var(--bdr);border-radius:4px;padding:4px 10px;color:var(--txt);">Contact Form → Simpan ke DB</div>
              </div>
            </div>
          </div>
          @if($report->flowchart_image)
            <img src="/storage/{{ $report->flowchart_image }}" alt="Flowchart" class="diagram-img">
          @else
            <div class="diagram-placeholder">
              <i class="ti ti-git-branch" aria-hidden="true"></i>
              <span>[ gambar flowchart dari database ]</span>
              <small>upload via Filament Admin → ProjectReport → flowchart_image</small>
            </div>
          @endif
        </div>
      </div>

      {{-- 07 Progress --}}
      <div class="ds">
        <div class="ds-head"><div class="ds-num">07</div><div class="ds-htitle">Progress Status</div></div>
        <div class="ds-body">
          <div class="progress-section">
            <div class="prog-label">overall progress</div>
            <div class="prog-val">{{ $report->progress_status }}</div>
            @php
              preg_match('/(\d+)%/', $report->progress_status, $m);
              $pct = $m[1] ?? 50;
            @endphp
            <div class="prog-bar"><div class="prog-fill" style="width:{{ $pct }}%;"></div></div>
          </div>
          <div style="margin-top:.8rem;font-family:var(--mono);font-size:10px;color:var(--muted2);text-align:right;">
            * status ini diupdate dinamis via Filament Admin Panel — tanpa edit kode
          </div>
        </div>
      </div>

    </div>
  </div>
  @else
  <div class="detail-body">
    <div style="font-family:var(--mono);font-size:12px;color:var(--muted2);padding:2rem;background:var(--surf);
      border:1px dashed var(--bdr2);border-radius:10px;text-align:center;">
      Laporan untuk project ini belum dibuat.<br>
      <small style="opacity:.6;">Tambahkan via Filament Admin → Project Reports</small>
    </div>
  </div>
  @endif
</div>
</x-layouts.app>