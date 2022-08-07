<script type="text/javascript" src="{{ asset('backend/vendor/jquery-flexdatalist/jquery.flexdatalist.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $('.btn-check').tooltip('disable')
        $('.btn-confirm').tooltip('disable')
        $('.flexdatalist').flexdatalist({
            minLength: 1
            , noResultsText: 'No Guest Names found for "{keyword}"'
        });


        // ---- date validation ----
        $('#bookdate').on('change', function() {
            startdate = new Date($(this).val());
            startdate.setDate(startdate.getDate() + 1);
            var mindate = startdate.toISOString().substr(0, 10);
            $('#todate').attr('min', mindate);
        });
        $('#todate').on('change', function() {
            startdate = new Date($('#bookdate').val());
            todate = new Date($(this).val());
            diff = new Date(todate - startdate);
            days = diff / 1000 / 60 / 60 / 24;
            if (days > 0) {
                $('#duration').val(days);
            }
            $('.btn-check').tooltip('disable')
            $('.btn-confirm').tooltip('disable')
        });
        // ---- end of date validation ----



        // ---- show hide for new guest & returning guest ----
        $('input[type=radio][name=guesttype]').change(function() {
            if (this.value == 'returning') {
                $('#div-new-guest').hide();
                $('#div-returning-guest').show('400');
            } else {
                $('#div-returning-guest').hide();
                $('#div-new-guest').show('400');
            }
        });
        // ---- end of show hide for new guest & returning guest ----



        // ---- add remove input field ----
        let i = 1;
        $('form').on('click', '.btn-add', function() {
            i++;
            let html = ` 
                  <div class="form-row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="roomtype">Room Type:</label>
                        <select class="form-control roomtype" name="roomtype[]">
                          @foreach ($roomtypes as $roomtype)
                            <option value="{{ $roomtype->id }}" @if(old('roomtype_id') == $roomtype->id) selected @endif >{{ $roomtype->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label>No of Rooms:</label>
                        <input type="number" class="form-control noofroom" name="noofroom[]" value="1" min="1">
                      </div>
                    </div>
                    <div class="col-2 text-center">
                      <div class="form-group">
                        <label>Add</label>
                        <button type="button" class="btn btn-outline-secondary btn-add btn-sm px-2 d-block mx-auto"><i class="fas fa-plus"></i></button>
                      </div>
                    </div>
                  </div>
                  `;
            $('#div-dynamic-input').append(html);
            $(this).prev('label').text('Remove');
            $(this).addClass('btn-outline-danger btn-remove').removeClass('btn-outline-secondary btn-add');
            $(this).html(`<i class="fas fa-minus"></i>`);
        });
        $('form').on('click', '.btn-remove', function() {
            $(this).closest('.form-row').remove();
        });
        $('form').on('keypress', '.noofroom', function(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 49 || e.which > 57)) {
                return false;
            }
        });
        // ---- end of add remove input field ----



        // ---- ajax functions ----
        // -- returning guest info
        $('input.flexdatalist').on('select:flexdatalist', function(event, set, options) {
            let userid = set.value;
            let url = '{{ route('
            bookings.getguestdata ', ":userid") }}'
            url = url.replace(':userid', userid)

            $.ajax({
                type: 'GET'
                , url: url
                , success: function(data) {
                    $('#g-email').text(data.email)
                    phone = data.phone1 + ((data.phone2) ? ', ' + data.phone2 : '');
                    $('#g-phone').text(phone)
                    $('#g-from').text(data.city + ', ' + data.country)
                    $('#g-membertype').text(data.membertype)
                    $('#g-points').text(data.points)
                    $('#guest_id').val(data.guest_id);
                }
                , error: function(e) {
                    console.log(e)
                }
            });
            $('.table-guest-info').show('500');
        });


        // -- available room info
        $('form').on('click', '.btn-check', function() {
            let startdate = $('#bookdate').val();
            let enddate = $('#todate').val();
            if (startdate && enddate) {

                let url = '{{ route('
                bookings.getavailablerooms ', [":startdate", ":enddate"]) }}'
                url = url.replace(':startdate', startdate)
                url = url.replace(':enddate', enddate)
                // console.log(url)
                $('#tbody-room').html('');
                $.ajax({
                    type: 'GET'
                    , url: url
                    , success: function(data) {
                        rooms = data.rooms
                        roomtypes = data.roomtypes
                        let html = "";
                        $.each(roomtypes, function(i, v) {

                            let roomnofilter = rooms.filter(function(obj) {
                                return obj.roomtype_id == v.id;
                            });
                            let roomno = [];
                            $.each(roomnofilter, function(i2, v2) {
                                roomno.push(v2.roomno)
                            });
                            let count = roomnofilter.length;
                            let roomnostring = roomno.join(", ");
                            html += ` 
                      <tr>
                        <td>${i+1}.</td>
                        <td>${v.name}</td>
                        <td align='center'>${v.noofpeople}</td>
                        <td align='center'>${count}</td>
                        <td>${roomnostring}</td>
                      </tr>
                  `;
                        });
                        $('#tbody-room').append(html);
                    }
                    , error: function(e) {
                        console.log(e)
                    }
                });

                $('#roomModal').modal('show')
            } else {
                $('.btn-check').tooltip('enable')
            }
        });


        // -- calculate total cost 
        $('form').on('click', '.btn-confirm', function() {
            let duration = $('#duration').val();
            if (duration) {
                let roomtype = [];
                $("select[name='roomtype[]']  option:selected").each(function() {
                    roomtype.push($(this).val());
                });
                let noofroom = $("input[name='noofroom[]']").map(function() {
                    return $(this).val();
                }).get();

                if (roomtype.length && noofroom.length) {

                    $.ajax({
                        type: 'GET'
                        , url: "{{ route('bookings.gettotalcost') }}"
                        , data: {
                            roomtype: roomtype
                            , noofroom: noofroom
                            , duration: duration
                        }
                        , success: function(response) {
                            $('#totalcost').val(response.totalcost);
                            $('#depositamount').val(response.depositamount);
                        }
                    })

                }
            } else {
                $('.btn-confirm').tooltip('enable')
            }

        });
        // ---- end of ajax functions ----


    }) // end of document ready function 

</script>
