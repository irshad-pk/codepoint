<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Student Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Mark</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('marks.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('marks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Student</strong>
                        <select name="student_id" id="student_id">
                            <option value="">Select a Student</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Term</strong>
                        <select name="term_id" id="term_id">
                            <option value="">Select a Student</option>
                            @foreach ($terms as $term)
                                <option value="{{ $term->id }}">{{ $term->term }}</option>
                            @endforeach
                        </select>
                        @error('term_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Maths:</strong>
                        <input type="text" name="maths" class="form-control" placeholder="maths">
                        @error('maths')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Science:</strong>
                        <input type="text" name="science" class="form-control" placeholder="science">
                        @error('science')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Computer:</strong>
                        <input type="text" name="computer" class="form-control" placeholder="computer">
                        @error('computer')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var countryId = $(this).val();

                if (countryId) {
                    $.ajax({
                        url: '{{ route('get.states.by.country') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            country_id: countryId
                        },
                        success: function(states) {
                            $('#state').empty();

                            $.each(states, function(id, name) {
                                $('#state').append($('<option>', {
                                    value: id,
                                    text: name
                                }));
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
