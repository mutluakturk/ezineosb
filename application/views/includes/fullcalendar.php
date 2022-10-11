<script>
    +function($){ "use strict";
        $('.external-event').each(function(){
            $(this).data('event', {
                title: $.trim($(this).text()),
                className: [$(this).data('class')]
            });
        });

        $('.external-event').draggable({
            revert: true,
            revertDuration: 0
        });

        var now = function () {
            let now = new Date();
            let nowDate = now.getFullYear() + '-' + (now.getMonth()+1) + '-' + now.getDay();
            return nowDate;
        }

        var cal = $('#fullcalendar').fullCalendar({
            theme: false,
            editable: false,
            droppable: false,
            initialView: 'resourceTimelineWeek',
            defaultDate: now(),
            header: {
                left: 'prev, today, next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            buttonText: {
                prev: '',
                next: ''
            },
            events: [
                <?php foreach ($takvimData as $item) {?>
                {
                    "category": "primary",
                    "title": "<?= $item->name.' '.$item->surname; ?>",
                    "start": "<?= $item->event_date; ?>",
                    "time": "<?= $item->event_time; ?>",
                    "phone": "<?= $item->phone; ?>",
                    "className": <?= (patient_check($item->name, $item->surname) == -1) ? '["warning"]' : '["success"]'; ?>
                },
                <?php } ?>

            ],
            drop: function(date) {
                if ($('#drop-remove').is(':checked')) {
                    $(this).remove();
                }
            },
            dayClick: function(date, jsEvent, view) {
                var modal = $('#new_event_modal');
                modal.modal('show');
                modal.find('#event_start').val(date.format());
            },
            eventClick: function (info) {
                //alert('Event: ' + info.title);

                Swal.fire({
                    icon: 'info',
                    title: 'Rezervasyon Özeti',
                    html: 'Hasta: ' + info.title.split('-')[0] +
                        //'</br>Staff: ' + info.staff +
                        '</br>Tarih: ' + info.start._i +
                        '</br>Saat: ' + info.time +
                        '</br>Telefon: ' + info.phone, //+
                        //'</br></br> <a href="<?php //echo base_url('todo/update_from_calendar/'); ?>'+ info.id +'" class="btn btn-outline btn-danger">Update</a>' ,
                    confirmButtonText: 'Tamam'
                })

                //Swal.fire(
                //    "Quick Summary",
                //    "Title: " + info.title.split('-')[0] + "</br>"+
                //    "Staff: " + info.staff + "</br>"+
                //    "Date: " + info.start._i + "</br>"+
                //    "Time: " + info.time + "</br>"+
                //    "Price: " + info.price,
                //    { buttons: ['<a href="#">bla bla</a>', "Close"], }
                //);
            }
        });

        $.fn.windowCheck = function() {
            var ww = $(window).width();
            if(ww > 768) {
                cal.fullCalendar('changeView', 'month');
            } else if(ww < 768 && ww > 540) {
                cal.fullCalendar('changeView', 'basicWeek');
            } else {
                cal.fullCalendar('changeView', 'basicDay');
            }
        };

        $(window).on('resize', function(e){
            $().windowCheck();
        });

        $('.fc-prev-button').append('<i class="fa fa-chevron-left"><i>');
        $('.fc-next-button').append('<i class="fa fa-chevron-right"><i>');

        // add new event category
        $('#new_event_cat_form').on('submit', function(e){
            e.preventDefault();

            var name = $(this).find('#category_name').val();
            var color = $(this).find('#category_color').val();
            var category = $('<div class="external-event"></div>');

            category.text(name);
            category.addClass(color);
            category.data('event', {
                title: name,
                className: [color]
            });

            category.draggable({
                revert: true,
                revertDuration: 0
            });

            $('#external-events').append(category);

            $('#new_event_cat_modal').modal('hide');
        });

        // add new event
        $('#new_event_form').on('submit', function(e){
            e.preventDefault();

            var title = $(this).find('#event_title').val();
            var category = $(this).find('#event_category').val();
            var start = $(this).find('#event_start').val();

            cal.fullCalendar('addEventSource', [
                {
                    title: title,
                    start: start,
                    className: [category]
                }
            ])
            $('#new_event_modal').modal('hide');
        });
    }(jQuery);
</script>