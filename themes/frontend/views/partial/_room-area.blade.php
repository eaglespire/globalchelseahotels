<div class="booking" style="margin-top: -100px !important;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="booking_title text-center">
                    <h2 class="font-semibold text-4xl">Our Rooms</h2>
                </div>
                <div class="booking_text text-center">
                    <p>
                        We at Global Chelsea Hotel offer you affordable and friendly accommodation in between the business trips
                        within Benin city and environ, We have 45 fully equipped rooms to meet your hotel reservation and
                        budget.
                        At Global Chelsea Hotel we pride ourselves on friendly, personalized customer services and a warm,
                        comfortable environment.
                    </p>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            @foreach($rooms as $room)
            <div class="col-lg-6 col-md-6 pt-4">
                <div class="booking_item">
                    <img class="img-responsive" src="{{ $room->image }}">
                    <div class="booking_overlay trans_200"></div>
                    <div class="booking_price">&#8358; {{ $room->price }}</div>
                    <div class="booking_link"><a href="{{ route('rooms.show', $room->id) }}">{{ $room->name }}</a></div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
