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
        
        
        events: [
        
        @foreach($schedules as $schedule)
        
        {
          id: {{ $schedule->id }},
          title: '{{ $schedule->start_time }}',
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