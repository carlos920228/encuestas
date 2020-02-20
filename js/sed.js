var dominio="http://localhost/encuestas";
//var dominio ="http://localhost/sapc";


//FUNCIONES PERTENECIENTES AL MODULO DE SISTEMA DE APOYO A PLAN DE CLASE

//Funcion que confirma el envio del formulario
// $('body').on('submit','#form-plan', function(evt) {
         
//     var r = confirm("¿Esta seguro de agregar este plan de clase?");
    
//     if (r == false) 
//     {
//         evt.preventDefault();
//     }
    
    
// });

//Funcion que muestra modal crear plan de clase
// #(id del boton)
$('body').on('click','#regisevaluacion', function() {

    // idd = $(this).val();
    
    $('.modal-dialog').load(dominio+"/evaluacion/registrar_eva",function(){
            //$('#myModal').modal();
        });
});

//Funcion para obtener la modalidad y el nivel para mostrar las carreras disponibles
$('body').on('change', '#nivel', function() {
    select= document.getElementById("nivel"), //El <select>
    value=select.value,
    console.log(value);
      $.post(dominio+"/evaluacion/cambiocarreras/"+value,{
            }, function(data) {
            $("#carreras").html(data);
            });

});


// var folio_plan=[];
// var total=[];

// //funcion para graficar
// $('#datos').click(function(){
//     $.post(dominio+"admin/get_resultados_plan",
//     function(data){
//         //traemos datos desde el controlador
//         var obj=JSON.parse(data);
//         //Vaciamos arrreglos
//         folio_plan=[];
//         total=[];
//         //recorremos JSON
//         $.each(obj,function(i,item){
//             //creamos y colocamos parametros al arreglo
//             folio_plan.push(item.folio_plan);
//             total.push(item.total);
//         });

//         //Eliminamos tiqueta canvas
//         $('#grafica').remove();
//         //Creamos nuevo canvas
//         $('#cont-graf').append("<canvas id='grafica' width='400' height='200'></canvas>");

//         /*------------- GRAFICA ------------*/

//         //id del canvas en html
//         var ctx = $("#grafica");
//         var myChart = new Chart(ctx, {
//             //Tipo de gráfico
//             type: 'bar',
//             data: {
//                 labels: folio_plan,//Horizontal
//                 datasets: [{
//                     //titulo de la página
//                     label: '# Valoración del Plan',
//                     data: total,//Vertical
//                     backgroundColor: [
//                         'rgba(255, 99, 132, 2)',
//                         'rgba(54, 162, 235, 2)',
//                         'rgba(255, 206, 86, 2)',
//                         'rgba(75, 192, 192, 2)',
//                         'rgba(153, 102, 255, 2)',
//                         'rgba(255, 159, 64, 2)'
//                     ],
//                     borderColor: [
//                         'rgba(255, 99, 132, 1)',
//                         'rgba(54, 162, 235, 1)',
//                         'rgba(255, 206, 86, 1)',
//                         'rgba(75, 192, 192, 1)',
//                         'rgba(153, 102, 255, 1)',
//                         'rgba(255, 159, 64, 1)'
//                     ],
//                     borderWidth: 1
//                 }]
//             },
//             options: {
//                 scales: {
//                     yAxes: [{
//                         ticks: {
//                             max:30,
//                             beginAtZero: true
//                         }
//                     }]
//                 }
//             }
//         });
//         /*-----------  TERMINA GRAFICA ----------*/
//     });
// });