function myFunction() {
    var day = document.getElementById('getData').value;
    var div1 = document.getElementById('getData')
    var room_id = div1.getAttribute('idroom');
    $.ajax({  //khởi tạo ajax trỏ tới route 
        type: "GET",
        url: "/roomgetday",
        data: {
            'id_room': room_id,
            'date': day,
            // 'timeSlots' : timeSlots,
        },
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (data) {
            // lấy dữ liệu ngày chưa được đặt
            let result = data[0].filter(x => !data[1].includes(x))

            $('#listTimeSlots').empty();
            result.forEach(element => {
                let n = parseInt(element) + 1;
                let m = parseInt(element);
                let daybook = "<div class='form-group'> <input type='hidden' name='start' value='"+element+"'></input> </div>"
                let time = "<div class='form-group'><input type='hidden' name='date' value='"+day+"'></input></div>"
                let idroom = "<div class='form-group'><input type='hidden' name='room' value='"+room_id+"'></input></div>"

                let form = "<form style='margin:4px; '>"+
                       daybook+
                       time+
                       idroom+
                        "<button type='submit' id='submit' class='btn btn-primary'>" + m + ":00" + ' - ' + n + ":00" + "</button></form>"

                $('#listTimeSlots').append(form);
            });
            $("#submit").click(function(e){
                e.preventDefault();
            
                var daybook = $("input[name=daybook]").val();
            
                var time = $("input[name=time]").val();
            
                var idroom = $("input[name=idroom]").val();
                $.ajax({
            
                    type:'POST',
            
                    url:'/booktesst',
            
                    data:{daybook:daybook, time:time, idroom:idroom},
            
                    success:function(data){
            
                       console.log(daybook)
            
                    }
            
                 });
            })
        }
    });

}
