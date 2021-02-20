@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header py-1">
        <span class="lead">
            Manage tasks
        </span>
        @cannot('client')
        <button href="/logs" class="btn btn-info float-right">View logs</button>
        <button id="clearFilters" type="button" class="btn btn-info float-right mr-1">Clear filters</button>
    </div>
    <div class="card-header py-1">
        <nav class="mt-1">
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
            @canany(['admin', 'readwrite'])
            <div class="input-group-prepend">
              <button class="btn btn-light" type="button" id="clearOpenTasks">Clear selected on</button>
            </div>
            <input type="text" class="form-control mr-2" name="datetaskcleardate" id="taskcleardate" value="{{ now()->isoFormat('L') }}">
            @endcanany
          </div>
        </nav>
    </div>
    <div class="card-header py-2">
        <div class="row font-weight-bold">
            <div class="input-group"  id="filterFields">
                <div class="col-1">
                    <input type="text" class="form-control form-control-sm" name="Case" value="{{ Request::get('Case') }}" placeholder="Matter">
                </div>
                <div class="col-2">
                    <input type="text" class="form-control form-control-sm" name="Name" value="{{ Request::get('Task') }}" placeholder="Task">
                </div>
                <div class="col-3">
                    <input type="text" class="form-control form-control-sm" name="Title" value="{{ Request::get('Title') }}" placeholder="Title">
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-2">
                            <input type="text" class="form-control form-control-sm" name="Country" value="{{ Request::get('Country') }}" placeholder="Ctry">
                        </div>
                        <div class="col-3">
                            Cost
                        </div>
                        <div class="col-3">
                            Fee
                        </div>
                        <div class="col-3 text-right">
                            Due
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <input type="date" class="form-control form-control-sm" name="Fromdate" id="Fromdate" title="From selected date" value="{{ Request::get('Fromdate') }}">
                        <input type="date" class="form-control form-control-sm" name="Untildate" id="Untildate" title="Until selected date" value="{{ Request::get('Untildate') }}">
                    </div>
                </div>
                <div class="col-1 px-2">
                    <div class="btn-group-toggle" data-toggle="buttons" title="Select/unselect all">
                        <label class="btn btn-outline-primary far fa-check btn-sm">
                            <input id="selectAll" type="checkbox">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body pt-2" id="taskList">
        @if (count($tasks) == 0)
        <div class="row text-danger">
            The list is empty
        </div>
        @else
        <table class="table table-striped table-sm mb-1">
            @foreach ($tasks as $task)
            <tr class="row overlay" data-resource="/task/{{ $task->id }}">
                <td class="col-1">
                    <a href="/matter/{{ $task->matter_id }}">
                    {{ $task->uid }}
                    </a>
                </td>
                <td class="col-2">
                    {{ $task->name }}
                </td>
                <td class="col-3">
                    {{ $task->title ?? $task->trademark }}
                </td>
                <div class="col-2">
                    {{ $task->detail }}
                </div>
                <td class="col-3">
                    <div class="row">
                        <div class="col-3 text-right">
                            {{ $task->cost }}
                        </div>
                        <div class="col-3 text-right">
                            {{ ($task->sme_status ? $task->fee_reduced : $task->fee) * (1.0 - $task->discount) }}
                        </div>
                    </div>
                </td>
                <td class="col-2 text-left">
                    {{ Carbon\Carbon::parse($task->due_date)->isoFormat('L') }}
                    @if ($task->done)
                    <div class="badge badge-success fas fa check" title="Done">&check;</div>
                    @elseif ($task->due_date < now())
                    <div class="badge badge-danger" title="Overdue">&nbsp;!&nbsp;</div>
                    @elseif ($task->due_date < now()->addWeeks(1))
                    <div class="badge badge-warning" title="Urgent">&nbsp;!&nbsp;</div>
                    @endif
                </td>
                <td class="col-1 px-3">
                    <input id="{{ $task->id }}" class="clear-task" type="checkbox">
                </td>
            </tr>
            @endforeach
        </table>
        {{ $tasks->links() }}
        @endif
    </div>
</div>
@endcannot
@stop

@section('script')
<script type="text/javascript">

    var url = new URL(window.location.href);

    function refreshList() {
        window.history.pushState('', 'phpIP', url);
        reloadPart(url, 'taskList');
    }

    filterFields.addEventListener('input', debounce( e => {
        if (e.target.matches('.form-control')) {
            if (e.target.value.length === 0) {
                url.searchParams.delete(e.target.name);
            } else {
                url.searchParams.set(e.target.name, e.target.value);
            }
            url.searchParams.delete('page');
            refreshList();
        }
    }, 500));

    selectAll.onchange = e => {
        if (e.target.checked) {
            // Check all checkboxes
            newValue = true;
        } else {
            // Uncheck all checkboxes
            newValue = false;
        }
        var boxes = document.getElementsByClassName('clear-task');
        for (box of boxes) {
            box.checked = newValue;
        }
    };

    // Load list according to corresponding tab
    tabsGroup.addEventListener("click", function (e) {
        url.searchParams.delete('step');
        url.searchParams.delete('invoice_step');
        url.searchParams.delete('page');
        if (e.target.hasAttribute('data-step')) {
            url.searchParams.set('step', e.target.dataset.step);
        }
        if (e.target.hasAttribute('data-invoice_step')) {
            url.searchParams.set('invoice_step', e.target.dataset.invoice_step);
        }
        // if (e.target.hasAttribute('href')) {
        //     url.searchParams.set('tab', e.target.getAttribute('href'));
        // }
        window.history.pushState('', 'phpIP', url);
        reloadPart(url, 'taskList');
    });

    clearFilters.onclick = () => {
        for (key of url.searchParams.keys()) {
            if ((key != 'step') && (key != 'invoice_step')) {
                url.searchParams.delete(key);
            }
        }
        window.location.href = url.href;
    };

    doneTasks.addEventListener("click", function (b) {
        msgAction = "resetting";
        actiontasks(b.target, msgAction, '/task/done');
    });

    callTasks.addEventListener("click", function (b) {
        msgAction = "call";
        actiontasks(b.target, msgAction, '/task/call/1')
    });

    tasksSent.addEventListener("click", function (b) {
        msgAction = "call";
        actiontasks(b.target, msgAction, '/task/call/0')
    });

    @if (config('task.invoice.backend') == 'dolibarr')
    invoicetasks.addEventListener("click", function (b) {
        msgAction = "invoicing";
        actiontasks(b.target, msgAction, '/task/invoice/1')
    });
    @endif

    tasksExport.onclick = e => {
        // var tids = getSelected();
        // if (tids.length === 0) {
        //     alert("No tasks selected");
        //     return;
        // }
        // var task_ids = encodeURIComponent(JSON.stringify(tids));
        let exportUrl = '/task/export';
        e.preventDefault(); //stop the browser from following
        window.location.href = exportUrl;
    };

    tasksInvoiced.addEventListener("click", function (b) {
        msgAction = "invoiced";
        actiontasks(b.target, msgAction, '/task/invoice/0')
    });

    invoicesPaid.onclick = (b) => {
        msgAction = "paid";
        actiontasks(b.target, msgAction, '/task/paid')
    }

    instructedtasks.addEventListener("click", function (b) {
        msgAction = "for payment";
        actiontasks(b.target, msgAction, '/task/topay')
    });

    lastRemindertasks.addEventListener("click", function (b) {
        msgAction = "last call";
        actiontasks(b.target, msgAction, '/task/lastcall')
    });

    remindertasks.addEventListener("click", function (b) {
        msgAction = "reminder";
        actiontasks(b.target, msgAction, '/task/reminder')
    });

    @if (config('task.general.receipt_tabs'))
    receipttasks.addEventListener("click", function (b) {
        msgAction = "registering receipt";
        actiontasks(b.target, msgAction, '/task/receipt')
    });

    sendReceiptstasks.addEventListener("click", function (b) {
        msgAction = "closing tasks";
        actiontasks(b.target, msgAction, '/task/closing')
    });
    @endif

    abandontasks.addEventListener("click", function (b) {
        msgAction = "abandon tasks";
        actiontasks(b.target, msgAction, '/task/abandon')
    });

    lapsedtasks.addEventListener("click", function (b) {
        msgAction = "lapsed tasks";
        actiontasks(b.target, msgAction, '/task/lapsing')
    });

    lapsingtasks.addEventListener("click", function (b) {
        msgAction = "lapsed tasks";
        actiontasks(b.target, msgAction, '/task/lapsing')
    });

    sendLapsedtasks.addEventListener("click", function (b) {
        msgAction = "lapse communications sent";
        actiontasks(b.target, msgAction, '/task/closing')
    });

    async function actiontasks(button, msgAction, action_url) {
        // Active spinner
        button.insertAdjacentHTML('afterbegin', '<i class="spinner-border spinner-border-sm" role="status" />');
        var tids = getSelected();
        if (tids.length === 0) {
            var end = document.getElementById('Untildate').value;
            if(!end) {
                alert("No tasks selected for " + msgAction);
                // withdraw spinner and restore button
                button.removeChild(document.getElementsByClassName('spinner-border')[0]);
                return;
            }
            var begin = document.getElementById('Fromdate').value;
            var string = JSON.stringify({'begin':begin, 'end':end});
        } else {
            var string = JSON.stringify({task_ids: tids});
        }
        context_url = new URL(window.location.href);
        await submitUpdate(string, action_url).catch(err => alert(err));
        window.history.pushState('', 'phpIP', context_url);
        reloadPart(context_url, 'taskList');
        // withdraw spinner
        button.removeChild(document.getElementsByClassName('spinner-border')[0]);
    }

    function submitUpdate(string, url) {
        return new Promise(function (resolve, reject) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            xhr.send(string);
            xhr.onload = function () {
                if (this.status === 200) {
                    resolve(JSON.parse(this.responseText).success);
                }
                if (this.status === 419) {
                    reject("Token expired. Refresh the page");
                }
                if (this.status === 404) {
                    reject("No email template found - check that your templates match your client's language");
                } else {
                    reject("Something went wrong");
                }
            }
        });
    }

    xmltasks.addEventListener("click", function () {
        var tids = getSelected();
        if (tids.length === 0) {
            alert("No tasks selected for order");
            return;
        }
        var string = JSON.stringify({task_ids: tids, clear: false});
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/task/order', true);
        xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
        xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        xhr.send(string);
        xhr.onload = function(e) {
            if (this.status == 200) {
                // Find file name
                var filename = xhr.getResponseHeader('Content-Disposition').split("filename=")[1];

                // The actual download by creating a link and clicking it programmatically
                var f = new File([xhr.response], filename, { type: xhr.getResponseHeader('Content-Disposition') });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(f);
                link.download = filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }
    });

    function getSelected() {
        var tids = new Array();
        var boxes = document.getElementsByClassName('clear-ren-task');
        for (box of boxes) {
            if (box.checked) {
                tids.push(box.getAttribute('id'));
            }
        }
        return tids;
    };
</script>
@stop
