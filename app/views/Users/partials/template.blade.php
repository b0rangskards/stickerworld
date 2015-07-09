<table id="{{ $id }}" class="{{ $class }}">
    <colgroup>
        @for ($i = 0; $i < count($columns); $i++)
        <col class="con{{ $i }}" />
        @endfor
    </colgroup>
    <thead>
    <tr>
        @foreach($columns as $i => $c)
        <th align="center" valign="middle" class="head{{ $i }}">{{ $c }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($data as $user)
    <tr>
        <td>
           <span class="weight600">{{$user->username}}</span>
        </td>
        <td>
            {{
            $user->recstat === 'A' ?
                '<span class="badge bg-success">Yes</span>'
                :
                '<span class="badge bg-danger">No</span>'
            }}
        </td>
        <td>
            @if ($user->role->id === 1)
            {{
                '<span class="badge bg-info">',$user->role->present()->prettyRoleName,'</span>'
            }}
            @elseif ($user->role->id === 2)
            {{
                '<span class="badge bg-success">',$user->role->present()->prettyRoleName,'</span>'
            }}
            @elseif ($user->role->id === 3)
            {{
                '<span class="badge bg-warning">',$user->role->present()->prettyRoleName,'</span>'
            }}
            @elseif ($user->role->id === 4)
            {{
                '<span class="badge bg-primary">',$user->role->present()->prettyRoleName,'</span>'
            }}
            @endif
        </td>
        <td>
            <span class="text-muted">{{$user->present()->lastLoginHuman }}</span>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@if (!$noScript)
    @include('datatable::javascript', array('id' => $id, 'options' => $options, 'callbacks' =>  $callbacks))
@endif