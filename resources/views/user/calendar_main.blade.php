<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
            left: '',
            center: 'title',
            right:'prev,next'
        },
            
        locale: 'ja',
        navLinks: true, 
        businessHours: true, 
        editable: true,
        selectable: true,
        
        dateClick: function(date, jsEvent, view) {
            window.location.href = '/calendar/details?id={{ $display->id }}&date='+date['dateStr'];      
        },
        
        eventClick: function(info) {
            info.el.onclick=function(){
            window.location.href = '/calendar/details?id={{ $display->id }}&schedule_id='+info.event.id;
            };
        },
        
        events: [
        @foreach($schedules as $schedule)
        
        {
          id: {{ $schedule->id }},
          @if($schedule->vaccine_flag == 1 && $schedule->medical_flag == 0)
                title: '予防接種の予定あり',
          @elseif($schedule->vaccine_flag == 0 && $schedule->medical_flag == 1)
                title: '健診の予定あり',
          @elseif($schedule->vaccine_flag == 1 && $schedule->medical_flag == 1) 
                title: '予防接種と健診の予定あり',
          @endif
          start: '{{ $schedule->date }}T{{ $schedule->start_time }}'
        },
        
        @endforeach
        ],
        
        });
        setTimeout(function(){
            calendar.render();
        }, 500);
    });

</script>






{{-- loginしているのでmainの読み込み --}}
@extends('layouts.main')

{{-- title --}}
@section('title', 'カレンダー')

{{-- contentここから --}}
@section('content')
    <div class="container">
        <h3>カレンダー！</h3>
    </div>


<div id="calendar"></div>
@endsection