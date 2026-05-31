@php
  $profileData = $profile ?? null;

  $projectPageLabel = $profileData?->projects_page_label ?? 'projects';
  $projectPageTitle = $profileData?->projects_page_title ?? 'Semua Project';
  $projectPageDescription = $profileData?->projects_page_description ?? 'Daftar project yang dikelola via Filament Admin — data langsung dari database.';

  $filters = [
    'all' => 'all',
    'active' => 'active',
    'done' => 'done',
    'wip' => 'wip',
  ];
@endphp

<div>
  <div class="wrap sec-pad">
    @if($projectPageLabel)
      <div class="sec-label">
        {{ $projectPageLabel }}
      </div>
    @endif

    @if($projectPageTitle)
      <h2 class="sec-title">
        {{ $projectPageTitle }}
      </h2>
    @endif

    @if($projectPageDescription)
      <p class="sec-sub">
        {{ $projectPageDescription }}
      </p>
    @endif

    <div class="filter-bar">
      @foreach($filters as $value => $label)
        <button
          type="button"
          class="filter-btn {{ $filter === $value ? 'active' : '' }}"
          wire:click="setFilter('{{ $value }}')"
        >
          {{ $label }}
        </button>
      @endforeach
    </div>

    <div class="proj-grid">
      @forelse($projects as $project)
        <a href="{{ url('/projects/' . $project->slug) }}" class="pc">
          <div class="pc-thumb">
            @if($project->thumbnail)
              <img
                src="{{ asset('storage/' . $project->thumbnail) }}"
                alt="{{ $project->title }}"
              >
            @endif
          </div>

          <div class="pc-body">
            @if($project->tech_stack)
              <div class="tags">
                @foreach(array_slice(explode(',', $project->tech_stack), 0, 3) as $tech)
                  @if(trim($tech))
                    <span class="tag">{{ trim($tech) }}</span>
                  @endif
                @endforeach

                @if($project->is_featured)
                  <span class="tag g">featured</span>
                @endif
              </div>
            @endif

            @if($project->title)
              <div class="pc-title">
                {{ $project->title }}
              </div>
            @endif

            @if($project->short_description)
              <div class="pc-desc">
                {{ \Illuminate\Support\Str::limit($project->short_description, 110) }}
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
      @empty
        <div class="empty-state" style="grid-column:1/-1;">
          <div class="big">📂</div>

          <p>
            Belum ada project untuk filter "{{ $filter }}"
          </p>
        </div>
      @endforelse
    </div>
  </div>
</div>