$(document).ready(function() {
    var lookupBtn = $('#lookup');

    lookupBtn.on('click', function() {
        var cQuery = $('#country').val();

        $.ajax({
            url:'world.php?country='+cQuery,
            method: "GET",
            data:{country:cQuery}
        }).done(function(response) {
            
            var resultDiv = document.querySelector('#result');
            resultDiv.innerHTML = response;
 
            

        }).fail(function() {
            alert('There was a problem with the request.');
        });



    
    });
});