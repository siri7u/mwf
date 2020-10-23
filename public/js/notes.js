function delay(callback, ms) {
    var timer = 0;
    return function() {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}





$('#spinner').hide();
$(document).on('keyup', '.input-group', delay(function() {

    $('#spinner').show()
    console.log("keyup")
    $.ajax({
        url: "/notes/ajaxSearch",
        method: 'GET',
        data: { 'search': $('.search').val() },
        async: true,
        dataType: 'json',
        beforeSend: function(){
            $('.list-group').empty();
        },
        success: function(data) {
            let i = (data.reduce((a, obj) => Object.keys(obj).length, 0));
            $('.list-group').empty();
            // si l'array reçu n'est pas vide
            var foundSomething = false;
            for(var l=0; l<data.length; ++l) {
                if(data[l] !== null) foundSomething = true;
                break;
            }

            console.log(foundSomething)
            if (foundSomething) {
                 data.forEach(async function(e) {
                     $('.list-group').append(`
                        <a href="/notes/`+e.id+`" class="">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p>`+e.text.substring(0,150)+`</p>
                                <span class="badge badge-primary badge-pill">` + e.created_at + ` </span>
                            </li>
                        </a>
                    `);
                 gT});
                 $('#spinner').hide();
            } else {
                console.log('vide')
                $('.list-group').empty();
                $('#spinner').hide();
                $('.list-group').append('<p> Aucun résultat</p>')
            }
            var input_text = $('.search').val();
            $('p').each(function(index) {
                p = $(this).text();
                let regex = '(.*)'
                for (let j = 0; j < input_text.length ; j++) {
                    regex += '('+input_text[j]+')';
                    regex +="(.*)";
                }
                regex = new RegExp(regex, 'i');
                matches = $(this).text().match(regex);
                text = matches.reduce((acc, match, index) =>{
                    if(index == 0){
                        return acc;
                    }
                    return acc + (index % 2 == 0 ? `<span class="bg-warning">${match}</span>` : match)

                }, '')
                $(this).html(text)


            });
        },
        complete : function(){
            $('#spinner').hide();
        },
        error: function(data) {
            $('.list-group').empty();
            $('p').empty();
        }


    })
}, 200));
