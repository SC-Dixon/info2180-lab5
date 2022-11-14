$(document).ready(function() {
    var lookupCtryBtn = $('#lookupCtry');
    var lookupCitBtn = $('#lookupCit');

    lookupCtryBtn.on('click', function() {
        var cQuery = $('#country').val();
        var citQuery = 'NA';

        $.ajax({
            url:'world.php?country='+cQuery,
            method: "GET",
            data:{country:cQuery,lookup:citQuery}
        }).done(function(response) {
            
            var resultDiv = document.querySelector('#result');
            resultDiv.innerHTML = response;
 
            

        }).fail(function() {
            alert('There was a problem with the request.');
        });



    
    });

    lookupCitBtn.on('click', function() {
        var cQuery = $('#country').val();
        var citQuery = 'cities';

        $.ajax({
            url:'world.php?country='+cQuery+'&lookup='+citQuery,
            method: "GET",
            data:{country:cQuery,lookup:citQuery}
        }).done(function(response) {
            
            var resultDiv = document.querySelector('#result');
            resultDiv.innerHTML = response;
 
            

        }).fail(function() {
            alert('There was a problem with the request.');
        });



    
    });
});