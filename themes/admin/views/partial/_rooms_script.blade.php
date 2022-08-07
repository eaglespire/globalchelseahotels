<script type="text/javascript" src="{{ asset('backend/vendor/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/vendor/jquery-nice-select/jquery.nice-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/vendor/bootstrap/js/bootstrap-table.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/vendor/bootstrap/js/bootstrap-table-fixed-columns.min.js') }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select').niceSelect();
        $('#datatable').DataTable();
        $('.table-checkinlist').bootstrapTable({
            fixedColumns: true
            , fixedNumber: 1
        , })
        $('[data-toggle="tooltip"]').tooltip();
        $(".div-table-responsive .fixed-table-body").niceScroll({
            cursorcolor: "#bbb"
        , });

        // monthly check in list
        $('#btn-roomlist').click(function() {
            $(this).toggleClass('btn-primary btn-outline-primary');
            $('#btn-checkinlist').toggleClass('btn-primary btn-outline-primary');
            $('.div-roomlist').show('slow');
            $('.div-checkinlist').hide();
        });

        $('#btn-checkinlist').click(function() {
            $('.table-checkinlist').removeClass('table-hover table-bordered');
            $(this).toggleClass('btn-primary btn-outline-primary');
            $('#btn-roomlist').toggleClass('btn-primary btn-outline-primary');
            $('.div-checkinlist').show('slow');
            $('.div-roomlist').hide();
        });

        // ajax 
        $('#month').on('change', function() {
            let month = this.value;
            let year = $('#year').val();

            let url = '{{ route('
            rooms.getcheckinrooms ', [":month", ":year"]) }}';
            url = url.replace(':month', month);
            url = url.replace(':year', year);

            let thead = ''
                , tbody = '';
            let date = new Date();
            let today = date.getDate();
            let thismonth = date.getMonth() + 1;
            let thisyear = date.getFullYear();

            $.ajax({
                type: 'GET'
                , url: url
                , success: function(data) {

                    if (data) {
                        $('.table-checkinlist').html('');

                        // thead
                        thead += ` 
         				<thead>
									<th class="border-right" style="" data-field="0">
										<div class="th-inner ">RoomNo./Day</div>
										<div class="fht-cell"></div>
									</th>
								`;

                        saturday = data.firstsatday;
                        if (saturday == 7) {
                            sunday = 1;
                        } else {
                            sunday = saturday + 1;
                        }

                        for (var i = 1; i <= data.lastday; i++) {
                            if (i == today && month == thismonth && year == thisyear) {
                                thead += `<th class='bg-today' data-field=${i}><div class="th-inner ">${i}</div><div class="fht-cell"></div></th>`;
                            } else if (i == saturday || i == sunday) {
                                thead += `<th class='bg-weekend' data-field=${i}><div class="th-inner ">${i}</div><div class="fht-cell"></div></th>`;
                            } else {
                                thead += `<th data-field=${i}><div class="th-inner ">${i}</div><div class="fht-cell"></div></th>`;
                            }

                            if (i % 7 == 0) {
                                saturday += 7;
                                sunday += 7;
                            }
                        }
                        thead += `</thead>`;

                        // tbody 

                        tbody += `<tbody>`;
                        $.each(data.rooms, function(i, v) {
                            tbody += `<tr><td class="border-right" data-fixed-columns="true">R-${v.roomno}</td>`;
                            saturday = data.firstsatday;
                            if (saturday == 7) {
                                sunday = 1;
                            } else {
                                sunday = saturday + 1;
                            }

                            $.each(data.checkinrooms, function(ci, cv) {
                                let check = false;
                                if (cv.length) {
                                    $.each(cv, function(cvi, cvv) {
                                        if (cvv.roomno == v.roomno) {
                                            if ((ci + 1) == today && month == thismonth && year == thisyear) {
                                                tbody += `<td class="text-primary bg-today"><i class="far fa-check-circle"></i></td>`;
                                            } else if ((ci + 1) == saturday || (ci + 1) == sunday) {
                                                tbody += `<td class="text-primary bg-weekend"><i class="far fa-check-circle"></i></td>`;
                                            } else {
                                                tbody += `<td class="text-primary"><i class="far fa-check-circle"></i></td>`;
                                            }

                                            check = true;
                                        }
                                    });
                                }
                                if (!check) {
                                    if ((ci + 1) == today && month == thismonth && year == thisyear) {
                                        tbody += `<td class='bg-today'></td>`;
                                    } else if ((ci + 1) == saturday || (ci + 1) == sunday) {
                                        tbody += `<td class='bg-weekend'></td>`;
                                    } else {
                                        tbody += `<td></td>`;
                                    }
                                }

                                if ((ci + 1) % 7 == 0) {
                                    saturday += 7;
                                    sunday += 7;
                                }
                            });

                            tbody += `</tr>`;
                        });
                        tbody += `</tbody>`;

                        $('.table-checkinlist').html(thead + tbody);
                    }

                }
            });


        }); // end of ajax 



    });

    // delete sweet alert
    function confirmDelete(room_id) {
        swal({
                title: "Are you sure to Delete?"
                , text: "The data will be permanently deleted."
                , icon: "warning"
                , buttons: true
                , dangerMode: true
            , })
            .then((willDelete) => {
                if (willDelete) {
                    $('#' + room_id).submit();
                }
            });
    }

</script>
