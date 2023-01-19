$('#dodajForm').submit(function(){
    event.preventDefault();
    const $form = $(this);
    const $inputs = $form.find('input, select, button, textarea');
    const serijalizacija = $form.serialize();
    let red_za_unos = $form.serializeArray().reduce(function(json, {name, value}){
        json[name]=value;
        return json;
    });

    request = $.ajax({
        url:'handler/dodajUtakmicu.php',
        type:'post',
        data:serijalizacija
    });

    request.done(function(response, textStatus, jqXHR){
        if(response==="Success"){
            //appendRow(red_za_unos);
            alert("Utakmica uspesno dodata!");
            azurirajSkor(red_za_unos);
            dodajUtakmicu(red_za_unos);
        }
        else alert("Utakmica nije uspesno dodata. \nProbajte ponovo!");
    });
});


// function appendRow(row){

//         $("#tabelaUtakmica tbody").append(
//             `
//             <tr>
//                 <td>${row.datum_odigravanja}</td>
//                 <td>${row.vreme_odigravanja}</td>
//                 <td>${row.value}</td>
//                 <td>${row.domacin_broj_poena}</td>
//                 <td>${row.gost_broj_poena}</td>
//                 <td>${row.gost}</td>
//             </tr>
//             `
//         ); 
// }
function azurirajSkor(row){
    const odigrane_utakmice = document.getElementById("brUtakmica").value;
    console.log(odigrane_utakmice);

    // $("#tabelaUtakmica tbody").append(
    //     `
    //     <tr>
    //         <td>${row.datum_odigravanja}</td>
    //         <td>${row.vreme_odigravanja}</td>
    //         <td>${row.value}</td>
    //         <td>${row.domacin_broj_poena}</td>
    //         <td>${row.gost_broj_poena}</td>
    //         <td>${row.gost}</td>
    //     </tr>
    //     `
    // ); 
}

function dodajUtakmicu(row){

    $("#tabelaUtakmica tbody").append(
        `
        <tr>
            <td>${row.datum_odigravanja}</td>
            <td>${row.vreme_odigravanja}</td>
            <td>${row.value}</td>
            <td>${row.domacin_broj_poena}</td>
            <td>${row.gost_broj_poena}</td>
            <td>${row.gost}</td>
        </tr>
        `
    ); 
}
