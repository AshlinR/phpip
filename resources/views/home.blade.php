@extends('layouts.app')

@section('content')



<!-- /.content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Stats</h3>
              @canany(['admin', 'readwrite'])
              <div class="card-tools">
                <a class="btn btn-tool btn-sm" href="/matter/create?operation=new">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
              @endcanany
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                  <tr>
                    <th>Type</th>
                    <th>Count</th>
                  </tr>
                  @foreach ($categories as $group)
                  <tr class="reveal-hidden">
                    <td class="py-0">
                      <a href="/matter?Cat={{ $group->category_code }}">{{ $group->category }}</a>
                    </td>
                    <td class="py-0">
                      {{ $group->total }}
                    </td>
                    <td class="py-0">
                      @canany(['admin', 'readwrite'])
                      <a class="btn btn-primary btn-sm hidden-action float-right" href="/matter/create?operation=new&category={{$group->category_code}}" data-target="#ajaxModal" title="Create {{ $group->category }}" data-toggle="modal" data-size="modal-sm">
                        <i class="fas fa-plus-circle"></i>
                      </a>
                      @endcanany
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
            <div class="col-lg-6">
              <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Tasks</h3>
                  @canany(['admin', 'readwrite'])
                  <div class="card-tools">
                    <a class="btn btn-tool btn-sm" href="/matter/create?operation=new" data-target="#ajaxModal" data-toggle="modal" data-size="modal-sm">
                      <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-bars"></i>
                    </a>
                  </div>
                  @endcanany
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                      <tr>
                        <th>User</th>
                        <th>Open</th>
                        <th>Hottest</th>
                      </tr>
                        @foreach ($taskscount as $group)
                          @if ($group->no_of_tasks > 0)
                          <tr>
                            <td>
                                <a href="/home?user_dashboard={{ $group->login }}">{{ $group->login }}</a>
                            </td>
                            <td>
                                {{ $group->no_of_tasks }}
                            </td>
                              @if ($group->urgent_date < now())
                            <td class="table-danger">
                            @elseif ($group->urgent_date < now()->addWeeks(2))
                            <td class="table-warning">
                              @else
                            <td>
                              @endif
                                {{ Carbon\Carbon::parse($group->urgent_date)->isoFormat('L') }}
                            </td>
                          </tr>
                          @endif
                        @endforeach
                    </table>
                  </div>
                </div>
              </table>
            </div>
          </div>
  </div>
  <div class="span" id="filter">
    <div class="card">
      <div class="card-header border-0">
        <form class="row">
          <div class="lead col-2">
            Open tasks
          </div>
          @cannot('client')
          <div class="col-6">
            <div class="input-group">
              <div class="btn-group btn-group-toggle input-group-prepend" data-toggle="buttons">
                <label class="btn btn-secondary active">
                  <input type="radio" name="what_tasks" id="alltasks" value="0" checked>Everyone
                </label>
                @if(!Request::filled('user_dashboard'))
                <label class="btn btn-secondary">
                  <input type="radio" name="what_tasks" id="mytasks" value="1">{{ Auth::user()->login }}
                </label>
                @endif
                <label class="btn btn-secondary">
                  <input type="radio" name="what_tasks" id="clientTasks" value="2">Client
                </label>
              </div>
              <input type="hidden" id="clientId" name="client_id">
              <input type="text" class="form-control mr-3" data-ac="/actor/autocomplete" data-actarget="client_id" placeholder="Select Client">
            </div>
          </div>
          <div class="col-4">
            <div class="input-group">
              @canany(['admin', 'readwrite'])
              <div class="input-group-prepend">
                <button class="btn btn-light" type="button" id="clearOpenTasks">Clear selected on</button>
              </div>
              <input type="text" class="form-control mr-2" name="datetaskcleardate" id="taskcleardate" value="{{ now()->isoFormat('L') }}">
              @endcanany
            </div>
          </div>
          @endcannot
        </form>
        <div class="row mt-1">
          <div class="col">
          </div>
          <div class="col-2">
            Matter
          </div>
          <div class="col">
            Description
          </div>
          <div class="col-2">
            Due date
          </div>
          @canany(['admin', 'readwrite'])
          <div class="col-1">
            Clear
          </div>
          @endcanany
        </div>
      </div>
      <div class="card" id="tasklist">
        {{-- Placeholder --}}
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="lead col-8">
            Open renewals
          </div>
          @canany(['admin', 'readwrite'])
          <div class="col">
            <div class="input-group">
              <div class="input-group-prepend">
                <button class="btn btn-light" type="button" id="clearRenewals">Clear selected on</button>
              </div>
              <input type="text" class="form-control mr-2" name="renewalcleardate" id="renewalcleardate" value="{{ now()->isoFormat('L') }}">
            </div>
          </div>
          @endcanany
        </div>
        <div class="row mt-1">
          <div class="col">
          </div>
          <div class="col-2">
            Matter
          </div>
          <div class="col">
            Description
          </div>
          <div class="col-2">
            Due date
          </div>
          @canany(['admin', 'readwrite'])
          <div class="col-1">
            Clear
          </div>
          @endcanany
        </div>
      </div>

      <div class="card-body p-1" id="renewallist">
        {{-- Placeholder --}}
      </div>
    </div>
  </div>
</div>

@if (session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif

@stop

@section('script')

@include('home-js')

@stop
