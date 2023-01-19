function obrisiIgraca(){
    event.preventDefault();
    console.log("ulazak u obrisi igraca");
    var obrisi = document.getElementById("obrisi");
    var id = obrisi.options[obrisi.selectedIndex].value;
    console.log(id);
    var result = confirm("Da li sigurno zelite da obrisete igraca?");
//     if(result == true){
//     //brisemo igraca AJAX

//     request = $.ajax({
//         url: 'handler/obrisiIgraca.php',
//         method: 'post',
//         data: {
//             igrac_id : id
//         },

//         success: function () {
//             alert('Igrac obrisan iz baze!')
//             location.reload();
//         }
//     })
// }

}