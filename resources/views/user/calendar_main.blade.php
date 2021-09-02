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
            window.location.href = '/calendar/day?id={{ $display->id }}&date='+date['dateStr'];      
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
                title: '予防接種あり',
          @elseif($schedule->vaccine_flag == 0 && $schedule->medical_flag == 1)
                title: '健診あり',
          @elseif($schedule->vaccine_flag == 1 && $schedule->medical_flag == 1) 
                title: '予防接種と健診あり',
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
        <div class="row">
            <div class="col-md-10">
                <div id="calendar"></div>
            </div>
            
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">今日の予定</div>
                </div>
                
                {{-- 予定があるとき --}}
                @isset($daySchedules[0])
                    @foreach($daySchedules as $daySchedule)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        予防接種予定： 
                                        @if($daySchedule->vaccine_flag == 1)
                                            あり
                                        @else
                                            なし
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        健診予定： 
                                        @if($daySchedule->medical_flag == 1)
                                            あり
                                        @else
                                            なし
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        開始時間：{{ $daySchedule->start_time }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                {{-- 予定がないとき --}}
                @else
                    <h3>予定はありません</h3>
                @endisset
            </div>
        </div>
    </div>
    
    
@endsection