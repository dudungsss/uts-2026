@php
  $techStacks = is_array($profile?->tech_stacks)
      ? $profile->tech_stacks
      : [];

  $typingTexts = is_array($typingTexts ?? null)
      ? $typingTexts
      : [];

  $githubUrl = $profile?->github_url ?? null;
  $githubLabel = $profile?->github_label ?? null;

  $projectsButtonText = $profile?->projects_button_text ?? null;
  $projectsButtonUrl = $profile?->projects_button_url ?? null;

  $contactButtonText = $profile?->contact_button_text ?? null;
  $contactButtonUrl = $profile?->contact_button_url ?? null;

  $projectsStatLabel = $profile?->projects_stat_label ?? null;
  $techStackStatLabel = $profile?->tech_stack_stat_label ?? null;
  $architectureStatus = $profile?->architecture_status ?? null;
  $architectureLabel = $profile?->architecture_label ?? null;
  $darkModeLabel = $profile?->dark_mode_label ?? null;

  $techSectionLabel = $profile?->tech_section_label ?? null;
  $techSectionTitle = $profile?->tech_section_title ?? null;
  $techSectionDescription = $profile?->tech_section_description ?? null;

  $projectSectionLabel = $profile?->project_section_label ?? null;
  $projectSectionTitle = $profile?->project_section_title ?? null;
  $projectSectionDescription = $profile?->project_section_description ?? null;

  $viewAllProjectsText = $profile?->view_all_projects_text ?? null;
@endphp

<div>
  {{-- HERO --}}
  <div class="hero-sec">
    @if($profile?->hero_badge)
      <div class="hero-badge">
        {{ $profile->hero_badge }}
      </div>
    @endif

    @if($githubUrl && $githubLabel)
      <div class="top-links">
        <a 
          href="{{ $githubUrl }}"
          target="_blank"
          rel="noopener noreferrer"
          class="top-link"
        >
          {{ $githubLabel }}
        </a>
      </div>
    @endif

    <div class="hero">
      @if($profile?->name)
        <h1>
          <span class="solid">{{ $profile->name }}</span>
        </h1>
      @endif

      @if(count($typingTexts) > 0)
        <div class="typing-wrap">
          <span id="typed"></span><span class="cursor"></span>
        </div>
      @endif

      @if($profile?->hero_description)
        <p class="hero-p">
          {{ $profile->hero_description }}
        </p>
      @endif

      @if(($projectsButtonText && $projectsButtonUrl) || ($contactButtonText && $contactButtonUrl))
        <div class="btns">
          @if($projectsButtonText && $projectsButtonUrl)
            <a href="{{ $projectsButtonUrl }}" class="btn-p">
              {{ $projectsButtonText }}
            </a>
          @endif

          @if($contactButtonText && $contactButtonUrl)
            <a href="{{ $contactButtonUrl }}" class="btn-o">
              {{ $contactButtonText }}
            </a>
          @endif
        </div>
      @endif

      <div class="hero-stats">
        @if(isset($totalProjects) && $projectsStatLabel)
          <div class="stat">
            <div class="n">{{ $totalProjects }}+</div>
            <div class="l">{{ $projectsStatLabel }}</div>
          </div>
        @endif

        @if($profile?->total_tech_stack && $techStackStatLabel)
          <div class="stat">
            <div class="n">{{ $profile->total_tech_stack }}</div>
            <div class="l">{{ $techStackStatLabel }}</div>
          </div>
        @endif

        @if($architectureStatus && $architectureLabel)
          <div class="stat">
            <div class="n">{{ $architectureStatus }}</div>
            <div class="l">{{ $architectureLabel }}</div>
          </div>
        @endif

        @if($profile?->dark_mode_status && $darkModeLabel)
          <div class="stat">
            <div class="n">{{ $profile->dark_mode_status }}</div>
            <div class="l">{{ $darkModeLabel }}</div>
          </div>
        @endif
      </div>
    </div>
  </div>

  {{-- TECH STACK --}}
  @if(count($techStacks) > 0)
    <div class="wrap" style="padding-bottom:3.5rem;">
      @if($techSectionLabel)
        <div class="sec-label">
          {{ $techSectionLabel }}
        </div>
      @endif

      @if($techSectionTitle)
        <h2 class="sec-title">
          {{ $techSectionTitle }}
        </h2>
      @endif

      @if($techSectionDescription)
        <p class="sec-sub">
          {{ $techSectionDescription }}
        </p>
      @endif

      <div class="stack-grid">
        @foreach($techStacks as $tech)
          <div class="sk">
            @if(data_get($tech, 'icon'))
              <div class="sk-icon">
                {{ data_get($tech, 'icon') }}
              </div>
            @endif

            @if(data_get($tech, 'name'))
              <div class="sk-name">
                {{ data_get($tech, 'name') }}
              </div>
            @endif

            @if(data_get($tech, 'role'))
              <div class="sk-role">
                {{ data_get($tech, 'role') }}
              </div>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  @endif

  {{-- FEATURED PROJECTS --}}
  @if($featuredProjects->count() > 0)
    <div class="wrap" style="padding-bottom:4rem;">
      @if($projectSectionLabel)
        <div class="sec-label">
          {{ $projectSectionLabel }}
        </div>
      @endif

      @if($projectSectionTitle)
        <h2 class="sec-title">
          {{ $projectSectionTitle }}
        </h2>
      @endif

      @if($projectSectionDescription)
        <p class="sec-sub">
          {{ $projectSectionDescription }}
        </p>
      @endif

      <div class="proj-grid">
        @foreach($featuredProjects as $project)
          <a href="/projects/{{ $project->slug }}" class="pc">
            <div class="pc-thumb">
              @if($project->thumbnail)
                <img src="/storage/{{ $project->thumbnail }}" alt="{{ $project->title }}">
              @endif
            </div>

            <div class="pc-body">
              @if($project->tech_stack)
                <div class="tags">
                  @foreach(explode(',', $project->tech_stack) as $tech)
                    @if(trim($tech))
                      <span class="tag">{{ trim($tech) }}</span>
                    @endif
                  @endforeach
                </div>
              @endif

              @if($project->title)
                <div class="pc-title">
                  {{ $project->title }}
                </div>
              @endif

              @if($project->short_description)
                <div class="pc-desc">
                  {{ \Illuminate\Support\Str::limit($project->short_description, 100) }}
                </div>
              @endif
            </div>

            <div class="pc-foot">
              @php
                $statusClass = match($project->status) {
                  'active' => 'active',
                  'done', 'completed' => 'done',
                  default => 'wip',
                };
              @endphp

              @if($project->status)
                <span class="badge {{ $statusClass }}">
                  {{ $project->status }}
                </span>
              @endif

              <span class="pc-arr">→</span>
            </div>
          </a>
        @endforeach
      </div>

      @if($viewAllProjectsText && $projectsButtonUrl)
        <div class="view-all">
          <a href="{{ $projectsButtonUrl }}" class="btn-o">
            {{ $viewAllProjectsText }}
          </a>
        </div>
      @endif
    </div>
  @endif

  @if(count($typingTexts) > 0)
    <script>
      const texts = @json($typingTexts);
      let ti = 0;
      let ci = 0;
      let del = false;

      const el = document.getElementById('typed');

      function type() {
        if (!el || texts.length === 0) return;

        const t = texts[ti];

        if (!del) {
          el.textContent = t.slice(0, ++ci);

          if (ci === t.length) {
            del = true;
            setTimeout(type, 1800);
            return;
          }
        } else {
          el.textContent = t.slice(0, --ci);

          if (ci === 0) {
            del = false;
            ti = (ti + 1) % texts.length;
          }
        }

        setTimeout(type, del ? 38 : 75);
      }

      type();
    </script>
  @endif
</div>