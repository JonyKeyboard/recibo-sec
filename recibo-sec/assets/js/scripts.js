$(document).ready(
    
    function(){
    //cep: 00.000-000
    $('#m').mask('#00,00', {reverse: true})}); 

    $(function(){
        $("#money").maskMoney({
           prefix: 'R$ ',
           allowNegative: true,
           thousands: '.',
           decimal: ',',
        });
        

});

