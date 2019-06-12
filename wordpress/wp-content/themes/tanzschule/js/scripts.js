$.ajax({
    type: "POST",
    url: "/tanzschule/wordpress/wp-admin/admin-ajax.php",
    data: ({
        action: "getRaumKurse",
        id : 2
    }),
    dataType: "json",
    success: function (response){
        console.log(response);
        var test = response;
        for ( i in test) {
            console.log(response[i]);
            var time = response[i].Uhrzeit;
            var day = response[i].Tag;
            $('tr[data-time="' + time + '"] td.' + day + '').addClass('blocked')
        };
    }
});