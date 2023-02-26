<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Student</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('students.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Student Name:</strong>
                        <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Student Name">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>DOB:</strong>
                        <input type="date" name="dob" value="{{ $student->dob }}" class="form-control" placeholder="dob">
                        @error('dob')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gender:</strong>
                        {{-- <input type="text" name="gender" class="form-control" placeholder="gender"> --}}
                            <div>
                                <input type="radio"  name="gender"
                                    value="Male" {{ ($student->gender== "Male")? "checked" : "" }}>
                                <label for="Male">Male</label>
                            </div>
                            <div>
                                <input type="radio"  name="gender"
                                    value="Female" {{ ($student->gender== "Female")? "checked" : "" }}>
                                <label for="Female">Female</label>
                            </div>
                        @error('gender')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mobile:</strong>
                        <input type="text" name="mobile" value="{{ $student->mobile }}" class="form-control" placeholder="mobile">
                        @error('mobile')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="email" value="{{ $student->email }}" class="form-control" placeholder="email">
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Country:</strong>
                        {{-- <input type="text" name="country" class="form-control" placeholder="country"> --}}
                        <label for="country">Country:</label>
                        <select name="country_id" id="country">
                            <option value="">Select a country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if($country->id == $student->country_id) selected @endif>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>State:</strong>
                        {{-- <input type="text" name="gender" class="form-control" placeholder="gender"> --}}
                        <select name="state_id" id="state">
                            <option value={{ $student->state_id }}>{{ $student->state->name }}</option>
                        </select>
                        @error('state_id')
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
