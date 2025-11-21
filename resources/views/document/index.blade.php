@extends('layout.app')

@section('content')
<div class="row">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{route('document.create')}}" class="btn btn-outline-primary">Add Document</a>
    </div>
</div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Path</th>
                    <th>Uploaded by</th>
                    {{-- <th>Header 4</th>
                    <th>Header 5</th> --}}
                </tr>
            </thead>
            <tbody>
                @if ($documents != null && count($documents) > 0)
                    @foreach ($documents as $item)
                        <tr>
                            <td>{{ $item->name ?? 'N/A' }}</td>
                            <td>{{ $item->file_path ?? 'N/A' }}</td>
                            <td>{{ $item->uploaded_by ?? 'N/A' }}</td>
                            {{-- <td>Row Data 4</td> --}}
                            {{-- <td>Row Data 5</td> --}}
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
