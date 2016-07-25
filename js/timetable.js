function isScrolledIntoView(elem)
{   
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();
    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}
$.getJSON("webdata.json", function(json) {
    var timetable=json.schedule;
    var info=json.info;
    var begin=new Date(info.begin_date);
    var end=new Date(info.end_date);
    var today=new Date();
    if(today>=begin && today<= end){
        d=today.getDate()-begin.getDate();
        var day=d;
    }else{
        var day=-1;
    }
    list=$( "#schedule"+day+" div" ).children();
    $(window).scroll(function(){
        console.log(isScrolledIntoView("#schedule"));                        
        if (isScrolledIntoView("#schedule"+day)) {
            var today_schedule=timetable[day];
            $.each(today_schedule,function(d) {
                console.log('hello');                
                d1=today_schedule[d];
                time=d1.time.split('-');
                time1=time[0].split(':');
                time2=time[1].split(':');
                now=new Date();
                time_tic=today.setHours(time1[0],time1[1]);
                time_toc=today.setHours(time2[0],time2[1]);
                $(list[d]).removeClass("active");
                if(now>=time_tic&&now<time_toc){
                    console.log('opps');
                    $(list[d]).addClass("active");
                };               
            });
        }
        
        //$("#schedule"+day).
    });

})
