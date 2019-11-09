<tr>
    <input type="hidden" name="members[]" value="{{ $member->id }}">
    <td>{{ $member->full_name }}</td>
    <td>{{ $member->description }}</td>
    <td>{{ $member->gender }}</td>
    <td>{{ $member->email }}</td>
    <td>{{ $member->date_of_birth }}</td>
    <td>{{ $member->address }}</td>
    <td>{{ $member->location }}</td>
    <td>
        <button type="button" class="btn btn-danger deleteRow"><i class="far fa-trash-alt"></i></button>
    </td>
</tr>