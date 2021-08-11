<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
//        var param = location.search;
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
            left: '',
            center: 'title',
            right:'prev,next'
            //right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
            //initialDate: '2020-09-12',
        locale: 'ja',
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: true,
        selectable: true,
        dateClick: function(date, jsEvent, view) {
            window.location.href = '/calendar/detail?id={{$id}}&date='+date['dateStr'];      
        },
        eventClick: function(info) {
            info.el.onclick=function(){
            //alert(info.event.id);
            window.location.href = '/calendar?id=2&calendar_id='+info.event.id;
            //alert(info.event.id + ":" + info.event.extendedProps.status);
            };
        },
        events: [
        {
          id: '1',
          title: 'Business Lunch',
          start: '2021-09-03T13:00:00',
          constraint: 'businessHours'
        },
        /*
        {
          title: 'Meeting',
          start: '2020-09-13T11:00:00',
          constraint: 'availableForMeeting', // defined below
          color: '#257e4a'
        },
        {
          title: 'Conference',
          start: '2020-09-18',
          end: '2020-09-20'
        },
        {
          title: 'Party',
          start: '2020-09-29T20:00:00'
        },

        // areas where "Meeting" must be dropped
        {
          groupId: 'availableForMeeting',
          start: '2020-09-11T10:00:00',
          end: '2020-09-11T16:00:00',
          display: 'background'
        },
        {
          groupId: 'availableForMeeting',
          start: '2020-09-13T10:00:00',
          end: '2020-09-13T16:00:00',
          display: 'background'
        },

        // red areas where no events can be dropped
        {
          start: '2020-09-24',
          end: '2020-09-28',
          overlap: false,
          display: 'background',
          color: '#ff9f89'
        },
        {
          start: '2020-09-06',
          end: '2020-09-08',
          overlap: false,
          display: 'background',
          color: '#ff9f89'
        }
        */
        ],
        });
        setTimeout(function(){
            calendar.render();
        }, 1000);
    });

</script>
{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'ホーム')

{{-- contentここから --}}
@section('content')


<div id="calendar"></div>
@endsection