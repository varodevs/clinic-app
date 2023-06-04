@extends('layout')

@section('content')

    <div class="col-12">
        <div class="container-fluid d-flex flex-column justify-content-center _div-azul">
            <h3 class="mx-3">Request your appointment</h3>
        </div>
        <div class="d-flex justify-content-center _content">
            <div class="d-flex flex-column justify-content-center w-50">
                <h4></h4>
                <p></p>
                <div class="d-flex flex-column justify-content-center px-5 py-3 _div-login">
                    <form class="d-flex flex-column justify-content-center _form" action="{{ route('requestdone') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-evenly w-75">
                            <div>
                                <label class="_form-label" for="fname">First Name</label>
                                <input class="form-control" type="text" name="fname" id="fname">
                                <label class="_form-label" for="sname">Phone Number</label>
                                <input class="form-control" type="text" name="phone" id="sname">
                                <label class="_form-label" for="birth">Date of Birth</label>
                                <input class="form-control" type="date" name="birth" id="birth">
                                <label class="_form-label" for="spec">Speciality</label>
                                <select class="form-control" name="spec" id="spec">
                                    <option value="19">Pediatric &#10088;PCS&#10089;</option>
                                    <option value="">Electrophysiologic &#10088;ECS&#10089;</option>
                                    <option value="">Sports Clinical Specialist &#10088;SCS&#10089;</option>
                                </select>
                                <label class="_form-label">Sex</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" value="1" id="sex">
                                    <label class="form-check-label" for="sex">Man</label>
                                </div>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" value="2" id="sex2">
                                    <label class="form-check-label" for="sex2">Woman</label>
                                </div>
                            </div>
                            <div>
                                <label class="_form-label" for="lname">Last Name</label>
                                <input class="form-control" type="text" name="lname" id="lname">
                                <label class="_form-label" for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="name@email.com">
                                <label class="_form-label" for="date">Check for dates</label>
                                <input class="form-control" type="date" name="date" id="date">
                                <label class="_form-label" for="id">ID</label>
                                <input class="form-control" type="text" name="id" id="id">
                                <label class="_form-label">Underage?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="underchck" value="1" id="under">
                                    <label class="form-check-label" for="under">Yes</label>
                                </div>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="underchck" value="2" id="under2">
                                    <label class="form-check-label" for="under2">No</label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="my-4 w-75">
                            <label class="_form-label" for="textarea" >Describe your problem:</label>
                            <textarea class="form-control" name="textarea" id="textarea"></textarea>                            
                        </div>
                        <div class="my-4 w-25">
                            <label class="_form-label" for="hourDropdown">Choose an hour</label>
                            <select class="form-control text-center" type="text" id="hourDropdown"></select>                            
                        </div>
                        <button class="btn btn-light _submit" type="submit">Send</button>
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
        <script>
            var input = document.getElementById('date');
        
            input.addEventListener('input', function(event) {
            var selectedDate = new Date(event.target.value);
            var dayOfWeek = selectedDate.getDay();
        
            if (dayOfWeek === 0 || dayOfWeek === 6) { // Sunday: 0, Saturday: 6
                event.target.value = ''; // Clear the input value
                alert('Please choose a weekday.');
            }
            });
        </script>
        <script>
            const dateInput = document.getElementById('date');
            const hourDropdown = document.getElementById('hourDropdown');
            const special = document.getElementById('spec');

            // Function to populate the hour dropdown based on the selected date
            function populateHourDropdown() {
                const selectedDate = dateInput.value;
                const selectedSpec = special.value;

                // Make an AJAX request to check for available hours
                $.ajax({
                    url: "{{ route('check') }}",
                    type: 'GET',
                    data: {
                        date: selectedDate,
                        idemp: selectedSpec
                    },
                    success: function(response) {
                        // Clear previous options
                        hourDropdown.innerHTML = '';

                        // Populate the dropdown with available hours
                        response.forEach(function(hour) {
                            const option = document.createElement('option');
                            option.value = hour;
                            option.textContent = hour;
                            hourDropdown.appendChild(option);
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            // Attach change event listener to the date input field
            dateInput.addEventListener('change', populateHourDropdown);
        </script>
@endsection