<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Index</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('marks.create') }}"> Create Student mark</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Maths</th>
                    <th>Science</th>
                    <th>Computer</th>
                    <th>Term</th>
                    <th>Total
                        Marks</th>
                    <th>Created On</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marks as $mark)
                    <tr>
                        <td>{{ $mark->id }}</td>
                        <td>{{ $mark->student->name }}</td>
                        <td>{{ $mark->maths }}</td>
                        <td>{{ $mark->science }}</td>
                        <td>{{ $mark->computer }}</td>
                        <td>{{ $mark->term->term }}</td>
                        <td>{{ $mark->total }}</td>
                        <td>{{ $mark->created_at }}</td>
                        <td>
                            <form action="{{ route('marks.destroy',$mark->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('marks.edit',$mark->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html> 