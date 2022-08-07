<div class="booking-area" >
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <form wire:submit.prevent="storeBooking()">
                    <div  class="booking-wrap d-flex justify-content-between align-items-center">
                        <div class="single-select-box mb-30">

                            <div class="boking-tittle">
                                <span> Check In Date:</span>
                            </div>
                                 @error('check_in_date')
                                 <p class="text-red-500">{{ $message }}</p>
                                 @enderror
                            <div class="boking-datepicker">
                                <input type="date" class="nice-select" min="{{  date('Y-m-d') }}" wire:model="check_in_date" placeholder="10/12/2020" />
                            </div>
                        </div>

                        <div class="single-select-box mb-30">

                            <div class="boking-tittle">
                                <span>Check Out Date:</span>
                            </div>
                                    @error('check_out_date')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                            <div class="boking-datepicker">
                                <input type="date" class="nice-select" min="{{  date('Y-m-d') }}" wire:model="check_out_date" placeholder="12/12/2020" />

                            </div>
                        </div>

                        <div class="single-select-box mb-30">
                            <div class="boking-tittle">
                                <span>Adults:</span>
                            </div>
                              @error('no_of_adult')
                              <p class="text-red-500">{{ $message }}</p>
                              @enderror

                            <div class="select-this" >
                                    <div class="select-itms">
                                        <select wire:model  ="no_of_adult" class="nice-select">

                                            {{-- <option value="">Please select</option> --}}
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                            </div>
                        </div>

                        <div class="single-select-box mb-30">
                            <div class="boking-tittle">
                                <span>Children:</span>
                            </div>
                              @error('no_of_children')
                              <p class="text-red-500">{{ $message }}</p>
                              @enderror

                            <div class="select-this">

                                    <div class="select-itms" >

                                        <select wire:model="no_of_children" class="nice-select">

                                            {{-- <option value="">Please select</option> --}}
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                            </div>
                        </div>

                        <div class="single-select-box pt-45 mb-30">
                           
                            <button type="submit" class="btn select-btn">Book Now</button>
                            {{-- <button type="submit" class="btn select-btn">Book Now</button> --}}
                            {{-- <button type="submit" wire:loading wire:target="storeBooking()" class="btn select-btn">Booking...</button> --}}

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

