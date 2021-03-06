@extends('layouts.app')

@section('content')
<legend class="text-light">
  Members of class template
  <a href="template-member/create" class="btn btn-primary float-right" data-toggle="modal" data-target="#ajaxModal" title="Document member" data-source="/template-member" data-resource="/template-member/create/">Create a new member of templates</a>
</legend>
<div class="row">
  <div class="col">
    <div class="card">
      <table class="table table-striped table-hover table-sm">
        <thead>
          <tr id="filter" class="bg-primary text-light">
            <th><input class="filter-input form-control form-control-sm" data-source="/template-member" name="Summary" placeholder="Summary" value="{{ old('Summary') }}"></th>
            <th><input class="filter-input form-control form-control-sm" data-source="/template-member" name="Name" placeholder="Class" value="{{ old('Name') }}"></th>
            <th><input class="filter-input form-control form-control-sm" data-source="/template-member" name="Language" placeholder="Language" value="{{ old('Language') }}"></th>
            <th><input class="filter-input form-control form-control-sm" data-source="/template-member" name="Style" placeholder="Style" value="{{ old('Style') }}"></th>
            <th><input class="filter-input form-control form-control-sm" data-source="/template-member" name="Format" placeholder="Format" value="{{ old('Format') }}"></th>
            <th><input class="filter-input form-control form-control-sm" data-source="/template-member" name="Category" value="{{ old('Category') }}" placeholder="Category" /></th>
          </tr>
        </thead>
        <tbody id="tableList">
          @foreach ($template_members as $member)
          <tr data-id="{{ $member->id }}" class="reveal-hidden">
            <td>
              <a href="/template-member/{{ $member->id }}" data-panel="ajaxPanel" title="Class data">
                {{ $member->summary }}
              </a>
            </td>
            <td>{{ $member->class->name }}</td>
            <td>{{ $member->language }}</td>
            <td>{{ $member->style }}</td>
            <td>{{ $member->format }}</td>
            <td>{{ $member->category }}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="5">
              {{ $template_members->links() }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card border-info">
      <div class="card-header bg-info text-light">
        Template member information
      </div>
      <div class="card-body p-2" id="ajaxPanel">
        <div class="alert alert-info" role="alert">
          Click on member to view and edit details
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

@include('tables.table-js')

@stop
