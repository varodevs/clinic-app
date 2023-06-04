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
                    <form class="d-flex flex-column justify-content-center _form" action="{{ route('request-done') }}" method="POST">
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
                                <select class="form-control" type="text" name="spec" id="spec">
                                    <option value="19">Pediatric &#10088;PCS&#10089;</option>
                                    <option value="">Electrophysiologic &#10088;ECS&#10089;</option>
                                    <option value="">Sports Clinical Specialist &#10088;SCS&#10089;</option>
                                </select>
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
                                    <input class="form-check-input" type="checkbox" name="underchck" value="1" id="under">
                                    <label class="form-check-label" for="under">Yes</label>
                                </div>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="underchck" value="2" id="under2">
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
                            <select id="hourDropdown"></select>                            
                        </div>
                        <button class="btn btn-light _submit" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Array of disabled dates
            var disabledDates = ['2023-05-28', '2023-06-05', '2023-06-12'];
            
            // Function to check if a date is disabled
            function isDateDisabled(date) {
                var formattedDate = date.toISOString().split('T')[0];
                return disabledDates.includes(formattedDate);
            }
            
            // Function to set the min and max attributes of the input field
            function setDateTimeLimits() {
                var minDate = new Date();
                var maxDate = new Date();
                maxDate.setFullYear(maxDate.getFullYear() + 1);
                
                $('#date').attr('min', minDate.toISOString().slice(0, 16));
                $('#date').attr('max', maxDate.toISOString().slice(0, 16));
            }
            
            // Function to handle change event of the input field
            function handleDateTimeChange() {
                var selectedDate = new Date($('#date').val());
                
                if (isDateDisabled(selectedDate)) {
                    $('#date').val('');
                    alert('The appointment list is complete.');
                }
            }
            
            // Set initial date limits
            setDateTimeLimits();
            
            // Attach change event handler
            $('#datetime').on('change', handleDateTimeChange);
        });
        </script>

        <script>
            const dateInput = document.getElementById('date');
            const hourDropdown = document.getElementById('hourDropdown');
            const special = document.getElementById('spec');

            // Function to populate the hour dropdown based on the selected date
            function populateHourDropdown() {
                const selectedDate = date.value;
                const selectedSpec = spec.value;
                
                // Make an AJAX request to check for available hours
                $.ajax({
                    url: "{{ route('checkDates') }}",
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