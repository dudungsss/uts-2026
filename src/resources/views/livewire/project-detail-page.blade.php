{{-- <x-layouts.app :title="$project->title . ' — ' . ($profile?->name ?? '')"> --}}
@php
  $profileData = $profile ?? null;

  $backUrl = $profileData?->projects_button_url ?? '/projects';
  $backText = $profileData?->project_detail_back_text ?? '← kembali ke projects';

  $techStackList = $project->tech_stack_list ?? array_values(array_filter(array_map(
      'trim',
      explode(',', $project->tech_stack ?? '')
  )));

  $thumbnailUrl = $project->thumbnail_url ?? ($project->thumbnail ? asset('storage/' . $project->thumbnail) : null);

  $statusClass = $project->status_class ?? match($project->status) {
      'active' => 'active',
      'done', 'completed' => 'done',
      default => 'wip',
  };

  $reportSectionTitles = [
      'problem' => $profileData?->detail_problem_title ?? 'Analisis Masalah',
      'requirements' => $profileData?->detail_requirements_title ?? 'Kebutuhan Sistem',
      'features' => $profileData?->detail_features_title ?? 'Fitur Utama',
      'architecture' => $profileData?->detail_architecture_title ?? 'Arsitektur & Tech Stack',
      'erd' => $profileData?->detail_erd_title ?? 'ERD — Entity Relationship Diagram',
      'flowchart' => $profileData?->detail_flowchart_title ?? 'Flowchart Sistem',
      'progress' => $profileData?->detail_progress_title ?? 'Progress Status',
  ];

  $nonFunctionalItems = array_values(array_filter(array_map(
      'trim',
      explode("\n", $report?->non_functional_requirements ?? '')
  )));

  $architectureFlowItems = array_values(array_filter(array_map(
      'trim',
      explode("\n", $report?->architecture_flow ?? '')
  )));

  $flowchartSteps = array_values(array_filter(array_map(
      'trim',
      explode("\n", $report?->flowchart_steps ?? '')
  )));

  $emptyReportText = $profileData?->detail_empty_report_text ?? 'Laporan untuk project ini belum dibuat.';
  $emptyReportHint = $profileData?->detail_empty_report_hint ?? 'Tambahkan via Filament Admin → Project Reports';
@endphp

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

.diagram-placeholder{background:var(--surf2);border:1px dashed var(--bdr2);border-radius:8px;
  min-height:180px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;}
.diagram-placeholder i{font-size:32px;color:var(--muted2);}
.diagram-placeholder span{font-family:var(--mono);font-size:11px;color:var(--muted2);letter-spacing:.07em;}
.diagram-placeholder small{font-family:var(--mono);font-size:9px;color:var(--muted2);opacity:.6;}
.diagram-img{width:100%;border-radius:8px;border:1px solid var(--bdr);}

.progress-section{background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;padding:1.25rem;}
.prog-label{font-family:var(--mono);font-size:9px;color:var(--muted2);letter-spacing:.1em;text-transform:uppercase;margin-bottom:.5rem;}
.prog-val{font-family:var(--mono);font-size:1.1rem;color:var(--acc2);font-weight:700;margin-bottom:.6rem;}
.prog-bar{height:6px;background:var(--surf);border-radius:3px;overflow:hidden;}
.prog-fill{height:100%;background:var(--acc);border-radius:3px;}

@media(max-width:700px){.detail-header{grid-template-columns:1fr;}.req-grid{grid-template-columns:1fr;}}
</style>

  <div class="detail-hero">
    <a href="{{ $backUrl }}" class="back-btn">
      {{ $backText }}
    </a>

    <div class="detail-header">
      <div>
        @if(count($techStackList) > 0 || $project->is_featured)
          <div class="tags" style="margin-bottom:1rem;">
            @foreach($techStackList as $tech)
              <span class="tag">{{ $tech }}</span>
            @endforeach

            @if($project->is_featured)
              <span class="tag g">
                {{ $profileData?->featured_label ?? 'featured' }}
              </span>
            @endif
          </div>
        @endif

        @if($project->title)
          <div class="detail-title">
            {{ $project->title }}
          </div>
        @endif

        @if($project->short_description)
          <div class="detail-desc">
            {{ $project->short_description }}
          </div>
        @endif
      </div>

      <div class="detail-meta">
        @if($project->status)
          <div class="meta-row">
            <div class="meta-label">
              {{ $profileData?->detail_status_label ?? 'status' }}
            </div>

            <span class="badge {{ $statusClass }}" style="display:inline-block;width:fit-content;margin-top:4px;">
              {{ $project->status }}
            </span>
          </div>
        @endif

        @if($project->tech_stack)
          <div class="meta-row">
            <div class="meta-label">
              {{ $profileData?->detail_tech_stack_label ?? 'tech stack' }}
            </div>

            <div class="meta-val">
              {{ $project->tech_stack }}
            </div>
          </div>
        @endif

        @if($project->created_at)
          <div class="meta-row">
            <div class="meta-label">
              {{ $profileData?->detail_created_label ?? 'dibuat' }}
            </div>

            <div class="meta-val">
              {{ $project->created_at->format('M Y') }}
            </div>
          </div>
        @endif

        @if($project->is_featured)
          <div class="meta-row">
            <div class="meta-label">
              {{ $profileData?->featured_label ?? 'featured' }}
            </div>

            <div class="meta-val" style="color:var(--green);">
              ★ {{ $profileData?->featured_yes_text ?? 'yes' }}
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>

  @if($report)
    <div class="detail-body">
      <div class="detail-sections">

        {{-- 01 Problem Analysis --}}
        @if($report->problem_analysis)
          <div class="ds">
            <div class="ds-head">
              <div class="ds-num">01</div>
              <div class="ds-htitle">{{ $reportSectionTitles['problem'] }}</div>
            </div>

            <div class="ds-body">
              @foreach(explode("\n", $report->problem_analysis) as $line)
                @if(trim($line))
                  <p>{{ trim($line) }}</p>
                @endif
              @endforeach
            </div>
          </div>
        @endif

        {{-- 02 System Requirements --}}
        @if($report->system_requirements || count($nonFunctionalItems) > 0)
          <div class="ds">
            <div class="ds-head">
              <div class="ds-num">02</div>
              <div class="ds-htitle">{{ $reportSectionTitles['requirements'] }}</div>
            </div>

            <div class="ds-body">
              <div class="req-grid">
                @if($report->system_requirements)
                  <div class="req-box">
                    <h4>{{ $profileData?->functional_label ?? 'Functional' }}</h4>

                    @foreach(explode("\n", $report->system_requirements) as $line)
                      @if(trim($line))
                        <div class="req-item">{{ trim($line) }}</div>
                      @endif
                    @endforeach
                  </div>
                @endif

                @if(count($nonFunctionalItems) > 0)
                  <div class="req-box">
                    <h4>{{ $profileData?->non_functional_label ?? 'Non-Functional' }}</h4>

                    @foreach($nonFunctionalItems as $item)
                      <div class="req-item">{{ $item }}</div>
                    @endforeach
                  </div>
                @endif
              </div>
            </div>
          </div>
        @endif

        {{-- 03 Main Features --}}
        @if($report->main_features)
          <div class="ds">
            <div class="ds-head">
              <div class="ds-num">03</div>
              <div class="ds-htitle">{{ $reportSectionTitles['features'] }}</div>
            </div>

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
        @endif

        {{-- 04 Architecture --}}
        @if($report->architecture || count($architectureFlowItems) > 0)
          <div class="ds">
            <div class="ds-head">
              <div class="ds-num">04</div>
              <div class="ds-htitle">{{ $reportSectionTitles['architecture'] }}</div>
            </div>

            <div class="ds-body">
              @if($report->architecture)
                @foreach(explode("\n", $report->architecture) as $line)
                  @if(trim($line))
                    <p>{{ trim($line) }}</p>
                  @endif
                @endforeach
              @endif

              @if(count($architectureFlowItems) > 0)
                <div style="margin-top:1rem;padding:1rem;background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;">
                  <div style="font-family:var(--mono);font-size:10px;color:var(--acc);margin-bottom:6px;letter-spacing:.05em;">
                    {{ $profileData?->architecture_flow_label ?? 'ARSITEKTUR ALUR' }}
                  </div>

                  <div style="font-family:var(--mono);font-size:11px;color:var(--muted);display:flex;align-items:center;gap:6px;flex-wrap:wrap;">
                    @foreach($architectureFlowItems as $index => $item)
                      <span style="color:var(--txt);">{{ $item }}</span>

                      @if(! $loop->last)
                        <span style="color:var(--acc);">→</span>
                      @endif
                    @endforeach
                  </div>
                </div>
              @endif
            </div>
          </div>
        @endif

        {{-- 05 ERD --}}
        @if($report->erd_image)
          <div class="ds">
            <div class="ds-head">
              <div class="ds-num">05</div>
              <div class="ds-htitle">{{ $reportSectionTitles['erd'] }}</div>
            </div>

            <div class="ds-body">
              <img src="{{ asset('storage/' . $report->erd_image) }}" alt="{{ $reportSectionTitles['erd'] }}" class="diagram-img">
            </div>
          </div>
        @endif

        {{-- 06 Flowchart --}}
        @if($report->flowchart_image || count($flowchartSteps) > 0)
          <div class="ds">
            <div class="ds-head">
              <div class="ds-num">06</div>
              <div class="ds-htitle">{{ $reportSectionTitles['flowchart'] }}</div>
            </div>

            <div class="ds-body">
              @if(count($flowchartSteps) > 0)
                <div style="background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;padding:1.25rem;margin-bottom:1rem;">
                  <div style="font-family:var(--mono);font-size:10px;color:var(--acc);margin-bottom:10px;letter-spacing:.05em;">
                    {{ $profileData?->flowchart_steps_label ?? 'ALUR SISTEM' }}
                  </div>

                  <div style="display:flex;flex-direction:column;gap:6px;font-family:var(--mono);font-size:11px;">
                    @foreach($flowchartSteps as $step)
                      <div style="display:flex;align-items:center;gap:8px;">
                        <div style="background:var(--surf);border:1px solid var(--bdr);border-radius:4px;padding:4px 10px;color:var(--txt);">
                          {{ $step }}
                        </div>

                        @if(! $loop->last)
                          <span style="color:var(--muted2);">↓</span>
                        @endif
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif

              @if($report->flowchart_image)
                <img src="{{ asset('storage/' . $report->flowchart_image) }}" alt="{{ $reportSectionTitles['flowchart'] }}" class="diagram-img">
              @endif
            </div>
          </div>
        @endif

        {{-- 07 Progress --}}
        @if($report->progress_status)
          <div class="ds">
            <div class="ds-head">
              <div class="ds-num">07</div>
              <div class="ds-htitle">{{ $reportSectionTitles['progress'] }}</div>
            </div>

            <div class="ds-body">
              <div class="progress-section">
                <div class="prog-label">
                  {{ $profileData?->overall_progress_label ?? 'overall progress' }}
                </div>

                <div class="prog-val">
                  {{ $report->progress_status }}
                </div>

                @php
                  preg_match('/(\d+)%/', $report->progress_status, $m);
                  $pct = $m[1] ?? 0;
                @endphp

                <div class="prog-bar">
                  <div class="prog-fill" style="width:{{ $pct }}%;"></div>
                </div>
              </div>

              @if($profileData?->progress_note)
                <div style="margin-top:.8rem;font-family:var(--mono);font-size:10px;color:var(--muted2);text-align:right;">
                  {{ $profileData->progress_note }}
                </div>
              @endif
            </div>
          </div>
        @endif

      </div>
    </div>
  @else
    <div class="detail-body">
      <div style="font-family:var(--mono);font-size:12px;color:var(--muted2);padding:2rem;background:var(--surf);
        border:1px dashed var(--bdr2);border-radius:10px;text-align:center;">
        {{ $emptyReportText }}

        @if($emptyReportHint)
          <br>
          <small style="opacity:.6;">
            {{ $emptyReportHint }}
          </small>
        @endif
      </div>
    </div>
  @endif
</div>
{{-- </x-layouts.app> --}}