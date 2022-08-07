<div class="home">
    <div class="home_slider_container">
        <div class="owl-carousel owl-theme home_slider">

            <div class="slide">
                <div class="background_image" style="background-image:url(/images/index_1.jpg)"></div>
                <div class="home_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content text-center">
                                    <div class="home_title">A Luxury Stay</div>
                                    <div class="booking_form_container">
                                        <form action="{{ route('book.store') }}" method="POST" class="booking_form">
                                            @csrf
                                            <div class="d-flex flex-xl-row flex-column align-items-start justify-content-start">
                                                <div class="booking_input_container d-flex flex-lg-row flex-column align-items-start justify-content-start">
                                                    <div>
                                                        <label class="text-white font-bold">Check in</label>

                                                        <input type="date" name="check_in_date" style="opacity: 0.5; color: #000" class=" booking_input booking_input_a booking_in" placeholder="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required></div>
                                                    @error('check_in_date')
                                                    <p class="text-red-500">{{ $message }}</p>
                                                    @enderror

                                                    <div>
                                                        <label class="text-white font-bold">Check out</label>

                                                        <input type="date" name="check_out_date" style="opacity: 0.5; color: #000" class=" booking_input booking_input_a booking_out" placeholder="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required></div>

                                                    @error('check_out_date')
                                                    <p class="text-red-500">{{ $message }}</p>
                                                    @enderror

                                                    <div>
                                                        <label class="text-white font-bold">Adult</label>
                                                        <input type="number" placeholder="No of Adult" min="1" name="no_of_adult" style="opacity: 0.5; color: #000" class="booking_input booking_input_b" placeholder="Children" required></div>
                                                    @error('no_of_adult')
                                                    <p class="text-red-500">{{ $message }}</p>
                                                    @enderror

                                                    <div>
                                                        <label class="text-white font-bold">Children</label>
                                                        <input type="number" min="1" placeholder="No of Children" name="no_of_children" style="opacity: 0.5; color: #000" class="booking_input booking_input_b" placeholder="Room" required></div>

                                                    @error('no_of_children')
                                                    <p class="text-red-500">{{ $message }}</p>
                                                    @enderror

                                                    <div>
                                                        <label class="text-white font-bold">Rooms</label>

                                                        {{-- <input type="number" multiple style="opacity: 0.5; color: #000" class="booking_input booking_input_b" placeholder="Room" required> --}}
                                                        <select name="rooms[]" id="e9" aria-label="multiple select " class="" multiple>

                                                            <optgroup label="Avaliable Rooms">

                                                                @forelse($avaliableRooms as $room)
                                                                <option value="{{ $room->id }}">{{ $room->name }} ( ₦ {{ $room->price  }})</option>


                                                                @empty
                                                                <option>No record found</option>

                                                                @endforelse
                                                            </optgroup>


                                                        </select>


                                                    </div>
                                                </div>
                                                <div>

                                                    <button type="submit" class="mt-8 booking_button trans_200">Book Now</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>

<script>
    $(document).ready(function() {
        $('#e9').select2({
            placeholder: "Select Available Rooms"
            , selectionCssClass: "bg-opacity-50 focus:border-yellow-500 focus:bg-transparent focus:ring-2 focus:ring-yellow-500 leading-8 transition-colors duration-200 ease-in-out text-base text-gray-700 rounded h-14 border-yellow-500"
            , allowClear: true
        , })
    });

</script>

<style>
    @media only screen and (max-width: 600px) {
        .select2-selection {
            /*min-width: 225%;*/
            width: auto;
            opacity: 0.5;
            color: black;
        }
    }

    .select2-selection {
        /*min-width: 225%;*/
        width: auto;
        opacity: 0.5;
        color: black;
    }

</style>
